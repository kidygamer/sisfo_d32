<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pengguna');
	}

	public function index() {
		$data['userdata'] 	    = $this->userdata;
		$data['dataPengguna'] 	= $this->M_pengguna->select_all();

		$data['page'] 		= "Pengguna";
		$data['judul'] 		= "Data Pengguna Aplikasi";
		$data['deskripsi'] 	= "Manage Data Pengguna";

		$data['modal_tambah_pengguna'] = show_my_modal('modals/modal_tambah_pengguna', 'tambah-pengguna', $data);

		$this->template->views('pengguna/home', $data);
	}

	public function prosesTambah() {
		$data['userdata'] 		= $this->userdata;
		$rules = array(
	        array(
	                'field' => 'nama',
	                'label' => 'Nama',
	                'rules' => 'required|max_length[50]|regex_match[/^([a-z ])+$/i]'
	        ),
	        array(
	                'field' => 'nik',
	                'label' => 'NIK',
	                'rules' => 'required|numeric|exact_length[18]'
	        ),
	        array(
	                'field' => 'jabatan',
	                'label' => 'Jabatan',
	                'rules' => 'required|max_length[50]|min_length[3]'
	        ),
	        array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required|valid_email|is_unique[admin.email]'
	        ),
	        array(
	                'field' => 'role',
	                'label' => 'Role',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'username',
	                'label' => 'Username',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'password',
	                'label' => 'Password',
	                'rules' => 'alpha_numeric|required|min_length[8]|max_length[15]'
	        )

		);

		$this->form_validation->set_rules($rules);

		
		$data = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'role' => $this->input->post('role'),
				'nama' => $this->input->post('nama'),
				'nik' => $this->input->post('nik'),
				'jabatan' => $this->input->post('jabatan'),
				'email' => $this->input->post('email')
		];

		//print_r($data);

		if ($this->form_validation->run() == TRUE) {
			if($this->M_pengguna->insert($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
				redirect('Pengguna');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!');
				redirect('Pengguna');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!'.$out['msg']);
			redirect('Pengguna');
		}

	 
	}

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
	// 	$new_name = "Laporan Persandian-".$nama_instansi->Nama_Instansi."-".$this->input->post('Tahun');
	// 	$config['upload_path'] = "./assets/pdf_files/laporan_persandian";
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
	// 		if($this->M_laporan_persandian->update($data)){
	// 			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diupdate!');
	// 			redirect('Laporan_Persandian');
	// 		} else {
	// 			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!');
	// 			echo "update failed";
	// 			redirect('Laporan_Persandian');
	// 		}
	// 	} else {
	// 		$out['msg'] = show_err_msg(validation_errors());
	// 		$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!'.$out['msg']);
	// 		redirect('Laporan_Persandian');
	// 	}
	 
	// }

	// public function archieve($id){

	// 	if($this->M_laporan_persandian->archieve($id)){
	// 			// $this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
	// 			// redirect('Laporan_Persandian');
	// 		echo "success";
	// 	} else {
	// 			// $this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
	// 			// echo "update failed";
	// 			// redirect('Laporan_Persandian');
	// 		echo "failed";
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

/* End of file Laporan_Persandian.php */
/* Location: ./application/controllers/Laporan_Persandian.php */