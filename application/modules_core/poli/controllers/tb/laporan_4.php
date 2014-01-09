<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_4 extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_lab');
        $this->load->helper('lap_triwulan_pengobatan');
    }

    function index(){
        $this->template->load('templateTB','tb/v_laporan_4');
    }

    function _generate($mode,$dari,$sampai){
        $view['mode']=$mode;
        $dari=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$dari);
        $sampai=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$sampai);
        //ki ketoke sih salah le njupuk data ora seko kene.
        $this->db->where('(hl.tgl_pemeriksaan>="'.$dari.'" and hl.tgl_pemeriksaan<="'.$sampai.'")');
        $view['data'] = $this->mtb_lab->list_laporan()->result();
        // print_r($view);
        if(isset($view['data']) and $view['data']){
            $this->load->view('tb/generate_laporan_4',$view);
        }
    }

     function _generateedit($mode,$dari,$sampai){
        $view['mode']=$mode;
        $dari=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$dari);
        $sampai=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$sampai);
        $view['dari'] = $dari;
        $view['sampai'] = $sampai;
            $this->load->view('tb/generate_laporan_4_edit',$view);
    }
    
    function preview_($dari,$sampai){
        $this->_generateedit('preview',$dari,$sampai);
    }
    function print_($dari,$sampai){
        $this->_generate('print',$dari,$sampai);
    }
    function excel_($yankes){
        $this->_generate('excel',$dari,$sampai);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */