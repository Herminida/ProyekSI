<?php

class tbl_pasien_rawat extends CI_Controller {

	public function __construct() {
		parent::__construct();
    $this->load->model('admission_klinik_model');
    $this->load->model('tbl_pendukung_model');
		

	}

	public function index () {

		$data['admission_klinik'] = $this->admission_klinik_model->Get_Klinik();
		$data['data_pendukung'] = $this->tbl_pendukung_model->Get_Pendukung();
		$this->template->load('template','tbl_pasien_rawat/index',$data);
	}

	

}