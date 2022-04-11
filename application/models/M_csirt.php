<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_csirt extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('csirt a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.archieved', '0');
		$this->db->order_by('Tahun','DESC');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM csirt WHERE Id_CSIRT = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_instansi($id) {
		$sql = "SELECT Id_CSIRT FROM csirt WHERE Instansi = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function total_rows() {
		$data = $this->db->get('csirt');

		return $data->num_rows();
	}

	public function insert($data) {

		$simpan=$this->db->query("INSERT INTO csirt
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

		$update = $this->db->query("UPDATE csirt SET
	    							Tahun=".$this->db->escape($data['Tahun']).",
	    							Saran_uBSSN=".$this->db->escape($data['Saran_uBSSN']).",
	    							Jml_SDM=".$this->db->escape($data['Jml_SDM']).",
	    							Jml_Palsan=".$this->db->escape($data['Jml_Palsan']).",
	    							Jml_APU=".$this->db->escape($data['Jml_APU']).",
	    							Jml_SE=".$this->db->escape($data['Jml_SE']).",
	    							Dokumen=".$this->db->escape($data['Dokumen']).",
	    							updated_by=".$this->db->escape($data['updated_by'])."
	    							WHERE Id_csirt=".$this->db->escape($data['Id_csirt'])."
	    ");

	    if($update){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}
	

	public function archieve($id) {
		$true = 1;
		$sql = "UPDATE csirt SET archieved='" .$true ."' WHERE Id_csirt='" .$id."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


}

/* End of file M_csirt.php */
/* Location: ./application/models/M_lapopran_persandian.php */