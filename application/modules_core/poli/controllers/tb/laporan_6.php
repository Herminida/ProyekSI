<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_6 extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_lab');
    }

    function index(){
        $this->template->load('templateTB','tb/v_laporan_6');
    }

    function _generate($mode,$tgl_awal,$tgl_akhir){
        $view['mode']=$mode;
        $tgl_awal=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$tgl_awal);
        $tgl_akhir=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$tgl_akhir);
        //ki ketoke sih salah le njupuk data ora seko kene.
        $this->db->where('(hl.tgl_pemeriksaan>="'.$tgl_awal.'" and hl.tgl_pemeriksaan<="'.$tgl_akhir.'")');
        $view['data'] = $this->mtb_lab->list_laporan()->result();
        // print_r($view);
        if(isset($view['data']) and $view['data']){
            $this->load->view('tb/generate_laporan_6',$view);
        }
    }

     function _generateedit($mode,$tgl_awal,$tgl_akhir){
        $view['mode']=$mode;
        $tgl_awal=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$tgl_awal);
        $tgl_akhir=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$tgl_akhir);
        $view['tgl_awal'] = $tgl_awal;
        $view['tgl_akhir'] = $tgl_akhir;
            $this->load->view('tb/generate_laporan_6',$view);
    }
    
    function preview_($tgl_awal,$tgl_akhir){
        $this->_generateedit('preview',$tgl_awal,$tgl_akhir);
    }
    function print_($tgl_awal,$tgl_akhir){
        $this->_generate('print',$tgl_awal,$tgl_akhir);
    }
    function excel_($yankes){
        $this->_generate('excel',$tgl_awal,$tgl_akhir);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */