<?php

class M_Kebidanan extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }


    function getKia($rm){
        $sql = "SELECT sak.nama_anggota,sak.tempat_lahir,DATE_FORMAT(sak.tanggal_lahir,'%d-%m-%Y') as tanggal_lahir
                    ,sak.kk_id,skk.nama_kk,if(skk.rt>0,CONCAT(skk.alamat,' RT',skk.rt,'/RW',skk.rw),skk.alamat) as alamat
                    ,skl.id_kelurahan,skl.nama_kelurahan
                    ,skc.id_kecamatan,skc.nama_kecamatan
                    ,sak.agama_id,sa.nama_agama
                    ,sak.pendidikan_id,spd.nama_pendidikan
                    ,sak.pekerjaan_id,spk.nama_pekerjaan
                    ,kia.id_kia,kia.no_rm,kia.puskesmas,DATE_FORMAT(kia.tgl_kia,'%d-%m-%Y') as tgl_kia
                FROM sosial_anggota_keluarga sak
                JOIN sosial_kepala_keluarga skk ON sak.kk_id=skk.id
                LEFT JOIN sosial_kelurahan skl ON skk.kelurahan_id=skl.id_kelurahan
                LEFT JOIN sosial_kecamatan skc ON skl.id_kecamatan=skc.id_kecamatan
                LEFT JOIN sosial_agama sa ON sak.agama_id=sa.id
                LEFT JOIN sosial_pendidikan spd ON sak.pendidikan_id=spd.id
                LEFT JOIN sosial_pekerjaan spk ON sak.pekerjaan_id=spk.id
                LEFT JOIN sik_kebidanan_kia kia ON kia.no_rm=sak.no_rm
                WHERE sak.no_rm=".$rm;
        if($result=$this->db->query($sql)){
            return $result->row_array();
        }
    }

	function simpanKia($id_kia,$no_rm,$puskesmas,$tgl_kia){
        $this->db->set('no_rm', $no_rm);
        $this->db->set('puskesmas', $puskesmas);
        $this->db->set('tgl_kia', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$tgl_kia));
        if($id_kia>0){
            $this->db->where('id_kia', $id_kia);
            return $this->db->update('sik_kebidanan_kia');
        }else{
            return $this->db->insert('sik_kebidanan_kia');
        }
    }

    function getKehamilanByRegister($register){
        $sql = "SELECT ph.id_pengamatan_kehamilan,ph.register,DATE_FORMAT(ph.hpht,'%d-%m-%Y') as hpht
                    ,DATE_FORMAT(ph.htp,'%d-%m-%Y') as htp,ph.kehamilan_sekarang,ph.lila,ph.riwayat_ibu
                    ,ph.riwayat_alergi,ph.keluhan_utama,ph.jml_anak_hidup,ph.jml_lahir_mati
                    ,ph.jarak_persalinan,ph.persalinan,ph.persalinan_bantuan,ph.kontrasepsi,ph.resiko_tgl
                    ,ph.resiko_jenis,ph.rujuk_tgl,ph.rujuk_ke,ph.tindakan_sementara,ph.g,ph.p,ph.a,ph.m,ph.tb
                FROM sik_kebidanan_pengamatan_kehamilan ph
                WHERE ph.register=".$register;
        if($result=$this->db->query($sql)){
            return $result->row_array();
        }
    }

    function simpanKehamilan(){
        $this->db->set('register', $this->input->post('register'));
        $this->db->set('hpht', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('hpht')));
        $this->db->set('htp', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('htp')));
        $this->db->set('kehamilan_sekarang', $this->input->post('kehamilan_sekarang'));
        $this->db->set('lila', $this->input->post('lila'));
        $this->db->set('riwayat_ibu', $this->input->post('riwayat_ibu'));
        $this->db->set('riwayat_alergi', $this->input->post('riwayat_alergi'));
        $this->db->set('keluhan_utama', $this->input->post('keluhan_utama'));
        $this->db->set('jml_anak_hidup', $this->input->post('jml_anak_hidup'));
        $this->db->set('jml_lahir_mati', $this->input->post('jml_lahir_mati'));
        $this->db->set('jarak_persalinan', $this->input->post('jarak_persalinan'));
        $this->db->set('persalinan', $this->input->post('persalinan'));
        $this->db->set('persalinan_bantuan', $this->input->post('persalinan_bantuan'));
        $this->db->set('kontrasepsi', $this->input->post('kontrasepsi'));
        $this->db->set('resiko_tgl', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('resiko_tgl')));
        $this->db->set('resiko_jenis', $this->input->post('resiko_jenis'));
        $this->db->set('rujuk_tgl', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('rujuk_tgl')));
        $this->db->set('rujuk_ke', $this->input->post('rujuk_ke'));
        $this->db->set('tindakan_sementara', $this->input->post('tindakan_sementara'));
        $this->db->set('g', $this->input->post('g'));
        $this->db->set('p', $this->input->post('p'));
        $this->db->set('a', $this->input->post('a'));
        $this->db->set('m', $this->input->post('m'));
        $this->db->set('tb', $this->input->post('tb'));
        if($this->input->post('id_pengamatan_kehamilan')>0){
            $this->db->where('id_pengamatan_kehamilan', $this->input->post('id_pengamatan_kehamilan'));
            return $this->db->update('sik_kebidanan_pengamatan_kehamilan');
        }else{
            return $this->db->insert('sik_kebidanan_pengamatan_kehamilan');
        }
    }

    function getAntenatal($no_rm){
        $sql = "SELECT a.id_antenatal,a.no_rm,a.register,DATE_FORMAT(a.tgl_periksa,'%d-%m-%Y') as tgl_periksa
                    ,a.keluhan_sekarang,a.bb,a.fundus,a.denyut_jantung_janin,a.hasil_lab,a.terapi_tt
                    ,a.umur_kehamilan,a.letak_janin,a.kaki_bengkak,a.terapi_fe,a.saran
                    ,DATE_FORMAT(a.tgl_kembali,'%d-%m-%Y') as tgl_kembali
                FROM sik_kebidanan_antenatal a
                WHERE a.no_rm=".$no_rm;
        if($result=$this->db->query($sql)){
            return $result->result();
        }
    }

    function simpanAntenatal(){
        $this->db->set('no_rm', $this->input->post('no_rm'));
        $this->db->set('register', $this->input->post('register'));
        $this->db->set('tgl_periksa', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_periksa')));
        $this->db->set('keluhan_sekarang', $this->input->post('keluhan_sekarang'));
        $this->db->set('bb', $this->input->post('bb'));
        $this->db->set('fundus', $this->input->post('fundus'));
        $this->db->set('denyut_jantung_janin', $this->input->post('denyut_jantung_janin'));
        $this->db->set('hasil_lab', $this->input->post('hasil_lab'));
        $this->db->set('terapi_tt', $this->input->post('terapi_tt'));
        $this->db->set('umur_kehamilan', $this->input->post('umur_kehamilan'));
        $this->db->set('letak_janin', $this->input->post('letak_janin'));
        $this->db->set('kaki_bengkak', $this->input->post('kaki_bengkak'));
        $this->db->set('terapi_fe', $this->input->post('terapi_fe'));
        $this->db->set('saran', $this->input->post('saran'));
        $this->db->set('tgl_kembali', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_kembali')));
        if($this->input->post('id_antenatal')>0){
            $this->db->where('id_antenatal', $this->input->post('id_antenatal'));
            return $this->db->update('sik_kebidanan_antenatal');
        }else{
            return $this->db->insert('sik_kebidanan_antenatal');
        }
    }

    function hapusAntenatal($id_antenatal) {
        $this->db->where('id_antenatal', $id_antenatal);
        return $this->db->delete('sik_kebidanan_antenatal');
    }

    function getPersalinan($no_rm){
        $sql = "SELECT p.id_persalinan,p.no_rm,p.register,DATE_FORMAT(p.tgl_persalinan,'%d-%m-%Y') as tgl_persalinan
                    ,p.jam_persalinan,p.tekanan_darah,p.nafas,p.his,p.his_lama,p.djj_frek,p.hasil_pemeriksaan
                    ,p.nadi,p.suhu,p.his_frek,p.his_kuat,p.djj_teratur
                FROM sik_kebidanan_persalinan p
                WHERE p.no_rm=".$no_rm;
        if($result=$this->db->query($sql)){
            return $result->result();
        }
    }

    function simpanPersalinan(){
        $this->db->set('no_rm', $this->input->post('no_rm'));
        $this->db->set('register', $this->input->post('register'));
        $this->db->set('tgl_persalinan', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_persalinan')));
        $this->db->set('jam_persalinan', $this->input->post('jam_persalinan'));
        $this->db->set('tekanan_darah', $this->input->post('tekanan_darah'));
        $this->db->set('nafas', $this->input->post('nafas'));
        $this->db->set('his', $this->input->post('his'));
        $this->db->set('his_lama', $this->input->post('his_lama'));
        $this->db->set('djj_frek', $this->input->post('djj_frek'));
        $this->db->set('hasil_pemeriksaan', $this->input->post('hasil_pemeriksaan'));
        $this->db->set('nadi', $this->input->post('nadi'));
        $this->db->set('suhu', $this->input->post('suhu'));
        $this->db->set('his_frek', $this->input->post('his_frek'));
        $this->db->set('his_kuat', $this->input->post('his_kuat'));
        $this->db->set('djj_teratur', $this->input->post('djj_teratur'));
        if($this->input->post('id_persalinan')>0){
            $this->db->where('id_persalinan', $this->input->post('id_persalinan'));
            return $this->db->update('sik_kebidanan_persalinan');
        }else{
            return $this->db->insert('sik_kebidanan_persalinan');
        }
    }

    function hapusPersalinan($id_persalinan) {
        $this->db->where('id_persalinan', $id_persalinan);
        return $this->db->delete('sik_kebidanan_persalinan');
    }

    function getNifas($no_rm){
        $sql = "SELECT n.id_nifas,n.no_rm,n.register,DATE_FORMAT(n.tgl,'%d-%m-%Y') as tgl
                    ,n.jam,n.anamnesa,n.tekanan_darah,n.nafas,n.kontraksi_rahim,n.pendarahan
                    ,n.lochia,n.bab,n.bak,n.menyusui_dini,n.tindakan,n.nadi,n.suhu,n.vit_a
                FROM sik_kebidanan_nifas n
                WHERE n.no_rm=".$no_rm;
        if($result=$this->db->query($sql)){
            return $result->result();
        }
    }

    function simpanNifas(){
        $this->db->set('no_rm', $this->input->post('no_rm'));
        $this->db->set('register', $this->input->post('register'));
        $this->db->set('tgl', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl')));
        $this->db->set('jam', $this->input->post('jam'));
        $this->db->set('anamnesa', $this->input->post('anamnesa'));
        $this->db->set('tekanan_darah', $this->input->post('tekanan_darah'));
        $this->db->set('nafas', $this->input->post('nafas'));
        $this->db->set('kontraksi_rahim', $this->input->post('kontraksi_rahim'));
        $this->db->set('pendarahan', $this->input->post('pendarahan'));
        $this->db->set('lochia', $this->input->post('lochia'));
        $this->db->set('bab', $this->input->post('bab'));
        $this->db->set('bak', $this->input->post('bak'));
        $this->db->set('menyusui_dini', $this->input->post('menyusui_dini'));
        $this->db->set('tindakan', $this->input->post('tindakan'));
        $this->db->set('nadi', $this->input->post('nadi'));
        $this->db->set('suhu', $this->input->post('suhu'));
        $this->db->set('vit_a', $this->input->post('vit_a'));
        if($this->input->post('id_nifas')>0){
            $this->db->where('id_nifas', $this->input->post('id_nifas'));
            return $this->db->update('sik_kebidanan_nifas');
        }else{
            return $this->db->insert('sik_kebidanan_nifas');
        }
    }

    function hapusNifas($id_nifas) {
        $this->db->where('id_nifas', $id_nifas);
        return $this->db->delete('sik_kebidanan_nifas');
    }

}
?>