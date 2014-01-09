<?php 
class tbl_pasien_rawat_inap_model extends CI_Model {
	
	function cari_pasien($kata_kunci){
        return $this->db->query("select a.id_pasien,a.no_rm,a.nama_lengkap,a.umur,a.jenis_kelamin,a.alamat,a.no_hp
from tbl_pasien a where a.no_rm like '%".$kata_kunci."%' or a.nama_lengkap like '%".$kata_kunci."%' or a.no_identitas like '%".$kata_kunci."%'");
    }

    function get_kamar() {

    	return $this->db->query("select a.*,b.* from tbl_ruang_kamar a join tbl_kelas_kamar b on
    		a.kelas_kamar_id=b.id_kelas_kamar where a.status='0' ");
    }

    function dataregsama($pasien_id,$no_rm) {

        return $this->db->query("select a.* from tbl_pasien_rawat_inap a where a.pasien_id='$pasien_id' and a.no_rm='$no_rm'  ");
    }

    function insert($id_pasien,$tahun,$nama_lengkap,$no_rm,$umur,$jenis_kelamin,$alamat,$no_hp,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien,$kelas_kamar_id,$nama_kelas_kamar,$ruang_kamar_id,$nama_ruang_kamar){

		return $this->db->query("insert into tbl_pasien_rawat_inap values ('','$tahun','$id_pasien','$no_rm','$nama_lengkap','$umur',
			'$jenis_kelamin','$alamat','$no_hp','','','','','','','$nama_penanggung_jawab','$no_penanggung_jawab','$hubungan_dengan_pasien',
			'','','$kelas_kamar_id','$nama_kelas_kamar','$ruang_kamar_id','$nama_ruang_kamar') ");

	}

    function updatekamar($ruang_kamar_id2) {

       return $this->db->update("update tbl_ruang_kamar set status='1' where id_ruang_kamar='$ruang_kamar_id2'");

    }

    function Ambil_Data_Pasien($hariini) {
        return $this->db->query("select a.* from tbl_pasien_rawat_inap a where tgl_registrasi='$hariini' order by a.id_pasien_rawat_inap desc");
    }

    function Ambil_Data_Pasien_Detail($id_pasien_rawat_inap){

        return $this->db->query("select a.*,b.nama_ruang_kamar as nama_ruang_kamar,c.nama_kelas_kamar as nama_kelas_kamar from tbl_pasien_rawat_inap a join tbl_ruang_kamar b 
            on a.ruang_kamar_id=b.id_ruang_kamar join tbl_kelas_kamar c on b.kelas_kamar_id=c.id_kelas_kamar where a.id_pasien_rawat_inap='$id_pasien_rawat_inap' ");
    }

    function Ambil_Data_Pasien_Edit($id_pasien_rawat_inap){

        return $this->db->query("select a.*,b.nama_ruang_kamar as nama_ruang_kamar,c.nama_kelas_kamar as nama_kelas_kamar from tbl_pasien_rawat_inap a join tbl_ruang_kamar b 
            on a.ruang_kamar_id=b.id_ruang_kamar join tbl_kelas_kamar c on b.kelas_kamar_id=c.id_kelas_kamar where a.id_pasien_rawat_inap='$id_pasien_rawat_inap' ");
    }

    function delete($table,$id_pasien_rawat_inap) {

        return $this->db->delete($table,$id_pasien_rawat_inap);
    }

    function updatepasien($id_pasien_rawat_inap,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien) {

        return $this->db->query("update tbl_pasien_rawat_inap set nama_penanggung_jawab='$nama_penanggung_jawab' , no_penanggung_jawab='$no_penanggung_jawab' , hubungan_dengan_pasien='$hubungan_dengan_pasien' where id_pasien_rawat_inap='$id_pasien_rawat_inap' ");
    }

    function search($kata_kunci){
        return $this->db->query("select a.* from tbl_pasien_rawat_inap a where nama_lengkap like'%$kata_kunci%' order by a.id_pasien_rawat_inap desc");
    }

}