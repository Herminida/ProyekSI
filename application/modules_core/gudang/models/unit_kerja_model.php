<?php 
class Unit_kerja_model extends CI_Model {

	public function Get_Unit_Kerja ($kecuali) {

		return $this->db->query("select * from unit_kerja where id_unit_kerja NOT LIKE '%".$kecuali."%' order by id_unit_kerja desc");
	}

	public function Get_Unit_Kerja2 ($kecuali) {

		return $this->db->query("select * from unit_kerja where id_unit_kerja  LIKE '%".$kecuali."%' order by id_unit_kerja desc");
	}
}