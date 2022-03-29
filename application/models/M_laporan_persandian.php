<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_persandian extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('laporan_persandian a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->order_by('Id_LapSan','ASC');


		$data = $this->db->get();

		return $data->result();
	}

	// public function select_by_id($id) {
	// 	$sql = "SELECT * FROM instansi WHERE Id_Instansi = '{$id}'";

	// 	$data = $this->db->query($sql);

	// 	return $data->row();
	// }

	// public function insert($data) {
	// 	$sql = "INSERT INTO instansi VALUES('','" .$data['Nama_Instansi'] ."')";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }

	// public function update($data) {
	// 	$sql = "UPDATE instansi SET Nama_Instansi='" .$data['Nama_Instansi'] ."' WHERE Id_Instansi='" .$data['Id_Instansi'] ."'";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }

	// public function delete($id) {
	// 	$sql = "DELETE FROM instansi WHERE Id_Instansi='" .$id ."'";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }

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

	// public function total_rows() {
	// 	$data = $this->db->get('kota');

	// 	return $data->num_rows();
	// }
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */