<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_kip extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_kpp');
        $this->load->model('mtb_kip');
    }

    function index(){
        $this->template->load('templateTB','tb/v_laporan_kip');
    }

    function _generate($mode,$no_rm_tb){
        $view['mode']=$mode;

        $view['kpp'] = $this->mtb_kpp->get_data_by_rm_tb($no_rm_tb);
        $view['data'] = $this->mtb_kip->get_data_by_rm_tb($no_rm_tb);
        // print_r($view);
        if(isset($view['data']) and $view['data']){
            $this->load->view('tb/generate_laporan_kip',$view);
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