<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fasilitas_lki extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('fasilitas_lki a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.archieved', '0');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		// $sql = "SELECT * FROM admin WHERE id = '{$id}'";

		// $data = $this->db->query($sql);

		// return $data->row();
	}

	public function total_rows() {
		// $th                        is->db->where('archieved', '0');
  //   	return $this->db->get('pengguna')->num_rows();
	}

	public function insert($data) {
		$simpan=$this->db->query("INSERT INTO fasilitas_lki
									(No_Surat, Tgl_Pelaksanaan, Instansi, Jenis_LKI, PIC, Keterangan_Kegiatan, Laporan_Kegiatan, updated_by)
      							  VALUES(								        
								        ".$this->db->escape($data['No_Surat']).",
								        ".$this->db->escape($data['Tgl_Pelaksanaan']).",
								        ".$this->db->escape($data['Instansi']).",
								        ".$this->db->escape($data['Jenis_LKI']).",
								        ".$this->db->escape($data['PIC']).",
								        ".$this->db->escape($data['Keterangan_Kegiatan']).",
								        ".$this->db->escape($data['Laporan_Kegiatan']).",
								        ".$this->db->escape($data['updated_by'])."
      								)");
	    if($simpan){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function update($data) {
		$update = $this->db->query("UPDATE fasilitas_lki SET
									No_Surat=".$this->db->escape($data['No_Surat']).",
	    							Tgl_Pelaksanaan=".$this->db->escape($data['Tgl_Pelaksanaan']).",
	    							Instansi=".$this->db->escape($data['Instansi']).",
	    							Jenis_LKI=".$this->db->escape($data['Jenis_LKI']).",
	    							PIC=".$this->db->escape($data['PIC']).",
	    							Keterangan_Kegiatan=".$this->db->escape($data['Keterangan_Kegiatan']).",
	    							Laporan_Kegiatan=".$this->db->escape($data['Laporan_Kegiatan']).",
	    							updated_by=".$this->db->escape($data['updated_by'])."
	    							WHERE Id_FLKI=".$this->db->escape($data['Id_FLKI'])."
	    ");

	    if($update){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function archieve($id) {
		$true = 1;
		$sql = "UPDATE fasilitas_lki SET archieved='" .$true ."' WHERE Id_FLKI='" .$id."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */