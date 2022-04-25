<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pic');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataInstansi'] 	= $this->M_pic->select_all();
		$data['dataProvinsi'] 	= $this->M_pic->select_provinsi();

		$data['page'] 		= "PIC Instansi Pemda";
		$data['judul'] 		= "Data PIC Instansi Pemda";
		$data['deskripsi'] 	= "Manage Data PIC Instansi Pemda";

		$this->template->views('pic/home', $data);
	}


	public function prosesTambah() {
		$data['userdata'] 		= $this->userdata;

		$this->form_validation->set_rules('Nama_Instansi', 'Nama_Instansi', 'trim|required|min_length[10]|max_length[30]');

		$check = $this->M_pic->select_by_name($this->input->post('Nama_Instansi'));
		if ($check) {
			$this->session->set_flashdata('error', 'Data <strong>Sudah Ada</strong> Pada Database!');
			redirect('Instansi');
		} else{
			$data = [
				'Nama_Instansi' => $this->security->xss_clean($this->input->post('Nama_Instansi')),
				'Provinsi' 		=> $this->security->xss_clean($this->input->post('Provinsi')),
				'updated_by' 	=> $data['userdata']->username
		    ];
			if ($this->form_validation->run() == TRUE) {

				if($this->M_pic->insert($data)){
					$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
					redirect('Instansi');
				} else {
					$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!');
					redirect('Instansi');
				}
			} else {
				$out['msg'] = show_err_msg(validation_errors());
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!'.$out['msg']);
					redirect('Instansi');
			}
		}

	}

	public function prosesUpdate() {
		$data['userdata'] 		= $this->userdata;
		$this->form_validation->set_rules('Nama_Instansi', 'Nama_Instansi', 'trim|required|min_length[10]|max_length[50]');

		
			$data = [
				'Id_Instansi' 	=> $this->security->xss_clean($this->input->post('Id_Instansi')),
				'Nama_Instansi' => $this->security->xss_clean($this->input->post('Nama_Instansi')),
				'Provinsi' 		=> $this->security->xss_clean($this->input->post('Provinsi')),
				'updated_by' 	=> $data['userdata']->username
			];
			if ($this->form_validation->run() == TRUE) {
				
				if($this->M_pic->update($data)){
					$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diupdate!');
					redirect('Instansi');
				} else {
					$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!');
					redirect('Instansi');
				}
			} else {
				$out['msg'] = show_err_msg(validation_errors());
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!'.$out['msg']);
					redirect('Instansi');
			}
			//print_r($data);

	}

	public function archieve($id){

		if($this->M_pic->archieve($id)){
			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
			redirect('Instansi');
			//echo "success";
		} else {
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
			redirect('Instansi');
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

/* End of file Pic.php */
/* Location: ./application/controllers/Pic.php */