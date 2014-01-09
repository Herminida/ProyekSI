<?php

class M_Gizi extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
   //id, register, penyakit, tindak_lanjut, status_kasus, time_gizi_buruk

    function list_data_giziburuk(){
        $this->db->select('sgb.id,nama_penyakit,tindak_lanjut,status_kasus,time_gizi_buruk,no_rm,nama_anggota,ar.id as register,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur ',false);
        $this->db->from('admission_registrasi ar');
        $this->db->join('sik_gizi_buruk sgb','sgb.register=ar.idpemeriksaan');
        $this->db->join('sosial_anggota_keluarga sak','sak.id=ar.anggota_keluarga_id');
        $this->db->join('icd_penyakit ip','ip.id=sgb.penyakit','left');
        $query = $this->db->get();
        
        $res['aaData']=$query->result_array();
        return json_encode($res);
        
    }

	function list_data_posyandu() {
        $this->db->select('id_posyandu,kelurahan,tgl,jml_pend,jml_by,jml_blt,jml_posy,posy_jml,posy_by,posy_blt,status,tindak_lanjut,id_kelurahan,nama_kelurahan');
        $this->db->from('sik_gizi_posyandu gz');
        $this->db->join('sosial_kelurahan kel', 'kel.id_kelurahan = gz.kelurahan');
        $query = $this->db->get();
        $res['aaData']=$query->result_array();
        return json_encode($res);
    }

    function list_data_vitamin($start='', $limit='') {
        $this->db->select('id_vitamin,kelurahan,tgl,sasaran_by,sasaran_blt,sasaran_bufas,sasaran_bumil,sasaran_wus,vit_by,vit_blt,vit_bufas,fe1_bumil,fe3_bumil,ukur_lila_bumil,kurang_lila_bumil,id_kelurahan,nama_kelurahan');
        $this->db->from('sik_gizi_vitamin gz');
        $this->db->join('sosial_kelurahan kel', 'kel.id_kelurahan = gz.kelurahan');
        $query = $this->db->get();
        $res['aaData']=$query->result_array();
        return json_encode($res);
    }

    function getPemeriksaanGiziBuruk($register=''){
        $this->db->select('sgb.id as id_sgb,ar.id as register,penyakit,tindak_lanjut,status_kasus,nama_penyakit,ip.id,anggota_keluarga_id,no_kk,klinik_id,bayar_id,petugas_id,tanggal_registrasi,nomor_antrian,unit_kerja_id,validasi_reg,validasi_billing,kunjungan_jenis,sak.no_rm,nik,nama_anggota,tanggal_lahir,puskesmas_id,kk_id,nama_kk,skk.alamat,nama_kelurahan,nama_kecamatan,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur , (year(now())-year(tanggal_lahir))as umurtahun,idpemeriksaan,nama_unit_kerja,nama_unit_kerja as wilayah,cara_bayar as status,nama_pegawai,if((kunjungan_jenis=1) ,"Lama","Baru" ) as kunjungan,if((status_kasus=1) ,"Lama","Baru" ) as statkas', false);
        $this->db->from('sik_gizi_buruk sgb');
        $this->db->join('admission_registrasi ar','sgb.register=ar.idpemeriksaan');
        $this->db->join('admission_bayar ab','ar.bayar_id=ab.id','left');
        $this->db->join('pegawai pgw','ar.petugas_id=pgw.id_pegawai','left');
        $this->db->join('sosial_anggota_keluarga sak','sak.id=ar.anggota_keluarga_id');
        $this->db->join('sosial_kepala_keluarga skk', 'sak.kk_id = skk.id');
        $this->db->join('sosial_kelurahan sk', 'skk.kelurahan_id = sk.id_kelurahan','left');
        $this->db->join('sosial_kecamatan skec','sk.id_kecamatan = skec.id_kecamatan','left');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = ar.unit_kerja_id');
        $this->db->join('icd_penyakit ip','sgb.penyakit=ip.id','left');
        if (!empty($register)){
        $this->db->where('sgb.register',$register);
        }
        $query = $this->db->get();
        if ($query->num_rows()>0){
            return $query->result() ;
        }else{
            return false;   
        }
    }

    function simpanGiziBuruk($register,$penyakit=null,$tindak_lanjut=null,$status_kasus=null) {
        $this->db->set('register', $register);
        $this->db->set('penyakit', $penyakit);
        $this->db->set('tindak_lanjut', $tindak_lanjut);
        $this->db->set('status_kasus', $status_kasus);
        return $this->db->insert('sik_gizi_buruk');
        
    }

    function updateGiziBuruk($id,$penyakit=null,$tindak_lanjut=null,$status_kasus=null) {
        $this->db->set('penyakit', $penyakit);
        $this->db->set('tindak_lanjut', $tindak_lanjut);
        $this->db->set('status_kasus', $status_kasus);
        $this->db->where('id', $id);
        return $this->db->update('sik_gizi_buruk');
    }

    function deleteGiziBuruk($id) {
        $this->db->where('id', $id);
        return $this->db->delete('sik_gizi_buruk');
    }

   function simpanPosyandu($kelurahan,$tgl,$jml_pend=null,$jml_by=null,$jml_blt=null,$jml_posy=null,$posy_jml=null,$posy_by=null,$posy_blt=null,$status=null,$tindak_lanjut) {
        $this->db->set('kelurahan', $kelurahan);
        $this->db->set('tgl', date('Y-m-d',strtotime($tgl)));
        $this->db->set('jml_pend', $jml_pend);
        $this->db->set('jml_by', $jml_by);
        $this->db->set('jml_blt', $jml_blt);
        $this->db->set('jml_pend', $jml_pend);
        $this->db->set('jml_posy', $jml_posy);
        $this->db->set('posy_jml', $posy_jml);
        $this->db->set('posy_by', $posy_by);
        $this->db->set('posy_blt', $posy_blt);
        $this->db->set('status', $status);
        $this->db->set('tindak_lanjut', $tindak_lanjut);
        return $this->db->insert('sik_gizi_posyandu');
    }

    function updatePosyandu($id_posyandu,$kelurahan=null,$tgl=null,$jml_pend=null,$jml_by=null,$jml_blt=null,$jml_posy=null,$posy_jml=null,$posy_by=null,$posy_blt=null,$status=null,$tindak_lanjut=null) {
       
        $this->db->set('kelurahan', $kelurahan);
        $this->db->set('tgl', date('Y-m-d', strtotime($tgl)));
        $this->db->set('jml_pend', $jml_pend);
        $this->db->set('jml_by', $jml_by);
        $this->db->set('jml_blt', $jml_blt);
        $this->db->set('jml_pend', $jml_pend);
        $this->db->set('jml_posy', $jml_posy);
        $this->db->set('posy_jml', $posy_jml);
        $this->db->set('posy_by', $posy_by);
        $this->db->set('posy_blt', $posy_blt);
        $this->db->set('status', $status);
        $this->db->set('tindak_lanjut', $tindak_lanjut);
        $this->db->where('id_posyandu', $id_posyandu);
        return $this->db->update('sik_gizi_posyandu');
        /*return print('id_posyandu='.$id_posyandu
                    .'tgl='.$tgl
                    .'kelurahan='.$kelurahan
                    .'jml_pend='.$jml_pend
                    .'jml_by='.$jml_by
                    .'jml_blt='.$jml_blt
                    .'jml_posy='.$jml_posy
                    .'posy_jml='.$posy_jml
                    .'posy_by='.$posy_by
                    .'status='.$status
                    .'tindak_lanjut='.$tindak_lanjut
                    .'posy_blt='.$posy_blt);*/

    }

    function deletePosyandu($id_posyandu) {
        $this->db->where('id_posyandu', $id_posyandu);
        return $this->db->delete('sik_gizi_posyandu');
    }

    function simpanVitamin() {

        $this->db->set('kelurahan', $this->input->post('kelurahan'));
        $this->db->set('tgl', date('Y-m-d', strtotime($this->input->post('tgl'))));
        $this->db->set('sasaran_by', $this->input->post('sasaran_by'));
        $this->db->set('sasaran_blt', $this->input->post('sasaran_blt'));
        $this->db->set('sasaran_bumil', $this->input->post('sasaran_bumil'));
        $this->db->set('sasaran_bufas', $this->input->post('sasaran_bufas'));
        $this->db->set('sasaran_wus', $this->input->post('sasaran_wus'));
        $this->db->set('vit_by', $this->input->post('vit_by'));
        $this->db->set('vit_blt', $this->input->post('vit_blt'));
        $this->db->set('vit_bufas', $this->input->post('vit_bufas'));
        $this->db->set('fe1_bumil', $this->input->post('fe1_bumil'));
        $this->db->set('fe3_bumil', $this->input->post('fe3_bumil'));
        $this->db->set('ukur_lila_bumil', $this->input->post('ukur_lila_bumil'));
        $this->db->set('kurang_lila_bumil', $this->input->post('kurang_lila_bumil'));
        return $this->db->insert('sik_gizi_vitamin');
    }

    function updateVitamin() {
        $this->db->set('kelurahan', $this->input->post('kelurahan'));
        $this->db->set('tgl', date('Y-m-d', strtotime($this->input->post('tgl'))));
        $this->db->set('sasaran_by', $this->input->post('sasaran_by'));
        $this->db->set('sasaran_blt', $this->input->post('sasaran_blt'));
        $this->db->set('sasaran_bumil', $this->input->post('sasaran_bumil'));
        $this->db->set('sasaran_bufas', $this->input->post('sasaran_bufas'));
        $this->db->set('sasaran_wus', $this->input->post('sasaran_wus'));
        $this->db->set('vit_by', $this->input->post('vit_by'));
        $this->db->set('vit_blt', $this->input->post('vit_blt'));
        $this->db->set('vit_bufas', $this->input->post('vit_bufas'));
        $this->db->set('fe1_bumil', $this->input->post('fe1_bumil'));
        $this->db->set('fe3_bumil', $this->input->post('fe3_bumil'));
        $this->db->set('ukur_lila_bumil', $this->input->post('ukur_lila_bumil'));
        $this->db->set('kurang_lila_bumil', $this->input->post('kurang_lila_bumil'));
        $this->db->where('id_vitamin', $this->input->post('id_vitamin'));
        return $this->db->update('sik_gizi_vitamin');
    }

    function deleteVitamin($id_vitamin) {
        $this->db->where('id_vitamin', $id_vitamin);
        return $this->db->delete('sik_gizi_vitamin');
    }

}
?>