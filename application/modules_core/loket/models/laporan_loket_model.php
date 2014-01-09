<?php
class laporan_loket_model Extends Ci_model{
	function laporan_pasien_umum_perhari($tanggal,$bulan,$tahun){
		return $this->db->query("select * from tbl_pasien where day(tanggal_registrasi)='$tanggal' and  month(tanggal_registrasi)='$bulan' and year(tanggal_registrasi)='$tahun' and nama_rekanan='' and nama_jabatan='' and nama_ptpn=''");
	}
	function laporan_pasien_umum_perbulan($bulan,$tahun){
		return $this->db->query("select * from tbl_pasien where  month(tanggal_registrasi)='$bulan' and year(tanggal_registrasi)='$tahun' and nama_rekanan='' and nama_jabatan='' and nama_ptpn=''");	
	}

	function laporan_pasien_rekanan_perhari($tanggal,$bulan,$tahun){
		return $this->db->query("select * from tbl_pasien where day(tanggal_registrasi)='$tanggal' and  month(tanggal_registrasi)='$bulan' and year(tanggal_registrasi)='$tahun' and nama_rekanan !='' and nama_jabatan='' and nama_ptpn=''");
	}
	function laporan_pasien_rekanan_perbulan($bulan,$tahun){
		return $this->db->query("select * from tbl_pasien where month(tanggal_registrasi)='$bulan' and year(tanggal_registrasi)='$tahun' and nama_rekanan !='' and nama_jabatan='' and nama_ptpn=''");	
	}

	function laporan_pasien_internal_perhari($tanggal,$bulan,$tahun){
		return $this->db->query("select * from tbl_pasien where day(tanggal_registrasi)='$tanggal' and  month(tanggal_registrasi)='$bulan' and year(tanggal_registrasi)='$tahun' and nama_rekanan='' and nama_jabatan !='' and nama_ptpn=''");
	}
	function laporan_pasien_internal_perbulan($bulan,$tahun){
		return $this->db->query("select * from tbl_pasien where month(tanggal_registrasi)='$bulan' and year(tanggal_registrasi)='$tahun' and nama_rekanan='' and nama_jabatan !='' and nama_ptpn=''");	
	}

	function laporan_pasien_ptpn_perhari($tanggal,$bulan,$tahun){
		return $this->db->query("select * from tbl_pasien where day(tanggal_registrasi)='$tanggal' and  month(tanggal_registrasi)='$bulan' and year(tanggal_registrasi)='$tahun' and nama_rekanan='' and nama_jabatan='' and nama_ptpn !=''");
	}
	function laporan_pasien_ptpn_perbulan($bulan,$tahun){
		return $this->db->query("select * from tbl_pasien where month(tanggal_registrasi)='$bulan' and year(tanggal_registrasi)='$tahun' and nama_rekanan='' and nama_jabatan='' and nama_ptpn !=''");	
	}
}
?>