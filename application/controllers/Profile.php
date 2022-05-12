<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_auth');
		
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
		$this->form_validation->set_rules('foto', '', 'callback_file_check');

		$id = $this->userdata->id;
		//$data = $this->input->post();
		
		if ($this->form_validation->run() == TRUE) {

	        //upload configuration
	        $new_name = "ProfilePicture-".$data['userdata']->username;
			$config['upload_path'] = "./assets/img";
			$config['allowed_types'] = "jpg|jpeg|png";
			$config['max_size'] = 30000;
			$config['file_name'] = $new_name; 
			$this->load->library('upload',$config);

	        //upload file to directory
	        if ($this->upload->do_upload('foto')) {
	        	$file_foto = $this->upload->data();

	        	$config['image_library']='gd2';
                $config['source_image']='./assets/img/'.$file_foto['file_name'];
                $config['create_thumb']= TRUE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '75%';
               	$config['x_axis'] = 100;
				$config['y_axis'] = 60;
                $config['new_image']= './assets/img/'.$file_foto['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->crop();
 
                $avatar=$file_foto['file_name'];

				$profile_picture = $avatar;
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
		$data['userdata'] 	    = $this->userdata;

		$this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('passBaru', 'Password Baru', 'alpha_numeric|required|min_length[8]|max_length[15]');
		$this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'alpha_numeric|required|min_length[10]|max_length[20]');

		$id = $this->userdata->id;
		if ($this->form_validation->run() == TRUE) {

			$passLama = $this->security->xss_clean($this->input->post('passLama'));
			$passBaru = $this->security->xss_clean($this->input->post('passBaru'));
			$passKonf = $this->security->xss_clean($this->input->post('passKonf'));

			$data = $this->M_auth->login($data['userdata']->username);
			$password_db = $data->password;

			if (password_verify($passLama, $password_db)) {
				if ($passBaru != $passKonf) {
					$this->session->set_flashdata('msg', show_err_msg('Password Baru dan Konfirmasi Password harus sama'));
					redirect('Profile');
				} else {
					$hash = password_hash($passKonf, PASSWORD_DEFAULT);
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

	 /*
     * file value and type check during validation
     */
    public function file_check($str){
        $allowed_mime_type_arr = array('image/jpg','image/jpeg','image/png');
        $mime = get_mime_by_extension($_FILES['foto']['name']);
        if(isset($_FILES['foto']['name']) && $_FILES['foto']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Foto Profil harus format .jpg/.jpeg/.png. Data <strong>Gagal</strong> Tersimpan!');
                return false;
            }
        }
    }

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */