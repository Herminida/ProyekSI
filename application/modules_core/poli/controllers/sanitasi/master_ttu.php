<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master_ttu extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('master/ms_ttu');
    }

    function index(){
        $this->template->load('templateSanitasi','sanitasi/v_master_ttu');
    }

    public function data(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->ms_ttu->list_data(true),
            'aaData'=>$this->ms_ttu->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function simpan(){
        $return=array();
        if($this->input->post('nama')){
            if($this->input->post('id')){
            $return['success']=$this->ms_ttu->update();
            }else{
            $return['success']=$this->ms_ttu->create();
            }
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']='Ttu harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($id=0){
        $return=array(
            'success'=>$this->ms_ttu->delete($id),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */