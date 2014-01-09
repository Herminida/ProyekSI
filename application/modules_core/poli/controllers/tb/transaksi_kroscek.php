<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_kroscek extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_kroscek');
    }

    function index(){
        $this->template->load('templateTB','tb/v_transaksi_kroscek');
    }

    public function data(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_kroscek->list_data(true),
            'aaData'=>$this->mtb_kroscek->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function detail_by_permohonan($kpp=0){
        $return=$this->mtb_kroscek->detail_by_permohonan($kpp);
        echo json_encode($return);
    }

    public function simpan(){
        $return=array('success'=>'','error'=>'');
        // $return['post']=$this->input->post();
        if(!$this->input->post('yankes')){
            $return['error'].=' Unit Yankes,';
        }
        if(!$this->input->post('tgl_terima')){
            $return['error'].=' Tgl Terima,';
        }
        if(!$this->input->post('tgl_kirim')){
            $return['error'].=' Tgl Dikirim,';
        }
        if(!$this->input->post('petugas_kab')){
            $return['error'].=' Petugas Kab,';
        }
        if(!$this->input->post('petugas_kroscek')){
            $return['error'].=' Petugas Kroscek,';
        }
        if(empty($return['error'])){
            $return['success']=$this->mtb_kroscek->save_data();
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']=trim($return['error'],',').' harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($kpp=0){
        $return=array(
            'success'=>$this->mtb_kroscek->delete_data($kpp),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */