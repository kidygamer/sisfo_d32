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


		if ($this->form_validation->run() == TRUE) {
			$hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		
			$data = [
					'username' => $this->input->post('username'),
					'password' => $hash,
					'role' => $this->input->post('role'),
					'nama' => $this->input->post('nama'),
					'nik' => $this->input->post('nik'),
					'jabatan' => $this->input->post('jabatan'),
					'email' => $this->input->post('email')
			];
			
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

	public function prosesUpdate() {
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
	                'rules' => 'required|valid_email'
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
	        )

		);

		$this->form_validation->set_rules($rules);


		if ($this->form_validation->run() == TRUE) {
		
			$data = [
					'id' => $this->input->post('id'),
					'username' => $this->input->post('username'),
					'role' => $this->input->post('role'),
					'nama' => $this->input->post('nama'),
					'nik' => $this->input->post('nik'),
					'jabatan' => $this->input->post('jabatan'),
					'email' => $this->input->post('email')
			];
			
			if($this->M_pengguna->update($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diupdate!');
				redirect('Pengguna');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!');
				redirect('Pengguna');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!'.$out['msg']);
			redirect('Pengguna');
		}
	 
	}

	public function archieve($id){

		if($this->M_pengguna->archieve($id)){
			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
			redirect('Pengguna');
			//echo "success";
		} else {
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
			redirect('Pengguna');
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

/* End of file Laporan_Persandian.php */
/* Location: ./application/controllers/Laporan_Persandian.php */