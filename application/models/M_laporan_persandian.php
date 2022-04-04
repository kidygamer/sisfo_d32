<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_persandian extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('laporan_persandian a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.archieved', '0');
		$this->db->order_by('Id_LapSan','ASC');


		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM laporan_persandian WHERE Id_Lapsan = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function total_rows() {
		$data = $this->db->get('laporan_persandian');

		return $data->num_rows();
	}

	public function insert($data) {

		$simpan=$this->db->query("INSERT INTO laporan_persandian
									(Tahun,Saran_uBSSN,Jml_SDM,Jml_Palsan,Jml_APU,Jml_SE,Instansi,Dokumen,updated_by)
      							  VALUES(								        
								        ".$this->db->escape($data['Tahun']).",
								        ".$this->db->escape($data['Saran_uBSSN']).",
								        ".$this->db->escape($data['Jml_SDM']).",
								        ".$this->db->escape($data['Jml_Palsan']).",
								        ".$this->db->escape($data['Jml_APU']).",
								        ".$this->db->escape($data['Jml_SE']).",
								        ".$this->db->escape($data['Instansi']).",
								        ".$this->db->escape($data['Dokumen']).",
								        ".$this->db->escape($data['updated_by'])."
      								)");
	    if($simpan){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function update($data) {

		$update = $this->db->query("UPDATE laporan_persandian SET
	    							Tahun=".$this->db->escape($data['Tahun']).",
	    							Saran_uBSSN=".$this->db->escape($data['Saran_uBSSN']).",
	    							Jml_SDM=".$this->db->escape($data['Jml_SDM']).",
	    							Jml_Palsan=".$this->db->escape($data['Jml_Palsan']).",
	    							Jml_APU=".$this->db->escape($data['Jml_APU']).",
	    							Jml_SE=".$this->db->escape($data['Jml_SE']).",
	    							Dokumen=".$this->db->escape($data['Dokumen'])."
	    							WHERE Id_LapSan=".$this->db->escape($data['Id_LapSan'])."
	    ");

	    if($update){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}
	

	public function archieve($id) {
		$true = 1;
		$sql = "UPDATE laporan_persandian SET archieved='" .$true ."' WHERE Id_LapSan='" .$id."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	// public function select_by_pegawai($id) {
	// 	$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kota, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kota = kota.id AND pegawai.id_kota={$id}";

	// 	$data = $this->db->query($sql);

	// 	return $data->result();
	// }

	// public function insert_batch($data) {
	// 	$this->db->insert_batch('kota', $data);
		
	// 	return $this->db->affected_rows();
	// }

	// public function check_nama($nama) {
	// 	$this->db->where('nama', $nama);
	// 	$data = $this->db->get('kota');

	// 	return $data->num_rows();
	// }

}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */