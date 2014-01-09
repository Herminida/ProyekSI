<?php 
class Pegawai_model extends CI_Model {

	function insert($table,$data)
	{
		return $this->db->insert($table,$data);
		
	}

	function GetPegawai () {

		return $this->db->query("select a.id_pegawai,a.nama_pegawai,a.nip_pegawai,b.nama_jabatan,c.nama_unit_kerja
			from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan
			join unit_kerja c on a.fk_unit_kerja=c.id_unit_kerja
			");
	}

	function double ($datanama,$datanip) {

		return $this->db->query("select * from pegawai where BINARY nama_pegawai='$datanama' or BINARY nip_pegawai='$datanip' ");
	}

	function delete ($table,$field_key) {
		return $this->db->delete($table,$field_key);
	}

	function search($kata) {

		return $this->db->query("select a.id_pegawai,a.nama_pegawai,a.nip_pegawai,b.nama_jabatan,c.nama_unit_kerja
			from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan
			join unit_kerja c on a.fk_unit_kerja=c.id_unit_kerja
			where a.nama_pegawai like '%".$kata."%' or a.nip_pegawai like '%".$kata."%' or b.nama_jabatan like '%".$kata."%' or c.nama_unit_kerja like '%".$kata."%'
			 ");

	}

	public function edit ($table,$data) {

		return $this->db->get_where($table,$data);
	}

	public function update ($table,$data,$field_key) {

		return $this->db->update($table,$data,$field_key);
		//echo $this->db->last_query();
	}

	public function updatedata($table,$data,$field_key) {
		return $this->db->update($table,$data,$field_key);
	}

	
}