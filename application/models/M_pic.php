<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pic extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('pic_instansi a');
		$this->db->join('instansi b', 'a.Id_Instansi = b.Id_Instansi');
		$this->db->where('a.archieved', '0');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_all_picD321() {
		$this->db->select('*');
		$this->db->from('pic_instansi a');
		$this->db->join('instansi b', 'a.Id_Instansi = b.Id_Instansi');
		$this->db->where('a.archieved', '0');
		$this->db->where('a.Kategori','Laporan Persandian');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_all_picD322() {
		$this->db->select('*');
		$this->db->from('pic_instansi a');
		$this->db->join('instansi b', 'a.Id_Instansi = b.Id_Instansi');
		$this->db->where('a.archieved', '0');
		$this->db->where("(a.Kategori='CSM' OR a.Kategori='IKAMI')", NULL, FALSE);

		$data = $this->db->get();

		return $data->result();
	}

	public function select_all_picD323() {
		$this->db->select('*');
		$this->db->from('pic_instansi a');
		$this->db->join('instansi b', 'a.Id_Instansi = b.Id_Instansi');
		$this->db->where('a.archieved', '0');
		$this->db->where("(a.Kategori='CSIRT' OR a.Kategori='TMPI')", NULL, FALSE);

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM pic WHERE Id_pic = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_instansi($id) {
		$sql = "SELECT Id_PIC FROM pic WHERE Instansi = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function total_rows() {
		$this->db->where('archieved', '0');
    	return $this->db->get('pic')->num_rows();
	}

	public function insert($data) {

		$simpan=$this->db->query("INSERT INTO pic_instansi
									(Nama_PIC,Nomor_HP,Jabatan,Kategori,Id_Instansi,updated_by)
      							  VALUES(								        
								        ".$this->db->escape($data['Nama_PIC']).",
								        ".$this->db->escape($data['Nomor_HP']).",
								        ".$this->db->escape($data['Jabatan']).",
								        ".$this->db->escape($data['Kategori']).",
								        ".$this->db->escape($data['Id_Instansi']).",
								        ".$this->db->escape($data['updated_by'])."
      								)");
	    if($simpan){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function update($data) {

		$update = $this->db->query("UPDATE pic_instansi SET
	    							Nama_PIC				=".$this->db->escape($data['Nama_PIC']).",
	    							Nomor_HP			=".$this->db->escape($data['Nomor_HP']).",
	    							Jabatan				=".$this->db->escape($data['Jabatan']).",
	    							Kategori			=".$this->db->escape($data['Kategori']).",
	    							Id_Instansi			=".$this->db->escape($data['Id_Instansi']).",
	    							updated_by			=".$this->db->escape($data['updated_by'])."
	    							WHERE Id_PIC		=".$this->db->escape($data['Id_PIC'])."
	    ");

	    if($update){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}
	

	public function archieve($id) {
		$true = 1;
		$sql = "UPDATE pic_instansi SET archieved='" .$true ."' WHERE Id_PIC='" .$id."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


}

/* End of file M_pic.php */
/* Location: ./application/models/M_lapopran_persandian.php */