<?php

class M_LB4 extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }
        function list_data_lb4($tahun, $id='') {
        $this->db->select('*,sum(kegiatan) as jml', false);
        $this->db->from('sik_t_kegiatan k');
        $this->db->join('m_kegiatan m', 'm.id_kegiatan = k.kegiatan');
        $this->db->join('m_kegiatan_kategori mkk', 'm.kategori = mkk.id_kategori');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = k.unker');
        $this->db->order_by('nama_kegiatan');
        $this->db->group_by('kegiatan');
        if (!empty($id)) {
            $this->db->where('unker', $id);
        }
        $this->db->where('YEAR(tgl)', $tahun);
        $query= $this->db->get();
        return $query->result_array();
    }

    function list_tahun(){
        $this->db->distinct();
        $this->db->select('year(tgl) as tgl');
        $this->db->from('sik_t_kegiatan');
        $this->db->order_by('tgl','desc');
        $query= $this->db->get();
        return $query->result_array();

    }

}

?>