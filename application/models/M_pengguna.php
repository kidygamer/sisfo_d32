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
		$simpan=$this->db->query("INSERT INTO admin
									(username,password,role,nama,nik,jabatan,email)
      							  VALUES(								        
								        ".$this->db->escape($data['username']).",
								        ".$this->db->escape($data['password']).",
								        ".$this->db->escape($data['role']).",
								        ".$this->db->escape($data['nama']).",
								        ".$this->db->escape($data['nik']).",
								        ".$this->db->escape($data['jabatan']).",
								        ".$this->db->escape($data['email'])."
      								)");
	    if($simpan){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function update($data) {
		$dbdata = array(
	          'username' => $data['username'],
	          'password' => $data['password'],
	          'role' => $data['role'],
	          'nama' => $data['nama'],
	          'nik' => $data['nik'],
	          'jabatan' => $data['jabatan']
	     ); 
		$this->db->where('id', $data['id']); 
	    $this->db->update('laporan_persandian', $dbdata);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM instansi WHERE Id_Instansi='" .$id ."'";

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