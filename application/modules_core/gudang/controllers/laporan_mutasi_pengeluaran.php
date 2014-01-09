<?php
class Laporan_mutasi_pengeluaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('laporan_mutasi_pengeluaran_model');
        
    }

    public function index () {
       
        $this->template->load('template','laporan_mutasi_pengeluaran/index');
    }

    public function tampil () {
        $tanggal1 = $this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
        $tanggal2 = $this->input->post('thn2').'-'.$this->input->post('bln2').'-'.$this->input->post('tgl2');
        $dari = $this->input->post('unit_kerja_id');
       

        //$query = $this->laporan_farmasi_penerimaan_model->searching($tanggal1,$tanggal2,$sumber);

        $data['width'] = '100%';
        $data['list_mutasi_pengeluaran']= $this->laporan_mutasi_pengeluaran_model->searching($tanggal1,$tanggal2,$dari);

        //echo $this->db->last_query();
        //die;

        $this->template->load('template','laporan_mutasi_pengeluaran/hasil',$data);


            
        
    }

    public function excel () {

        

        $data['file'] = 'laporan_mutasi_pengeluaran/hasil';
        $this->load->view('laporan_mutasi_pengeluaran/excel',$data);

        
    }
}