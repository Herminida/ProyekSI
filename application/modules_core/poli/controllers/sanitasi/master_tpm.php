<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master_tpm extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('master/ms_tpm');
    }

    function index(){
        $this->template->load('templateSanitasi','sanitasi/v_master_tpm');
    }

    public function data(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->ms_tpm->list_data(true),
            'aaData'=>$this->ms_tpm->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function simpan(){
        $return=array();
        if($this->input->post('nama')){
            if($this->input->post('id')){
            $return['success']=$this->ms_tpm->update();
            }else{
            $return['success']=$this->ms_tpm->create();
            }
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']='tpm harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($id=0){
        $return=array(
            'success'=>$this->ms_tpm->delete($id),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */