<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_lab extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_lab');
    }

    function index(){
        $this->template->load('templateTB','tb/v_transaksi_lab');
    }

    public function data(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_lab->list_data(true),
            'aaData'=>$this->mtb_lab->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function detail_by_permohonan($permohonan=0){
        $return=$this->mtb_lab->detail_by_permohonan($permohonan);
        echo json_encode($return);
    }

    public function simpan(){
        $return=array();
        // $return['post']=$this->input->post();
        if($this->input->post('tgl_pemeriksaan')){
            $return['success']=$this->mtb_lab->save_data();
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']='Tanggal Pemeriksaan harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($kpp=0){
        $return=array(
            'success'=>$this->mtb_lab->delete_data($kpp),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */