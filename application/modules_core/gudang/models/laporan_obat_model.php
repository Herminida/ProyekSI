<?php

class Laporan_obat_model extends CI_Model {

public function GetData () {
	$this->db->select('a.nama_obat,qtt');
	$this->db->select('b.nama_obat_jenis');
	$this->db->select('c.nama_satuan');
	$this->db->from('farmasi_obats a');
	$this->db->join('farmasi_obat_jenis b', 'a.obat_jenis_id=b.id');
	$this->db->join('apt_satuan c', 'a.satuan_obat_id=c.id_satuan');

	return $this->db->get();
}
	

}