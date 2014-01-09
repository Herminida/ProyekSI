<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class riwayat_pegawai_model extends CI_Model {
	
	
	function insert($nama_pegawai,$nip_pegawai,$fk_jabatan,$status,$jenis_kelamin,$tempat_lahir,$tgl_lahir,$agama_id,$alamat,$email,$telepon,$gambar){

		return $this->db->query("insert into pegawai values ('','$nama_pegawai','$nip_pegawai','$fk_jabatan','','',
			'$status','$jenis_kelamin','$tempat_lahir','$tgl_lahir','$agama_id','$alamat','$email','$telepon','$gambar') ");

	}

	function insert2($nama_pegawai,$nip_pegawai,$fk_jabatan,$status,$jenis_kelamin,$tempat_lahir,$tgl_lahir,$agama_id,$alamat,$email,$telepon){

		return $this->db->query("insert into pegawai values ('','$nama_pegawai','$nip_pegawai','$fk_jabatan','','',
			'$status','$jenis_kelamin','$tempat_lahir','$tgl_lahir','$agama_id','$alamat','$email','$telepon','') ");

	}

	function Ambil_Data_Pegawai() {

		return $this->db->query("select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan 
			join sosial_agama c on a.agama_id = c.id order by a.id_pegawai desc");
	}

	function edit ($table,$data) {
	return $this->db->get_where($table, $data);

	}

	function dataregsama($nip_pegawai) {

        return $this->db->query("select a.* from pegawai a where a.nip_pegawai='$nip_pegawai'  ");
    }
	
	
	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function deleteData($table,$data)
	{
		$this->db->delete($table,$data);
	}

	function double ($sama) {
	
	return $this->db->query("select * from pegawai where BINARY nama_pegawai='$sama' ");

	}

	function update ($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}

	function Ambil_Data_Pegawai2 ($id_pegawai) {

		return $this->db->query("select a.*,DATE_FORMAT(a.tgl_lahir,'%d %b %Y') as tanggal,DATE_FORMAT(a.tgl_lahir,'%Y') as thn,DATE_FORMAT(a.tgl_lahir,'%m') as bln,DATE_FORMAT(a.tgl_lahir,'%d') as tgl,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a
			join jabatan b on a.fk_jabatan=b.id_jabatan join sosial_agama c on a.agama_id=c.id
			where a.id_pegawai='$id_pegawai' ");

	}

	function gettanggal ($id_pegawai) {
      return  $this->db->query("select year (tgl_lahir) as thn, month (tgl_lahir) as bln,day(tgl_lahir) as tgl from pegawai where id_pegawai='$id_pegawai' ");
    }

    function search ($kata) {

		return $this->db->query("select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan 
			join sosial_agama c on a.agama_id = c.id
			where a.nip_pegawai like '%".$kata."%' or a.nama_pegawai like '%".$kata."%' or a.telepon like '%".$kata."%' or b.nama_jabatan like '%".$kata."%'  ");
	}

	



}