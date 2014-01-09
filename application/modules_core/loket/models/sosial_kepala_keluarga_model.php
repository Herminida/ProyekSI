<?php 

class sosial_kepala_keluarga_model extends CI_Model {

    function Get_Kk () {

          return $this->db->query("select * from sosial_kepala_keluarga order by sosial_kepala_keluarga.id DESC");
          
    }

    function Get_Kk_Limit ($limit, $offset) {

        return $this->db->get("sosial_kepala_keluarga",$limit, $offset);
    
    }

    public function getAllData()
    {
        return $this->db->query("select * from sosial_kepala_keluarga order by sosial_kepala_keluarga.id DESC");
    }
    
    public function getAllDataLimited($limit,$offset)
    {

        return $this->db->query("select * from sosial_kepala_keluarga  order by sosial_kepala_keluarga.id DESC LIMIT $limit OFFSET $offset ");
       
    }

    function insert($table,$data) {

        $this->db->insert($table,$data);
    }

    function double ($data) {

      return  $this->db->query("select * from sosial_kepala_keluarga where no_kk='$data' ");
    }

    function update ($table,$data,$field_key) {

         $this->db->update($table,$data,$field_key);
    }


    
    function add ($fields){
        $sql=$this->db->insert('sosial_kepala_keluarga',$fields);
        return $sql;
    }
    
    function edit ($table,$data) {
    return $this->db->get_where($table, $data);

    }

    function Get_Kk_id ($id) {

        return  $this->db->query("select * from sosial_kepala_keluarga where id='$id' ");
    }

     function Get_Kk_id2 ($id) {

        return  $this->db->query("select *
from sosial_kepala_keluarga
join sosial_kecamatan on sosial_kepala_keluarga.kecamatan_id = sosial_kecamatan.id_kecamatan
join sosial_kelurahan on sosial_kepala_keluarga.kelurahan_id = sosial_kelurahan.id_kelurahan where sosial_kepala_keluarga.id='$id' ");
    }

    function getidkk($no_kk){
            $this->db->where('no_kk',$no_kk);
           return  $this->db->get('sosial_kepala_keluarga');
        }
    
    
    function delete ($id){

        $sql=$this->db->delete('sosial_kepala_keluarga',array('no_kk'=>$id));
        return $sql;
    }

    function search ($kata) {

        return $this->db->query("select * from sosial_kepala_keluarga where nama_kk like '%".$kata."%' or no_kk like '%".$kata."%' ");
    }
    
   
    
    function getdetailkk($kk_id){
        $sql=$this->db->query("select kk.*,kelurahan.nama_kelurahan,kelurahan.kecamatan_id,kecamatan.nama_kecamatan from sosial_kepala_keluarga as kk,sosial_kelurahan as kelurahan,sosial_kecamatan as kecamatan where kk.id='".$kk_id."' and kelurahan.id=kk.kelurahan_id and kelurahan.kecamatan_id=kecamatan.id ");
        return $sql;
    }
    
    function getagama () {
            $d=$this->db->query("select * from sosial_agama order by sosial_agama.id ASC");
            return $d;
    }

    function getpekerjaan () {
            $d=$this->db->query("select * from sosial_pekerjaan order by sosial_pekerjaan.id ASC");
            return $d;
    }

    function getpendidikan () {
            $d=$this->db->query("select * from sosial_pendidikan order by sosial_pendidikan.id ASC");
            return $d;
    }

    function getstatusanggota () {
            $d=$this->db->query("select * from sosial_status_anggota order by sosial_status_anggota.id ASC");
            return $d;
    }
    
    
    function getkecamatan(){
            $result = $this->db->get('sosial_kecamatan');
            if ($result->num_rows() > 0 ){
                    return $result->result_array();	
            }
            else{
                    return array();	
            }
    }

    function getkelurahan($id_kecamatan){
            $this->db->where('kecamatan_id',$id_kecamatan);
            $result = $this->db->get('sosial_kelurahan');
            if ($result->num_rows() > 0 ){
                    return $result->result_array();	
            }
            else{
                    return array();	
            }
    }
    	
    public function getAllDataKk($table)
    {
            return $this->db->get($table);
    }
	
    public function getSelectedData($table,$data)
    {
            return $this->db->get_where($table, $data);
    }
        
    public function getById( $id ) {
            $id = intval( $id );
            $query = $this->db->where( 'id', $id )->limit( 1 )->get( 'sosial_kepala_keluarga' );
            if( $query->num_rows() > 0 ) {
                return $query->row();
            } else {
                return array();
            }
    }
    
    public function getAlls() {
        //get all records from users table
        
        $query = $this->db->query("SELECT * FROM sosial_kepala_keluarga ORDER BY id desc");
        
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
}