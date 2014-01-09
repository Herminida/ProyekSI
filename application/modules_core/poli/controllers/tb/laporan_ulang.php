<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_ulang extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_kroscek');
    }

    function index(){
        $this->template->load('templateTB','tb/v_laporan_ulang');
    }

    function _generate($mode,$dari,$sampai){
        $view['mode']=$mode;
        $dari=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$dari);
        $sampai=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$sampai);
        $this->db->where('(i.tgl_kroscek>="'.$dari.'" and i.tgl_kroscek<="'.$sampai.'")');
        $view['data'] = $this->mtb_kroscek->list_data()->result();
        // print_r($view);
        if(isset($view['data']) and $view['data']){
            $this->load->view('tb/generate_laporan_ulang',$view);
        }
    }
    
    function preview_($dari,$sampai){
        $this->_generate('preview',$dari,$sampai);
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