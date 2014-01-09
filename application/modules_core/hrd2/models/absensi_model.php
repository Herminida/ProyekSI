<?php
	class absensi_model Extends Ci_model{
		function cek_pegawai($nip_pegawai){
			$this->db->where('nip_pegawai',$nip_pegawai);
			return $this->db->get("pegawai");
		}

		function cek_absen($nip_pegawai,$tanggal_sekarang){
			$this->db->where('nip_pegawai',$nip_pegawai);
			$this->db->where('tanggal_absensi',$tanggal_sekarang);
			return $this->db->get("tbl_absensi");
		}

		function add($insert){
			$this->db->insert('tbl_absensi',$insert);
		}

		function update($nip_pegawai,$insert){
			$this->db->where('nip_pegawai',$nip_pegawai);
			$this->db->update('tbl_absensi',$insert);
		}

		function getData(){
			$tanggal_sekarang=date('Y-m-d');
			return $this->db->query("select a.*,b.nama_pegawai from tbl_absensi a join pegawai b on a.nip_pegawai=b.nip_pegawai where a.tanggal_absensi='$tanggal_sekarang' order by a.id_absensi DESC limit 20 ");
		}
	}
?>