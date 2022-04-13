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
	}

	public function index() {
		$data['jml_instansi'] 			= $this->M_instansi->total_rows();
		$data['jml_laporan_persandian'] = $this->M_laporan_persandian->total_rows();
		$data['jml_ikami'] 				= $this->M_ikami->total_rows();
		$data['jml_csm'] 				= $this->M_csm->total_rows();
		$data['jml_csirt'] 				= $this->M_csirt->total_rows();
		$data['jml_tmpi'] 				= $this->M_tmpi->total_rows();
		$data['userdata'] 				= $this->userdata;

		
		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Selamat Datang, Administrator - ".$data['userdata']->nama;
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