<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_sedian extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_unitkerja');
        $this->load->model('mtb_kroscek');
    }

    function index(){
        $view['puskesmas']=$this->mtb_unitkerja->list_data()->result();
        $this->template->load('templateTB','tb/v_laporan_sedian',$view);
    }

    function _generate($mode,$yankes){
        $view['mode']=$mode;

        $view['data'] = $this->mtb_kroscek->detail_by_yankes($yankes);
        // print_r($view);
        if(isset($view['data']) and $view['data']){
            $this->load->view('tb/generate_laporan_sedian',$view);
        }
    }
    
    function preview_($yankes){
        $this->_generate('preview',$yankes);
    }
    function print_($yankes){
        $this->_generate('print',$yankes);
    }
    function excel_($yankes){
        $this->_generate('excel',$yankes);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */