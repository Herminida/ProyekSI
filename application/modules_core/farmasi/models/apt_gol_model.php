<?php 
class Apt_gol_model extends CI_Model {

	function Get_Apt_Gol () {
		return $this->db->query("select * from apt_gol order by id_golongan DESC");
	}

	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function delete ($table,$data) {
		return $this->db->delete($table,$data);
	}

	function search ($kata) {

		return $this->db->query("select * from apt_gol where nama_golongan like '%".$kata."%' ");
	}

	function edit ($table,$data) {

		return $this->db->get_where($table,$data);
	}

	function double ($data2) {
	
	return $this->db->query("select * from apt_gol where BINARY nama_golongan='$data2' ");

	}

	function update($table,$data,$field_key) {

		return $this->db->update($table,$data,$field_key);
	}
}