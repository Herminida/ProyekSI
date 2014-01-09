<?php 

class Laporan_obat extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('laporan_obat_model');
	}

	public function index ($type='lihat') {
		$data['width'] = '100%';
		$data['list_obat']= $this->laporan_obat_model->GetData()->result();

		$this->template->load('template','laporan_obat/index',$data);
	}

	public function excel () {
		
		$data['file'] = 'laporan_obat/index';
		$this->load->view('laporan_obat/excel',$data);

	}






}