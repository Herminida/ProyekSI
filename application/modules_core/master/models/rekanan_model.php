<?php
class rekanan_model extends Ci_Model{
	function getData(){
		return $this->db->get('tbl_rekanan');
	}

	function double($data){
		$this->db->where('nama_rekanan',$data);
		return $this->db->get('tbl_rekanan');
	}

	function insert($in){
		$this->db->insert('tbl_rekanan',$in);
	}

	function search($pilih){
		$this->db->where('id_rekanan',$pilih);
		return $this->db->get('tbl_rekanan');
	}

	function update($up,$id){
		$this->db->where('id_rekanan',$id);
		$this->db->update('tbl_rekanan',$up);
	}

	function delete($id){
		$this->db->where('id_rekanan',$id);
		$this->db->delete('tbl_rekanan');
	}
}
?>