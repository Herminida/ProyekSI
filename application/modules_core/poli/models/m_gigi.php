<?php

class M_Gigi extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }
    function list_data() {
        $this->db->select('*,sum(qtt_order) as qtt_order,(harga_sp * sum(api.qtt_order)) as total');
        $this->db->from('pasien_pemeriksaan');
        $this->db->join('penjualan_header ap', 'ap.id_penjualan = api.id_penjualan', 'left');
        $this->db->join('item ai', 'ai.id_item = api.id_item', 'left');
        $this->db->join('jenis aj', 'aj.id_jenis = ai.fk_jenis', 'left');
        $this->db->where('api.id_penjualan', $this->input->post('id_penjualan'));
        $this->db->where('api.stat', '1');
        $this->db->group_by("ai.id_item,harga_sp");
        if (isset($_POST['dir']) && isset($_POST['sort'])) {
            $this->db->order_by($_POST['sort'], $_POST['dir']);
        }

        $this->db->limit($limit, $start);

        return $this->db->get();
    }

    function simpanGigi($termal=null,$soundase=null,$percusi=null,$druk=null, $jaringan_lunak=null,$debris_index=null,$calculus_index=null,$status_localis=null,$ekstra_oral=null,$register) {
            $this->db->set('termal', $termal);
            $this->db->set('soundase', $soundase);
            $this->db->set('percusi', $percusi);
            $this->db->set('druk', $druk);
            $this->db->set('jaringan_lunak', $jaringan_lunak);
            $this->db->set('debris_indek', $debris_index);
            $this->db->set('calculus_indek', $calculus_index);
            $this->db->set('status_localis', $status_localis);
            $this->db->set('ekstra_oral', $ekstra_oral);
            $this->db->set('register', $register);
            return $this->db->insert('sik_gigi');
    }

    function updateGigi($termal=null,$soundase=null,$percusi=null,$druk=null, $jaringan_lunak=null,$debris_index=null,$calculus_index=null,$status_localis=null,$ekstra_oral=null,$register) {
        $this->db->set('termal', $termal);
        $this->db->set('soundase', $soundase);
        $this->db->set('percusi', $percusi);
        $this->db->set('druk', $druk);
        $this->db->set('jaringan_lunak', $jaringan_lunak);
        $this->db->set('debris_indek', $debris_index);
        $this->db->set('calculus_indek', $calculus_index);
        $this->db->set('status_localis', $status_localis);
        $this->db->set('ekstra_oral', $ekstra_oral);
        $this->db->where('register', $register);
        return $this->db->update('sik_gigi');
    }

    function getPemeriksaanGigi($idpemeriksaan){
        $this->db->select('id_gigi, register, termal, soundase, percusi, druk, jaringan_lunak, debris_indek, calculus_indek, status_localis, ekstra_oral');
        $this->db->from('sik_gigi');
        $this->db->where('register',$idpemeriksaan);
        $query = $this->db->get();
         if ($query->num_rows()>0){
            return $query->result();
        }else{
            return null;   
        }
    }

}

?>
