<?php
class cari_kk extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model_input_kk');
    }
    
    function index(){
        $this->template->load('template','input_kk/view_cari_kk');
    }
    
    function get_kk(){
        $no_kk=$this->input->post('no_kk');
        $nama_kk=$this->input->post('nama_kk');
        $data['tampil']=$this->model_input_kk->cari($no_kk,$nama_kk);
        $this->template->load('template','input_kk/view_hasil_cari_kk',$data);
    }
    
}
?>
