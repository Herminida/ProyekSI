<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_1 extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_kpp');
    }

    function index(){
        $this->template->load('templateTB','tb/v_laporan_1');
    }

    function _generate($mode,$tgl_awal,$tgl_akhir){
        $view['mode']=$mode;
        $tgl_awal=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$tgl_awal);
        $tgl_akhir=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$tgl_akhir);
        //ki ketoke sih salah le njupuk data ora seko kene.
        $this->db->where('(tk.tgl>="'.$tgl_awal.'" and tk.tgl<="'.$tgl_akhir.'")');
        $view['data'] = $this->mtb_kpp->list_data()->result();
        // print_r($view);
        if(isset($view['data']) and $view['data']){
            $this->load->view('tb/generate_laporan_1',$view);
        }
    }
    
    function preview_($tgl_awal,$tgl_akhir){
        $this->_generate('preview',$tgl_awal,$tgl_akhir);
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