<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('captcha');
		$this->load->model('M_auth');
	}
	
	public function index() {
		$session = $this->session->userdata('status');
		$vals = [
            'word'          => substr(str_shuffle('123456789'), 0, 6),
            'img_path'      => './assets/img/captcha/',
            'img_url'       => base_url('assets/img/captcha/'),
            'img_width'     => '150',
            'img_height'    => 30,
            'expiration'    => 300,
            'word_length'   => 8,
            'font_size'     => 16,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
    
            'colors'        => [
                    'background'=> [255, 255, 255],
                    'border'    => [255, 255, 255],
                    'text'      => [0, 0, 0],
                    'grid'      => [255, 40, 40]
                ]
            ];

        $captcha = create_captcha($vals);

	    $this->session->set_userdata('captcha', $captcha['word']);
	    $this->load->view('login', ['captcha' => $captcha['image']]);

		// if ($session == '') {
		// 	$this->load->view('login');
		// } else {
		// 	redirect('Home');
		// }
	}

	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$post_code  = $this->input->post('captcha');
	    	$captcha    = $this->session->userdata('captcha');

			$data = $this->M_auth->login($username);
			$password_db = $data->password;

			if ($post_code && ($post_code == $captcha)) {
				//echo "benar".$post_code."<br>".$captcha;
				if (password_verify($password, $password_db)) {
					$session = [
						'userdata' => $data,
						'status' => "Loged in"
					];
					$this->session->set_userdata($session);

					redirect('Home');
					
				} else {				
					$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
					redirect('Auth');
				}
			}else{
				$this->session->set_flashdata('error_msg', 'Captcha Salah');
				redirect('Auth');
				//echo "salah".$post_code."<br>".$captcha;
			}

			
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('Auth');
		}
	}

	public function logout() {
		$data['userdata'] 		= $this->session->userdata['userdata'];
		$id = $data['userdata']->id;
		//print_r($id);
		$dateTime = date("Y-m-d H:i:s"); 
    	$this->M_auth->updateLogoutTime($id,$dateTime);
		$this->session->sess_destroy();
		redirect('Auth');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */