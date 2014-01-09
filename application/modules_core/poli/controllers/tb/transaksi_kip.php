<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_kip extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_kip');
    }

    function index(){
        $this->template->load('templateTB','tb/v_transaksi_kip');
    }

    public function data(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_kip->list_data(true),
            'aaData'=>$this->mtb_kip->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function detail_by_rm_tb($no_rm_tb){
        $return=$this->mtb_kip->get_data_by_rm_tb($no_rm_tb);
        if(isset($return['id_kip_header'])){
            $return['konsul']=$this->mtb_kip->get_konsul($return['id_kip_header'])->result();
            $return['periksa']=$this->mtb_kip->get_periksa($return['id_kip_header'])->result();
        }
        echo json_encode($return);
    }

    public function simpan(){
        $return=array();
        // $return['post']=$this->input->post();
        if($this->input->post('catatan')){
            $return['success']=$this->mtb_kip->save_data();
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']='Catatan harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($id_kip_header=0){
        $return=array(
            'success'=>$this->mtb_kip->delete_data($id_kip_header),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */