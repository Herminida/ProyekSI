<?php
class Laporan_farmasi_penerimaan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('laporan_farmasi_penerimaan_model');
        $this->load->model('apt_sumber_model');
    }

    public function index () {
        $data['apt_sumber'] = $this->apt_sumber_model->Get_Apt_Sumber();
        $this->template->load('template','laporan_farmasi_penerimaan/index',$data);
    }

    public function tampil () {
        $tanggal1 = $this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
        $tanggal2 = $this->input->post('thn2').'-'.$this->input->post('bln2').'-'.$this->input->post('tgl2');
        $sumber = $this->input->post('sumber_id');
        $dari = $this->input->post('unit_kerja_id');

        //$query = $this->laporan_farmasi_penerimaan_model->searching($tanggal1,$tanggal2,$sumber);

        $data['width'] = '100%';
        $data['list_farmasi_penerimaan']= $this->laporan_farmasi_penerimaan_model->searching($tanggal1,$tanggal2,$sumber,$dari);

        //echo $this->db->last_query();
        //die;

        $this->template->load('template','laporan_farmasi_penerimaan/hasil',$data);


            
        
    }

    public function excel () {

        

        $data['file'] = 'laporan_farmasi_penerimaan/hasil';
        $this->load->view('laporan_farmasi_penerimaan/excel',$data);

        
    }
}