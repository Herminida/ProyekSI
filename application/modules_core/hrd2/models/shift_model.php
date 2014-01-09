<?php
class shift_model Extends Ci_model{
	function GetData(){
		return $this->db->get('tbl_shift');
	}
	function double($sama){
		return $this->db->query("select * from tbl_shift where BINARY nama_shift='$sama' ");
	}
	function insert($data){
		$this->db->insert('tbl_shift',$data);
	}
	function search ($id_shift){
		return $this->db->query("select * from tbl_shift where id_shift='$id_shift'");
	}

	function update($data,$id_shift){
		$this->db->where('id_shift',$id_shift);
		$this->db->update('tbl_shift',$data);
	}
	function deleteData($id_shift){
		$this->db->where('id_shift',$id_shift);
		$this->db->delete('tbl_shift');
	}
}
?>