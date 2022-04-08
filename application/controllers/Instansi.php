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

	public function detail_grand($id)
	{
		$data['userdata'] 	= $this->userdata;
		$data['dataInstansi'] 	= $this->M_instansi->select_by_id($id);

		$data['dataGrand'] 	= $this->M_instansi->select_grand($id);

		$data['page'] 		= "Detail Instansi";
		$data['judul'] 		= "Detail Data";
		$data['deskripsi'] 	= "(Laporan Persandian, IKAMI, CSM, TMPI, dan CSIRT)";

		//print_r($data['dataGrand'] );

		$this->template->views('instansi/detail_grand', $data);
	}

	public function prosesTambah() {
		$data['userdata'] 		= $this->userdata;
		$this->form_validation->set_rules('Nama_Instansi', 'Nama_Instansi', 'trim|required|min_length[10]|max_length[30]');

		$check = $this->M_instansi->select_by_name($this->input->post('Nama_Instansi'));
		if ($check) {
			$this->session->set_flashdata('error', 'Data <strong>Sudah Ada</strong> Pada Database!');
			redirect('Instansi');
		} else{
			$data = [
				'Nama_Instansi' => $this->input->post('Nama_Instansi'),
				'updated_by' => $data['userdata']->username
		    ];
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
		$data['userdata'] 		= $this->userdata;
		$this->form_validation->set_rules('Nama_Instansi', 'Nama_Instansi', 'trim|required|min_length[10]|max_length[50]');

		$check = $this->M_instansi->select_by_name($this->input->post('Nama_Instansi'));
		if ($check) {
			$this->session->set_flashdata('error', 'Data <strong>Sudah Ada</strong> Pada Database!');
			redirect('Instansi');
		} else {
			$data = [
				'Id_Instansi' => $this->input->post('Id_Instansi'),
				'Nama_Instansi' => $this->input->post('Nama_Instansi'),
				'updated_by' => $data['userdata']->username
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

	public function archieve($id){
		$lapsan = $this->M_laporan_persandian->select_by_instansi($id);
		
		if($this->M_instansi->archieve($id)){
		
			//mengarsipkan jg data-data yg berelasi dgn instansi yg diarsipkan
			if ($lapsan) {
				$this->M_laporan_persandian->archieve($lapsan->Id_Lapsan);
			}
			
			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
			redirect('Instansi');
			echo "success";
		} else {
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
			redirect('Instansi');
			echo "failed";
		}
	}

	public function dashboard()
	{
		$data['dataProvinsi'] 	= $this->M_instansi->select_provinsi();
		$data['jmlProvinsi'] 	= $this->M_instansi->total_rows_provinsi();
		$data['userdata'] 		= $this->userdata;

		
		$data['page'] 			= "home";
		$data['judul'] 			= "Provinsi";
		$this->template->views('instansi_dashboard', $data);
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