<?php
class ruang_kamar_model extends Ci_Model{
	function getData(){
		return $this->db->query("select a.*,b.nama_kelas_kamar from tbl_ruang_kamar a join tbl_kelas_kamar b on a.kelas_kamar_id=b.id_kelas_kamar");
	}
	function double($data,$data2){
		$this->db->where('nama_ruang_kamar',$data);
		$this->db->where('kelas_kamar_id',$data2);
		return $this->db->get('tbl_ruang_kamar');
	}
	function insert($in){
		$this->db->insert('tbl_ruang_kamar',$in);
	}
	function search($pilih){
		return $this->db->query("select a.*,b.* from tbl_ruang_kamar a join tbl_kelas_kamar b on a.kelas_kamar_id=b.id_kelas_kamar where a.id_ruang_kamar='$pilih'");
	}
	function update($in,$id2){
		$this->db->where('id_ruang_kamar',$id2);
		$this->db->update('tbl_ruang_kamar',$in);
	}
	function delete($id){
		$this->db->where('id_ruang_kamar',$id);
		$this->db->delete('tbl_ruang_kamar');
	}

}
?>