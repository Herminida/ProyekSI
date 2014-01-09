<?php

class M_Poliimun extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
   

	function createImunisasi($bcg=null,$hb07=null,$dpthb1=null,$pol1=null,$campak=null,$hb828=null,$dpthb2=null,$pol2=null,$dpthb3=null,$pol3=null,$pol4=null) {
        $this->db->set('bcg', $bcg);
        $this->db->set('hb0-7', $hb07);
        $this->db->set('dpt-hb1', $dpthb1);
        $this->db->set('pol1', $pol1);
        $this->db->set('campak', $campak);
        $this->db->set('hb8-28', $hb828);
        $this->db->set('dpt-hb2', $dpthb2);
        $this->db->set('pol2', $pol2);
        $this->db->set('dpt-hb3',$dpthb3);
        $this->db->set('pol3',$pol3);
        $this->db->set('pol4',$pol4);
        $this->db->insert('sik_imunisasi');
    }

    function updateImunisasi($id_imunisasi,$bcg=null,$hb07=null,$dpthb1=null,$pol1=null,$campak=null,$hb828=null,$dpthb2=null,$pol2=null,$dpthb3=null,$pol3=null,$pol4=null) {
  	    $this->db->set('bcg', $bcg);
        $this->db->set('hb0-7', $hb07);
        $this->db->set('dpt-hb1', $dpthb1);
        $this->db->set('pol1', $pol1);
        $this->db->set('campak', $campak);
        $this->db->set('hb8-28', $hb828);
        $this->db->set('dpt-hb2', $dpthb2);
        $this->db->set('pol2', $pol2);
        $this->db->set('dpt-hb3',$dpthb3);
        $this->db->set('pol3',$pol3);
        $this->db->set('pol4',$pol4);
        $this->db->where('id_imunisasi', $id_imunisasi);
        $this->db->update('sik_imunisasi');
    }
}
?>