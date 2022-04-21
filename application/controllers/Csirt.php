<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSIRT extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_instansi');
		$this->load->model('M_csirt');
	}

	public function index() {
		$data['userdata'] 	    = $this->userdata;
		$data['dataInstansi'] 	= $this->M_instansi->select_all();
		$data['dataCsirt'] 	= $this->M_csirt->select_all();

		$data['page'] 		= "CSIRT";
		$data['judul'] 		= "Data CSIRT";
		$data['deskripsi'] 	= "Manage Data CSIRT";

		$this->template->views('csirt/home', $data);
	}

	public function prosesTambah() {

		$data['userdata'] 		= $this->userdata;
		$rules = array(
	        array(
	                'field' => 'Instansi',
	                'label' => 'Instansi',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'Tahun',
	                'label' => 'Tahun',
	                'rules' => 'required|numeric|exact_length[4]'
	        ),
	         array(
	                'field' => 'Nama_CSIRT',
	                'label' => 'Nama CSIRT',
	                'rules' => 'required|max_length[20]'
	        ),
	         array(
	                'field' => 'Tgl_Launching',
	                'label' => 'Tanggal Launching',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'Nomor_Sertifikat',
	                'label' => 'Nomor Sertifikat',
	                'rules' => 'max_length[50]'
	        )
		);

		$this->form_validation->set_rules($rules);

		$nama_instansi = $this->M_instansi->select_by_id($this->security->xss_clean($this->input->post('Instansi')));
		$new_name = "CSIRT-".$nama_instansi->Nama_Instansi."-".$this->security->xss_clean($this->input->post('Tahun'));
		$config['upload_path'] = "./assets/pdf_files/csirt";
		$config['allowed_types'] = "pdf";
		$config['max_size'] = 30000;
		$config['file_name'] = $new_name; 
		$this->load->library('upload',$config);

		if ($this->upload->do_upload('Dokumen')) {
			$file_pdf = $this->upload->data();

			$dokumen_csirt = $file_pdf['file_name'];
		}else {
			$dokumen_csirt = NULL;
		}

		$attain 			= $this->input->post();
	    $data_narahubung	= array(); //<-initialize
	       for ($i = 0; $i < count($attain['Nama_Narahubung']); $i++) {
	                //append array
	                $data_narahubung[] = array(
	                    'Nama_Narahubung' => $attain['Nama_Narahubung'][$i],
	                    'Nomor_HP' => $attain['Nomor_HP'][$i]
	                );
	               
	       }

	       $rows = array(); // will hold all table rows to insert
			foreach ($data_narahubung as $row) { // loops through your datasets
			    $row_string = ''; // will hold the string for this row
			    foreach ($row as $value) {
			        // make sure that value is escaped
			        $row_string .= addslashes($value) . ' - ';
			    }
			    $row_string = substr($row_string, 0, -2); // trim last ", " and wrap in brackets
			    $rows[] = $row_string; // push row to rows array
			}
			$rows = implode(', ', $rows); // glue rows together into one string

	       // print_r($data_narahubung);
	       // echo "<br>";
	       // echo $rows;

		$data = [
				'Status' 			=> 'Sudah CSIRT',
				// 'Nama_Narahubung' 	=> $this->security->xss_clean($this->input->post('Nama_Narahubung')),
				// 'Nomor_HP' 			=> $this->security->xss_clean($this->input->post('Nomor_HP')),
				'Nomor_Sertifikat' 	=> $this->security->xss_clean($this->input->post('Nomor_Sertifikat')),
				'Tgl_STR' 			=> $this->security->xss_clean($this->input->post('Tgl_STR')),
				'Tgl_Launching' 	=> $this->security->xss_clean($this->input->post('Tgl_Launching')),
				'Nama_CSIRT' 		=> $this->security->xss_clean($this->input->post('Nama_CSIRT')),
				'Narahubung' 		=> $rows,
				'Dokumen' 			=> $dokumen_csirt,	
				'Instansi' 			=> $this->security->xss_clean($this->input->post('Instansi')),	
				'Tahun' 			=> $this->security->xss_clean($this->input->post('Tahun')),		
				'updated_by' 		=> $data['userdata']->username
		];

		if ($this->form_validation->run() == TRUE) {
			if($this->M_csirt->insert($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
				redirect('Csirt');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!');
				redirect('Csirt');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!'.$out['msg']);
			redirect('Csirt');
		}
	 
	}

	public function prosesUpdate() {
		$data['userdata'] 		= $this->userdata;
		$rules = array(
	        array(
	                'field' => 'Instansi',
	                'label' => 'Instansi',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'Tahun',
	                'label' => 'Tahun',
	                'rules' => 'required|numeric|exact_length[4]'
	        ),
	         array(
	                'field' => 'Nama_CSIRT',
	                'label' => 'Nama CSIRT',
	                'rules' => 'required|max_length[20]'
	        ),
	         array(
	                'field' => 'Tgl_Launching',
	                'label' => 'Tanggal Launching',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'Nomor_Sertifikat',
	                'label' => 'Nomor Sertifikat',
	                'rules' => 'max_length[50]'
	        )
		);

		$this->form_validation->set_rules($rules);

		$nama_instansi = $this->M_instansi->select_by_id($this->security->xss_clean($this->input->post('Instansi')));
		$new_name = "CSIRT-".$nama_instansi->Nama_Instansi."-".$this->security->xss_clean($this->input->post('Tahun'));
		$config['upload_path'] = "./assets/pdf_files/csirt";
		$config['allowed_types'] = "pdf";
		$config['max_size'] = 30000;
		$config['file_name'] = $new_name; 
		$this->load->library('upload',$config);

		if ($this->upload->do_upload('Dokumen')) {
			$file_pdf = $this->upload->data();

			$dokumen_csirt = $file_pdf['file_name'];
		}else {
			$dokumen_csirt =  $this->input->post('recent_dokumen');
		}

		if ($this->security->xss_clean($this->input->post('Narahubung')) == '') {
			// code...
			$attain 			= $this->input->post();
			$data_narahubung	= array(); //<-initialize
			    for ($i = 0; $i < count($attain['Nama_Narahubung']); $i++) {
			                //append array
			                $data_narahubung[] = array(
			                    'Nama_Narahubung' => $attain['Nama_Narahubung'][$i],
			                    'Nomor_HP' => $attain['Nomor_HP'][$i]
			                );
			               
			    }

			$rows = array(); // will hold all table rows to insert
				foreach ($data_narahubung as $row) { // loops through your datasets
					$row_string = ''; // will hold the string for this row
					foreach ($row as $value) {
					    // make sure that value is escaped
					    $row_string .= addslashes($value) . ' - ';
					}
					    $row_string = substr($row_string, 0, -2); // trim last ", " and wrap in brackets
					    $rows[] = $row_string; // push row to rows array
					}
			$rows = implode(', ', $rows); // glue rows together into one string
		} else {
			$rows = $this->security->xss_clean($this->input->post('Narahubung'));
		}

		

	       // print_r($data_narahubung);
	       // echo "<br>";
	       // echo $rows;

		$data = [
				'Id_CSIRT' 			=> $this->input->post('Id_CSIRT'),
				'Status' 			=> 'Sudah CSIRT',
				'Nomor_Sertifikat' 	=> $this->security->xss_clean($this->input->post('Nomor_Sertifikat')),
				'Tgl_STR' 			=> $this->security->xss_clean($this->input->post('Tgl_STR')),
				'Tgl_Launching' 	=> $this->security->xss_clean($this->input->post('Tgl_Launching')),
				'Nama_CSIRT' 		=> $this->security->xss_clean($this->input->post('Nama_CSIRT')),
				'Narahubung' 		=> $rows,
				'Dokumen' 			=> $dokumen_csirt,	
				'Instansi' 			=> $this->security->xss_clean($this->input->post('Instansi')),	
				'Tahun' 			=> $this->security->xss_clean($this->input->post('Tahun')),		
				'updated_by' 		=> $data['userdata']->username
		];

		if ($this->form_validation->run() == TRUE) {
			if($this->M_csirt->update($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diupdate!');
				redirect('CSIRT');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!');
				echo "update failed";
				redirect('CSIRT');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!'.$out['msg']);
			redirect('CSIRT');
		}
	 
	}

	public function archieve($id){

		if($this->M_csirt->archieve($id)){
			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
			redirect('CSIRT');
			//echo "success";
		} else {
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
			redirect('CSIRT');
			//echo "failed";
		}
	}

}


/* End of file Csirt.php */
/* Location: ./application/controllers/Csirt.php */