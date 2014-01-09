<?php
class Sosial_kelurahan_model extends CI_Model{
    
    function Get_Kelurahan () {

        return $this->db->query("select *
                                from sosial_kelurahan a
                                join sosial_kecamatan b ON a.id_kecamatan = b.id_kecamatan
                                order by a.id_kecamatan, a.id_kelurahan");
    }

    function Get_Kelurahan_Kecamatan ($id_kecamatan) {
       return $this->db->query("select * from sosial_kelurahan where id_kecamatan ='$id_kecamatan' ");
        
    }

    function double ($nama_kelurahan,$id_kecamatan) {

        return $this->db->query ("select a.nama_kelurahan, a.id_kecamatan
            from sosial_kelurahan a join sosial_kecamatan b
            on a.id_kecamatan = b.id_kecamatan
            where a.nama_kelurahan = '$nama_kelurahan' and b.id_kecamatan='$id_kecamatan'");


    }

    function search ($kata) {

        return $this->db->query("select *
                                from sosial_kelurahan a
                                join sosial_kecamatan b ON a.id_kecamatan = b.id_kecamatan
                                where a.nama_kelurahan like '%".$kata."%' or b.nama_kecamatan like '%".$kata."%' ");
    }

    function insert ($table,$data) {

        $this->db->insert($table,$data);
    }

    function delete ($id) {

       return $this->db->delete('sosial_kelurahan',array('id_kelurahan'=>$id));
        
    }

    function edit ($table,$data) {

        return $this->db->get_where($table,$data);
    }

    function update ($table,$data,$field_key) {

        $this->db->update($table,$data,$field_key);
    }



    /*
    function __construct() {
        parent::__construct();
        $this->table_name='sosial_kelurahan';
    }
    
    function read_data($perPage,$uri) { //to get all data in tb_book
        $this->db->select('sosial_kecamatan.nama_kecamatan,
                           sosial_kelurahan.id_kelurahan,
                           sosial_kelurahan.nama_kelurahan');
        $this->db->from('sosial_kecamatan join sosial_kelurahan');
        $this->db->where('sosial_kecamatan.id_kecamatan = sosial_kelurahan.id_kecamatan');
        $this->db->order_by('id_kelurahan','DESC');
        $getData = $this->db->get('', $perPage, $uri);
        if($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;
        }
    
    function read_data_kecamatan(){
        $sql=$this->db->get('sosial_kecamatan');
        $options = array();
        $options['']="-Pilih Kecamatan-";
        foreach($sql->result_array() as $row) {
        $options[$row["id_kecamatan"]] = $row["nama_kecamatan"];
        }
        return $options;
    }
    
    function search_data($searching_data){
	$sql = $this->db->query("select 
                                 sosial_kecamatan.nama_kecamatan,
                                 sosial_kelurahan.id_kelurahan,
                                 sosial_kelurahan.nama_kelurahan
                                 from
                                 sosial_kecamatan join sosial_kelurahan
                                 where sosial_kecamatan.id_kecamatan=sosial_kelurahan.id_kecamatan AND
                                 sosial_kelurahan.nama_kelurahan LIKE '%$searching_data%'");
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
    
    function add_data($nama_kelurahan,$id_kecamatan){
        $data = array(
            'nama_kelurahan'=>$nama_kelurahan,
            'id_kecamatan'=>$id_kecamatan,
        );
        $this->db->insert($this->table_name,$data);
        if($this->db->affected_rows() > 0){
                 return true;
	} else{
		return false;
	}
    }
    
    function get_data($code){
	$this->db->where('id_kelurahan', $code);
	$query = $this->db->get($this->table_name);
	if($query->num_rows() > 0){
		return $query->row();
	}
	else{
		return null;
	}
    }
    
    function delete_data($code){
        $this->db->where('id_kelurahan',$code);
        $query = $this->db->delete($this->table_name);
        if($this->db->affected_rows() > 0){
                 return true;
	} else{
		return false;
	}
    }
    
    function update($code,$update_data,$id_update){
        $data =array(
            'nama_kelurahan'=>$update_data,
            'id_kecamatan'=>$id_update,
        );
        $this->db->where('id_kelurahan',$code);
        $query = $this->db->update($this->table_name,$data);
        if($this->db->affected_rows() > 0){
                 return true;
	} else{
		return false;
	}
    }
    */
        
}
