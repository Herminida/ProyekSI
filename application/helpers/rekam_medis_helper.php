<?php

function get_obat($id) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('*,sum(qtt_order) as qtt_order');
    $ci->db->from('apt_penjualan_header h');
    $ci->db->join('apt_penjualan_item ai', 'ai.id_penjualan = h.id_penjualan');
    $ci->db->join('apt_item i', 'i.id_item = ai.id_item');
    $ci->db->where('register', $id);
    $ci->db->group_by('i.id_item');
    return $ci->db->get();
}

function get_tindakan($id) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->from('sik_t_tindakan t');
    $ci->db->join('admission_tindakan at', 'at.id = t.produk');
    $ci->db->where('register', $id);
    $ci->db->group_by('at.id');
    return $ci->db->get();
}

function get_lab($id) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->from('labkesda_t_kunjungan');
    $ci->db->where('register', $id);
    $data = $ci->db->get();
//    print_r($data->row());
    $res = '';
    if ($data->num_rows() > 0) {
        $data = $data->row();
        if ($data->sedimen == 'on') {
            $res.='Sedimen';
        }

        if ($data->urine == 'on') {
            $res.=', Urine';
        }

        if ($data->hematologi == 'on') {
            $res.=', Hematologi';
        }

        if ($data->bakteriologi == 'on') {
            $res.=', Bakteriologi';
        }
        if ($data->tes_hamil == 'on') {
            $res.=', Tes Hamil';
        }
    }
    //echo $res;
    return $res;
}

function get_diagnosa($id) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->from('sik_diagnosa dg');
    $ci->db->join('icd_penyakit pen', 'pen.id = dg.icd');
    $ci->db->where('register', $id);
    $data = $ci->db->get();
   // echo $ci->db->last_query();
    if ($data->num_rows() > 0) {
        //$str = '<br style="mso-data-placement:same-cell;" />';
        $str='';
        $i = 1;
        foreach ($data->result() as $r) {
            $str.=$i.'. '.$r->nama_penyakit . '<br style="mso-data-placement:same-cell;" />';
            $i++;
        }
        return $str;
    } else {
        return '';
    }

}

function get_rujuk_poli($id) {
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->from('admission_registrasi');
    $ci->db->where('register_rujuk', $id);
    $data = $ci->db->get();
    if ($data->num_rows() > 0) {
        return $data->row()->poli;
    } else {
        return '';
    }
}

?>