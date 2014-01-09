<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gaji_model extends CI_Model {
	
	
	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function ambilData() {

		return $this->db->query("select * from gaji order by id_gaji desc");
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
	
	return $this->db->query("select * from gaji where BINARY nama_gaji='$sama' ");

	}

	function update ($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}

	

}