<?php
class Apt_satuan_model extends CI_Model {

	public function Get_Apt_Satuan () {

		return $this->db->query("select * from apt_satuan order by id_satuan DESC");
	}

	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function delete ($id)
	{
		$sql=$this->db->delete('apt_satuan',array('id_satuan'=>$id));
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
	
	return $this->db->query("select * from apt_satuan where BINARY nama_satuan='$data' ");

	}

	function search ($kata) {

		return $this->db->query("select * from apt_satuan where nama_satuan like '%".$kata."%' ");
	}

	
}
