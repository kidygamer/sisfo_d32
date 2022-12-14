<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
	public function login($user) {
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $user);

		$data = $this->db->get();

		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}

	public function updateLogoutTime($id,$dateTime) {
		$sql = "UPDATE admin SET last_logout='" .$dateTime ."' WHERE id='" .$id."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */