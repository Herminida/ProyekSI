<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master_jabatan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('master/ms_jabatan');
    }

    function index(){
        $this->template->load('templateSanitasi','sanitasi/v_master_jabatan');
    }

    public function data(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->ms_jabatan->list_data(true),
            'aaData'=>$this->ms_jabatan->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function simpan(){
        $return=array();
        if($this->input->post('nama')){
            if($this->input->post('id')){
            $return['success']=$this->ms_jabatan->update();
            }else{
            $return['success']=$this->ms_jabatan->create();
            }
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']='jabatan harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($id=0){
        $return=array(
            'success'=>$this->ms_jabatan->delete($id),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */