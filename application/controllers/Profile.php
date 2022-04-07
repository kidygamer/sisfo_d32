<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
		
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "profile";
		$data['judul'] 			= "Profile";
		$data['deskripsi'] 		= "Setting Profile";
		$this->template->views('profile', $data);
	}

	public function update() {
		$data['userdata'] 		= $this->userdata;
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		$id = $this->userdata->id;
		//$data = $this->input->post();
		
		if ($this->form_validation->run() == TRUE) {
			
			$new_name = "ProfilePicture-".$data['userdata']->username;
			$config['upload_path'] = "./assets/img";
			$config['allowed_types'] = "jpg|png";
			$config['max_size'] = 30000;
			$config['file_name'] = $new_name; 
			$this->load->library('upload',$config);

			if ($this->upload->do_upload('foto')) {
				$file_foto = $this->upload->data();

				$profile_picture = $file_foto['file_name'];
			}else {
				$profile_picture = $this->input->post('recent_foto');
			}

			$data = [
				'username' => $this->input->post('username'),
				'nama' => $this->input->post('nama'),
				'foto' => $profile_picture
			];

			$result = $this->M_admin->updateAccount($data, $id);
			if ($result > 0) {
				$this->updateProfil();
				$this->session->set_flashdata('msg', show_succ_msg('Data Profile Berhasil diubah'));
				redirect('Profile');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
				redirect('Profile');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Profile');
		}
	}

	public function ubah_password() {
		$this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('passBaru', 'Password Baru', 'alpha_numeric|required|min_length[8]|max_length[15]');
		$this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'alpha_numeric|required|min_length[10]|max_length[20]');

		$id = $this->userdata->id;
		if ($this->form_validation->run() == TRUE) {
			
			//if (md5($this->input->post('passLama')) == $this->userdata->password) {
			if (password_verify($this->input->post('passLama'), $this->userdata->password)) {
				if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
					$this->session->set_flashdata('msg', show_err_msg('Password Baru dan Konfirmasi Password harus sama'));
					redirect('Profile');
				} else {
					$hash = password_hash($this->input->post('passBaru'), PASSWORD_DEFAULT);
					$data = [
						'password' => $hash
					];

					$result = $this->M_admin->updatePassword($data, $id);
					if ($result > 0) {
						$this->updateProfil();
						$this->session->set_flashdata('msg', show_succ_msg('Password Berhasil diubah'));
						redirect('Profile');
					} else {
						$this->session->set_flashdata('msg', show_err_msg('Password Gagal diubah'));
						redirect('Profile');
					}
				}
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Password Salah'));
				redirect('Profile');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Profile');
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */