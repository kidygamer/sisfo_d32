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

	public function select_by_id($id) {
		$sql = "SELECT * FROM laporan_persandian WHERE Id_Lapsan = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_instansi($id) {
		$sql = "SELECT Id_Lapsan FROM laporan_persandian WHERE Instansi = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function total_rows() {
		$this->db->where('archieved', '0');
    	return $this->db->get('laporan_persandian')->num_rows();
	}

	public function insert($data) {

		$simpan=$this->db->query("INSERT INTO laporan_persandian
									(Tahun,Saran_uBSSN,Jml_Kebijakan,Jml_SDM,Jml_Palsan,Jml_APU,Jml_SE,Jml_PDok,Jml_LKamsi,Jml_PHKS,Instansi,Dokumen,Dokumen_Eval,Nilai_Eval,updated_by)
      							  VALUES(								        
								        ".$this->db->escape($data['Tahun']).",
								        ".$this->db->escape($data['Saran_uBSSN']).",
								        ".$this->db->escape($data['Jml_Kebijakan']).",
								        ".$this->db->escape($data['Jml_SDM']).",
								        ".$this->db->escape($data['Jml_Palsan']).",
								        ".$this->db->escape($data['Jml_APU']).",
								        ".$this->db->escape($data['Jml_SE']).",
								        ".$this->db->escape($data['Jml_PDok']).",
								        ".$this->db->escape($data['Jml_LKamsi']).",
								        ".$this->db->escape($data['Jml_PHKS']).",
								        ".$this->db->escape($data['Instansi']).",
								        ".$this->db->escape($data['Dokumen']).",
								        ".$this->db->escape($data['Dokumen_Eval']).",
								        ".$this->db->escape($data['Nilai_Eval']).",
								        ".$this->db->escape($data['updated_by'])."
      								)");
	    if($simpan){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function update($data) {

		$update = $this->db->query("UPDATE laporan_persandian SET
	    							Tahun=".$this->db->escape($data['Tahun']).",
	    							Saran_uBSSN=".$this->db->escape($data['Saran_uBSSN']).",
	    							Jml_Kebijakan=".$this->db->escape($data['Jml_Kebijakan']).",
	    							Jml_SDM=".$this->db->escape($data['Jml_SDM']).",
	    							Jml_Palsan=".$this->db->escape($data['Jml_Palsan']).",
	    							Jml_APU=".$this->db->escape($data['Jml_APU']).",
	    							Jml_SE=".$this->db->escape($data['Jml_SE']).",
	    							Jml_PDok=".$this->db->escape($data['Jml_PDok']).",
	    							Jml_LKamsi=".$this->db->escape($data['Jml_LKamsi']).",
	    							Jml_PHKS=".$this->db->escape($data['Jml_PHKS']).",
	    							Dokumen=".$this->db->escape($data['Dokumen']).",
	    							Dokumen_Eval=".$this->db->escape($data['Dokumen_Eval']).",
	    							Nilai_Eval=".$this->db->escape($data['Nilai_Eval']).",
	    							updated_by=".$this->db->escape($data['updated_by'])."
	    							WHERE Id_LapSan=".$this->db->escape($data['Id_LapSan'])."
	    ");

	    if($update){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}
	

	public function archieve($id) {
		$true = 1;
		$sql = "UPDATE laporan_persandian SET archieved='" .$true ."' WHERE Id_LapSan='" .$id."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


}

/* End of file M_laporan_persandian.php */
/* Location: ./application/models/M_lapopran_persandian.php */