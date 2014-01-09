<?php 
class Users_model extends CI_Model {

	function insert($in)
	{
		$this->db->query("INSERT INTO tbl_users (username,password,nama,users_groups_id,telp,email,pegawai_id,users_operators_id)
			VALUES ('".$in['username']."', md5( '".$in['password']."'),'".$in['nama']."','".$in['users_groups_id']."','".$in['telp']."','".$in['email']."','".$in['pegawai_id']."','".$in['users_operators_id']."')
			");
	}

	function GetUsers () {

		return $this->db->query("select a.*,c.nama_unit_kerja,d.nama_users_groups,e.nama_users_operators
from tbl_users a join pegawai b on
a.pegawai_id = b.id_pegawai
join unit_kerja c on
b.fk_unit_kerja=c.id_unit_kerja
join users_operators e on
a.users_operators_id = e.id
join users_groups d on
e.users_groups_id = d.id
			");
	}

	function double ($datanama,$datausername,$datapassword) {

		return $this->db->query("select * from users where BINARY username='$datausername' or BINARY password='$datapassword' ");
	}

	function delete ($table,$field_key) {
		return $this->db->delete($table,$field_key);
	}

	function search($kata) {

		return $this->db->query("select a.*,c.nama_unit_kerja,d.nama_users_groups,e.nama_users_operators
from tbl_users a join pegawai b on
a.pegawai_id = b.id_pegawai
join unit_kerja c on
b.fk_unit_kerja=c.id_unit_kerja
join users_operators e on
a.users_operators_id = e.id
join users_groups d on
e.users_groups_id = d.id
			where a.nama like '%".$kata."%' or c.nama_unit_kerja like '%".$kata."%' or d.nama_users_groups like '%".$kata."%' or e.nama_users_operators like '%".$kata."%' 
			 ");

	}

	function searchpegawai($datanip,$datanama) {
		return $this->db->query("select a.*,b.nama_jabatan,c.nama_unit_kerja
						from pegawai a join jabatan b on a.fk_jabatan = b.id_jabatan
						join unit_kerja c on a.fk_unit_kerja = c.id_unit_kerja
						where a.nip_pegawai like '%".$datanip."%' or a.nama_pegawai like '%".$datanama."%' 
			");
	}



	 function edit ($table,$data) {

		return $this->db->get_where($table,$data);
	}

	 function update ($table,$data,$field_key) {

		return $this->db->update($table,$data,$field_key);
		//echo $this->db->last_query();
	}

	 function update_password($password,$id)
		{
			$q=$this->db->query("update tbl_users set password=md5('".$password."') where id='$id'");
			return $q;
		}
}