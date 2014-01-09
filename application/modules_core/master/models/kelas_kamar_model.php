<?php
class kelas_kamar_model extends Ci_Model{
	function getData(){
		return $this->db->get('tbl_kelas_kamar');
	}

	function double($data){
		$this->db->where('nama_kelas_kamar',$data);
		return $this->db->get('tbl_kelas_kamar');
	}

	function insert($in){
		$this->db->insert('tbl_kelas_kamar',$in);
	}

	function search($pilih){
		$this->db->where('id_kelas_kamar',$pilih);
		return $this->db->get('tbl_kelas_kamar');
	}

	function update($up,$id){
		$this->db->where('id_kelas_kamar',$id);
		$this->db->update('tbl_kelas_kamar',$up);
	}

	function delete($id){
		$this->db->where('id_kelas_kamar',$id);
		$this->db->delete('tbl_kelas_kamar');
	}
}
?>