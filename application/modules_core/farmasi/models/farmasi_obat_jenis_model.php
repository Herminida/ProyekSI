<?php 
class Farmasi_obat_jenis_model extends CI_Model {

	public function Get_Farmasi_Obat_Jenis () {

		return $this->db->query("select * from farmasi_obat_jenis order by id DESC");
	}

	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function delete ($id)
	{
		$sql=$this->db->delete('farmasi_obat_jenis',array('id'=>$id));
        return $sql;
	}

	function edit ($table,$data) {
	return $this->db->get_where($table, $data);

	}

	function update ($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}

	function double ($data) {
	
	return $this->db->query("select * from farmasi_obat_jenis where BINARY nama_obat_jenis='$data' ");

	}

	function search ($kata) {

		return $this->db->query("select * from farmasi_obat_jenis where nama_obat_jenis like '%".$kata."%' ");
	}

	
}