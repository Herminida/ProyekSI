<?php

class M_Imun extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
   

    function simpanImun($bcg=null,$hb07=null,$dpthb1=null,$pol1=null,$campak=null,$hb828=null,$dpthb2=null,$pol2=null,$dpthb3=null,$pol3=null,$pol4=null,$ket=null,$register) {
        $this->db->set('bcg', $bcg);
        $this->db->set('campak', $campak);
        $this->db->set('hb0_7', $hb07);
        $this->db->set('hb8_28', $hb828);
        $this->db->set('dpt_hb1', $dpthb1);
        $this->db->set('dpt_hb2', $dpthb2);
        $this->db->set('dpt_hb3',$dpthb3);
        $this->db->set('pol1', $pol1);
        $this->db->set('pol2', $pol2);
        $this->db->set('pol3',$pol3);
        $this->db->set('pol4',$pol4);
        $this->db->set('ket',$ket);
        $this->db->set('register',$register);
        return $this->db->insert('sik_imunisasi');
    }

    function updateImun($bcg=null,$hb07=null,$dpthb1=null,$pol1=null,$campak=null,$hb828=null,$dpthb2=null,$pol2=null,$dpthb3=null,$pol3=null,$pol4=null,$ket=null,$register) {
        $this->db->set('bcg', $bcg);
        $this->db->set('campak', $campak);
        $this->db->set('hb0_7', $hb07);
        $this->db->set('hb8_28', $hb828);
        $this->db->set('dpt_hb1', $dpthb1);
        $this->db->set('dpt_hb2', $dpthb2);
        $this->db->set('dpt_hb3',$dpthb3);
        $this->db->set('pol1', $pol1);
        $this->db->set('pol2', $pol2);
        $this->db->set('pol3',$pol3);
        $this->db->set('pol4',$pol4);
        $this->db->set('ket',$ket);
        $this->db->where('register', $register);
         return $this->db->update('sik_imunisasi');
    }

    function getPemeriksaanImun($register){
        $this->db->select('id_imunisasi,bcg,hb0_7,dpt_hb1,pol1,campak,hb8_28,dpt_hb2,pol2,dpt_hb3,pol3,pol4,ket,register');
        $this->db->from('sik_imunisasi');
        $this->db->where('register',$register);
        $query  = $this->db->get();
        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return null;   
        }

    }

}
?>