<?php

class M_LB1 extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }
    function list_data_lb1($unker='',$tgl_awal, $tgl_akhir) {
        $this->db->select('tanggal_registrasi,icd,nama_penyakit,(SELECT count(idpemeriksaan) FROM admission_registrasi p WHERE p.anggota_keluarga_id = s.id and sex="l") as jml_pria,
            (SELECT count(idpemeriksaan) FROM admission_registrasi p WHERE p.anggota_keluarga_id = s.id and sex="p") as jml_wanita', false);
        $this->db->from('sik_diagnosa d');
        $this->db->join('icd_penyakit pen','pen.id=d.icd');
        $this->db->join('admission_registrasi k', 'k.idpemeriksaan = d.register');
        $this->db->join('sosial_anggota_keluarga s', 'k.anggota_keluarga_id = s.id');
        $this->db->order_by('tanggal_registrasi');
        $this->db->group_by('icd');
        if (!empty($unker)) {
            $this->db->where('unit_kerja_id', $unker);
        }
        $this->db->where('DATE(tanggal_registrasi) >=', $tgl_awal);
        $this->db->where('DATE(tanggal_registrasi) <=', $tgl_akhir);
        $query= $this->db->get();
        return $query->result_array();
    }

}

?>