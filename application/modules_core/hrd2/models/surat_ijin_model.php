<?php
class surat_ijin_model Extends Ci_Model{
	function getPegawai($kata_kunci){
		return $this->db->query("select a.*,b.* from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan where nama_pegawai like '%$kata_kunci%' or nip_pegawai like '%$kata_kunci%'");
	}

	function getDetailPegawai($id_pegawai){
		return $this->db->query("select a.*,b.* from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan where a.id_pegawai='$id_pegawai'");
	}
}
?>