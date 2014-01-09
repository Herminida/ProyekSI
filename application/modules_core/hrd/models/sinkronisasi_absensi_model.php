<?php
class sinkronisasi_absensi_model Extends Ci_Model{
	function get_Data($bulan,$tahun){
		return $this->db->query("select DISTINCT b.nama_pegawai,b.nip_pegawai from tbl_absensi a join pegawai b on a.nip_pegawai=b.nip_pegawai where month(a.tanggal_absensi)='$bulan' and year(a.tanggal_absensi)='$tahun'");

	}

	function get_absensi($nip_pegawai,$i,$bulan,$tahun){
		return $this->db->query("select nip_pegawai from tbl_absensi where nip_pegawai='$nip_pegawai' and day(tanggal_absensi)='$i' and month(tanggal_absensi)='$bulan' and year(tanggal_absensi)='$tahun'");
	}
}
?>