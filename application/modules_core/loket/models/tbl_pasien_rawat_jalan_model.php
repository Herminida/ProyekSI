<?php 
class tbl_pasien_rawat_jalan_model extends CI_Model {
	
	function cari_pasien($kata_kunci){
        return $this->db->query("select a.id_pasien,a.no_rm,a.nama_lengkap,a.umur,a.jenis_kelamin,a.alamat,a.no_hp
from tbl_pasien a where a.no_rm like '%".$kata_kunci."%' or a.nama_lengkap like '%".$kata_kunci."%' or a.no_identitas like '%".$kata_kunci."%'");
    }

    function dataregsama($pasien_id,$no_rm,$tahun) {

        return $this->db->query("select a.*,b.nama_klinik as nama_klinik from tbl_pasien_rawat_jalan a join admission_klinik b on a.klinik_id=b.id where a.pasien_id='$pasien_id' and a.no_rm='$no_rm' and a.tgl_registrasi='$tahun'  ");
    }

    function insert($klinik,$id_pasien,$tahun,$nama_lengkap,$no_rm,$umur,$jenis_kelamin,$alamat,$no_hp,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien){

		return $this->db->query("insert into tbl_pasien_rawat_jalan values ('','$tahun','$id_pasien','$no_rm','$nama_lengkap','$umur',
			'$jenis_kelamin','$alamat','$no_hp','','','','','','','$nama_penanggung_jawab','$no_penanggung_jawab','$hubungan_dengan_pasien',
			'$klinik','') ");

	}

	function Ambil_Data_Pasien($hariini){

		return $this->db->query("select a.*,b.nama_klinik as nama_klinik from tbl_pasien_rawat_jalan a join admission_klinik b 
			on a.klinik_id=b.id where tgl_registrasi='$hariini' order by a.id_pasien_rawat_jalan desc");
	}

	function Ambil_Data_Pasien_Detail($id_pasien_rawat_jalan){

		return $this->db->query("select a.*,b.nama_klinik as nama_klinik from tbl_pasien_rawat_jalan a join admission_klinik b 
			on a.klinik_id=b.id where a.id_pasien_rawat_jalan='$id_pasien_rawat_jalan' ");
	}

	function Ambil_Data_Pasien_Edit($id_pasien_rawat_jalan){

		return $this->db->query("select a.*,b.nama_klinik as nama_klinik from tbl_pasien_rawat_jalan a join admission_klinik b 
			on a.klinik_id=b.id where a.id_pasien_rawat_jalan='$id_pasien_rawat_jalan' ");
	}

	function delete($table,$id_pasien_rawat_jalan) {

		return $this->db->delete($table,$id_pasien_rawat_jalan);
	}

	function updatepasien($id_pasien_rawat_jalan,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien,$klinik) {

		return $this->db->query("update tbl_pasien_rawat_jalan set nama_penanggung_jawab='$nama_penanggung_jawab' , no_penanggung_jawab='$no_penanggung_jawab' , hubungan_dengan_pasien='$hubungan_dengan_pasien',
		 klinik_id='$klinik' where id_pasien_rawat_jalan='$id_pasien_rawat_jalan' ");
	}

	function search($kata_kunci){
        return $this->db->query("select a.* from tbl_pasien_rawat_jalan a where nama_lengkap like'%$kata_kunci%' order by a.id_pasien_rawat_jalan desc");
    }
}