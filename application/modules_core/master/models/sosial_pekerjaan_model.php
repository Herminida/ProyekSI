<?php

class Sosial_pekerjaan_model extends CI_Model {

    function Get_Pekerjaan () {

        $d = $this->db->query ("select * from sosial_pekerjaan order by sosial_pekerjaan.id DESC");
        return $d;

    }

    function insert($table,$data)
    {
        $this->db->insert($table,$data);
    }

    function delete ($id)
    {
        $sql=$this->db->delete('sosial_pekerjaan',array('id'=>$id));
        return $sql;
    }

    function edit ($table,$data) {
    return $this->db->get_where($table, $data);

    }

    function update ($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

    function double ($data) {
    
    return $this->db->query("select * from sosial_pekerjaan where BINARY nama_pekerjaan='$data' ");

    }

    function search ($kata) {

        return $this->db->query("select * from sosial_pekerjaan where nama_pekerjaan like '%".$kata."%' ");
    }
    
    /*
    public function getAllData ($table) {
        return $this->db->get($table);
    }
	
	public function getAllDataLimited($table,$limit,$offset)
	{
		return $this->db->get($table, $limit, $offset);
	}
    
    function insertData($table,$data){
		$this->db->insert($table,$data);
    }
    
    function deleteData ($table,$data) {
        $this->db->delete($table,$data);
    }
    
    function getSelectedData ($table,$data) {
        return $this->db->get_where($table,$data);
    }
    
    function updateData ($table,$data,$field_key) {
        $this->db->update($table,$data,$field_key);
    }

    */
        
        
}
