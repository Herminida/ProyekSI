<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sosial_agama_model extends CI_Model {
	
	
	function Get_Agama () {

		$d = $this->db->query("select * from sosial_agama order by sosial_agama.id DESC");
		return $d;
	}

	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function delete ($id)
	{
		$sql=$this->db->delete('sosial_agama',array('id'=>$id));
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
	
	return $this->db->query("select * from sosial_agama where BINARY nama_agama='$data' ");

	}

	function search ($kata) {

		return $this->db->query("select * from sosial_agama where nama_agama like '%".$kata."%' ");
	}




}