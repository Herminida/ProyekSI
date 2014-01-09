<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admission_klinik_model extends CI_Model {
	
	
	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function Ambil_Data_Admission() {

		return $this->db->query("select * from admission_klinik order by id desc");
	}

	function edit ($table,$data) {
	return $this->db->get_where($table, $data);

	}

	function Get_Klinik () {
        $data=$this->db->query('select * from admission_klinik order by id desc');
        return $data->result_array();   
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
	
	return $this->db->query("select * from admission_klinik where BINARY nama_klinik='$sama' ");

	}

	function update ($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}

}