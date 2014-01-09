<?php
class jam_kerja_model Extends Ci_model{
	function GetData(){
		return $this->db->query("select a.*,b.* from tbl_jam_kerja a join tbl_shift b on a.shift_id=b.id_shift");
	}
	function insert($data){
		$this->db->insert('tbl_jam_kerja',$data);
	}
	function search ($id_jam_kerja){
		return $this->db->query("select * from tbl_jam_kerja where id_jam_kerja='$id_jam_kerja'");
	}

	function update($data,$id_jam_kerja){
		$this->db->where('id_jam_kerja',$id_jam_kerja);
		$this->db->update('tbl_jam_kerja',$data);
	}
	function deleteData($id_jam_kerja){
		$this->db->where('id_jam_kerja',$id_jam_kerja);
		$this->db->delete('tbl_jam_kerja');
	}

	function getShift(){
		return $this->db->get('tbl_shift');
	}
}
?>