<?php

class M_LapImunisasi extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }


      function list_data_hasil($tgl_awal, $tgl_akhir, $unker='') {
        $this->db->select('*,count(i.register) as jml_pasien,
                     concat(if((((month(now()) - month(tgl_lahir)) < 1) and((year(now()) - year(tgl_lahir)) < 1)), 0, if(((month(now()) - month(tgl_lahir)) < 0),((year(now()) - year(tgl_lahir)) -1),(year(now()) - year(tgl_lahir)))), repeat(" ", 2),"Th" ,repeat(" ", 2),if(((month(now()) - month(tgl_lahir)) < 0), if(((month(now()) - month(tgl_lahir)) = 0), 0,((month(now()) - month(tgl_lahir)) + 12)),(month(now()) - month(tgl_lahir))), repeat(" ", 2), "Bl", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tgl_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tgl_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tgl_lahir))), repeat(" ", 2), "Hr", repeat(" ", 2)) AS umur', false);
        $this->db->from('sik_imunisasi i');
        $this->db->join('admission_registrasi ar', 'i.register = ar.idpemeriksaan');
        $this->db->join('sosial_anggota_keluarga sak', 'sak.id_anggota_keluarga = ar.anggota_keluarga_id');
        $this->db->join('admission_bayar ab', 'ar.bayar_id=ab.id');
        $this->db->join('sosial_kepala_keluarga skk', 'skk.id_kk = sak.kk_id');
        $this->db->join('sosial_kelurahan skl', 'skl.id_kelurahan = skk.kelurahan');
        $this->db->join('sosial_kecamatan skec', 'skec.id_kecamatan = skl.id_kecamatan');
        $this->db->order_by('tanggal_registrasi');
        $this->db->group_by('kelurahan');
        if (!empty($unker)) {
            $this->db->where('unker', $unker);
        }
        $this->db->where('DATE(tanggal_registrasi) >=', $tgl_awal);
        $this->db->where('DATE(tanggal_registrasi) <=', $tgl_akhir);
        return $this->db->get();
    }

}

?>