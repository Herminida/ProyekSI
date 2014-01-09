<?php

class M_LB3 extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }
    function list_data_lb3($tahun, $id='') {
        $this->db->select('nama_kegiatan,sum(k.jml) as jml,
            (SELECT sum(k1.jml) from sik_t_kegiatan k1 WHERE k1.kegiatan = k.kegiatan AND MONTH(k1.tgl)=1) as jan,
            (SELECT sum(k2.jml) from sik_t_kegiatan k2 WHERE k2.kegiatan = k.kegiatan AND MONTH(k2.tgl)=2) as feb,
            (SELECT sum(k3.jml) from sik_t_kegiatan k3 WHERE k3.kegiatan = k.kegiatan AND MONTH(k3.tgl)=3) as mar,
            (SELECT sum(k4.jml) from sik_t_kegiatan k4 WHERE k4.kegiatan = k.kegiatan AND MONTH(k4.tgl)=4) as apr,
            (SELECT sum(k5.jml) from sik_t_kegiatan k5 WHERE k5.kegiatan = k.kegiatan AND MONTH(k5.tgl)=5) as mei,
            (SELECT sum(k6.jml) from sik_t_kegiatan k6 WHERE k6.kegiatan = k.kegiatan AND MONTH(k6.tgl)=6) as jun,
            (SELECT sum(k7.jml) from sik_t_kegiatan k7 WHERE k7.kegiatan = k.kegiatan AND MONTH(k7.tgl)=7) as jul,
            (SELECT sum(k8.jml) from sik_t_kegiatan k8 WHERE k8.kegiatan = k.kegiatan AND MONTH(k8.tgl)=8) as agu,
            (SELECT sum(k9.jml) from sik_t_kegiatan k9 WHERE k9.kegiatan = k.kegiatan AND MONTH(k9.tgl)=9) as sep,
            (SELECT sum(k10.jml) from sik_t_kegiatan k10 WHERE k10.kegiatan = k.kegiatan AND MONTH(k10.tgl)=10) as okt,
            (SELECT sum(k11.jml) from sik_t_kegiatan k11 WHERE k11.kegiatan = k.kegiatan AND MONTH(k11.tgl)=11) as nov,
            (SELECT sum(k12.jml) from sik_t_kegiatan k12 WHERE k12.kegiatan = k.kegiatan AND MONTH(k12.tgl)=12) as des
            ', false);
        $this->db->from('sik_t_kegiatan k');
        $this->db->join('m_kegiatan m', 'm.id_kegiatan = k.kegiatan');
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