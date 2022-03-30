<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_instansi');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataInstansi'] 	= $this->M_instansi->select_all();

		$data['page'] 		= "Instansi";
		$data['judul'] 		= "Data Instansi";
		$data['deskripsi'] 	= "Manage Data Instansi";

		$data['modal_tambah_instansi'] = show_my_modal('modals/modal_tambah_instansi', 'tambah-instansi', $data);

		$this->template->views('instansi/home', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('Nama_Instansi', 'Nama_Instansi', 'trim|required|min_length[10]|max_length[30]');

		$check = $this->M_instansi->select_by_name($this->input->post('Nama_Instansi'));
		if ($check) {
			$this->session->set_flashdata('error', 'Data <strong>Sudah Ada</strong> Pada Database!');
			redirect('Instansi');
		} else{
			$data 	= $this->input->post();
			if ($this->form_validation->run() == TRUE) {

				if($this->M_instansi->insert($data)){
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
		$this->form_validation->set_rules('Nama_Instansi', 'Nama_Instansi', 'trim|required|alpha|min_length[10]|max_length[50]');

		$check = $this->M_instansi->select_by_name($this->input->post('Nama_Instansi'));
		if ($check) {
			$this->session->set_flashdata('error', 'Data <strong>Sudah Ada</strong> Pada Database!');
			redirect('Instansi');
		} else {
			$data = [
				'Id_Instansi' => $this->input->post('Id_Instansi'),
				'Nama_Instansi' => $this->input->post('Nama_Instansi')
			];
			if ($this->form_validation->run() == TRUE) {
				
				if($this->M_instansi->update($data)){
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
		} 

	}

	public function delete($id){

		if($this->M_instansi->delete($id)){
			$this->session->set_flashdata('success', 'Instansi <strong>Berhasil</strong> Dihapus!');
			redirect('Instansi');
		} else {
			$this->session->set_flashdata('error', 'Instansi <strong>Gagal</strong> Dihapus!');
			redirect('Instansi');
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

/* End of file Instansi.php */
/* Location: ./application/controllers/Instansi.php */