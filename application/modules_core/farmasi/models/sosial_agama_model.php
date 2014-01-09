<?php
class sosial_agama_model extends CI_Model {

	function Ambil_Data_Agama() {

		return $this->db->query("select * from sosial_agama order by id desc");
	}

	function Get_Agama() {

		return $this->db->query("select * from sosial_agama order by id desc");
	}
}