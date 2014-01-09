<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master_kpp extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_kpp');
    }

    function index(){
        $this->template->load('templateTB','tb/v_master_kpp');
    }

    public function data(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_kpp->list_master_data(true),
            'aaData'=>$this->mtb_kpp->list_master_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function simpan(){
        $return=array();
        if($this->input->post('nama')){
            $return['success']=$this->mtb_kpp->save_master_data();
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']='Kpp harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($id=0){
        $return=array(
            'success'=>$this->mtb_kpp->delete_master_data($id),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */