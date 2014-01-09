<?php
class surat_ijin Extends Ci_Controller{
	public function __construct () {
		parent::__construct();
		$this->load->model('surat_ijin_model');
	}

	public function index(){
		$this->template->load('template','surat_ijin/index');
	}

	public function cari_pegawai(){
		$kata_kunci=$this->input->post('kata_kunci');
		$data['pegawai']=$this->surat_ijin_model->getPegawai($kata_kunci);
		$this->load->view('surat_ijin/pegawai',$data);
	}

	public function proses(){
		$id_pegawai=$this->input->post("id_pegawai");
		$data['tanggal_dari']=$this->input->post("tanggal_dari");
		$data['tanggal_sampai']=$this->input->post("tanggal_sampai");
		if(empty($data['tanggal_sampai'])){
			$data['tanggal_sampai']=$data['tanggal_dari'];
		}
		$selisih = strtotime($data['tanggal_sampai']) -  strtotime($data['tanggal_dari']);
		$data['hari'] = $selisih/(60*60*24)+1;
		$data['keperluan']=$this->input->post("keperluan");
		$data['pegawai']=$this->surat_ijin_model->getDetailPegawai($id_pegawai);
		$this->template->load('template','surat_ijin/cetak',$data);
	} 
}
?>