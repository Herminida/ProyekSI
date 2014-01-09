<?php
class rekening_model extends Ci_Model{
	function getData(){
		return $this->db->get('tbl_rekening');
	}

	function double($data){
		$this->db->where('nama_rekening',$data);
		return $this->db->get('tbl_rekening');
	}

	function insert($in){
		$this->db->insert('tbl_rekening',$in);
	}

	function search($pilih){
		$this->db->where('id_rekening',$pilih);
		return $this->db->get('tbl_rekening');
	}

	function update($up,$id){
		$this->db->where('id_rekening',$id);
		$this->db->update('tbl_rekening',$up);
	}

	function delete($id){
		$this->db->where('id_rekening',$id);
		$this->db->delete('tbl_rekening');
	}
}
?>