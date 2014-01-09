<?php

class M_Pemeriksaan extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
   


	function simpanPemeriksaan($keluhan_utama=null,$keluhan_sekunder=null,$respirasi=null,$suhu_badan=null,$denyut_nadi=null,$bb=null,$tb=null,$fisik=null,$register=null) {
        $this->db->set('keluhan_utama', $keluhan_utama);
        $this->db->set('keluhan_sekunder', $keluhan_sekunder);
        $this->db->set('respirasi', $respirasi);
        $this->db->set('suhu_badan', $suhu_badan);
        $this->db->set('denyut_nadi', $denyut_nadi);
        $this->db->set('bb', $bb);
        $this->db->set('tb', $tb);
        $this->db->set('fisik', $fisik);
        $this->db->set('register',$register);
        $this->db->insert('sik_pemeriksaan');
    }

    function updatePemeriksaan($id_pemeriksaan,$keluhan_utama=null,$keluhan_sekunder=null,$respirasi=null,$suhu_badan=null,$denyut_nadi=null,$bb=null,$tb=null,$fisik=null,$register=null) {
  		$this->db->set('keluhan_utama', $keluhan_utama);
        $this->db->set('keluhan_sekunder', $keluhan_sekunder);
        $this->db->set('respirasi', $respirasi);
        $this->db->set('suhu_badan', $suhu_badan);
        $this->db->set('denyut_nadi', $denyut_nadi);
        $this->db->set('bb', $bb);
        $this->db->set('tb', $tb);
        $this->db->set('fisik', $fisik);
        $this->db->set('register',$register);
        $this->db->where('id_pemeriksaan', $id_pemeriksaan);
        $this->db->update('sik_pemeriksaan');
    }
}
?>