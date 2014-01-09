<?php

class M_Kelurahan extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
   

    function getKelurahan() {
        $this->db->select('id_kelurahan,nama_kelurahan');
        $this->db->from('sosial_kelurahan skel');
        $this->db->join('sosial_kecamatan skec','skec.id_kecamatan=skel.id_kecamatan');
        $query =$this->db->get();
        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return false;   
        }
    }

}
?>