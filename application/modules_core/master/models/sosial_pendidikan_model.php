<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sosial_pendidikan_model extends CI_Model {
	
	function Get_Pendidikan () {
		$d=$this->db->query("select * from sosial_pendidikan order by sosial_pendidikan.id DESC");
		return $d;
	}

	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function delete ($id)
	{
		$sql=$this->db->delete('sosial_pendidikan',array('id'=>$id));
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
	
	return $this->db->query("select * from sosial_pendidikan where BINARY nama_pendidikan='$data' ");

	}

	function search ($kata) {

		return $this->db->query("select * from sosial_pendidikan where nama_pendidikan like '%".$kata."%' ");
	}

}