<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class policetaklabkesda extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_laboratorium');
}
	public function index($id='')
	{	
		$this->template->load('templateLabkesda','poliklinik/v_cetaklab');

	}
	
	public function antrianhasil(){
		$this->view['source'] = 'policetaklabkesda/ajaxantrian';
		$this->load->view('poliklinik/popup/v_antrianlabkesda',$this->view);
	}

	public function ajaxantrian(){
		echo $this->m_laboratorium->getRujukanLabkesda(3);
	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */