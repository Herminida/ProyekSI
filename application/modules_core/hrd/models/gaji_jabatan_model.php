<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gaji_jabatan_model extends CI_Model {
	
	
	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function ambilData() {

		return $this->db->query("select * from gaji_jabatan order by id_gaji_jabatan desc");
	}
	function ambilDataById($id) {

		return $this->db->query("select * from gaji_jabatan join jabatan on id_jabatan=jabatan_id join gaji on id_gaji=gaji_id where id_gaji_jabatan=".$id);
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

	function double () {
	
	return $this->db->query("select * from gaji_jabatan where gaji_id=".$this->input->post('id_gaji')." and jabatan_id=".$this->input->post('id_jabatan'));

	}

	function update ($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}

	

}