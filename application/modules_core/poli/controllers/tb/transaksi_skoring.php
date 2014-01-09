<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_skoring extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_skoring');
    }

    function index(){
        $this->template->load('templateTB','tb/v_transaksi_skoring');
    }

    public function data(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_skoring->list_data(true),
            'aaData'=>$this->mtb_skoring->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function detail_by_kpp($kpp=0){
        $return=$this->mtb_skoring->detail_by_kpp($kpp);
        echo json_encode($return);
    }

    public function simpan(){
        $return=array();
        // $return['post']=$this->input->post();
        if($this->input->post('ket_hasil')){
            $return['success']=$this->mtb_skoring->save_data();
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']='Keterangan Hasil harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($kpp=0){
        $return=array(
            'success'=>$this->mtb_skoring->delete_data($kpp),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */