<?php
class Laporan_gudang_apotek_pengeluaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('laporan_gudang_apotek_pengeluaran_model');
        $this->load->model('unit_kerja_model');
    }

    public function index () {
        $data['unit_kerja'] = $this->unit_kerja_model->Get_Unit_Kerja();
        $this->template->load('template','laporan_gudang_apotek_pengeluaran/index',$data);
    }

    public function tampil () {
        $tanggal1 = $this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
        $tanggal2 = $this->input->post('thn2').'-'.$this->input->post('bln2').'-'.$this->input->post('tgl2');
        $dari = $this->input->post('unit_kerja_id');
        $ke = $this->input->post('tujuan');

        //$query = $this->laporan_farmasi_penerimaan_model->searching($tanggal1,$tanggal2,$sumber);

        $data['width'] = '100%';
        $data['list_gudang_apotek_pengeluaran']= $this->laporan_gudang_apotek_pengeluaran_model->searching($tanggal1,$tanggal2,$dari,$ke);

        //echo $this->db->last_query();
        //die;

        $this->template->load('template','laporan_gudang_apotek_pengeluaran/hasil',$data);


            
        
    }

    public function excel () {

        

        $data['file'] = 'laporan_gudang_apotek_pengeluaran/hasil';
        $this->load->view('laporan_gudang_apotek_pengeluaran/excel',$data);

        
    }
}