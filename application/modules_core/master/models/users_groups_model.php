<?php
class Users_groups_model extends CI_Model {

	public function GetUsersGroups () {
		return $this->db->get("users_groups");
	}
	

	public function insert($table,$data) {

		return $this->db->insert($table,$data);

	}

	public function delete ($table,$field_key) {
		return $this->db->delete($table,$field_key);
	}

	public function double ($sama) {
		return $this->db->query("select * from users_groups where BINARY nama_users_groups='$sama' ");
	}

	public function search ($kata) {
		return $this->db->query("select * from users_groups where nama_users_groups like '%".$kata."%' ");
	}

	public function edit ($table,$field_key) {
		return $this->db->get_where($table,$field_key);
	}

	public function update ($table,$data,$field_key) {
		return $this->db->update($table,$data,$field_key);
	}
}