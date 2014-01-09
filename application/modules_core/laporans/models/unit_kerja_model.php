<?php 
class Unit_kerja_model extends CI_Model {

	public function Get_Unit_Kerja () {

		return $this->db->query('select * from unit_kerja order by id_unit_kerja desc');
	}
}