<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Persandian extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_laporan_persandian');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataLaporan_Persandian'] 	= $this->M_laporan_persandian->select_all();

		$data['page'] 		= "Laporan Persandian";
		$data['judul'] 		= "Data Laporan Persandian";
		$data['deskripsi'] 	= "Manage Data Laporan Persandian";

		$data['modal_tambah_laporan_persandian'] = show_my_modal('modals/modal_tambah_laporan_persandian', 'tambah-laporan_persandian', $data);

		$this->template->views('laporan_persandian/home', $data);
	}

	// public function prosesTambah() {
	// 	$this->form_validation->set_rules('Nama_Instansi', 'Nama_Instansi', 'trim|required');

	// 	$data 	= $this->input->post();
	// 	if ($this->form_validation->run() == TRUE) {

	// 		if($this->M_instansi->insert($data)){
	// 			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
	// 			redirect('Instansi');
	// 		} else {
	// 			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!');
	// 			redirect('Instansi');
	// 		}
	// 	}  
	// }

	// public function prosesUpdate() {
	// 	$this->form_validation->set_rules('Nama_Instansi', 'Nama_Instansi', 'trim|required');

	// 	$data = [
	// 			'Id_Instansi' => $this->input->post('Id_Instansi'),
	// 			'Nama_Instansi' => $this->input->post('Nama_Instansi')
	// 		];
	// 	if ($this->form_validation->run() == TRUE) {
			
	// 		if($this->M_instansi->update($data)){
	// 			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diupdate!');
	// 			redirect('Instansi');
	// 		} else {
	// 			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!');
	// 			redirect('Instansi');
	// 		}
	// 	}
	// }

	// public function delete($id){

	// 	if($this->M_instansi->delete($id)){
	// 		$this->session->set_flashdata('success', 'Instansi <strong>Berhasil</strong> Dihapus!');
	// 		redirect('Instansi');
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Instansi <strong>Gagal</strong> Dihapus!');
	// 		redirect('Instansi');
	// 	}
	// }


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