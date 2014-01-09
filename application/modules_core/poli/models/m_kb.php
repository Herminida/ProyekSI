<?php

class M_Kb extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }


    function getKbStatus($no_rm,$register){
        $this->db->select("kb.id,kb.no_rm,kb.register,kb.anak_hidup_l,kb.anak_hidup_p,kb.umur_anak_terkecil
                    ,kb.status_peserta,kb.kb_terakhir,kb.keadaan_umum,kb.tekanan_darah,kb.hamil
                    ,DATE_FORMAT(kb.haid_terakhir,'%d-%m-%Y') as haid_terakhir,kb.sakit_kuning
                    ,kb.pendarahan_vagina,kb.tumor_payudara,kb.tumor_rahim,kb.tumor_indung_telur
                    ,kb.tumor_tertis,kb.tumor_orchifis,kb.hiv,kb.posisi_rahim,kb.tanda_radang
                    ,kb.tumor_ginekologi,kb.tanda_diabetes,kb.kelainan_darah,kb.kontrasepsi_boleh
                    ,kb.konseling,kb.kontrasepsi_diberikan,DATE_FORMAT(kb.tgl_dipesan,'%d-%m-%Y') as tgl_dipesan
                    ,DATE_FORMAT(kb.tgl_dilayani,'%d-%m-%Y') as tgl_dilayani
                    ,DATE_FORMAT(kb.tgl_dilepas,'%d-%m-%Y') as tgl_dilepas",false);
        $this->db->from("sik_kb_status kb");
        $this->db->where("kb.no_rm",$no_rm);
        $this->db->where("kb.register",$register);
        if($result=$this->db->get()){
            return $result->row_array();
        }
    }

	function simpanKbStatus(){
        $this->db->set('no_rm', $this->input->post('no_rm'));
        $this->db->set('register', $this->input->post('register'));
        $this->db->set('anak_hidup_l', $this->input->post('anak_hidup_l'));
        $this->db->set('anak_hidup_p', $this->input->post('anak_hidup_p'));
        $this->db->set('umur_anak_terkecil', $this->input->post('umur_anak_terkecil'));
        $this->db->set('status_peserta', $this->input->post('status_peserta'));
        $this->db->set('kb_terakhir', $this->input->post('kb_terakhir'));
        $this->db->set('keadaan_umum', $this->input->post('keadaan_umum'));
        $this->db->set('tekanan_darah', $this->input->post('tekanan_darah'));
        $this->db->set('hamil', $this->input->post('hamil'));
        $this->db->set('haid_terakhir', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1", $this->input->post('haid_terakhir')));
        // $this->db->set('berat_badan', $this->input->post('berat_badan'));
        $this->db->set('sakit_kuning', $this->input->post('sakit_kuning'));
        $this->db->set('pendarahan_vagina', $this->input->post('pendarahan_vagina'));
        $this->db->set('tumor_payudara', $this->input->post('tumor_payudara'));
        $this->db->set('tumor_rahim', $this->input->post('tumor_rahim'));
        $this->db->set('tumor_indung_telur', $this->input->post('tumor_indung_telur'));
        $this->db->set('tumor_tertis', $this->input->post('tumor_tertis'));
        $this->db->set('tumor_orchifis', $this->input->post('tumor_orchifis'));
        $this->db->set('hiv', $this->input->post('hiv'));
        $this->db->set('posisi_rahim', $this->input->post('posisi_rahim'));
        $this->db->set('tanda_radang', $this->input->post('tanda_radang'));
        $this->db->set('tumor_ginekologi', $this->input->post('tumor_ginekologi'));
        $this->db->set('tanda_diabetes', $this->input->post('tanda_diabetes'));
        $this->db->set('kelainan_darah', $this->input->post('kelainan_darah'));
        $this->db->set('kontrasepsi_boleh', $this->input->post('kontrasepsi_boleh'));
        $this->db->set('konseling', $this->input->post('konseling'));
        $this->db->set('kontrasepsi_diberikan', $this->input->post('kontrasepsi_diberikan'));
        $this->db->set('tgl_dipesan', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1", $this->input->post('tgl_dipesan')));
        $this->db->set('tgl_dilayani', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1", $this->input->post('tgl_dilayani')));
        $this->db->set('tgl_dilepas', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1", $this->input->post('tgl_dilepas')));
        if($this->input->post('id')>0){
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('sik_kb_status');
        }else{
            return $this->db->insert('sik_kb_status');
        }
    }


    function getKbKunjunganUlang($no_rm,$register){
        $this->db->select("kb.id,kb.no_rm,kb.register,kb.anak_hidup_l,kb.anak_hidup_p
                    ,kb.umur_anak_terkecil,kb.status_peserta,kb.kb_terakhir
                    ,DATE_FORMAT(kb.tgl_datang,'%d-%m-%Y') as tgl_datang,kb.bb,kb.tekanan_darah
                    ,DATE_FORMAT(kb.haid_terakhir,'%d-%m-%Y') as haid_terakhir,kb.pp_tes
                    ,kb.hasil,kb.efek_samping,kb.efek_samping_ket,kb.efek_komplikasi
                    ,kb.efek_komplikasi_ket,kb.tindakan,kb.tindakan_ket
                    ,DATE_FORMAT(kb.tgl_kembali,'%d-%m-%Y') as tgl_kembali",false);
        $this->db->from("sik_kb_kunjungan_ulang kb");
        $this->db->where("kb.no_rm",$no_rm);
        $this->db->where("kb.register",$register);
        if($result=$this->db->get()){
            return $result->row_array();
        }
    }

    function simpanKunjunganUlang(){
        $this->db->set('no_rm', $this->input->post('no_rm'));
        $this->db->set('register', $this->input->post('register'));
        $this->db->set('anak_hidup_l', $this->input->post('anak_hidup_l'));
        $this->db->set('anak_hidup_p', $this->input->post('anak_hidup_p'));
        $this->db->set('umur_anak_terkecil', $this->input->post('umur_anak_terkecil'));
        $this->db->set('status_peserta', $this->input->post('status_peserta'));
        $this->db->set('kb_terakhir', $this->input->post('kb_terakhir'));
        $this->db->set('tgl_datang', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1", $this->input->post('tgl_datang')));
        $this->db->set('bb', $this->input->post('bb'));
        $this->db->set('tekanan_darah', $this->input->post('tekanan_darah'));
        $this->db->set('haid_terakhir', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1", $this->input->post('haid_terakhir')));
        $this->db->set('pp_tes', $this->input->post('pp_tes'));
        $this->db->set('hasil', $this->input->post('hasil'));
        $this->db->set('efek_samping', $this->input->post('efek_samping'));
        $this->db->set('efek_samping_ket', $this->input->post('efek_samping_ket'));
        $this->db->set('efek_komplikasi', $this->input->post('efek_komplikasi'));
        $this->db->set('efek_komplikasi_ket', $this->input->post('efek_komplikasi_ket'));
        $this->db->set('tindakan', $this->input->post('tindakan'));
        $this->db->set('tindakan_ket', $this->input->post('tindakan_ket'));
        $this->db->set('tgl_kembali', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1", $this->input->post('tgl_kembali')));
        if($this->input->post('id')>0){
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('sik_kb_kunjungan_ulang');
        }else{
            return $this->db->insert('sik_kb_kunjungan_ulang');
        }
    }

}
?>