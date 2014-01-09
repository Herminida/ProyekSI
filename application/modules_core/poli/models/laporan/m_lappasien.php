<?php

class M_LapPasien extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }
    //NIK Nama Umur Alamat Kunjungan Layanan/bayar Anamnesa Vital Sign Diagnosa Obat Pemeriksan Lab Hasil Tindakan Medis Tgl Register  User Saved Utama Sekunder Respirasi Suhu Badan (c) Denyut Nadi BB Tb
    function getDataPasienByPoli($poli,$unker,$tgl_awal,$tgl_akhir){
        $this->db->select('ar.id,if((kunjungan_jenis=1) ,"Lama","Baru" ) as kunjungan_jenis,idpemeriksaan,no_rm,nik,nama_anggota,skk.alamat,date_format(tanggal_registrasi,"%d-%m-%Y") as tanggal_registrasi,,keluhan_utama,keluhan_sekunder,respirasi,suhu_badan,denyut_nadi,bb,tb,fisik,cara_bayar as nama_bayar,nama_pegawai,
                 concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Th" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bl", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hr", repeat(" ", 2)) AS umur', false);
        $this->db->from('sik_pemeriksaan sp');
        $this->db->join('admission_registrasi ar', 'sp.register = ar.idpemeriksaan');
        $this->db->join('admission_klinik ak', 'ar.klinik_id = ak.id');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = ar.unit_kerja_id');
        $this->db->join('pegawai peg', 'peg.nip_pegawai = ar.petugas_id', 'left');
        $this->db->join('sosial_anggota_keluarga sak', 'sak.id = ar.anggota_keluarga_id');
        $this->db->join('admission_bayar b', 'b.id=ar.bayar_id');
        $this->db->join('sosial_kepala_keluarga skk', 'skk.id = sak.kk_id');
        $this->db->join('sosial_kelurahan sk', 'skk.kelurahan_id = sk.id_kelurahan','left');
        $this->db->join('sosial_kecamatan skec','sk.id_kecamatan = skec.id_kecamatan','left');
        $this->db->order_by('tanggal_registrasi');
        $this->db->where('klinik_id', $poli);
        if ($this->input->post('unker')) {
            $this->db->where('id_unit_kerja', $unker);
        }
        $this->db->where('DATE(tanggal_registrasi) >=', $tgl_awal);
        $this->db->where('DATE(tanggal_registrasi) <=', $tgl_akhir);
        $query=$this->db->get();
        return $query->result();
    }

    function getPendaftarPoli($poli,$unker,$tgl_awal,$tgl_akhir){
        $this->db->select('ar.id,if((kunjungan_jenis=1) ,"Lama","Baru" ) as kunjungan_jenis,sak.no_rm,nik,nama_anggota,skk.alamat,date_format(tanggal_registrasi,"%d-%m-%Y") as tanggal_registrasi,cara_bayar as nama_bayar,nama_pegawai,nama_kk,nama_kecamatan,nama_kelurahan,nama_klinik,
                 concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Th" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bl", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hr", repeat(" ", 2)) AS umur', false);
        
        $this->db->from('admission_registrasi ar');
        $this->db->join('admission_klinik ak', 'ar.klinik_id = ak.id');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = ar.unit_kerja_id');
        $this->db->join('pegawai peg', 'peg.nip_pegawai = ar.petugas_id', 'left');
        $this->db->join('sosial_anggota_keluarga sak', 'sak.id = ar.anggota_keluarga_id');
        $this->db->join('admission_bayar b', 'b.id=ar.bayar_id');
        $this->db->join('sosial_kepala_keluarga skk', 'skk.id = sak.kk_id');
        $this->db->join('sosial_kelurahan sk', 'skk.kelurahan_id = sk.id_kelurahan','left');
        $this->db->join('sosial_kecamatan skec','sk.id_kecamatan = skec.id_kecamatan','left');
        $this->db->where('klinik_id', $poli);
        if ($this->input->post('unker')) {
            $this->db->where('id_unit_kerja', $unker);
        }
        
        $this->db->order_by('tanggal_registrasi');
        $this->db->where('DATE(tanggal_registrasi) >=', $tgl_awal);
        $this->db->where('DATE(tanggal_registrasi) <=', $tgl_akhir);
        
        $query=$this->db->get();
        return $query->result();   
    }
    function getPendaftarLab($poli,$unker,$tgl_awal,$tgl_akhir){
        $this->db->select('ltk.id_lab as id, if((status_kunjungan=1) ,"Lama","Baru" ) as kunjungan_jenis,sak.no_rm,nik,nama_anggota,skk.alamat,date_format(time_lab,"%d-%m-%Y") as time_lab,nama_kk,nama_kecamatan,nama_kelurahan,
                 concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Th" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bl", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hr", repeat(" ", 2)) AS umur', false);
        if ($poli==9){
        $this->db->select('nama_klinik,nama_pegawai');
        $this->db->from('admission_registrasi ar');
        $this->db->join('labkesda_t_kunjungan ltk','ar.idpemeriksaan = ltk.register ');
        $this->db->join('admission_klinik ak', 'ar.klinik_id = ak.id');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = ar.unit_kerja_id');
        $this->db->join('pegawai peg', 'peg.nip_pegawai = ar.petugas_id', 'left');
        $this->db->join('sosial_anggota_keluarga sak', 'sak.id = ar.anggota_keluarga_id');
        $this->db->join('admission_bayar b', 'b.id=ar.bayar_id');
        $this->db->where('ltk.register !=', '');
        }else{
        $this->db->from('labkesda_t_kunjungan ltk');
        $this->db->join('sosial_anggota_keluarga sak', 'sak.no_rm = ltk.no_rm');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = ltk.unker');
        $this->db->where('ltk.register', '');
        }
        $this->db->join('sosial_kepala_keluarga skk', 'skk.id = sak.kk_id');
        $this->db->join('sosial_kelurahan sk', 'skk.kelurahan_id = sk.id_kelurahan','left');
        $this->db->join('sosial_kecamatan skec','sk.id_kecamatan = skec.id_kecamatan','left');
        if ($this->input->post('unker')) {
            $this->db->where('id_unit_kerja', $unker);
        }
        $this->db->order_by('time_lab');
        $this->db->where('DATE(time_lab) >=', $tgl_awal);
        $this->db->where('DATE(time_lab) <=', $tgl_akhir);

        
        $query=$this->db->get();
        return $query->result();   
    }

}
        
?>
