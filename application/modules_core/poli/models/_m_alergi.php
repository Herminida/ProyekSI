<?php

class M_Alergi extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
    
    function get_AlergiPasienByRM($rm,$start=null,$limit=null,$sort=null,$dir=null) {
        $this->db->select('id_alergi,no_rm,alergi_obat,tgl , date_format( time_alergi, "%e/%b/%Y %H:%i:%s" ) AS time_alergi, kronis_sebelumnya,kronis_keluarga',false);
        $this->db->from('pasien_alergi s');
        $this->db->where('no_rm', $no_rm);
        if (isset($dir) && isset($sort)) {
            $this->db->order_by($sort, $dir);
        }
        if (!empty($start) && !empty($limit)) {
            $this->db->limit($limit, $start);
        }
         $query = $this->db->get();
         $query = $query->result();
         return $query;
    }

    function createAlergi($no_rm=null,$nama=null,$alergi_obat=null,$kronis_sebelumnya=null,$kronis_keluarga=null) {
        $this->db->set('no_rm', $no_rm);
        $this->db->set('nama', $nama);
        $this->db->set('alergi_obat', $alergi_obat);
        $this->db->set('kronis_sebelumnya', $kronis_sebelumnya);
        $this->db->set('kronis_keluarga', $kronis_keluarga);
        $this->db->set('tgl', date('Y-m-d'));
        $this->db->insert('pasien_alergi');
    }

    function updateAlergi($id_alergi,$no_rm=null,$nama=null,$alergi_obat=null,$kronis_sebelumnya=null,$kronis_keluarga=null) {
        $this->db->set('no_rm', $no_rm);
        $this->db->set('nama', $nama);
        $this->db->set('alergi_obat', $alergi_obat);
        $this->db->set('kronis_sebelumnya', $kronis_sebelumnya);
        $this->db->set('kronis_keluarga', $kronis_keluarga);
        $this->db->set('tgl', date('Y-m-d'));
        $this->db->where('id_alergi', $id_alergi);
        $this->db->update('pasien_alergi');
    }

    function deleteAlergi($id_alergi) {
        $this->db->where('id_alergi', $id_alergi);
        $this->db->delete('pasien_alergi');
    }

}

?>
