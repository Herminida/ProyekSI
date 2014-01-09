<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_grafik extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_kpp');
        $this->load->model('mtb_permohonan');
        $this->load->model('mtb_lab');
        $this->load->helper('lap_triwulan_pengobatan');
        $this->load->helper('lap_hasil_pengobatan');
    }

    function index(){
        $this->penemuan();
    }
    function penemuan($mode='',$tgl_awal='',$tgl_akhir=''){
        if(empty($mode)){
            $this->template->load('templateTB','tb/v_laporan_grafik_penemuan');
        }else{
            $tgl_awal=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$tgl_awal);
            $tgl_akhir=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$tgl_akhir);
            $bta_positif = jml_pasien_baru_triwulan_positif(66, 1000, 'p',$tgl_awal,$tgl_akhir,1) + jml_pasien_baru_triwulan_positif(66, 1000, 'l',$tgl_awal,$tgl_akhir,1);
            $bta_negatif = jml_pasien_baru_triwulan_negatif(66, 1000, 'l',$tgl_awal,$tgl_akhir,1) + jml_pasien_baru_triwulan_negatif(66, 1000, 'p',$tgl_awal,$tgl_akhir,1);
            $bta_paru = jml_pasien_baru_triwulan_extra(66, 1000, 'p',$tgl_awal,$tgl_akhir,1) + jml_pasien_baru_triwulan_extra(66, 1000, 'l',$tgl_awal,$tgl_akhir,1);
            $tipe_pasien = array('Kambuh', 'Default', 'Gagal', 'Kronik', 'Lain-lain');
            for ($i = 0; $i < count($tipe_pasien); $i++) {
            $tmp[$i] = jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'p',$tgl_awal,$tgl_akhir,1) + jml_pasien_ulang($tipe_pasien[$i], 66, 1000, 'l',$tgl_awal,$tgl_akhir, 1);
            }

            $data=array(
                    'bta_plus'=>$bta_positif,
                    'bta_min'=>$bta_negatif,
                    'extra_paru'=>$bta_paru,
                    'kambuh'=>$tmp[1],
                    'default'=>$tmp[1],
                    'gagal'=>$tmp[2],
                    'kronik'=>$tmp[3],
                    'lain'=>$tmp[4],
                );
            echo json_encode($data);
            //
        
    

            //

        }
    }
    function hasil($mode='',$tgl_awal='',$tgl_akhir=''){
        if(empty($mode)){
            $this->template->load('templateTB','tb/v_laporan_grafik_hasil');
        }else{
            $tgl_awal=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$tgl_awal);
            $tgl_akhir=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$tgl_akhir);
            
            if ($mode == 'Positif' || $mode == 'Negatif' || $mode == 'Paru') {
            if ($mode == 'Positif') {
                $sembuh = jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,'Sembuh');
                $pengobatan_lengkap = jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,'Pengobatan Lengkap');
                $putus_berobat = jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,'Putus Berobat');
                $gagal = jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,'Gagal');
                $pindah = jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,'Pindah');
                $meninggal = jml_pasien_baru_hasil_pengobatan_positif($tgl_awal,$tgl_akhir,'Meninggal');
            } else if ($mode == 'Negatif') {
                $sembuh = jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,'Sembuh');
                $pengobatan_lengkap = jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,'Pengobatan Lengkap');
                $putus_berobat = jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,'Putus Berobat');
                $gagal = jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,'Gagal');
                $pindah = jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,'Pindah');
                $meninggal = jml_pasien_baru_hasil_pengobatan_negatif($tgl_awal,$tgl_akhir,'Meninggal');
            } else {
                $sembuh = jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,'Sembuh');
                $pengobatan_lengkap = jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,'Pengobatan Lengkap');
                $putus_berobat = jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,'Putus Berobat');
                $gagal = jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,'Gagal');
                $pindah = jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,'Pindah');
                $meninggal = jml_pasien_baru_hasil_pengobatan_extra($tgl_awal,$tgl_akhir,'Meninggal');
            }
        } else {
            $sembuh = jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$mode, 'Sembuh');
            $pengobatan_lengkap = jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$mode, 'Pengobatan Lengkap');
            $putus_berobat = jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$mode, 'Putus Berobat');
            $gagal = jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$mode, 'Gagal');
            $pindah = jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$mode, 'Pindah');
            $meninggal = jml_pasien_ulang_hasil_pengobatan_akhir($tgl_awal,$tgl_akhir,$mode, 'Meninggal');
        }

            $data=array(
                    'sembuh'=>$sembuh,
                    'pengobatan_lengkap'=>$pengobatan_lengkap,
                    'putus_berobat'=>$putus_berobat,
                    'gagal'=>$gagal,
                    'pindah'=>$pindah,
                    'meninggal'=>$meninggal
                );
            echo json_encode($data);
        }
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */