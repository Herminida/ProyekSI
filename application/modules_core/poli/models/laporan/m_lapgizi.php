<?php

class M_LapGizi extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }


    function list_data_gizi_buruk($tgl_awal, $tgl_akhir, $unker='') {
        $this->db->select('*,max(time_gizi_buruk),
                 concat(if((((month(now()) - month(tgl_lahir)) < 1) and((year(now()) - year(tgl_lahir)) < 1)), 0, if(((month(now()) - month(tgl_lahir)) < 0),((year(now()) - year(tgl_lahir)) -1),(year(now()) - year(tgl_lahir)))), repeat(" ", 2),"Th" ,repeat(" ", 2),if(((month(now()) - month(tgl_lahir)) < 0), if(((month(now()) - month(tgl_lahir)) = 0), 0,((month(now()) - month(tgl_lahir)) + 12)),(month(now()) - month(tgl_lahir))), repeat(" ", 2), "Bl", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tgl_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tgl_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tgl_lahir))), repeat(" ", 2), "Hr", repeat(" ", 2)) AS umur', false);
        $this->db->from('sik_pemeriksaan pm');
        $this->db->join('sik_t_kunjungan k', 'pm.register = k.register');
        $this->db->join('sik_gizi_buruk gz', 'pm.register = gz.register');
        $this->db->join('icd_penyakit pen', 'pen.kode_penyakit = gz.penyakit');
        $this->db->join('m_pasien p', 'p.no_rm = k.no_rm');
        $this->db->join('m_bayar b', 'b.id_bayar=p.bayar');
        $this->db->join('m_kepala_keluarga kk', 'kk.id_kk = p.kk');
        $this->db->join('m_kelurahan kl', 'kl.id_kelurahan = kk.kelurahan');
        $this->db->join('m_kecamatan kec', 'kec.id_kecamatan = kl.id_kecamatan');
        $this->db->order_by('time_kunjungan');
        $this->db->group_by('p.no_rm');
        if (!empty($unker)) {
            $this->db->where('unker', $unker);
        }
        $this->db->where('DATE(time_kunjungan) >=', $tgl_awal);
        $this->db->where('DATE(time_kunjungan) <=', $tgl_akhir);
        return $this->db->get();
    }
    function list_data_posyandu($tgl_awal, $tgl_akhir, $kelurahan='') {
        $this->db->select('date_format(tgl,"%d-%m-%Y") as tgl,jml_pend,jml_by,jml_blt,jml_posy,posy_jml,posy_by,posy_blt,status,tindak_lanjut,nama_kelurahan', false);
        $this->db->from('sik_gizi_posyandu posy');
        $this->db->join('sosial_kelurahan k', 'k.id_kelurahan = posy.kelurahan');
        $this->db->order_by('tgl');
        if (!empty($unker)) {
            $this->db->where('k.id_kelurahan', $kelurahan);
        }
        $this->db->where('tgl >=', $tgl_awal);
        $this->db->where('tgl <=', $tgl_akhir);
        $query = $this->db->get();
        return $query->result_array();
    }

    function list_data_vitamin($tgl_awal, $tgl_akhir, $kelurahan='') {
        $this->db->select('date_format(tgl,"%d-%m-%Y") as tgl,nama_kelurahan,sasaran_by,sasaran_blt,sasaran_bufas,sasaran_bumil,sasaran_wus,vit_by,vit_blt,vit_bufas,fe1_bumil,fe3_bumil,ukur_lila_bumil,kurang_lila_bumil', false);
        $this->db->from('sik_gizi_vitamin vit');
        $this->db->join('sosial_kelurahan k', 'k.id_kelurahan = vit.kelurahan');
        $this->db->order_by('tgl');
        if (!empty($unker)) {
            $this->db->where('vit.kelurahan', $kelurahan);
        }
        $this->db->where('tgl >=', $tgl_awal);
        $this->db->where('tgl <=', $tgl_akhir);
        $query=$this->db->get();
        return $query->result_array();
    }

}

?>