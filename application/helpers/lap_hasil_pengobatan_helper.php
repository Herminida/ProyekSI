<?php


function jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,$hasil='') {
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
    $ci->db->where('klasifikasi !=', 'Extra Paru');
    if (!empty($hasil)) {
        $ci->db->like('k.hasil_akhir', $hasil);
    }
    $ci->db->where('tipe_pasien', 'Baru (B)');
    $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $where = "(hasil_s1 != 'Negatif' OR hasil_p != 'Negatif' OR hasil_s2 != 'Negatif')";
    $ci->db->where($where);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return '';
    }
}

function jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,$hasil='') {
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
    $ci->db->where('klasifikasi !=', 'Extra Paru');
    if (!empty($hasil)) {
        $ci->db->where('hasil_akhir', $hasil);
    }
    $ci->db->where('tipe_pasien', 'Baru (B)');
     $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $where = "(hasil_s1 = 'Negatif' AND hasil_p = 'Negatif' AND hasil_s2 = 'Negatif')";
    $ci->db->where($where);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return '';
    }
}

function jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,$hasil='') {
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
    if (!empty($hasil)) {
        $ci->db->where('hasil_akhir', $hasil);
    }
    $ci->db->where('tipe_pasien', 'Baru (B)');
    $ci->db->where('klasifikasi', 'Extra Paru');
     $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return '';
    }
}

function jml_pasien_ulang_hasil_pengobatan($tgl_awal,$tgl_akhir,$tipe, $kel) {
    $res = 0;
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.id) as jml', false);
    $ci->db->from('tb_kpp k');
    $ci->db->join('sosial_anggota_keluarga p', 'p.no_rm = k.no_rm');
    $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $ci->db->where('sex', $kel);
    $ci->db->like('tipe_pasien', $tipe);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$tipe, $hasil='') {
    $res = 0;
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.id) as jml', false);
    $ci->db->from('tb_kpp k');
    $ci->db->join('sosial_anggota_keluarga p', 'p.no_rm = k.no_rm');
    if (!empty($hasil)) {
        $ci->db->where('hasil_akhir', $hasil);
    }
    $ci->db->like('tipe_pasien', $tipe);
     $ci->db->where('DATE(tgl) >=', $tgl_awal);
    $ci->db->where('DATE(tgl) <=', $tgl_akhir);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

//end



?>