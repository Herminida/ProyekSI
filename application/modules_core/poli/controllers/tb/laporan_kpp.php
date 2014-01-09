<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_kpp extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_kpp');
        $this->load->model('mtb_dahak');
    }

    function index(){
        $this->template->load('templateTB','tb/v_laporan_kpp');
    }

    function _generate($mode,$no_rm_tb){
        $view['mode']=$mode;

        $view['data'] = $this->mtb_kpp->get_data_by_rm_tb($no_rm_tb);
        if(isset($view['data']['id'])){
            $view['data']['kontak']=$this->mtb_kpp->get_kontak($view['data']['id'])->result();
            $view['data']['dosis']=$this->mtb_kpp->get_dosis($view['data']['id'])->result();
            $view['data']['jadwal']=$this->mtb_kpp->get_jadwal($view['data']['id'])->result();
            $view['data']['dahak']=$this->mtb_dahak->get_hasil($view['data']['id'])->result();
            if ($view['data']['status_pmo']=='P') $view['data']['status_pmo']='P (Petugas Kesehatan)';
            elseif ($view['data']['status_pmo']=='K') $view['data']['status_pmo']='K (Kader)';
            elseif ($view['data']['status_pmo']=='TM') $view['data']['status_pmo']='TM (Tokoh Masyarakat)';
            elseif ($view['data']['status_pmo']=='F') $view['data']['status_pmo']='F (Family/ Anggota Keluarga)';
            elseif ($view['data']['status_pmo']=='L') $view['data']['status_pmo']='L (Lain-lain)';
            else $view['data']['status_pmo']='T (Tidak ada PMO)';
            if ($view['data']['parut_bcg']==3) $view['data']['parut_bcg']='Meragukan';
            elseif ($view['data']['parut_bcg']==2) $view['data']['parut_bcg']='Tidak Ada';
            elseif ($view['data']['parut_bcg']==1) $view['data']['parut_bcg']='Jelas';
            else $view['data']['parut_bcg']='';
            if ($view['data']['riwayat_pengobatan']==2) $view['data']['riwayat_pengobatan']='Pernah Diobati Lebih dari 1 Bln';
            else $view['data']['riwayat_pengobatan']='Belum Pernah/ Kurang dari 1 Bln';
        }
        // print_r($view);
        if(isset($view['data']) and $view['data']){
            $this->load->view('tb/generate_laporan_kpp',$view);
        }
    }
    
    function preview_($no_rm_tb){
        $this->_generate('preview',$no_rm_tb);
    }
    function print_($no_rm_tb){
        $this->_generate('print',$no_rm_tb);
    }
    function excel_($no_rm_tb){
        $this->_generate('excel',$no_rm_tb);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */