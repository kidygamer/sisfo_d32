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
		$data['dataProvinsi'] 	= $this->M_instansi->select_provinsi();

		$data['page'] 		= "instansi";
		$data['judul'] 		= "Data Instansi Pemda";
		$data['deskripsi'] 	= "Manage Data Instansi Pemda";

		$this->template->views('instansi/home', $data);
	}

	public function instansi_by_prov($id)
	{
		$data['userdata'] 		= $this->userdata;
		$data['dataProvinsi'] 	= $this->M_instansi->select_provinsi_by_id($id);
		$data['dataInstansi'] 	= $this->M_instansi->select_instansi_by_provinsi($id);
		$data['page'] 			= "instansi";
		$data['judul'] 			= "Instansi Pemda Per Provinsi";
		$data['deskripsi'] 		= "";

		//print_r($data['dataInstansi']);
		$this->template->views('instansi/instansi_by_prov', $data);

	}

	public function detail_grand($id)
	{
		$data['userdata'] 		= $this->userdata;
		$data['dataInstansi'] 	= $this->M_instansi->select_by_id($id);

		$data['dataGrand'] 		= $this->M_instansi->select_grand($id);
		$data['det_ikami']		= $this->M_instansi->select_ikami($id);
		$data['dataPic']		= $this->M_instansi->select_pic_by_instansi($id);
		$data['statusCsirt']	= $this->M_instansi->select_statusCsirt_byInstansi($id);

		$data['page'] 		= "Detail Instansi";
		$data['judul'] 		= "Detail Data";
		$data['deskripsi'] 	= "(Laporan Persandian, IKAMI, CSM, TMPI, dan CSIRT)";

		//print_r($data['statusCsirt'] );

		$this->template->views('instansi/detail_grand_v2', $data);
	}

	public function detail_by_year()
	{
		$data['userdata'] 	= $this->userdata;
		$id    = $this->input->post('Id_Instansi');
		$year  = $this->security->xss_clean($this->input->post('Tahun'));
		
		$data['dataInstansi'] 	= $this->M_instansi->select_by_id($id);
		$data['dataPic']		= $this->M_instansi->select_pic_by_instansi($id);
		$data['statusCsirt']	= $this->M_instansi->select_statusCsirt_byInstansi($id);

		if ($year == 'all') {
			$data['dataGrand'] 	= $this->M_instansi->select_grand($id);
			$data['det_ikami']		= $this->M_instansi->select_ikami($id);
		}else{
			$data['dataGrand'] 	= $this->M_instansi->select_grand_by_year($id,$year);
			$data['det_ikami']		= $this->M_instansi->select_ikami_by_year($id,$year);
		}

		$data['page'] 		= "Detail Instansi";
		$data['judul'] 		= "Detail Data";
		$data['deskripsi'] 	= "(Laporan Persandian, IKAMI, CSM, TMPI, dan CSIRT)";

		//print_r($data['dataGrand'] );

		$this->template->views('instansi/detail_grand_v2', $data);
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
				'Nama_Instansi' => $this->security->xss_clean($this->input->post('Nama_Instansi')),
				'Provinsi' 		=> $this->security->xss_clean($this->input->post('Provinsi')),
				'updated_by' 	=> $data['userdata']->username
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

		
			$data = [
				'Id_Instansi' 	=> $this->security->xss_clean($this->input->post('Id_Instansi')),
				'Nama_Instansi' => $this->security->xss_clean($this->input->post('Nama_Instansi')),
				'Provinsi' 		=> $this->security->xss_clean($this->input->post('Provinsi')),
				'updated_by' 	=> $data['userdata']->username
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
			//print_r($data);

	}

	public function archieve($id){

		if($this->M_instansi->archieve($id)){
			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
			redirect('Instansi');
			//echo "success";
		} else {
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
			redirect('Instansi');
			//echo "failed";
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