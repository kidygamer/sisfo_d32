<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_instansi extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('instansi a');
		$this->db->join('wilayah_provinsi b', 'a.Provinsi = b.id','left');
		$this->db->where('a.archieved', '0');
		$this->db->order_by('a.Id_Instansi','ASC');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT Id_Instansi,Nama_Instansi FROM instansi WHERE Id_Instansi = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_provinsi_by_id($id)
	{
		$sql = "SELECT nama FROM wilayah_provinsi WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_provinsi_by_vmap($id)
	{
		$sql = "SELECT nama FROM wilayah_provinsi WHERE code_vmap = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_instansi_by_provinsi($id)
	{
		$sql = "SELECT * FROM instansi JOIN wilayah_provinsi ON instansi.Provinsi = wilayah_provinsi.id WHERE wilayah_provinsi.code_vmap = '{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
		//return json_encode($data->result());
	}

	public function select_grand($id) {
		$sql = "SELECT instansi.Nama_Instansi, a.Tahun, 
                lp.Saran_uBSSN, lp.Jml_Kebijakan, lp.Jml_SDM, lp.Jml_Palsan, lp.Jml_APU, lp.Jml_SE, lp.Jml_PDok, lp.Jml_LKamsi, lp.Jml_PHKS, lp.Dokumen, lp.Nilai_Eval, lp.Kategori,
                csirt.Status, csirt.Tgl_Launching, csirt.Nama_CSIRT, csirt.Nomor_Sertifikat, csirt.Narahubung,
				ikami.Hasil_IKAMI, ikami.Kategori_SE, ikami.Nilai,
				csm.Skor, csm.Lv_Kematangan,
				tmpi.Nilai_TMPI, tmpi.Level
				FROM instansi 
				JOIN (
					SELECT Tahun FROM ikami 
				    UNION SELECT Tahun FROM laporan_persandian
				    UNION SELECT Tahun FROM csm
				    UNION SELECT Tahun FROM csirt
				    UNION SELECT Tahun FROM tmpi
				) as a
				LEFT JOIN laporan_persandian lp ON lp.Instansi = instansi.Id_Instansi AND lp.Tahun = a.Tahun AND lp.archieved = '0'
				LEFT JOIN csirt ON csirt.Instansi = instansi.Id_Instansi AND csirt.Tahun = a.Tahun AND csirt.archieved = '0'
				LEFT JOIN ikami ON ikami.Instansi = instansi.Id_Instansi AND ikami.Tahun = a.Tahun AND ikami.archieved = '0'
				LEFT JOIN csm ON csm.Instansi = instansi.Id_Instansi AND csm.Tahun = a.Tahun AND csm.archieved = '0'
				LEFT JOIN tmpi ON tmpi.Instansi = instansi.Id_Instansi AND tmpi.Tahun = a.Tahun AND tmpi.archieved = '0'
				WHERE instansi.Id_Instansi = '{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
		return json_encode($data->result());
	}

	public function select_grand_by_year($id,$year) {
		$sql = "SELECT instansi.Nama_Instansi, a.Tahun, 
                lp.Saran_uBSSN, lp.Jml_Kebijakan, lp.Jml_SDM, lp.Jml_Palsan, lp.Jml_APU, lp.Jml_SE, lp.Jml_PDok, lp.Jml_LKamsi, lp.Jml_PHKS, lp.Dokumen, lp.Nilai_Eval, lp.Kategori,
                csirt.Status, csirt.Tgl_Launching, csirt.Nama_CSIRT, csirt.Nomor_Sertifikat, csirt.Narahubung,
				ikami.Hasil_IKAMI, ikami.Kategori_SE, ikami.Nilai,
				csm.Skor, csm.Lv_Kematangan,
				tmpi.Nilai_TMPI, tmpi.Level
				FROM instansi 
				JOIN (
					SELECT Tahun FROM ikami 
				    UNION SELECT Tahun FROM laporan_persandian
				    UNION SELECT Tahun FROM csm
				    UNION SELECT Tahun FROM csirt
				    UNION SELECT Tahun FROM tmpi
				) as a
				LEFT JOIN laporan_persandian lp ON lp.Instansi = instansi.Id_Instansi AND lp.Tahun = a.Tahun AND lp.archieved = '0'
				LEFT JOIN csirt ON csirt.Instansi = instansi.Id_Instansi AND csirt.Tahun = a.Tahun AND csirt.archieved = '0'
				LEFT JOIN ikami ON ikami.Instansi = instansi.Id_Instansi AND ikami.Tahun = a.Tahun AND ikami.archieved = '0'
				LEFT JOIN csm ON csm.Instansi = instansi.Id_Instansi AND csm.Tahun = a.Tahun AND csm.archieved = '0'
				LEFT JOIN tmpi ON tmpi.Instansi = instansi.Id_Instansi AND tmpi.Tahun = a.Tahun AND tmpi.archieved = '0'
				WHERE instansi.Id_Instansi = '{$id}' AND a.Tahun = '{$year}'";

		$data = $this->db->query($sql);

		return $data->result();
		return json_encode($data->result());
	}

	public function select_ikami($id) {
		$this->db->select('a.Tahun, a.Nilai');
		$this->db->from('ikami a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.Instansi', $id);
		$this->db->where('a.archieved', '0');
		$this->db->order_by('Tahun','ASC');


		$data = $this->db->get();

		return $data->result();
	}

	public function select_ikami_by_year($id,$year) {
		$this->db->select('*');
		$this->db->from('ikami a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('a.Instansi', $id);
		$this->db->where('a.Tahun', $year);
		$this->db->where('a.archieved', '0');
		$this->db->order_by('Tahun','ASC');


		$data = $this->db->get();

		return $data->result();
	}

	public function select_pic_by_instansi($id) {
		$this->db->select('*');
		$this->db->from('pic_instansi a');
		$this->db->join('instansi b', 'a.Id_Instansi = b.Id_Instansi','left');
		$this->db->where('b.Id_Instansi', $id);
		$this->db->where('a.archieved', '0');
		$this->db->order_by('a.Id_PIC','ASC');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_statusCsirt_byInstansi($id) {
		$this->db->select('a.Status');
		$this->db->from('csirt a');
		$this->db->join('instansi b', 'a.Instansi = b.Id_Instansi');
		$this->db->where('b.Id_Instansi', $id);
		$this->db->where('a.archieved', '0');
		$this->db->order_by('Tahun','DESC');

		$data = $this->db->get();

		return $data->result();
	}

	public function insert($data) {
		$simpan=$this->db->query("INSERT INTO instansi
									(Nama_Instansi,Provinsi,updated_by)
      							  VALUES(								        
								        ".$this->db->escape($data['Nama_Instansi']).",
								        ".$this->db->escape($data['Provinsi']).",
								        ".$this->db->escape($data['updated_by'])."				        
      								)");
	    if($simpan){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
	}

	public function update($data) {
		$update = $this->db->query("UPDATE instansi SET
	    							Nama_Instansi	  =".$this->db->escape($data['Nama_Instansi']).",
	    							Provinsi		  =".$this->db->escape($data['Provinsi']).",		
	    							updated_by		=".$this->db->escape($data['updated_by'])."
	    							WHERE Id_Instansi =".$this->db->escape($data['Id_Instansi'])."
	    ");

	    if($update){
	      return TRUE;
	    }else{
	      return FALSE;
	    }
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

	public function select_provinsi()
	{
		$this->db->select('*');
		$this->db->from('wilayah_provinsi');
		$this->db->order_by('id','ASC');

		$data = $this->db->get();

		return $data->result();
	}

	public function total_rows_provinsi() {
		$data = $this->db->get('wilayah_provinsi');

		return $data->num_rows();
	}

}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */