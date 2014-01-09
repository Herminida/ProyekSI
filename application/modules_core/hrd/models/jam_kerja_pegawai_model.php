<?php
	class jam_kerja_pegawai_model Extends Ci_Model{
		function get_data(){
			return $this->db->query("select a.nama_pegawai,b.nama_jabatan,c.*,d.*,e.* from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan  join tbl_jam_kerja_pegawai c on a.id_pegawai=c.pegawai_id join tbl_shift d on c.shift_id=d.id_shift join tbl_jam_kerja e on d.id_shift=e.shift_id");
		}

		function get_pegawai($kata_kunci){
			return $this->db->query("select a.nama_pegawai,a.id_pegawai,b.nama_jabatan from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan where a.nip_pegawai like '%$kata_kunci%' or a.nama_pegawai like '%$kata_kunci%'");
		}

		function get_shift(){
			return$this->db->get('tbl_shift');
		}

		function double($id_pegawai){
			return $this->db->query("select * from tbl_jam_kerja_pegawai where pegawai_id='$id_pegawai'");
		}

		function add($insert){
			$this->db->insert('tbl_jam_kerja_pegawai',$insert);
		}

		function get_Detail($id_jam_kerja_pegawai){
			return $this->db->query("select a.nama_pegawai,a.id_pegawai,b.nama_jabatan,c.*,d.*,e.* from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan  join tbl_jam_kerja_pegawai c on a.id_pegawai=c.pegawai_id join tbl_shift d on c.shift_id=d.id_shift join tbl_jam_kerja e on d.id_shift=e.shift_id where c.id_jam_kerja_pegawai='$id_jam_kerja_pegawai'");
		}

		function update($id_jam_kerja_pegawai,$insert){
			$this->db->where('id_jam_kerja_pegawai',$id_jam_kerja_pegawai);
			$this->db->update('tbl_jam_kerja_pegawai',$insert);
		}

		function delete($id_jam_kerja_pegawai){
			$this->db->where('id_jam_kerja_pegawai',$id_jam_kerja_pegawai);
			$this->db->delete('tbl_jam_kerja_pegawai');
		}

		function search($kata_kunci){
			return $this->db->query("select a.nama_pegawai,a.id_pegawai,b.nama_jabatan,c.*,d.*,e.* from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan  join tbl_jam_kerja_pegawai c on a.id_pegawai=c.pegawai_id join tbl_shift d on c.shift_id=d.id_shift join tbl_jam_kerja e on d.id_shift=e.shift_id where a.nama_pegawai like '%$kata_kunci%' or a.nip_pegawai like '%$kata_kunci%'");
		}
	}
?>