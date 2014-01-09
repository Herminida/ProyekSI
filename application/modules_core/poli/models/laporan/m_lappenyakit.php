<?php

class M_LapPenyakit extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }

    function list_data_teratas($unker='',$tgl_awal, $tgl_akhir) {
        $this->db->select('count(icd) as jml,icd,nama_penyakit,kode_penyakit', false);
        $this->db->from('admission_registrasi ar');
        $this->db->join('sik_diagnosa d', 'ar.idpemeriksaan = d.register');
        $this->db->join('icd_penyakit pen', 'pen.id=d.icd');
        $this->db->order_by('count(icd)','DESC');
        $this->db->group_by('d.icd');
        if (!empty($unker)) {
            $this->db->where('unit_kerja_id', $unker);
        }
        $this->db->where('DATE(tanggal_registrasi) >=', $tgl_awal);
        $this->db->where('DATE(tanggal_registrasi) <=', $tgl_akhir);
        $this->db->limit('10');
        $query=$this->db->get();
        return $query->result_array();
    }

    function ajaxDataPenyakit() {

        $this->db->select('pen.id,nama_penyakit,count(icd) as jml', false);
        $this->db->from('admission_registrasi k');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = k.unit_kerja_id');
        $this->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
        $this->db->join('icd_penyakit pen', 'pen.id=d.icd');
        $this->db->order_by('count(icd)', 'DESC');
        $this->db->group_by('d.icd');
        $this->db->where('DATE(tanggal_registrasi) >=', $this->input->get('tgl_awal'));
        $this->db->where('DATE(tanggal_registrasi) <=', $this->input->get('tgl_akhir'));
        if (!empty($start) && !empty($limit)) {
            $this->db->limit($limit, $start);
        }
        $query= $this->db->get();
        return $query->result_array();
    }
}
        
?>
