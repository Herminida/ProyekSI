<?php

class M_poligigi extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
   
	function createGigi($termal=null,$soundase=null,$percusi=null,$jaringan_lunak=null,$debris_indek=null,$calculus_indek=null,$status_localis=null,$ekstra_oral=null) {
        $this->db->set('termal', $termal);
        $this->db->set('soundase', $soundase);
        $this->db->set('percusi', $percusi);
        $this->db->set('jaringan_lunak', $jaringan_lunak);
        $this->db->set('debris_indek', $debris_indek);
        $this->db->set('calculus_indek', $calculus_indek);
        $this->db->set('status_localis', $status_localis);
        $this->db->set('ekstra_oral', $ekstra_oral);
        $this->db->insert('sik_gigi');
    }

    function updateGigi($register,$termal=null,$soundase=null,$percusi=null,$jaringan_lunak=null,$debris_indek=null,$calculus_indek=null,$status_localis=null,$ekstra_oral=null) {
  	    $this->db->set('termal', $termal);
        $this->db->set('soundase', $soundase);
        $this->db->set('percusi', $percusi);
        $this->db->set('jaringan_lunak', $jaringan_lunak);
        $this->db->set('debris_indek', $debris_indek);
        $this->db->set('calculus_indek', $calculus_indek);
        $this->db->set('status_localis', $status_localis);
        $this->db->set('ekstra_oral', $ekstra_oral);
        $this->db->where('register', $register);
        $this->db->update('sik_gigi');
    }
}
/*end*/