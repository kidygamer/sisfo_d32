<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Persandian extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_instansi');
		$this->load->model('M_laporan_persandian');
	}

	public function index() {
		$data['userdata'] 	    = $this->userdata;
		$data['dataInstansi'] 	= $this->M_instansi->select_all();
		$data['dataLaporan_Persandian'] 	= $this->M_laporan_persandian->select_all();

		$data['page'] 		= "laporan_persandian";
		$data['judul'] 		= "Data Laporan Persandian";
		$data['deskripsi'] 	= "Manage Data Laporan Persandian";

		$this->template->views('laporan_persandian/home', $data);
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
	                'field' => 'Jml_Kebijakan',
	                'label' => 'Jumlah Kebijakan ',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Saran_uBSSN',
	                'label' => 'Saran untuk BSSN',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'Jml_SDM',
	                'label' => 'Jumlah SDM Persandian',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Jml_Palsan',
	                'label' => 'Jumlah Peralatan Sandi',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Jml_APU',
	                'label' => 'Jumlah APU',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Jml_SE',
	                'label' => 'Jumlah Sistem Elektronik',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Jml_PDok',
	                'label' => 'Jumlah Pengelolaan Dokumen',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Jml_LKamsi',
	                'label' => 'Jumlah Layanan Keamanan Informasi',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Jml_PHKS',
	                'label' => 'Jumlah Pola Hubungan Komunikasi Sandi',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Nilai_Eval',
	                'label' => 'Nilai Evaluasi Garsan',
	                'rules' => 'numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Dokumen',
	                'label' => '',
	                'rules' => 'callback_file_check'
	        ),
	         array(
	                'field' => 'Dokumen_Eval',
	                'label' => '',
	                'rules' => 'callback_file_check2'
	        )
		);

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$nama_instansi = $this->M_instansi->select_by_id($this->security->xss_clean($this->input->post('Instansi')));

			$new_name = "Laporan Persandian-".$nama_instansi->Nama_Instansi."-".$this->security->xss_clean($this->input->post('Tahun'));
			$config['upload_path'] = "./assets/pdf_files/laporan_persandian";
			$config['allowed_types'] = "pdf";
			$config['max_size'] = 30000;
			$config['file_name'] = $new_name; 
			$this->load->library('upload',$config);

			if ($this->upload->do_upload('Dokumen')) {
				$file_pdf = $this->upload->data();

				$dokumen_lapsan = $file_pdf['file_name'];
			}else {
				$dokumen_lapsan = NULL;
			}

			$new_name2 = "Evaluasi Persandian-".$nama_instansi->Nama_Instansi."-".$this->security->xss_clean($this->input->post('Tahun'));
			$config2['upload_path'] = "./assets/pdf_files/evaluasi_persandian";
			$config2['allowed_types'] = 'xls|xlsx';
			$config2['max_size'] = 30000;
			$config2['file_name'] = $new_name2; 
			$this->upload->initialize($config2);

			if ($this->upload->do_upload('Dokumen_Eval')) {
				$file_excel = $this->upload->data();

				$dokumen_eval = $file_excel['file_name'];
			}else {
				$dokumen_eval = NULL;
				  $error = array('error' => $this->upload->display_errors());
			    echo "<pre>";
			    print_r($error);
			    exit();
			}

			$data = [
					'Tahun' 		=> $this->security->xss_clean($this->input->post('Tahun')),
					'Jml_Kebijakan'	=> $this->security->xss_clean($this->input->post('Jml_Kebijakan')),
					'Saran_uBSSN' 	=> $this->security->xss_clean($this->input->post('Saran_uBSSN')),
					'Jml_SDM' 		=> $this->security->xss_clean($this->input->post('Jml_SDM')),
					'Jml_Palsan' 	=> $this->security->xss_clean($this->input->post('Jml_Palsan')),
					'Jml_APU' 		=> $this->security->xss_clean($this->input->post('Jml_APU')),
					'Jml_SE' 		=> $this->security->xss_clean($this->input->post('Jml_SE')),
					'Jml_PDok' 		=> $this->security->xss_clean($this->input->post('Jml_PDok')),
					'Jml_LKamsi' 	=> $this->security->xss_clean($this->input->post('Jml_LKamsi')),
					'Jml_PHKS' 		=> $this->security->xss_clean($this->input->post('Jml_PHKS')),
					'Instansi' 		=> $this->security->xss_clean($this->input->post('Instansi')),
					'Dokumen' 		=> $dokumen_lapsan,
					'Dokumen_Eval'	=> $dokumen_eval,	
					'Nilai_Eval'	=> $this->security->xss_clean($this->input->post('Nilai_Eval')),		
					'updated_by' 	=> $data['userdata']->username
			];
		
			if($this->M_laporan_persandian->insert($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
				redirect('Laporan_Persandian');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!');
				redirect('Laporan_Persandian');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!'.$out['msg']);
			redirect('Laporan_Persandian');
		}
	 
	}

	public function prosesUpdate() {
		$data['userdata'] 		= $this->userdata;
		$rules = array(
	        array(
	                'field' => 'Tahun',
	                'label' => 'Tahun',
	                'rules' => 'required|numeric|exact_length[4]'
	        ),
	        array(
	                'field' => 'Jml_Kebijakan',
	                'label' => 'Jumlah Kebijakan ',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Saran_uBSSN',
	                'label' => 'Saran untuk BSSN',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'Jml_SDM',
	                'label' => 'Jumlah SDM Persandian',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Jml_Palsan',
	                'label' => 'Jumlah Peralatan Sandi',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Jml_APU',
	                'label' => 'Jumlah APU',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Jml_SE',
	                'label' => 'Jumlah Sistem Elektronik',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Jml_PDok',
	                'label' => 'Jumlah Pengelolaan Dokumen',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Jml_LKamsi',
	                'label' => 'Jumlah Layanan Keamanan Informasi',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Jml_PHKS',
	                'label' => 'Jumlah Pola Hubungan Komunikasi Sandi',
	                'rules' => 'required|numeric|min_length[1]'
	        ),
	        array(
	                'field' => 'Dokumen',
	                'label' => '',
	                'rules' => 'callback_file_check'
	        )
		);


		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$nama_instansi = $this->M_instansi->select_by_id($this->input->post('Instansi'));
			$new_name = "Laporan Persandian-".$nama_instansi->Nama_Instansi."-".$this->input->post('Tahun');
			$config['upload_path'] = "./assets/pdf_files/laporan_persandian";
			$config['allowed_types'] = "pdf";
			$config['max_size'] = 30000;
			$config['file_name'] = $new_name; 
			$this->load->library('upload',$config);
			
			if ($this->upload->do_upload('Dokumen')) {
				$file_pdf = $this->upload->data();

				$dokumen_lapsan = $file_pdf['file_name'];
			}else {
				$dokumen_lapsan =  $this->input->post('recent_dokumen');
			}

			$new_name2 = "Evaluasi Persandian-".$nama_instansi->Nama_Instansi."-".$this->security->xss_clean($this->input->post('Tahun'));
			$config2['upload_path'] = "./assets/pdf_files/evaluasi_persandian";
			$config2['allowed_types'] = 'xls|xlsx';
			$config2['max_size'] = 30000;
			$config2['file_name'] = $new_name2; 
			$this->upload->initialize($config2);

			if ($this->upload->do_upload('Dokumen_Eval')) {
				$file_excel = $this->upload->data();

				$dokumen_eval = $file_excel['file_name'];
			}else {
				$dokumen_eval = $this->input->post('recent_dokumen_eval');
			}

			$data = [
				    'Id_LapSan' 	=> $this->security->xss_clean($this->input->post('Id_LapSan')),
					'Tahun' 		=> $this->security->xss_clean($this->input->post('Tahun')),
					'Jml_Kebijakan'	=> $this->security->xss_clean($this->input->post('Jml_Kebijakan')),
					'Saran_uBSSN' 	=> $this->security->xss_clean($this->input->post('Saran_uBSSN')),
					'Jml_SDM' 		=> $this->security->xss_clean($this->input->post('Jml_SDM')),
					'Jml_Palsan' 	=> $this->security->xss_clean($this->input->post('Jml_Palsan')),
					'Jml_APU' 		=> $this->security->xss_clean($this->input->post('Jml_APU')),
					'Jml_SE' 		=> $this->security->xss_clean($this->input->post('Jml_SE')),
					'Jml_PDok' 		=> $this->security->xss_clean($this->input->post('Jml_PDok')),
					'Jml_LKamsi' 	=> $this->security->xss_clean($this->input->post('Jml_LKamsi')),
					'Jml_PHKS' 		=> $this->security->xss_clean($this->input->post('Jml_PHKS')),
					'Instansi' 		=> $this->security->xss_clean($this->input->post('Instansi')),
					'Instansi' 		=> $this->security->xss_clean($this->input->post('Instansi')),
					'Dokumen'		=> $dokumen_lapsan,	
					'Dokumen_Eval'	=> $dokumen_eval,
					'Nilai_Eval'	=> $this->security->xss_clean($this->input->post('Nilai_Eval')),				
					'updated_by' 	=> $data['userdata']->username
			];

			if($this->M_laporan_persandian->update($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diupdate!');
				redirect('Laporan_Persandian');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!');
				//echo "update failed";
				redirect('Laporan_Persandian');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!'.$out['msg']);
			redirect('Laporan_Persandian');
		}
	 
	}

	public function archieve($id){

		if($this->M_laporan_persandian->archieve($id)){
			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
			redirect('Laporan_Persandian');
			//echo "success";
		} else {
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
			redirect('Laporan_Persandian');
			//echo "failed";
		}
	}

	 /*
     * file value and type check during validation
     */
    public function file_check($str){
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['Dokumen']['name']);
        if(isset($_FILES['Dokumen']['name']) && $_FILES['Dokumen']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->session->set_flashdata('error', 'Dokumen harus format PDF. Data <strong>Gagal</strong> Tersimpan!');
				redirect('Laporan_Persandian');
            }
        }
    }

    public function file_check2($str){
        $allowed_mime_type_arr = array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.ms-excel');
        $mime = get_mime_by_extension($_FILES['Dokumen_Eval']['name']);
        if(isset($_FILES['Dokumen_Eval']['name']) && $_FILES['Dokumen_Eval']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->session->set_flashdata('error', 'Dokumen harus format .xls atau .xlsx. Data <strong>Gagal</strong> Tersimpan!');
				redirect('Laporan_Persandian');
            }
        }
    }

}

/* End of file Laporan_Persandian.php */
/* Location: ./application/controllers/Laporan_Persandian.php */