<?php

function jml_by_sex($tgl, $sex) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(register) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('sex', $sex);
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_less_7days($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('icd', $icd);
    $ci->db->where('DATEDIFF(NOW(),tanggal_lahir) < 8 ');
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return '';
    }
}

function jml_less_8_28($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('icd', $icd);
    $ci->db->where('DATEDIFF(NOW(),tanggal_lahir) > 7 AND DATEDIFF(NOW(),tanggal_lahir) < 29 ');
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_less_1bln_1thn($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('icd', $icd);
    $ci->db->where('DATEDIFF(NOW(),tanggal_lahir) >= 29 AND DATEDIFF(NOW(),tanggal_lahir) < 365 ');
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_less_1thn_4thn($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('icd', $icd);
    $ci->db->where('DATEDIFF(NOW(),tanggal_lahir) >= 365 AND DATEDIFF(NOW(),tanggal_lahir) < ((365 * 5)) ');
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_less_5thn_9thn($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('icd', $icd);
    $ci->db->where('DATEDIFF(NOW(),tanggal_lahir) >= (365 * 5) AND DATEDIFF(NOW(),tanggal_lahir) < ((365 * 10) + 1) ');
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_less_10thn_14thn($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('icd', $icd);
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('DATEDIFF(NOW(),tanggal_lahir) >= (365 * 10) AND DATEDIFF(NOW(),tanggal_lahir) < (365 * 15) ');
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_less_15thn_19thn($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('icd', $icd);
    $ci->db->where('DATEDIFF(NOW(),tanggal_lahir) >= (365 * 15) AND DATEDIFF(NOW(),tanggal_lahir) < (365 * 20) ');
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_less_20thn_44thn($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('icd', $icd);
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('DATEDIFF(NOW(),tanggal_lahir) >= (365 * 20) AND DATEDIFF(NOW(),tanggal_lahir) < (365 * 45) ');
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_less_45thn_54thn($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('icd', $icd);
    $ci->db->where('DATEDIFF(NOW(),tanggal_lahir) >= (365 * 45) AND DATEDIFF(NOW(),tanggal_lahir) < (365 * 55) ');
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_less_55thn_59thn($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('icd', $icd);
    $ci->db->where('DATEDIFF(NOW(),tanggal_lahir) >= (365 * 55) AND DATEDIFF(NOW(),tanggal_lahir) < (365 * 60) ');
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_less_60thn_69thn($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('icd', $icd);
    $ci->db->where('DATEDIFF(NOW(),tanggal_lahir) >= (365 * 60) AND DATEDIFF(NOW(),tanggal_lahir) < (365 * 70) ');
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}

function jml_more_70($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('icd', $icd);
    $ci->db->where('DATEDIFF(NOW(),tanggal_lahir) >= (365 * 70)');
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}


function jml_total($tgl, $stat, $icd) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('count(k.idpemeriksaan) as jml');
    $ci->db->from('admission_registrasi k');
    $ci->db->join('sik_diagnosa d', 'k.idpemeriksaan = d.register');
    $ci->db->join('sosial_anggota_keluarga p', 'p.id = k.anggota_keluarga_id');
    $ci->db->where('kunjungan_jenis', $stat);
    $ci->db->where('icd', $icd);
    $ci->db->where('DATE(tanggal_registrasi)', $tgl);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->jml;
    } else {
        return 0;
    }
}
?>