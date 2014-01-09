<?php

class Model_supplyer extends CI_Model {

	

	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}

		
}