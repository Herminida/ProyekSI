<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master_penyakit extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('master/ms_penyakit');
    }

    function index(){
        $this->template->load('templateSanitasi','sanitasi/v_master_penyakit');
    }

    public function data(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->ms_penyakit->list_data(true),
            'aaData'=>$this->ms_penyakit->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function simpan(){
        $return=array();
        if($this->input->post('nama')){
            if($this->input->post('id')){
            $return['success']=$this->ms_penyakit->update();
            }else{
            $return['success']=$this->ms_penyakit->create();
            }
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']='penyakit harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($id=0){
        $return=array(
            'success'=>$this->ms_penyakit->delete($id),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */