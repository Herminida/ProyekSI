<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_permohonan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_kpp');
        $this->load->model('mtb_permohonan');
        $this->load->model('mtb_lab');
    }

    function index(){
        $this->template->load('templateTB','tb/v_laporan_permohonan');
    }

    function _generate($mode,$no_rm_tb){
        $view['mode']=$mode;

        $view['kpp'] = $this->mtb_kpp->get_data_by_rm_tb($no_rm_tb);
        $view['data'] = $this->mtb_permohonan->get_data_by_rm_tb('abc',$no_rm_tb);
        $view['de'] = $this->mtb_permohonan->get_data_by_rm_tb('de',$no_rm_tb);
        $view['jk'] = $this->mtb_permohonan->get_data_by_rm_tb('jk',$no_rm_tb);
        $view['fg'] = $this->mtb_permohonan->get_data_by_rm_tb('fg',$no_rm_tb);
        $view['hi'] = $this->mtb_permohonan->get_data_by_rm_tb('hi',$no_rm_tb);
        if(isset($view['data']['id_permohonan_lab'])){
            $view['hasil'] = $this->mtb_lab->detail_by_permohonan($view['data']['id_permohonan_lab']);
        }
        // print_r($view);
        if(isset($view['data']) and $view['data']){
            $this->load->view('tb/generate_laporan_permohonan',$view);
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