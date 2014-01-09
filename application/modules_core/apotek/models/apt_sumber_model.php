<?php

class apt_sumber_model extends CI_Model {
	function insert($nama){
		$in['nama_sumber']=$nama;
		$this->db->insert('apt_sumber',$in);
	}
	function get_sumber_nama($nama){
		$this->db->where('nama_sumber',$nama);
		return $this->db->get('apt_sumber');
	}
	function delete($id){
		$this->db->where('id_sumber',$id);
		$this->db->delete('apt_sumber');
	}
	function get_nama($id_get){
		$this->db->where('id_sumber',$id_get);
		return $this->db->get('apt_sumber');
	}
	function update($id_sumber,$nama_sumber){
		$this->db->where('id_sumber',$id_sumber);
		$nama['nama_sumber']=$nama_sumber;
		$this->db->update('apt_sumber',$nama);
	}

	function Get_Apt_Sumber () {
		return $this->db->query("select * from apt_sumber order by id_sumber desc");
	}
}
