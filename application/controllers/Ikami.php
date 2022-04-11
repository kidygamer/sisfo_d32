<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ikami extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_instansi');
		$this->load->model('M_ikami');
	}

	public function index() {
		$data['userdata'] 	    = $this->userdata;
		$data['dataInstansi'] 	= $this->M_instansi->select_all();
		$data['dataIkami'] 	= $this->M_ikami->select_all();

		$data['page'] 		= "Ikami";
		$data['judul'] 		= "Data Ikami";
		$data['deskripsi'] 	= "Manage Data Ikami";


		$this->template->views('ikami/home', $data);
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
	                'field' => 'Hasil_IKAMI',
	                'label' => 'Hasil IKAMI',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'Kategori_SE',
	                'label' => 'Kategori SE',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'Nilai',
	                'label' => 'Nilai IKAMI',
	                'rules' => 'required|numeric|max_length[4]'
	        )
		);

		$this->form_validation->set_rules($rules);

		$nama_instansi = $this->M_instansi->select_by_id($this->input->post('Instansi'));
		$new_name = "Ikami-".$nama_instansi->Nama_Instansi."-".$this->input->post('Tahun');
		$config['upload_path'] = "./assets/pdf_files/ikami";
		$config['allowed_types'] = "pdf";
		$config['max_size'] = 30000;
		$config['file_name'] = $new_name; 
		$this->load->library('upload',$config);

		if ($this->upload->do_upload('Dokumen')) {
			$file_pdf = $this->upload->data();

			$dokumen_ikami = $file_pdf['file_name'];
		}else {
			$dokumen_ikami = NULL;
		}

		$data = [
				'Tahun' => $this->input->post('Tahun'),
				'Hasil_IKAMI' => $this->input->post('Hasil_IKAMI'),
				'Kategori_SE' => $this->input->post('Kategori_SE'),
				'Nilai' => $this->input->post('Nilai'),
				'Dokumen' => $dokumen_ikami,	
				'Instansi' => $this->input->post('Instansi'),			
				'updated_by' => $data['userdata']->username
		];

		if ($this->form_validation->run() == TRUE) {
			if($this->M_ikami->insert($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
				redirect('Ikami');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!');
				redirect('Ikami');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!'.$out['msg']);
			redirect('Ikami');
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
	                'field' => 'Hasil_IKAMI',
	                'label' => 'Hasil IKAMI',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'Kategori_SE',
	                'label' => 'Kategori SE',
	                'rules' => 'required'
	        ),
	         array(
	                'field' => 'Nilai',
	                'label' => 'Nilai IKAMI',
	                'rules' => 'required|numeric|max_length[4]'
	        )
		);


		$this->form_validation->set_rules($rules);

		$nama_instansi = $this->M_instansi->select_by_id($this->input->post('Instansi'));
		$new_name = "Ikami-".$nama_instansi->Nama_Instansi."-".$this->input->post('Tahun');
		$config['upload_path'] = "./assets/pdf_files/ikami";
		$config['allowed_types'] = "pdf";
		$config['max_size'] = 30000;
		$config['file_name'] = $new_name; 
		$this->load->library('upload',$config);

		if ($this->upload->do_upload('Dokumen')) {
			$file_pdf = $this->upload->data();

			$dokumen_ikami = $file_pdf['file_name'];
		}else {
			$dokumen_ikami =  $this->input->post('recent_dokumen');
		}

		$data = [
				'Tahun' => $this->input->post('Tahun'),
				'Hasil_IKAMI' => $this->input->post('Hasil_IKAMI'),
				'Kategori_SE' => $this->input->post('Kategori_SE'),
				'Nilai' => $this->input->post('Nilai'),
				'Dokumen' => $dokumen_ikami,	
				'Instansi' => $this->input->post('Instansi'),			
				'updated_by' => $data['userdata']->username
		];

		if ($this->form_validation->run() == TRUE) {
			if($this->M_ikami->update($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diupdate!');
				redirect('Ikami');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!');
				echo "update failed";
				redirect('Ikami');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!'.$out['msg']);
			redirect('Ikami');
		}
	 
	}

	public function archieve($id){

		if($this->M_ikami->archieve($id)){
			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
			redirect('Ikami');
			//echo "success";
		} else {
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
			redirect('Ikami');
			//echo "failed";
		}
	}


	// public function detail() {
	// 	$data['userdata'] 	= $this->userdata;

	// 	$id 				= trim($_POST['id']);
	// 	$data['Instansi'] = $this->M_Instansi->select_by_id($id);
	// 	$data['jumlahInstansi'] = $this->M_Instansi->total_rows();
	// 	$data['dataInstansi'] = $this->M_Instansi->select_by_pegawai($id);

	// 	echo show_my_modal('modals/modal_detail_Instansi', 'detail-Instansi', $data, 'lg');
	// }

	}

/* End of file Ikami.php */
/* Location: ./application/controllers/Ikami.php */