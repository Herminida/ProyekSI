<?php
class Jabatan_model extends CI_Model {

	public function GetJabatan () {
		return $this->db->get("jabatan");
	}

	public function insert($table,$data) {

		return $this->db->insert($table,$data);

	}

	public function delete ($table,$field_key) {
		return $this->db->delete($table,$field_key);
	}

	public function double ($sama) {
		return $this->db->query("select * from jabatan where BINARY nama_jabatan='$sama' ");
	}

	public function search ($kata) {
		return $this->db->query("select * from jabatan where nama_jabatan like '%".$kata."%' ");
	}

	public function edit ($table,$field_key) {
		return $this->db->get_where($table,$field_key);
	}

	public function update ($table,$data,$field_key) {
		return $this->db->update($table,$data,$field_key);
	}
}