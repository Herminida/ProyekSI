<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_permohonan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->view['tab']='abc';
        $this->load->model('mtb_permohonan');
    }

    function index(){
        $this->db->order_by('nama_unit_kerja');
        $this->view['unit_kerja']=$this->db->get('unit_kerja')->result();
        $this->template->load('templateTB','tb/v_transaksi_permohonan',$this->view);
    }
    function de(){
        $this->view['tab']='de';
        $this->index();
    }
    function jk(){
        $this->view['tab']='jk';
        $this->index();
    }
    function fg(){
        $this->view['tab']='fg';
        $this->index();
    }
    function hi(){
        $this->view['tab']='hi';
        $this->index();
    }

    public function data($tab=''){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_permohonan->list_data($tab,true),
            'aaData'=>$this->mtb_permohonan->list_data($tab)->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
    }

    public function detail_by_rm_tb($tab,$no_rm_tb){
        $return=$this->mtb_permohonan->get_data_by_rm_tb($tab,$no_rm_tb);
        if(isset($return['id_permohonan_header'])){
            $return['konsul']=$this->mtb_permohonan->get_konsul($return['id_permohonan_header'])->result();
            $return['periksa']=$this->mtb_permohonan->get_periksa($return['id_permohonan_header'])->result();
        }
        echo json_encode($return);
    }

    public function simpan(){
        $return=array();
        // $return['post']=$this->input->post();
        if($this->input->post('diagnosa')){
            $return['success']=$this->mtb_permohonan->save_data();
            $return['error']=$this->db->_error_message();
        }else{
            $return['success']=false;
            $return['error']='Alasan Pemeriksaan harus diisi';
        }
        echo json_encode($return);
    }

    public function hapus($id_permohonan_header=0){
        $return=array(
            'success'=>$this->mtb_permohonan->delete_data($id_permohonan_header),
            'error'=>$this->db->_error_message(),
        );
        echo json_encode($return);
    }

}

/* End of file */
/* Location: ./application/controllers/tb/ */