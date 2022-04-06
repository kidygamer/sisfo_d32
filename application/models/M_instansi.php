<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_instansi extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('instansi');
		$this->db->where('instansi.archieved', '0');
		$this->db->order_by('Id_Instansi','ASC');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT Nama_Instansi FROM instansi WHERE Id_Instansi = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO instansi VALUES('','" .$data['Nama_Instansi'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE instansi SET Nama_Instansi='" .$data['Nama_Instansi'] ."',
	    							updated_by=".$this->db->escape($data['updated_by'])."
	    							WHERE Id_Instansi='" .$data['Id_Instansi'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function archieve($id) {
		$true = 1;
		$sql = "UPDATE instansi SET archieved='" .$true ."' WHERE Id_Instansi='" .$id."'";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}


	public function select_by_name($nama) {
		$sql = "SELECT Nama_Instansi FROM instansi WHERE Nama_Instansi = '{$nama}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function total_rows() {
		$data = $this->db->get('instansi');

		return $data->num_rows();
	}

}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */