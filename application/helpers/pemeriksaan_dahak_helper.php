<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function jml_pasien_intensif_negatif($tgl_awal,$tgl_akhir,$tipe) {
    $res = 0;
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.id) as jml', false);
    $ci->db->from('tb_kpp k');
    $ci->db->join('sosial_anggota_keluarga p', 'p.no_rm = k.no_rm');
    $ci->db->join('tb_permohonan_lab pl', 'pl.no_rm_tb=k.no_rm_tb');
    $ci->db->join('tb_hasil_pemeriksaan_lab hpl', 'hpl.permohonan_lab=pl.id_permohonan_lab');
    $ci->db->join('tb_pemeriksaan_dahak dh', 'dh.no_reg=pl.register');
    $ci->db->where('bulan', '2');
    $ci->db->like('tipe_pasien', $tipe);
    $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $where = "(hasil_s1 = 'Negatif' AND hasil_p = 'Negatif' AND hasil_s2 = 'Negatif')";
    $ci->db->where($where);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_pasien_intensif_positif($tgl_awal,$tgl_akhir,$tipe) {
    $res = 0;
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.id) as jml', false);
    $ci->db->from('tb_kpp k');
    $ci->db->join('sosial_anggota_keluarga p', 'p.no_rm = k.no_rm');
    $ci->db->join('tb_permohonan_lab pl', 'pl.no_rm_tb=k.no_rm_tb');
    $ci->db->join('tb_hasil_pemeriksaan_lab hpl', 'hpl.permohonan_lab=pl.id_permohonan_lab');
    $ci->db->join('tb_pemeriksaan_dahak dh', 'dh.no_reg=pl.register');
    $ci->db->where('bulan', '2');
    $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $ci->db->like('tipe_pasien', $tipe);
    $where = "(hasil_s1 != 'Negatif' OR hasil_p != 'Negatif' OR hasil_s2 != 'Negatif')";
    $ci->db->where($where);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_pasien_intensif_hasil($tgl_awal,$tgl_akhir,$tipe,$hasil) {
    $res = 0;
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.id) as jml', false);
    $ci->db->from('tb_kpp k');
    $ci->db->join('sosial_anggota_keluarga p', 'p.no_rm = k.no_rm');
    $ci->db->join('tb_permohonan_lab pl', 'pl.no_rm_tb=k.no_rm_tb');
    $ci->db->join('tb_hasil_pemeriksaan_lab hpl', 'hpl.permohonan_lab=pl.id_permohonan_lab');
    $ci->db->join('tb_pemeriksaan_dahak dh', 'dh.no_reg=pl.register');
    $ci->db->where('bulan', '2');
    $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $ci->db->like('tipe_pasien', $tipe);
    $ci->db->like('hasil_akhir', $hasil);
    $where = "(hasil_s1 != 'Negatif' OR hasil_p != 'Negatif' OR hasil_s2 != 'Negatif')";
    $ci->db->where($where);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}
//end
?>