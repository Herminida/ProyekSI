<?php

class M_Dokter extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
   

    function getDokter($klinik_id) {
        $this->db->select('nik_dokter,nama_dokter');
        $this->db->from('dokter d');
        $query =$this->db->get();
        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return false;   
        }
    }

}
?>