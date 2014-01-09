<?php 
class Apotek_lplpo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('apotek_penerimaan_model');
        $this->load->model('apotek_lplpo_model');
        $this->load->model('farmasi_obats_model');
        $this->load->model('unit_kerja_model');
        $this->load->model('apt_sumber_model');
        $this->load->model('apt_supplier_model');

    }
    
    

    public function index () {
//        error_reporting(E_ALL ^ (E_NOTICE));
        if($this->input->post('bulan_laporan')==''){
            $data['bulan_laporan']=buatBulan('bulan_laporan',date('m'));
            $data['tahun_laporan']=buatTahun('tahun_laporan',date('Y'));
            $data['tanggalgenerate']=date('Y-m');
            if(date('m') == '1' || date('m')=='01'){
                $tanggalstok= (date('Y')-1).'-'.(date('m')+11);                
            }else{
                $tanggalstok=date('Y').'-'.(date('m')-1);                                
            }
            $tanggal=date('Y-m');
            $tanggal1=date('Y-m-'.'01');
            $tanggal2=date('Y-m-'.'31');
        }else{
            $data['bulan_laporan']=buatBulan('bulan_laporan',$this->input->post('bulan_laporan'));
            $data['tahun_laporan']=buatTahun('tahun_laporan',$this->input->post('tahun_laporan'));
            $tanggal=$this->input->post('tahun_laporan').'-'.$this->input->post('bulan_laporan');
            if($this->input->post('bulan_laporan') == '1' or $this->input->post('bulan_laporan')=='01'){
                $tanggalstok=($this->input->post('tahun_laporan')-1).'-'.($this->input->post('bulan_laporan')+11);            
            }else{
                $tanggalstok=$this->input->post('tahun_laporan').'-'.($this->input->post('bulan_laporan')-1);            
            }
            $tanggal1=$this->input->post('tahun_laporan').'-'.$this->input->post('bulan_laporan').'-'.'01';
            $tanggal2=$this->input->post('tahun_laporan').'-'.$this->input->post('bulan_laporan').'-'.'31';
            $data['tanggalgenerate']=$tanggal;
            
        }
        
        $data['obats']=$this->farmasi_obats_model->Get_Farmasi_Obats();
        $data['lasts']=$this->apotek_lplpo_model->getlplpoBydate($tanggal);
        $data['pengeluarans']=$this->apotek_lplpo_model->getPengeluaranBydate($tanggal1,$tanggal2);
        $data['penerimaans']=$this->apotek_lplpo_model->getPenerimaanBydate($tanggal1,$tanggal2);
        $data['stokawals']=$this->apotek_lplpo_model->getStokawalBydate($tanggalstok);
        $this->template->load('template','apotek_lplpo/index',$data);
    }
    
    public function generateLplpo(){
        $tanggal=$this->input->post('tanggal_generate');
        $ceklplpos=$this->apotek_lplpo_model->getlplpoBydate($tanggal);
        $ceklplpo = $ceklplpos->num_rows;
        if($ceklplpo > 0){
            redirect('laporans/apotek_lplpo');
        }else{
            $katalogobats=$this->farmasi_obats_model->Get_Farmasi_Obats();
            $katalogobat=$katalogobats->num_rows;
            for($i=1;$i<=$katalogobat;$i++){
                $fields=array(
                    'tanggal_lplpo'=>$tanggal.'-'.date('d'),
                    'obat_id'=>$this->input->post('obat_id'.$i),
                    'stok_awal'=>$this->input->post('stok_awal'.$i),
                    'penerimaan'=>$this->input->post('terima'.$i),
                    'pemakaian'=>$this->input->post('pakai'.$i),
                    'rusak'=>$this->input->post('rusak'.$i),
                    'sisa_stok'=>$this->input->post('sisa_stok'.$i),
                    'stok_real'=>$this->input->post('stok_real'.$i),
                    'permintaan'=>$this->input->post('minta'.$i),
                    'unit_kerja_id'=>$this->input->post('unit_kerja_id')
                );
                $this->apotek_lplpo_model->generateLplpo($fields);
            }
            redirect('laporans/apotek_lplpo');

            echo $ceklplpo->num_rows;
        }
    }

    public function exportLplpoXls () {
//        error_reporting(E_ALL ^ (E_NOTICE));
        if($this->input->post('bulan_laporan')!==''){
            $tanggal=$this->input->post('tahun_laporan').'-'.$this->input->post('bulan_laporan');            
        }
        
        $data['obats']=$this->farmasi_obats_model->Get_Farmasi_Obats();
        $data['lasts']=$this->apotek_lplpo_model->getlplpoBydate($tanggal);
//        $data['pengeluarans']=$this->apotek_lplpo_model->getPengeluaranBydate($tanggal1,$tanggal2);
//        $data['penerimaans']=$this->apotek_lplpo_model->getPenerimaanBydate($tanggal1,$tanggal2);
//        $data['stokawals']=$this->apotek_lplpo_model->getStokawalBydate($tanggalstok);
        $this->load->view('apotek_lplpo/cetaklplpo',$data);
    }
    

}