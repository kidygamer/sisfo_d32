<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function updateAccount($data, $id)
	{
		$update = $this->db->query("UPDATE admin SET
	    							username=".$this->db->escape($data['username']).",
	    							nama=".$this->db->escape($data['nama']).",
	    							foto=".$this->db->escape($data['foto'])."
	    							WHERE id=".$this->db->escape_str($id)."
	    ");

	    if($update){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function updatePassword($data, $id) {
		// $this->db->where("id", $id);
		// $this->db->update("admin", $data);

		// return $this->db->affected_rows();

		$update = $this->db->query("UPDATE admin SET
	    							password=".$this->db->escape($data['password'])."
	    							WHERE id=".$this->db->escape_str($id)."
	    ");

	    if($update){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function select($id = '') {
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('admin');

		return $data->row();
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */