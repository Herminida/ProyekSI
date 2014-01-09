<?php
	class sinkronisasi_absensi Extends Ci_Controller{
		public function __construct () {
			parent::__construct();
			$this->load->model('sinkronisasi_absensi_model');
		}
		public function index(){
			$this->template->load('template','sinkronisasi_absensi/index');
		}

		public function tampil(){
			$bulan=$this->input->post('bulan');
			$tahun=$this->input->post('tahun');
			$data['pencarian']=$bulan."-".$tahun;
			$data['bulan1']=$this->input->post('bulan');
			$data['tahun1']=$this->input->post('tahun');
			$data['data_identitas_pegawai']=$this->sinkronisasi_absensi_model->get_Data($bulan,$tahun);
			$this->load->view('sinkronisasi_absensi/hasil',$data);
		}

		public function export(){
			header("Content-type: application/octet-stream");
	        header("Content-Disposition: attachment; filename=sinkronisasi.xls");
	        header("Pragma: no-cache");
	        header("Expires: 0");
	        $pencarian=$this->uri->segment(4);
    		$hasil=explode("-", $pencarian);
    		$bulan=$hasil[0];
    		$tahun=$hasil[1];
    		$data['bulan1']=$hasil[0];
			$data['tahun1']=$hasil[1];
			$data['pencarian']=$bulan."-".$tahun;
			$data['data_identitas_pegawai']=$this->sinkronisasi_absensi_model->get_Data($bulan,$tahun);
			$this->load->view('sinkronisasi_absensi/export',$data);
		}
	}
?>