<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSM extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_instansi');
		$this->load->model('M_csm');
	}

	public function index() {
		$data['userdata'] 	    = $this->userdata;
		$data['dataInstansi'] 	= $this->M_instansi->select_all();
		$data['dataCsm'] 	= $this->M_csm->select_all();

		$data['page'] 		= "CSM";
		$data['judul'] 		= "Data CSM";
		$data['deskripsi'] 	= "Manage Data CSM";

		$data['modal_tambah_ikami'] = show_my_modal('modals/modal_tambah_ikami', 'tambah-ikami', $data);

		$this->template->views('csm/home', $data);
	}

	// public function prosesTambah() {
	// 	$data['userdata'] 		= $this->userdata;
	// 	$rules = array(
	//         array(
	//                 'field' => 'Instansi',
	//                 'label' => 'Instansi',
	//                 'rules' => 'required'
	//         ),
	//         array(
	//                 'field' => 'Tahun',
	//                 'label' => 'Tahun',
	//                 'rules' => 'required|numeric|exact_length[4]'
	//         ),
	//         array(
	//                 'field' => 'Saran_uBSSN',
	//                 'label' => 'Saran untuk BSSN',
	//                 'rules' => 'required'
	//         ),
	//         array(
	//                 'field' => 'Jml_SDM',
	//                 'label' => 'Jumlah SDM Persandian',
	//                 'rules' => 'required|numeric|min_length[1]'
	//         ),
	//         array(
	//                 'field' => 'Jml_Palsan',
	//                 'label' => 'Jumlah Peralatan Sandi',
	//                 'rules' => 'required|numeric|min_length[1]'
	//         ),
	//         array(
	//                 'field' => 'Jml_APU',
	//                 'label' => 'Jumlah APU',
	//                 'rules' => 'required|numeric|min_length[1]'
	//         ),
	//         array(
	//                 'field' => 'Jml_SE',
	//                 'label' => 'Jumlah Sistem Elektronik',
	//                 'rules' => 'required|numeric|min_length[1]'
	//         ),
	// 	);

	// 	$this->form_validation->set_rules($rules);

	// 	$nama_instansi = $this->M_instansi->select_by_id($this->input->post('Instansi'));
	// 	$new_name = "Ikami-".$nama_instansi->Nama_Instansi."-".$this->input->post('Tahun');
	// 	$config['upload_path'] = "./assets/pdf_files/ikami";
	// 	$config['allowed_types'] = "pdf";
	// 	$config['max_size'] = 30000;
	// 	$config['file_name'] = $new_name; 
	// 	$this->load->library('upload',$config);

	// 	if ($this->upload->do_upload('Dokumen')) {
	// 		$file_pdf = $this->upload->data();

	// 		$dokumen_lapsan = $file_pdf['file_name'];
	// 	}else {
	// 		$dokumen_lapsan = NULL;
	// 	}

	// 	$data = [
	// 			'Tahun' => $this->input->post('Tahun'),
	// 			'Saran_uBSSN' => $this->input->post('Saran_uBSSN'),
	// 			'Jml_SDM' => $this->input->post('Jml_SDM'),
	// 			'Jml_Palsan' => $this->input->post('Jml_Palsan'),
	// 			'Jml_APU' => $this->input->post('Jml_APU'),
	// 			'Jml_SE' => $this->input->post('Jml_SE'),
	// 			'Instansi' => $this->input->post('Instansi'),
	// 			'Dokumen' => $dokumen_lapsan,				
	// 			'updated_by' => $data['userdata']->username
	// 	];

	// 	if ($this->form_validation->run() == TRUE) {
	// 		if($this->M_ikami->insert($data)){
	// 			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
	// 			redirect('ikami');
	// 		} else {
	// 			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!');
	// 			redirect('ikami');
	// 		}
	// 	} else {
	// 		$out['msg'] = show_err_msg(validation_errors());
	// 		$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!'.$out['msg']);
	// 		redirect('ikami');
	// 	}
	 
	// }

	// public function prosesUpdate() {
	// 	$data['userdata'] 		= $this->userdata;
	// 	$rules = array(
	//         array(
	//                 'field' => 'Tahun',
	//                 'label' => 'Tahun',
	//                 'rules' => 'required|numeric|exact_length[4]'
	//         ),
	//         array(
	//                 'field' => 'Saran_uBSSN',
	//                 'label' => 'Saran untuk BSSN',
	//                 'rules' => 'required'
	//         ),
	//         array(
	//                 'field' => 'Jml_SDM',
	//                 'label' => 'Jumlah SDM Persandian',
	//                 'rules' => 'required|numeric|min_length[1]'
	//         ),
	//         array(
	//                 'field' => 'Jml_Palsan',
	//                 'label' => 'Jumlah Peralatan Sandi',
	//                 'rules' => 'required|numeric|min_length[1]'
	//         ),
	//         array(
	//                 'field' => 'Jml_APU',
	//                 'label' => 'Jumlah APU',
	//                 'rules' => 'required|numeric|min_length[1]'
	//         ),
	//         array(
	//                 'field' => 'Jml_SE',
	//                 'label' => 'Jumlah Sistem Elektronik',
	//                 'rules' => 'required|numeric|min_length[1]'
	//         ),
	// 	);

	// 	$this->form_validation->set_rules($rules);

	// 	$nama_instansi = $this->M_instansi->select_by_id($this->input->post('Instansi'));
	// 	$new_name = "Ikami-".$nama_instansi->Nama_Instansi."-".$this->input->post('Tahun');
	// 	$config['upload_path'] = "./assets/pdf_files/ikami";
	// 	$config['allowed_types'] = "pdf";
	// 	$config['max_size'] = 30000;
	// 	$config['file_name'] = $new_name; 
	// 	$this->load->library('upload',$config);

	// 	if ($this->upload->do_upload('Dokumen')) {
	// 		$file_pdf = $this->upload->data();

	// 		$dokumen_lapsan = $file_pdf['file_name'];
	// 	}else {
	// 		$dokumen_lapsan =  $this->input->post('recent_dokumen');
	// 	}

	// 	$data = [
	// 		    'Id_LapSan' => $this->input->post('Id_LapSan'),
	// 			'Tahun' => $this->input->post('Tahun'),
	// 			'Saran_uBSSN' => $this->input->post('Saran_uBSSN'),
	// 			'Jml_SDM' => $this->input->post('Jml_SDM'),
	// 			'Jml_Palsan' => $this->input->post('Jml_Palsan'),
	// 			'Jml_APU' => $this->input->post('Jml_APU'),
	// 			'Jml_SE' => $this->input->post('Jml_SE'),
	// 			'Instansi' => $this->input->post('Instansi'),
	// 			'Dokumen' => $dokumen_lapsan,				
	// 			'updated_by' => $data['userdata']->username
	// 	];

	// 	if ($this->form_validation->run() == TRUE) {
	// 		if($this->M_ikami->update($data)){
	// 			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diupdate!');
	// 			redirect('ikami');
	// 		} else {
	// 			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!');
	// 			echo "update failed";
	// 			redirect('ikami');
	// 		}
	// 	} else {
	// 		$out['msg'] = show_err_msg(validation_errors());
	// 		$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!'.$out['msg']);
	// 		redirect('ikami');
	// 	}
	 
	// }

	// public function archieve($id){

	// 	if($this->M_ikami->archieve($id)){
	// 		$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
	// 		redirect('ikami');
	// 		//echo "success";
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
	// 		redirect('ikami');
	// 		//echo "failed";
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

/* End of file Ikami.php */
/* Location: ./application/controllers/Ikami.php */