<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_kpp extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mtb_kpp');
    }

    function index(){
        $this->db->order_by('nama_unit_kerja');
        $this->view['unit_kerja']=$this->db->get('unit_kerja')->result();
        $this->view['master']=$this->mtb_kpp->list_master_data()->result();
        $this->template->load('templateTB','tb/v_transaksi_kpp',$this->view);
    }

    public function data(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_kpp->list_data(true),
            'aaData'=>$this->mtb_kpp->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function detail_by_rm($no_rm){
        $return=$this->mtb_kpp->get_data_by_rm($no_rm);
        if(isset($return['id'])){
            $return['kontak']=$this->mtb_kpp->get_kontak($return['id'])->result();
            $return['dosis']=$this->mtb_kpp->get_dosis($return['id'])->result();
            $return['jadwal']=$this->mtb_kpp->get_jadwal($return['id'])->result();
        }
        echo json_encode($return);
    }

    public function simpan(){
        $return=array();
        // $return['post']=$this->input->post();
        if($this->input->post('unker')){
            $return['success']=$this->mtb_kpp->save_data();
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']='Puskesmas harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($id=0){
        $return=array(
            'success'=>$this->mtb_kpp->delete_data($id),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */