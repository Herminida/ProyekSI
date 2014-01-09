<?php

class apt_supplier_model extends CI_Model {

	function getsupplier(){
		return $this->db->get('apt_supplier');
	}

	function insert($in)
	{
		$this->db->insert('apt_supplier',$in);
	}
	function insert2($table,$in)
	{
		$this->db->insert($table,$in);
	}

	function edit ($table,$data) {
	return $this->db->get_where($table, $data);

	}

	function delete($id_supplier){
		$this->db->where('id_supplier',$id_supplier);
		$this->db->delete('apt_supplier');
	}

	function deletesales($id_supplier){
		$this->db->where('supplier_id',$id_supplier);
		$this->db->delete('apt_sales');
	}

	function get_supplier($id_supplier){
		$this->db->where('id_supplier',$id_supplier);
		return $this->db->get('apt_supplier');
	}
	function get_supplier_nama($nama){
		$this->db->where('nama_supplier',$nama);
		return $this->db->get('apt_supplier');
	}

	function update($in,$id_supplier){
		$this->db->where('id_supplier',$id_supplier);
		return $this->db->update('apt_supplier',$in);
	}

	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}

	function detail($id_get){
		return $this->db->query("select *
			from  apt_supplier 
			where id_supplier='$id_get'");
		
	}

	function Get_Apt_Supplier () {
		return $this->db->query("select * from apt_supplier order by id_supplier desc");
	}
	
}
