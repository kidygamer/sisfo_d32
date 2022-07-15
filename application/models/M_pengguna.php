<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('admin a');
		$this->db->where('a.archieved', '0');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM admin WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function total_rows() {
		$this->db->where('archieved', '0');
    	return $this->db->get('pengguna')->num_rows();
	}

	public function insert($data) {
		$simpan=$this->db->query("INSERT INTO admin
									(username,password,role,nama,nip,jabatan,unit,email)
      							  VALUES(								        
								        ".$this->db->escape($data['username']).",
								        ".$this->db->escape($data['password']).",
								        ".$this->db->escape($data['role']).",
								        ".$this->db->escape($data['nama']).",
								        ".$this->db->escape($data['nip']).",
								        ".$this->db->escape($data['jabatan']).",
								        ".$this->db->escape($data['unit']).",
								        ".$this->db->escape($data['email'])."
      								)");
	    if($simpan){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function update($data) {
		$update = $this->db->query("UPDATE admin SET
									username=".$this->db->escape($data['username']).",
	    							role=".$this->db->escape($data['role']).",
	    							nama=".$this->db->escape($data['nama']).",
	    							nip=".$this->db->escape($data['nip']).",
	    							jabatan=".$this->db->escape($data['jabatan']).",
	    							unit=".$this->db->escape($data['unit']).",
	    							email=".$this->db->escape($data['email'])."
	    							WHERE id=".$this->db->escape($data['id'])."
	    ");

	    if($update){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function archieve($id) {
		$true = 1;
		$sql = "UPDATE admin SET archieved='" .$true ."' WHERE id='" .$id."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */