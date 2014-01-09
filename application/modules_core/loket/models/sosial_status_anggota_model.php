<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sosial_status_anggota_model extends CI_Model {

	function Get_Status_Anggota () {

		$d=$this->db->query("select * from sosial_status_anggota order by sosial_status_anggota.id DESC ");
		return $d;

	}
	
	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function delete ($id)
	{
		$sql=$this->db->delete('sosial_status_anggota',array('id'=>$id));
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
	
	return $this->db->query("select * from sosial_status_anggota where BINARY nama_status_anggota='$data' ");

	}

	function search ($kata) {

		return $this->db->query("select * from sosial_status_anggota where nama_status_anggota like '%".$kata."%' ");
	}

}