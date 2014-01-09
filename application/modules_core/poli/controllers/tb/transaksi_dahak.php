<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_dahak extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_kpp');
        $this->load->model('mtb_dahak');
    }

    function index(){
        $this->template->load('templateTB','tb/v_transaksi_dahak');
    }

    public function data(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_dahak->list_data(true),
            'aaData'=>$this->mtb_dahak->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function detail_by_kpp($id=0){
        $return=$this->mtb_kpp->get_data_by_id($id);
        if(isset($return['id'])){
            $return['hasil']=$this->mtb_dahak->get_hasil($return['id'])->result();
        }
        echo json_encode($return);
    }

    public function simpan($kpp){
        $return=array();
        // $return['post']=$this->input->post();
        if($this->input->post('bulan')){
            $return['success']=$this->mtb_dahak->save_data($kpp);
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']='Alasan Pemeriksaan harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($kpp=0){
        $return=array(
            'success'=>$this->mtb_dahak->delete_data($kpp),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */