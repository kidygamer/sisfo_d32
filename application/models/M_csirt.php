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
		$this->db->where('archieved', '0');
    	return $this->db->get('csirt')->num_rows();
	}

	public function insert($data) {

		$simpan=$this->db->query("INSERT INTO csirt
									(Status,Nomor_Sertifikat,Tgl_STR,Tgl_Launching,Nama_CSIRT,Narahubung,Dokumen,Instansi,Tahun,updated_by)
      							  VALUES(								        
								        ".$this->db->escape($data['Status']).",
								        ".$this->db->escape($data['Nomor_Sertifikat']).",
								        ".$this->db->escape($data['Tgl_STR']).",
								        ".$this->db->escape($data['Tgl_Launching']).",
								        ".$this->db->escape($data['Nama_CSIRT']).",
								        ".$this->db->escape($data['Narahubung']).",
								        ".$this->db->escape($data['Dokumen']).",
								        ".$this->db->escape($data['Instansi']).",
								        ".$this->db->escape($data['Tahun']).",
								        ".$this->db->escape($data['updated_by'])."
      								)");
	    if($simpan){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	// public function insert_narahubung($data_narahubung) {

	// 	$simpan=$this->db->query("INSERT INTO narahubung_csirt
	// 								(Nama_Narahubung,Nomor_HP,Id_CSIRT)
 //      							  VALUES(								        
	// 							        ".$this->db->escape($data['Nama_Narahubung']).",
	// 							        ".$this->db->escape($data['Nomor_HP']).",
	// 							        ".$this->db->escape($data['Id_CSIRT'])."
 //      								)");
	//     if($simpan){
	//       return TRUE;
	//     }else{
	//       return FALSE;
	//     }
	// }

	public function update($data) {

		$update = $this->db->query("UPDATE csirt SET
	    							Status				=".$this->db->escape($data['Status']).",
	    							Nomor_Sertifikat	=".$this->db->escape($data['Nomor_Sertifikat']).",
	    							Tgl_STR				=".$this->db->escape($data['Tgl_STR']).",
	    							Tgl_Launching		=".$this->db->escape($data['Tgl_Launching']).",
	    							Nama_CSIRT			=".$this->db->escape($data['Nama_CSIRT']).",
	    							Narahubung			=".$this->db->escape($data['Narahubung']).",
	    							Dokumen				=".$this->db->escape($data['Dokumen']).",
	    							Instansi			=".$this->db->escape($data['Instansi']).",
	    							Tahun				=".$this->db->escape($data['Tahun']).",
	    							updated_by			=".$this->db->escape($data['updated_by'])."
	    							WHERE Id_CSIRT		=".$this->db->escape($data['Id_CSIRT'])."
	    ");

	    if($update){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}
	

	public function archieve($id) {
		$true = 1;
		$sql = "UPDATE csirt SET archieved='" .$true ."' WHERE Id_CSIRT='" .$id."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


}

/* End of file M_csirt.php */
/* Location: ./application/models/M_lapopran_persandian.php */