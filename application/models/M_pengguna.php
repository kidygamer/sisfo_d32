<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('admin a');


		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM admin WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function total_rows() {
		$data = $this->db->get('pengguna');

		return $data->num_rows();
	}

	public function insert($data) {
		$sql = "INSERT INTO pengguna VALUES('','" .$data['username'] ."', '" .$data['password'] ."','" .$data['role'] ."','" .$data['nama'] ."','" .$data['nik'] ."','" .$data['jabatan'] ."','" .$data['Instansi'] ."','" .$data['Dokumen'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	// public function update($data) {
	// 	$dbdata = array(
	//           'Tahun' => $data['Tahun'],
	//           'Saran_uBSSN' => $data['Saran_uBSSN'],
	//           'Jml_SDM' => $data['Jml_SDM'],
	//           'Jml_Palsan' => $data['Jml_Palsan'],
	//           'Jml_APU' => $data['Jml_APU'],
	//           'Jml_SE' => $data['Jml_SE'],
	//           'Dokumen' => $data['Dokumen']
	//           //'updated_by' => $data['updated_by']
	//      ); 
	// 	$this->db->where('Id_LapSan', $data['Id_LapSan']); 
	//     $this->db->update('laporan_persandian', $dbdata);

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

}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */