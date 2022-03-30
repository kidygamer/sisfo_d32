<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_instansi extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('instansi');
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
		$sql = "UPDATE instansi SET Nama_Instansi='" .$data['Nama_Instansi'] ."' WHERE Id_Instansi='" .$data['Id_Instansi'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM instansi WHERE Id_Instansi='" .$id ."'";

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