<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tmpi extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_instansi');
		$this->load->model('M_tmpi');
	}

	public function index() {
		$data['userdata'] 	    = $this->userdata;
		$data['dataInstansi'] 	= $this->M_instansi->select_all();
		$data['dataTmpi'] 	= $this->M_tmpi->select_all();

		$data['page'] 		= "tmpi";
		$data['judul'] 		= "Data TMPI";
		$data['deskripsi'] 	= "Manage Data TMPI";

		$this->template->views('Tmpi/home', $data);
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
	                'field' => 'Nilai_TMPI',
	                'label' => 'Nilai TMPI',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'Level',
	                'label' => 'Level',
	                'rules' => 'required'
	        )
		);

		$this->form_validation->set_rules($rules);

		$nama_instansi = $this->M_instansi->select_by_id($this->security->xss_clean($this->input->post('Instansi')));
		$new_name = "TMPI-".$nama_instansi->Nama_Instansi."-".$this->security->xss_clean($this->input->post('Tahun'));
		$config['upload_path'] = "./assets/pdf_files/tmpi";
		$config['allowed_types'] = 'xls|xlsx|pdf';
		$config['max_size'] = 30000;
		$config['file_name'] = $new_name; 
		$this->load->library('upload',$config);

		if ($this->upload->do_upload('Dokumen')) {
			$file_pdf = $this->upload->data();

			$dokumen_tmpi = $file_pdf['file_name'];
		}else {
			$dokumen_tmpi = NULL;
		}

		$data = [
				'Tahun' 		=> $this->security->xss_clean($this->input->post('Tahun')),
				'Nilai_TMPI' 			=> $this->security->xss_clean($this->input->post('Nilai_TMPI')),
				'Level' => $this->security->xss_clean($this->input->post('Level')),
				'Instansi' 		=> $this->security->xss_clean($this->input->post('Instansi')),
				'Dokumen' 		=> $dokumen_tmpi,				
				'updated_by' 	=> $data['userdata']->username
		];

		if ($this->form_validation->run() == TRUE) {
			if($this->M_tmpi->insert($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
				redirect('Tmpi');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!');
				redirect('Tmpi');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!'.$out['msg']);
			redirect('Tmpi');
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
	                'field' => 'Nilai_TMPI',
	                'label' => 'Nilai TMPI',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'Level',
	                'label' => 'Level',
	                'rules' => 'required'
	        )
		);


		$this->form_validation->set_rules($rules);

		$nama_instansi = $this->M_instansi->select_by_id($this->input->post('Instansi'));
		$new_name = "TMPI-".$nama_instansi->Nama_Instansi."-".$this->input->post('Tahun');
		$config['upload_path'] = "./assets/pdf_files/tmpi";
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size'] = 30000;
		$config['file_name'] = $new_name; 
		$this->load->library('upload',$config);

		if ($this->upload->do_upload('Dokumen')) {
			$file_pdf = $this->upload->data();

			$dokumen_tmpi = $file_pdf['file_name'];
		}else {
			$dokumen_tmpi =  $this->input->post('recent_dokumen');
		}

		$data = [
				'Id_TMPI' 		=> $this->security->xss_clean($this->input->post('Id_TMPI')),
				'Tahun' 		=> $this->security->xss_clean($this->input->post('Tahun')),
				'Nilai_TMPI' 	=> $this->security->xss_clean($this->input->post('Nilai_TMPI')),
				'Level' 		=> $this->security->xss_clean($this->input->post('Level')),
				'Instansi' 		=> $this->security->xss_clean($this->input->post('Instansi')),
				'Dokumen' 		=> $dokumen_tmpi,				
				'updated_by' 	=> $data['userdata']->username
		];

		if ($this->form_validation->run() == TRUE) {
			if($this->M_tmpi->update($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diupdate!');
				//echo "update success";
				redirect('Tmpi');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!');
				//echo "update failed";
				redirect('Tmpi');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!'.$out['msg']);
			redirect('Tmpi');
		}

		//print_r($data);
	 
	}

	public function archieve($id){

		if($this->M_tmpi->archieve($id)){
			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
			redirect('Tmpi');
			//echo "success";
		} else {
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
			redirect('Tmpi');
			//echo "failed";
		}
	}


}

/* End of file Tmpi.php */
/* Location: ./application/controllers/Tmpi.php */