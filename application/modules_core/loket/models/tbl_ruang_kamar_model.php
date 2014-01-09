<?php 
class tbl_ruang_kamar_model extends CI_Model {
	
	

    function updatekamar($ruang_kamar_ida) {

       return $this->db->query("update tbl_ruang_kamar set status='1' where id_ruang_kamar='$ruang_kamar_ida'");

    }



}