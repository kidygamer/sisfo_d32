<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_chart extends CI_Model {
	public function total_by_status() {
		$sql = "SELECT 'Status' FROM csirt WHERE Nama_CSIRT LIKE '%Prov%'";

		$data = $this->db->query($sql);

		return $data->num_rows();
	}

    public function kabkot_total() {
		$sql = "SELECT 'Status' FROM csirt WHERE Nama_CSIRT LIKE '%Kab%' OR Nama_CSIRT LIKE '%Kot%'";

		$data = $this->db->query($sql);

		return $data->num_rows();
	}

	public function select_tmpi19() {
		$this->db->select('*');
		$this->db->from('tmpi a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.Tahun', '2019');
		$this->db->order_by('Id_TMPI','ASC');


		$data = $this->db->get();

		return $data->result();
	}

	public function total_tmpi19() {
		$this->db->select('*');
		$this->db->from('tmpi a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.Tahun', '2019');
		$this->db->order_by('Id_TMPI','ASC');


		$data = $this->db->get();

		return $data->num_rows();
	}

	public function select_tmpi20() {
		$this->db->select('*');
		$this->db->from('tmpi a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.Tahun', '2020');
		$this->db->order_by('Id_TMPI','ASC');


		$data = $this->db->get();

		return $data->result();
	}

	public function total_tmpi20() {
		$this->db->select('*');
		$this->db->from('tmpi a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.Tahun', '2020');
		$this->db->order_by('Id_TMPI','ASC');


		$data = $this->db->get();

		return $data->num_rows();
	}

	public function select_tmpi21() {
		$this->db->select('*');
		$this->db->from('tmpi a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.Tahun', '2021');
		$this->db->order_by('Id_TMPI','ASC');


		$data = $this->db->get();

		return $data->result();
	}

	public function total_tmpi21() {
		$this->db->select('*');
		$this->db->from('tmpi a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.Tahun', '2021');
		$this->db->order_by('Id_TMPI','ASC');


		$data = $this->db->get();

		return $data->num_rows();
	}

	public function lapsan_total() {
		$sql = "SELECT laporan_persandian.Id_LapSan, instansi.Nama_Instansi FROM laporan_persandian JOIN instansi ON instansi.Id_Instansi = laporan_persandian.Instansi WHERE instansi.Nama_Instansi LIKE '%Prov%'";

		$data = $this->db->query($sql);

		return $data->num_rows();
	}

	public function lapsan_totalkab() {
		//$sql = "SELECT Dokumen FROM laporan_persandian WHERE Dokumen LIKE '%Pemkab%' OR Dokumen LIKE '%Pemkot%'";
		$sql = "SELECT laporan_persandian.Id_LapSan, instansi.Nama_Instansi FROM laporan_persandian JOIN instansi ON instansi.Id_Instansi = laporan_persandian.Instansi WHERE instansi.Nama_Instansi LIKE '%Pemkab%' OR instansi.Nama_Instansi LIKE '%Pemkot%'";

		$data = $this->db->query($sql);

		return $data->num_rows();
	}

	public function select_ikami() {
		$this->db->select('*');
		$this->db->from('ikami a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.Instansi', '174');
		$this->db->order_by('Tahun','ASC');


		$data = $this->db->get();

		return $data->result();
	}

	public function select_csm() {
		$this->db->select('*');
		$this->db->from('csm a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.archieved', '0');
		$this->db->order_by('Id_CSM','ASC');


		$data = $this->db->get();

		return $data->result();
	}

}

/* End of file M_csirt.php */
/* Location: ./application/models/M_lapopran_persandian.php */