<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_rujukan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_rujukan');
    }

    function index(){
        $this->template->load('templateTB','tb/v_transaksi_rujukan');
    }

    public function data(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_rujukan->list_data(true),
            'aaData'=>$this->mtb_rujukan->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function detail_by_kpp($id=0){
        $return=$this->mtb_rujukan->detail_by_kpp($id);
        echo json_encode($return);
    }

    public function simpan(){
        $return=array();
        // $return['post']=$this->input->post();
        if($this->input->post('nama_instansi')){
            $return['success']=$this->mtb_rujukan->save_data();
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']='Instansi Tujuan harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($kpp=0){
        $return=array(
            'success'=>$this->mtb_rujukan->delete_data($kpp),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */