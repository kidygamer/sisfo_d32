<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tmpi extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('tmpi a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.archieved', '0');
		$this->db->order_by('Tahun','DESC');


		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM tmpi WHERE Id_TMPI = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_instansi($id) {
		$sql = "SELECT Id_TMPI FROM tmpi WHERE Instansi = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function total_rows() {
		$this->db->where('archieved', '0');
    	return $this->db->get('tmpi')->num_rows();
	}

	public function insert($data) {

		$simpan=$this->db->query("INSERT INTO tmpi
									(Tahun,Nilai_TMPI,Level,Dokumen,Instansi,updated_by)
      							  VALUES(								        
								        ".$this->db->escape($data['Tahun']).",
								        ".$this->db->escape($data['Nilai_TMPI']).",
								        ".$this->db->escape($data['Level']).",
								        ".$this->db->escape($data['Dokumen']).",
								        ".$this->db->escape($data['Instansi']).",
								        ".$this->db->escape($data['updated_by'])."
      								)");
	    if($simpan){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function update($data) {

		$update = $this->db->query("UPDATE tmpi SET
	    							Tahun			=".$this->db->escape($data['Tahun']).",
	    							Nilai_TMPI		=".$this->db->escape($data['Nilai_TMPI']).",
	    							Level			=".$this->db->escape($data['Level']).",
	    							Dokumen			=".$this->db->escape($data['Dokumen']).",
	    							Instansi		=".$this->db->escape($data['Instansi']).",
	    							updated_by		=".$this->db->escape($data['updated_by'])."
	    							WHERE Id_TMPI	=".$this->db->escape($data['Id_TMPI'])."
	    ");

	    if($update){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}
	

	public function archieve($id) {
		$true = 1;
		$sql = "UPDATE tmpi SET archieved='" .$true ."' WHERE Id_TMPI='" .$id."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


}

/* End of file M_tmpi.php */
/* Location: ./application/models/M_tmpi.php */