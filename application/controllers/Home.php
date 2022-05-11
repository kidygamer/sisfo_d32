<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_instansi');
		$this->load->model('M_laporan_persandian');
		$this->load->model('M_ikami');
		$this->load->model('M_csm');
		$this->load->model('M_csirt');
		$this->load->model('M_tmpi');
		$this->load->model('M_chart');
	}

	public function index() {
		$data['jml_instansi'] 			= $this->M_instansi->total_rows();
		$data['jml_laporan_persandian'] = $this->M_laporan_persandian->total_rows();
		$data['jml_ikami'] 				= $this->M_ikami->total_rows();
		$data['jml_csm'] 				= $this->M_csm->total_rows();
		$data['jml_csirt'] 				= $this->M_csirt->total_rows();
		$data['jml_tmpi'] 				= $this->M_tmpi->total_rows();
		$data['userdata'] 				= $this->userdata;
		$data['jml_statcsirt']			= $this->M_chart->total_by_status();
		$data['jml_csirtkab']			= $this->M_chart->kabkot_total();
		$data['lv_tmpi19']				= $this->M_chart->select_tmpi19();
		$data['lv_tmpi20']				= $this->M_chart->select_tmpi20();
		$data['lv_tmpi21']				= $this->M_chart->select_tmpi21();
		$data['jml_lapsan']				= $this->M_chart->lapsan_total();
		$data['jml_lapsankab']			= $this->M_chart->lapsan_totalkab();
		$data['det_ikami']				= $this->M_chart->select_ikami();
		$data['jml_tmpi19']				= $this->M_chart->total_tmpi19();
		$data['jml_tmpi20']				= $this->M_chart->total_tmpi20();
		$data['jml_tmpi21']				= $this->M_chart->total_tmpi21();
		$data['val_csm']				= $this->M_chart->select_csm();
		$data['sel_map'] 				= $this->M_tmpi->select_maplv3();
		$data['sel_map2'] 				= $this->M_tmpi->select_maplv2();
		$data['sel_map_status'] 		= $this->M_csirt->select_map_status();

		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Selamat Datang, ".$data['userdata']->nama;
		$this->template->views('home', $data);
		
	}

	public function editor()
	{
		echo "Ini page editor";
	}

	public function pimpinan()
	{
		echo "Ini page pimpinan";
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */