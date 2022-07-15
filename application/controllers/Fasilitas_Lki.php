<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_Lki extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_fasilitas_lki');
		$this->load->model('M_instansi');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;

		$data['dataInstansi'] 	= $this->M_instansi->select_all();
		$data['dataFasilitas_Lki'] 	= $this->M_fasilitas_lki->select_all();

		$data['page'] 		= "fasilitas_lki";
		$data['judul'] 		= "Data Fasilitas LKI";
		$data['deskripsi'] 	= "Manage Data Fasilitas LKI";

		$this->template->views('fasilitas_lki/home', $data);
		
	}


	public function prosesTambah() {
		$data['userdata'] 		= $this->userdata;
		$rules = array(
	        array(
	                'field' => 'No_Surat',
	                'label' => 'Nomor Surat',
	                'rules' => 'required|max_length[50]'
	        ),
	        array(
	        		'field' => 'Tgl_Pelaksanaan',
	                'label' => 'Tanggal Pelaksanaan',
	                'rules' => 'required'
	        ), 
	        array(
	        		'field' => 'Instansi',
	                'label' => 'Instansi',
	                'rules' => 'required'
	        ), 
	        array(
	        		'field' => 'Jenis_LKI',
	                'label' => 'Jenis LKI',
	                'rules' => 'required'
	        ), 
	        array(
	        		'field' => 'Keterangan_Kegiatan',
	                'label' => 'Keterangan_Kegiatan',
	                'rules' => 'required'
	        ), 
	        array(
	        		'field' => 'PIC',
	                'label' => 'PIC',
	                'rules' => 'required'
	        )

		);

		$this->form_validation->set_rules($rules);


		if ($this->form_validation->run() == TRUE) {
			$nama_instansi = $this->M_instansi->select_by_id($this->security->xss_clean($this->input->post('Instansi')));
			$new_name = "Laporan Kegiatan ".$this->security->xss_clean($this->input->post('Keterangan_Kegiatan')." - ".$nama_instansi->Nama_Instansi);
			$config['upload_path'] = "./assets/pdf_files/laporan_kegiatan_LKI";
			$config['allowed_types'] = "pdf";
			$config['max_size'] = 30000;
			$config['file_name'] = $new_name; 
			$this->load->library('upload',$config);

			if ($this->upload->do_upload('Dokumen')) {
				$file_pdf = $this->upload->data();

				$dokumen_lki = $file_pdf['file_name'];
			}else {
				$dokumen_lki = NULL;
			}
		
			$data = [
					'No_Surat'				=> $this->security->xss_clean($this->input->post('No_Surat')),
					'Tgl_Pelaksanaan'		=> $this->security->xss_clean($this->input->post('Tgl_Pelaksanaan')),
					'Instansi'				=> $this->input->post('Instansi'),	
					'Jenis_LKI' 			=> $this->input->post('Jenis_LKI'),
					'PIC'					=> $this->security->xss_clean($this->input->post('PIC')),
					'Keterangan_Kegiatan'	=> $this->security->xss_clean($this->input->post('Keterangan_Kegiatan')),
					'Laporan_Kegiatan'		=> $dokumen_lki,
					'updated_by'			=> $data['userdata']->username
			]; 
			
			if($this->M_fasilitas_lki->insert($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Ditambahkan!');
				redirect('Fasilitas_Lki');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!');
				redirect('Fasilitas_Lki');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Ditambahkan!'.$out['msg']);
			redirect('Fasilitas_Lki');
		}

	 
	}

	public function prosesUpdate() {
		$data['userdata'] 		= $this->userdata;
		$rules = array(
	        array(
	                'field' => 'No_Surat',
	                'label' => 'Nomor Surat',
	                'rules' => 'required|max_length[50]'
	        ),
	        array(
	        		'field' => 'Tgl_Pelaksanaan',
	                'label' => 'Tanggal Pelaksanaan',
	                'rules' => 'required'
	        ), 
	        array(
	        		'field' => 'Instansi',
	                'label' => 'Instansi',
	                'rules' => 'required'
	        ), 
	        array(
	        		'field' => 'Jenis_LKI',
	                'label' => 'Jenis LKI',
	                'rules' => 'required'
	        ), 
	        array(
	        		'field' => 'Keterangan_Kegiatan',
	                'label' => 'Keterangan_Kegiatan',
	                'rules' => 'required'
	        ), 
	        array(
	        		'field' => 'PIC',
	                'label' => 'PIC',
	                'rules' => 'required'
	        )

		);

		$this->form_validation->set_rules($rules);


		if ($this->form_validation->run() == TRUE) {
			$nama_instansi = $this->M_instansi->select_by_id($this->security->xss_clean($this->input->post('Instansi')));
			$new_name = "Laporan Kegiatan ".$this->security->xss_clean($this->input->post('Keterangan_Kegiatan')." - ".$nama_instansi->Nama_Instansi);
			$config['upload_path'] = "./assets/pdf_files/laporan_kegiatan_LKI";
			$config['allowed_types'] = "pdf";
			$config['max_size'] = 30000;
			$config['file_name'] = $new_name; 
			$this->load->library('upload',$config);

			if ($this->upload->do_upload('Dokumen')) {
				$file_pdf = $this->upload->data();

				$dokumen_lki = $file_pdf['file_name'];
			}else {
				$dokumen_lki = $this->input->post('recent_dokumen');
			}
		
			$data = [
					'Id_FLKI'				=> $this->security->xss_clean($this->input->post('Id_FLKI')),
					'No_Surat'				=> $this->security->xss_clean($this->input->post('No_Surat')),
					'Tgl_Pelaksanaan'		=> $this->security->xss_clean($this->input->post('Tgl_Pelaksanaan')),
					'Instansi'				=> $this->input->post('Instansi'),	
					'Jenis_LKI' 			=> $this->input->post('Jenis_LKI'),
					'PIC'					=> $this->security->xss_clean($this->input->post('PIC')),
					'Keterangan_Kegiatan'	=> $this->security->xss_clean($this->input->post('Keterangan_Kegiatan')),
					'Laporan_Kegiatan'		=> $dokumen_lki,
					'updated_by'			=> $data['userdata']->username
			]; 
			
			if($this->M_fasilitas_lki->update($data)){
				$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diupdate!');
				redirect('Fasilitas_Lki');
			} else {
				$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!');
				redirect('Fasilitas_Lki');
			}
		} else {
			$out['msg'] = show_err_msg(validation_errors());
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diupdate!'.$out['msg']);
			redirect('Fasilitas_Lki');
		}
		

	}

	public function archieve($id){

		if($this->M_fasilitas_lki->archieve($id)){
			$this->session->set_flashdata('success', 'Data <strong>Berhasil</strong> Diarsipkan!');
			redirect('Fasilitas_Lki');
			//echo "success";
		} else {
			$this->session->set_flashdata('error', 'Data <strong>Gagal</strong> Diarsipkan!');
			redirect('Fasilitas_Lki');
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

/* End of file Fasilitas_Lki.php */
/* Location: ./application/controllers/Fasilitas_Lki.php */