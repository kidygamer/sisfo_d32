<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csm extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_instansi');
		$this->load->model('M_csm');
	}

	public function index() {
		$data['userdata'] 	    = $this->userdata;
		$data['dataInstansi'] 	= $this->M_instansi->select_all();
		$data['dataCsm'] 	= $this->M_csm->select_all();

		$data['page'] 		= "csm";
		$data['judul'] 		= "Data CSM";
		$data['deskripsi'] 	= "Manage Data CSM";

		if($data['userdata']->role =='editor'|| $data['userdata']->role =='pimpinan'|| $data['userdata']->role =='administrator'){
	    	$this->template->views('csm/home', $data);
	    }else{
			echo "Anda tidak berhak mengakses halaman ini";
	    }
		
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
	                'field' => 'Skor',
	                'label' => 'Skor',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'Lv_Kematangan',
	                'label' => 'Level Kematangan',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'Dokumen',
	                'label' => '',
	                'rules' => 'callback_file_check'
	        )
		);

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$nama_instansi = $this->M_instansi->select_by_id($this->security->xss_clean($this->input->post('Instansi')));
			$new_name = "Csm-".$nama_instansi->Nama_Instansi."-".$this->security->xss_clean($this->input->post('Tahun'));
			$config['upload_path'] = "./assets/pdf_files/csm";
			$config['allowed_types'] = "pdf";
			$config['max_size'] = 30000;
			$config['file_name'] = $new_name; 
			$this->load->library('upload',$config);

			if ($this->upload->do_upload('Dokumen')) {
				$file_pdf = $this->upload->data();

				$dokumen_csm = $file_pdf['file_name'];
			}else {
				$dokumen_csm = NULL;
			}

			$data = [
					'Tahun' 		=> $this->security->xss_clean($this->input->post('Tahun')),
					'Skor' 			=> $this->security->xss_clean($this->input->post('Skor')),
					'Lv_Kematangan' => $this->security->xss_clean($this->input->post('Lv_Kematangan')),
					'Dokumen' 		=> $dokumen_csm,	
					'Instansi' 		=> $this->security->xss_clean($this->input->post('Instansi')),			
					'updated_by' 	=> $data['userdata']->username
			];
			
			if($this->M_csm->insert($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
				redirect('Csm');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!');
				redirect('Csm');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!'.$out['msg']);
			redirect('Csm');
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
	                'field' => 'Skor',
	                'label' => 'Skor',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'Lv_Kematangan',
	                'label' => 'Level Kematangan',
	                'rules' => 'required'
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
			$new_name = "Csm-".$nama_instansi->Nama_Instansi."-".$this->input->post('Tahun');
			$config['upload_path'] = "./assets/pdf_files/Csm";
			$config['allowed_types'] = "pdf";
			$config['max_size'] = 30000;
			$config['file_name'] = $new_name; 
			$this->load->library('upload',$config);

			if ($this->upload->do_upload('Dokumen')) {
				$file_pdf = $this->upload->data();

				$dokumen_csm = $file_pdf['file_name'];
			}else {
				$dokumen_csm =  $this->input->post('recent_dokumen');
			}

			$data = [
					'Id_CSM' 		=> $this->security->xss_clean($this->input->post('Id_CSM')),
					'Tahun' 		=> $this->security->xss_clean($this->input->post('Tahun')),
					'Skor' 			=> $this->security->xss_clean($this->input->post('Skor')),
					'Lv_Kematangan' => $this->security->xss_clean($this->input->post('Lv_Kematangan')),
					'Dokumen' 		=> $dokumen_csm,	
					'Instansi' 		=> $this->security->xss_clean($this->input->post('Instansi')),				
					'updated_by' 	=> $data['userdata']->username
			];

			if($this->M_csm->update($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diupdate!');
				redirect('Csm');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!');
				redirect('Csm');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!'.$out['msg']);
			redirect('Csm');
		}

		//print_r($data);
	 
	}

	public function archieve($id){

		if($this->M_csm->archieve($id)){
			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
			redirect('Csm');
		} else {
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
			redirect('Csm');
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
				redirect('Csm');
            }
        }
    }

}

/* End of file Csm.php */
/* Location: ./application/controllers/Csm.php */