<?php
class ruang_kamar_model extends Ci_Model{
	function search($id_kelas_kamar){
		return $this->db->query("select * from tbl_ruang_kamar where kelas_kamar_id='$id_kelas_kamar' and status='0'");
	}
}
?>