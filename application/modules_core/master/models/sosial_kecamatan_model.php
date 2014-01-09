<?php
class Sosial_kecamatan_model extends CI_Model{
    
function Get_Kecamatan () {

        $d = $this->db->query("select * from sosial_kecamatan order by sosial_kecamatan.id_kecamatan ASC");
        return $d;
    }

    function insert($table,$data)
    {
        $this->db->insert($table,$data);
    }

    function delete ($id)
    {
        $sql=$this->db->delete('sosial_kecamatan',array('id_kecamatan'=>$id));
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
    
    return $this->db->query("select * from sosial_kecamatan where BINARY nama_kecamatan='$data' ");

    }

    function search ($kata) {

        return $this->db->query("select * from sosial_kecamatan where nama_kecamatan like '%".$kata."%' ");
    }




    /* function __construct() {
        parent::__construct();
        $this->table_name='sosial_kecamatan';
    }
    
    function read_data(){
        $sql = $this->db->get($this->table_name);
	if($sql->num_rows() > 0){			
	foreach($sql->result() as $row){
		$data[] = $row;
	}			
		return $data;
	} 
        else {
		return null;
	}
    }
    
    function search_data($searching_data){
	$sql = $this->db->query("SELECT *  FROM `sosial_kecamatan` WHERE `nama_kecamatan` LIKE '%$searching_data%'");
	if($sql->num_rows() > 0){
        foreach($sql->result() as $row){
		$data[] = $row;
	}
		return $data;
	}
	else{
		return null;
	}
    }
    
    function add_data($insert_data){
        $data = array(
            'nama_kecamatan'=>$insert_data
        );
        $this->db->insert($this->table_name,$data);
        if($this->db->affected_rows() > 0){
                 return true;
	} else{
		return false;
	}
    }
    
    function get_data($code){
	$this->db->where('id_kecamatan', $code);
	$query = $this->db->get($this->table_name);
	if($query->num_rows() > 0){
		return $query->row();
	}
	else{
		return null;
	}
    }
    
    function delete_data($code){
        $this->db->where('id_kecamatan',$code);
        $query = $this->db->delete($this->table_name);
        if($this->db->affected_rows() > 0){
                 return true;
	} else{
		return false;
	}
    }
    
    function update($code,$update_data){
        $data =array(
            'nama_kecamatan'=>$update_data
        );
        $this->db->where('id_kecamatan',$code);
        $query = $this->db->update($this->table_name,$data);
        if($this->db->affected_rows() > 0){
                 return true;
	} else{
		return false;
	}
    }

    */
        
}
