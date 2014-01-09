<?php

function jml_pasien_baru_triwulan($umur1, $umur2, $kel,$tgl_awal,$tgl_akhir) {
    $res = 0;
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.id) as jml', false);
    $ci->db->from('tb_kpp k');
    $ci->db->join('sosial_anggota_keluarga p', 'p.no_rm = k.no_rm');
    $ci->db->join('tb_permohonan_lab pl', 'pl.no_rm_tb=k.no_rm_tb');
    $ci->db->join('tb_hasil_pemeriksaan_lab hpl', 'hpl.permohonan_lab=pl.id_permohonan_lab');
    $ci->db->join('tb_pemeriksaan_dahak dh', 'dh.no_reg=pl.register');
    $ci->db->where('bulan', '0');
    if (empty($no_umur)) {
        $ci->db->where('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) >=', $umur1);
        $ci->db->where('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) <=', $umur2);
    }
//    $ci->db->where('klasifikasi !=', 'Extra Paru');

    $ci->db->where('sex', $kel);
    $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $ci->db->where('tipe_pasien', 'Baru (B)');
//    $where = "(hasil_s1 != 'Negatif' OR hasil_p != 'Negatif' OR hasil_s2 != 'Negatif')";
//    $ci->db->where($where);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_pasien_baru_triwulan_positif($umur1, $umur2, $kel,$tgl_awal,$tgl_akhir,$no_umur='') {
    $res = 0;
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.id) as jml', false);
    $ci->db->from('tb_kpp k');
    $ci->db->join('sosial_anggota_keluarga p', 'p.no_rm = k.no_rm');
    $ci->db->join('tb_permohonan_lab pl', 'pl.no_rm_tb=k.no_rm_tb');
    $ci->db->join('tb_hasil_pemeriksaan_lab hpl', 'hpl.permohonan_lab=pl.id_permohonan_lab');
    $ci->db->join('tb_pemeriksaan_dahak dh', 'dh.no_reg=pl.register');
    $ci->db->where('bulan', '0');
    if (empty($no_umur)) {
        $ci->db->where('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) >=', $umur1);
        $ci->db->where('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) <=', $umur2);
    }
    $ci->db->where('klasifikasi !=', 'Extra Paru');
     $ci->db->where('DATE(tgl) >=', $tgl_awal);
     $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $ci->db->where('sex', $kel);
    $ci->db->where('tipe_pasien', 'Baru (B)');
        $where = "(hasil_s1 != 'Negatif' OR hasil_p != 'Negatif' OR hasil_s2 != 'Negatif')";
    $ci->db->where($where);
    $data = $ci->db->get();

    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_pasien_baru_triwulan_negatif($umur1, $umur2, $kel,$tgl_awal,$tgl_akhir, $no_umur='') {
    $res = 0;
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.id) as jml', false);
    $ci->db->from('tb_kpp k');
    $ci->db->join('sosial_anggota_keluarga p', 'p.no_rm = k.no_rm');
    $ci->db->join('tb_permohonan_lab pl', 'pl.no_rm_tb=k.no_rm_tb');
    $ci->db->join('tb_hasil_pemeriksaan_lab hpl', 'hpl.permohonan_lab=pl.id_permohonan_lab');
    $ci->db->join('tb_pemeriksaan_dahak dh', 'dh.no_reg=pl.register');
    $ci->db->where('bulan', '0');
    if (empty($no_umur)) {
        $ci->db->where('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) >=', $umur1);
        $ci->db->where('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) <=', $umur2);
    }
    $ci->db->where('sex', $kel);
    $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $ci->db->where('tipe_pasien', 'Baru (B)');
    $ci->db->where('klasifikasi !=', 'Extra Paru');
    $where = "(hasil_s1 = 'Negatif' AND hasil_p = 'Negatif' AND hasil_s2 = 'Negatif')";
    $ci->db->where($where);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_pasien_baru_triwulan_extra($umur1, $umur2, $kel,$tgl_awal,$tgl_akhir, $no_umur='') {
    $res = 0;
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.id) as jml', false);
    $ci->db->from('tb_kpp k');
    $ci->db->join('sosial_anggota_keluarga p', 'p.no_rm = k.no_rm');
    $ci->db->join('tb_permohonan_lab pl', 'pl.no_rm_tb=k.no_rm_tb');
    $ci->db->join('tb_hasil_pemeriksaan_lab hpl', 'hpl.permohonan_lab=pl.id_permohonan_lab');
    $ci->db->join('tb_pemeriksaan_dahak dh', 'dh.no_reg=pl.register');
    $ci->db->where('bulan', '0');
    if (empty($no_umur)) {
        $ci->db->where('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) >=', $umur1);
        $ci->db->where('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) <=', $umur2);
    }
    $ci->db->where('sex', $kel);
    $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $ci->db->where('tipe_pasien', 'Baru (B)');
    $ci->db->where('klasifikasi', 'Extra Paru');
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_pasien_ulang($tipe, $umur1, $umur2, $kel,$tgl_awal,$tgl_akhir, $no_umur='') {
    $res = 0;
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.id) as jml', false);
    $ci->db->from('tb_kpp k');
    $ci->db->join('sosial_anggota_keluarga p', 'p.no_rm = k.no_rm');
    if (empty($no_umur)) {
        $ci->db->where('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) >=', $umur1);
        $ci->db->where('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) <=', $umur2);
    }

    $ci->db->where('sex', $kel);
        $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    if ($tipe != '1')
        $ci->db->like('tipe_pasien', $tipe);

    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_pasien_ulang_all($umur1, $umur2, $kel,$tgl_awal,$tgl_akhir, $no_umur='') {
    $res = 0;
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.id) as jml', false);
    $ci->db->from('tb_kpp k');
    $ci->db->join('sosial_anggota_keluarga p', 'p.no_rm = k.no_rm');
    if (empty($no_umur)) {
        $ci->db->where('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) >=', $umur1);
        $ci->db->where('(YEAR(CURDATE()) - YEAR(tanggal_lahir)) <=', $umur2);
    }


    $ci->db->where('sex', $kel);
    $ci->db->where('tipe_pasien !=', 'Baru (B)');
    $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}


?>