<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pic');
		$this->load->model('M_instansi');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPic'] 	= $this->M_pic->select_all();
		$data['dataInstansi'] 	= $this->M_instansi->select_all();

		$data['page'] 		= "pic";
		$data['judul'] 		= "Data PIC Instansi Pemda";
		$data['deskripsi'] 	= "Manage Data PIC Instansi Pemda";

		$this->template->views('pic/home', $data);
	}


	public function prosesTambah() {
		$data['userdata'] 		= $this->userdata;
		$rules = array(
	        array(
	                'field' => 'Nama_PIC',
	                'label' => 'Nama',
	                'rules' => 'required|max_length[50]'
	        ),
	        array(
	                'field' => 'Nomor_HP',
	                'label' => 'Nomor_HP',
	                'rules' => 'required|numeric'
	        )

		);

		$this->form_validation->set_rules($rules);


		if ($this->form_validation->run() == TRUE) {
		
			$data = [
					'Nama_PIC'		=> $this->security->xss_clean($this->input->post('Nama_PIC')),
					'Nomor_HP'		=> $this->security->xss_clean($this->input->post('Nomor_HP')),
					'Jabatan'		=> $this->security->xss_clean($this->input->post('Jabatan')),	
					'Kategori' 		=> $this->input->post('Kategori'),
					'Id_Instansi'	=> $this->security->xss_clean($this->input->post('Id_Instansi')),
					'updated_by'=> $data['userdata']->username
			];
			
			if($this->M_pic->insert($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
				redirect('Pic');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!');
				redirect('Pic');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!'.$out['msg']);
			redirect('Pic');
		}

	 
	}

	public function prosesUpdate() {
		$data['userdata'] 		= $this->userdata;
		$rules = array(
	        array(
	                'field' => 'Nama_PIC',
	                'label' => 'Nama',
	                'rules' => 'required|max_length[50]'
	        ),
	        array(
	                'field' => 'Nomor_HP',
	                'label' => 'Nomor_HP',
	                'rules' => 'required|numeric'
	        )

		);

		$this->form_validation->set_rules($rules);

		
			if ($this->form_validation->run() == TRUE) {

				$data = [
					'Id_PIC'		=> $this->security->xss_clean($this->input->post('Id_PIC')),
					'Nama_PIC'		=> $this->security->xss_clean($this->input->post('Nama_PIC')),
					'Nomor_HP'		=> $this->security->xss_clean($this->input->post('Nomor_HP')),
					'Jabatan'		=> $this->security->xss_clean($this->input->post('Jabatan')),	
					'Kategori' 		=> $this->input->post('Kategori'),
					'Id_Instansi'	=> $this->security->xss_clean($this->input->post('Id_Instansi')),
					'updated_by'=> $data['userdata']->username
				];
				
				if($this->M_pic->update($data)){
					$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diupdate!');
					redirect('Pic');
				} else {
					$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!');
					redirect('Pic');
				}
			} else {
				$out['msg'] = show_err_msg(validation_errors());
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!'.$out['msg']);
					redirect('Pic');
			}
			//print_r($data);

	}

	public function archieve($id){

		if($this->M_pic->archieve($id)){
			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
			redirect('Pic');
			//echo "success";
		} else {
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
			redirect('Pic');
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

/* End of file Pic.php */
/* Location: ./application/controllers/Pic.php */