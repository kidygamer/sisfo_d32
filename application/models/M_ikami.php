<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ikami extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('ikami a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.archieved', '0');
		$this->db->order_by('Id_IKAMI','ASC');


		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM ikami WHERE Id_IKAMI = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_instansi($id) {
		$sql = "SELECT Id_IKAMI FROM ikami WHERE Instansi = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function total_rows() {
		$data = $this->db->get('ikami');

		return $data->num_rows();
	}

	public function insert($data) {

		$simpan=$this->db->query("INSERT INTO ikami
									(Tahun,Saran_uBSSN,Jml_SDM,Jml_Palsan,Jml_APU,Jml_SE,Instansi,Dokumen,updated_by)
      							  VALUES(								        
								        ".$this->db->escape($data['Tahun']).",
								        ".$this->db->escape($data['Saran_uBSSN']).",
								        ".$this->db->escape($data['Jml_SDM']).",
								        ".$this->db->escape($data['Jml_Palsan']).",
								        ".$this->db->escape($data['Jml_APU']).",
								        ".$this->db->escape($data['Jml_SE']).",
								        ".$this->db->escape($data['Instansi']).",
								        ".$this->db->escape($data['Dokumen']).",
								        ".$this->db->escape($data['updated_by'])."
      								)");
	    if($simpan){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function update($data) {

		$update = $this->db->query("UPDATE ikami SET
	    							Tahun=".$this->db->escape($data['Tahun']).",
	    							Saran_uBSSN=".$this->db->escape($data['Saran_uBSSN']).",
	    							Jml_SDM=".$this->db->escape($data['Jml_SDM']).",
	    							Jml_Palsan=".$this->db->escape($data['Jml_Palsan']).",
	    							Jml_APU=".$this->db->escape($data['Jml_APU']).",
	    							Jml_SE=".$this->db->escape($data['Jml_SE']).",
	    							Dokumen=".$this->db->escape($data['Dokumen']).",
	    							updated_by=".$this->db->escape($data['updated_by'])."
	    							WHERE Id_IKAMI=".$this->db->escape($data['Id_IKAMI'])."
	    ");

	    if($update){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}
	

	public function archieve($id) {
		$true = 1;
		$sql = "UPDATE ikami SET archieved='" .$true ."' WHERE Id_IKAMI='" .$id."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


}

/* End of file M_ikami.php */
/* Location: ./application/models/M_lapopran_persandian.php */