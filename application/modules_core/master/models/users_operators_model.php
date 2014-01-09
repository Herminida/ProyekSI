<?php
class users_operators_model extends CI_Model {

	public function getAllData () {

        return $this->db->query("select a.*,b.nama_users_groups 
			from users_operators a join users_groups b on a.users_groups_id=b.id  
			order by a.id ASC");
   
	}

	public function getAllDataLimited($limit,$offset)
    {

        return $this->db->query("select a.*,b.nama_users_groups 
			from users_operators a join users_groups b on a.users_groups_id=b.id 
			order by a.id ASC LIMIT $limit OFFSET $offset ");
       
    }

    public function Get_Users_Operators ($users_groups_id) {
		return $this->db->query("select * from users_operators where users_groups_id='$users_groups_id' ");
	}


	public function Get_UsersOperators () {
		return $this->db->query("select a.id as idoperators,a.nama_users_operators,a.users_groups_id,b.id,b.nama_users_groups from users_operators a join users_groups b on a.users_groups_id = b.id");
	}

	

	public function delete ($table,$data) {

		return $this->db->delete($table,$data);
	}

	public function insert ($table,$data) {

		return $this->db->insert($table,$data);
	}

	public function double ($data) {

		return $this->db->query("select * from users_operators where BINARY nama_users_operators='$data' ");
	}

	public function search ($kata) {

		return $this->db->query("select a.*,b.nama_users_groups 
			from users_operators a join users_groups b on a.users_groups_id=b.id
			where a.nama_users_operators like '%".$kata."%' or b.nama_users_groups like '%".$kata."%' ");
	}
	public function edit ($table,$data) {

		return $this->db->get_where($table,$data);
	}

	public function update ($table,$data,$field_key) {

		return $this->db->update($table,$data,$field_key);
		//echo $this->db->last_query();
	}

	

	

	

	
}