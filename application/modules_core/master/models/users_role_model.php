<?php 
class Users_role_model extends CI_Model {

	public function Get_Users_Role () {

		return $this->db->query('select * from users_role order by id ASC');
	}
}