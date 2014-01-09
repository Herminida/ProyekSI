<?php
class Farmasi_obats_model extends CI_Model {

	public function getAllData () {

        return $this->db->query("select a.*,b.nama_obat_jenis,c.nama_satuan,d.nama_golongan 
			from farmasi_obats a join farmasi_obat_jenis b on a.obat_jenis_id=b.id  
			join apt_satuan c on a.satuan_obat_id = c.id_satuan
			join apt_gol d on a.golongan_id = d.id_golongan
			order by a.id DESC");
   
	}

	public function getAllDataLimited($limit,$offset)
    {

        return $this->db->query("select a.*,b.nama_obat_jenis,c.nama_satuan,d.nama_golongan 
			from farmasi_obats a join farmasi_obat_jenis b on a.obat_jenis_id=b.id  
			join apt_satuan c on a.satuan_obat_id = c.id_satuan
			join apt_gol d on a.golongan_id = d.id_golongan
			order by a.id DESC LIMIT $limit OFFSET $offset ");
       
    }

	public function Get_Farmasi_Obats () {

		return $this->db->query("select a.*,b.nama_obat_jenis,c.nama_satuan,d.nama_golongan 
			from farmasi_obats a join farmasi_obat_jenis b on a.obat_jenis_id=b.id  
			join apt_satuan c on a.satuan_obat_id = c.id_satuan
			join apt_gol d on a.golongan_id = d.id_golongan
			order by a.id DESC");
	}

	public function delete ($table,$data) {

		return $this->db->delete($table,$data);
	}

	public function insert ($table,$data) {

		return $this->db->insert($table,$data);
	}

	public function double ($data) {

		return $this->db->query("select * from farmasi_obats where BINARY nama_obat='$data' ");
	}

	public function search ($kata) {

		return $this->db->query("select *
			from farmasi_obats a join farmasi_obat_jenis b on a.obat_jenis_id=b.id  
			join apt_satuan c on a.satuan_obat_id = c.id_satuan
			join apt_gol d on a.golongan_id = d.id_golongan
			where a.nama_obat like '%".$kata."%' or a.dosis like '%".$kata."%' or b.nama_obat_jenis like '%".$kata."%' or c.nama_satuan like '%".$kata."%' or d.nama_golongan like '%".$kata."%' ");
	}
	public function edit ($table,$data) {

		return $this->db->get_where($table,$data);
	}

	public function update ($table,$data,$field_key) {

		return $this->db->update($table,$data,$field_key);
		//echo $this->db->last_query();
	}

	public function Ambil_ID_Obats($obat_id) {
		return $this->db->query("select id,qtt from farmasi_obats where nama_obat='$obat_id'");
	}

	public function Updates_Obats($obat_id) {

		return $this->db->query ("update farmasi_obats  SET  aksi = 'belum' where nama_obat ='$obat_id' ");
	}

	

	public function Update_Obats($nama_obat) {

		$this->db->query ("update farmasi_obats  SET  aksi = 'sudah' where nama_obat ='$nama_obat' ");
	}

	public function Update_Batal($nama_obat) {

		$this->db->query ("update farmasi_obats  SET  aksi = 'belum' where nama_obat ='$nama_obat' ");
	}
}