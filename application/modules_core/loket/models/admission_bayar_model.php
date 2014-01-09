<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admission_bayar_model extends CI_Model {
	
        public function getAllBayar()
	{
		$sql=$this->db->get("admission_bayar");
                return $sql;
	}
  
	function Get_Admission_Bayar() {

		$d = $this->db->query("select * from admission_bayar order by admission_bayar.cara_bayar ASC");
		return $d;
	}
	
	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function delete ($id)
	{
		$sql=$this->db->delete('admission_bayar',array('id'=>$id));
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
	
	return $this->db->query("select * from admission_bayar where BINARY cara_bayar='$data' ");

	}

	function search ($kata) {

		return $this->db->query("select * from admission_bayar where cara_bayar like '%".$kata."%' ");
	}




}