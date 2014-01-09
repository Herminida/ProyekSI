<?php 
class laporan_lb1 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('laporan/laporan_lb1_model');

    }
    
    

    public function index () {
//        error_reporting(E_ALL ^ (E_NOTICE));
        if($this->input->post('tanggal_laporan1')==''){
            $data['tanggal_laporan1']=buatHari('tanggal_laporan1',date('d'));
            $data['bulan_laporan1']=buatBulan('bulan_laporan1',date('m'));
            $data['tahun_laporan1']=buatTahun('tahun_laporan1',date('Y'));
            $data['tanggal_laporan2']=buatHari('tanggal_laporan2',date('d'));
            $data['bulan_laporan2']=buatBulan('bulan_laporan2',date('m'));
            $data['tahun_laporan2']=buatTahun('tahun_laporan2',date('Y'));
            $tanggal1=date('Y-m-d');
            $tanggal2=date('Y-m-d');
        }else{
            $data['tanggal_laporan1']=buatHari('tanggal_laporan1',$this->input->post('tanggal_laporan1'));
            $data['bulan_laporan1']=buatBulan('bulan_laporan1',$this->input->post('bulan_laporan1'));
            $data['tahun_laporan1']=buatTahun('tahun_laporan1',$this->input->post('tahun_laporan1'));
            $data['tanggal_laporan2']=buatHari('tanggal_laporan2',$this->input->post('tanggal_laporan2'));
            $data['bulan_laporan2']=buatBulan('bulan_laporan2',$this->input->post('bulan_laporan2'));
            $data['tahun_laporan2']=buatTahun('tahun_laporan2',$this->input->post('tahun_laporan2'));
            $tanggal1=$this->input->post('tahun_laporan1').'-'.$this->input->post('bulan_laporan1').'-'.$this->input->post('tanggal_laporan1');
            $tanggal2=$this->input->post('tahun_laporan2').'-'.$this->input->post('bulan_laporan2').'-'.$this->input->post('tanggal_laporan2');
            
        }
        
        $data['dtds']=$this->laporan_lb1_model->getDtd();
        $data['umurs']=$this->laporan_lb1_model->getUmur();
        $data['laporans']=$this->laporan_lb1_model->getLb1Bydate($tanggal1,$tanggal2);
        
        $this->template->load('template','laporan_lb/index',$data);
    }


}