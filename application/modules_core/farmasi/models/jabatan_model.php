<?php
class jabatan_model extends CI_Model {

	function Ambil_Data_Jabatan() {

		return $this->db->query("select * from jabatan   order by id_jabatan desc");
	}

	function Get_Jabatan() {

		return $this->db->query("select * from jabatan order by id_jabatan desc");
	}
}