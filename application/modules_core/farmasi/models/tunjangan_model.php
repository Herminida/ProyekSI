<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tunjangan_model extends CI_Model {
	
	
	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function Ambil_Data_Tunjangan() {

		return $this->db->query("select * from tunjangan order by id desc");
	}

	function edit ($table,$data) {
	return $this->db->get_where($table, $data);

	}
	
	
	
	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function deleteData($table,$data)
	{
		$this->db->delete($table,$data);
	}

	function double ($sama) {
	
	return $this->db->query("select * from tunjangan where BINARY nama_tunjangan='$sama' ");

	}

	function update ($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}

	

}