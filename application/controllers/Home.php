<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_instansi');
		$this->load->model('M_laporan_persandian');
	}

	public function index() {
		$data['jml_instansi'] 	= $this->M_instansi->total_rows();
		$data['jml_laporan_persandian'] = $this->M_laporan_persandian->total_rows();
		$data['userdata'] 		= $this->userdata;

		
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