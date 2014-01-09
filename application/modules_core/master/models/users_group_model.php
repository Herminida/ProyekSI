<?php 
class Users_group_model extends CI_Model {

	public function Get_Users_Group () {

		return $this->db->query('select * from users_group order by id ASC');
	}
}