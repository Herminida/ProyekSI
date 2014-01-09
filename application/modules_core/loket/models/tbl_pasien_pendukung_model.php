<?php 
class tbl_pasien_pendukung_model extends CI_Model {
	
	function cari_pasien($kata_kunci){
        return $this->db->query("select a.id_pasien,a.no_rm,a.nama_lengkap,a.umur,a.jenis_kelamin,a.alamat,a.no_hp
from tbl_pasien a where a.no_rm like '%".$kata_kunci."%' or a.nama_lengkap like '%".$kata_kunci."%' or a.no_identitas like '%".$kata_kunci."%'");
    }

    function dataregsama($pasien_id,$no_rm,$tahun) {

        return $this->db->query("select a.*,b.nama_pendukung as nama_pendukung from tbl_pasien_pendukung a join tbl_pendukung b on a.pendukung_id=b.id_pendukung where a.pasien_id='$pasien_id' and a.no_rm='$no_rm' and a.tgl_registrasi='$tahun'  ");
    }

    function insert($pendukung,$id_pasien,$tahun,$nama_lengkap,$no_rm,$umur,$jenis_kelamin,$alamat,$no_hp,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien){

		return $this->db->query("insert into tbl_pasien_pendukung values ('','$tahun','$id_pasien','$no_rm','$nama_lengkap','$umur',
			'$jenis_kelamin','$alamat','$no_hp','','','','','','','$nama_penanggung_jawab','$no_penanggung_jawab','$hubungan_dengan_pasien',
			'$pendukung','') ");

	}

	function Ambil_Data_Pasien($hariini){

		return $this->db->query("select a.*,b.nama_pendukung as nama_pendukung from tbl_pasien_pendukung a join tbl_pendukung b 
			on a.pendukung_id=b.id_pendukung where tgl_registrasi='$hariini' order by a.id_pasien_pendukung desc");
	}

	function Ambil_Data_Pasien_Detail($id_pasien_pendukung){

		return $this->db->query("select a.*,b.nama_pendukung as nama_pendukung from tbl_pasien_pendukung a join tbl_pendukung b 
			on a.pendukung_id=b.id_pendukung where a.id_pasien_pendukung='$id_pasien_pendukung' ");
	}

	function delete($table,$id_pasien_pendukung) {

		return $this->db->delete($table,$id_pasien_pendukung);
	}

	function Ambil_Data_Pasien_Edit($id_pasien_pendukung){

		return $this->db->query("select a.*,b.nama_pendukung as nama_pendukung from tbl_pasien_pendukung a join tbl_pendukung b 
			on a.pendukung_id=b.id_pendukung where a.id_pasien_pendukung='$id_pasien_pendukung' ");
	}

	function updatepasien($id_pasien_pendukung,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien,$pendukung) {

		return $this->db->query("update tbl_pasien_pendukung set nama_penanggung_jawab='$nama_penanggung_jawab' , no_penanggung_jawab='$no_penanggung_jawab' , hubungan_dengan_pasien='$hubungan_dengan_pasien',
		 pendukung_id='$pendukung' where id_pasien_pendukung='$id_pasien_pendukung' ");
	}

	function search($kata_kunci){
        return $this->db->query("select a.* from tbl_pasien_pendukung a where nama_lengkap like'%$kata_kunci%' order by a.id_pasien_pendukung desc");
    }
}