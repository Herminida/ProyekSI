<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tbl_pendukung_model extends CI_Model {
	
	

	 function Get_Pendukung () {
        $data=$this->db->query('select * from tbl_pendukung order by id_pendukung desc');
        return $data->result_array();   
    }

    function Get_Pendukung2 () {
        return $this->db->query("select * from tbl_pendukung order by id_pendukung desc");  
    }

    function insert($table,$data)
    {
        $this->db->insert($table,$data);
    }

    function Ambil_Data_Pendukung() {

        return $this->db->query("select * from tbl_pendukung order by id_pendukung desc");
    }

    function edit ($table,$data) {
    return $this->db->get_where($table, $data);

    }
    
    
    
    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

    function double ($sama) {
    
    return $this->db->query("select * from tbl_pendukung where BINARY nama_pendukung='$sama' ");

    }

    function update ($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
        
	

}