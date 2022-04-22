<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pengguna');
		$this->load->model('M_admin');
	}

	public function index() {
		$data['userdata'] 	    = $this->userdata;
		$data['dataPengguna'] 	= $this->M_pengguna->select_all();

		$data['page'] 		= "Pengguna";
		$data['judul'] 		= "Data Pengguna Aplikasi";
		$data['deskripsi'] 	= "Manage Data Pengguna";

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
	                'field' => 'nip',
	                'label' => 'NIP',
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
			$hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		
			$data = [
					'username' => $this->input->post('username'),
					'password' => $hash,
					'role' => $this->input->post('role'),
					'nama' => $this->input->post('nama'),
					'nip' => $this->input->post('nip'),
					'jabatan' => $this->input->post('jabatan'),
					'unit' => $this->input->post('unit'),
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
	                'field' => 'nip',
	                'label' => 'NIP',
	                'rules' => 'required|numeric|exact_length[18]'
	        ),
	        array(
	                'field' => 'jabatan',
	                'label' => 'Jabatan',
	                'rules' => 'required|max_length[50]|min_length[3]'
	        ),
	         array(
	                'field' => 'unit',
	                'label' => 'Unit',
	                'rules' => 'required'
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
					'nip' => $this->input->post('nip'),
					'jabatan' => $this->input->post('jabatan'),
					'unit' => $this->input->post('unit'),
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

	public function resetPassword()
	{
		$id = $this->input->post('id');

		$this->form_validation->set_rules('passBaru', 'Password Baru', 'alpha_numeric|required|min_length[8]|max_length[15]');
		$this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'alpha_numeric|required|min_length[10]|max_length[20]');

			if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
					$this->session->set_flashdata('error', 'Password baru dan konfirmasi password harus sama');
					redirect('Pengguna');
					//echo "Password Baru dan Konfirmasi Password harus sama";
			} else {
					$hash = password_hash($this->input->post('passBaru'), PASSWORD_DEFAULT);
					$data = [
						'password' => $hash
					];

					$result = $this->M_admin->updatePassword($data, $id);
					if ($result > 0) {
						$this->session->set_flashdata('success', 'Password berhasil diubah');
						redirect('Pengguna');
						//echo "Password Berhasil diubah";
					} else {
						$this->session->set_flashdata('error', 'Password gagal diubah');
						redirect('Pengguna');
						//echo "Password Gagal diubah";
					}
			}
			
	}

}


	
	

/* End of file Laporan_Persandian.php */
/* Location: ./application/controllers/Laporan_Persandian.php */