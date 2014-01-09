<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polisampellabkesda extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_laboratorium');
}
	public function index($id='')
	{	
		$this->template->load('templateLabkesda','poliklinik/v_polisampellab');

	}
	public function simpan(){
		$success = $this->m_laboratorium->updateSampling();
		echo '{"success":"'.$success.'","error":""}';
	}

	public function antrian(){
		$this->view['source'] = 'polisampellabkesda/ajaxantrian';
		$this->load->view('poliklinik/popup/v_antrianlab',$this->view);
	}

	public function ajaxantrian(){
		echo $this->m_laboratorium->getRujukanLabkesda(0);
	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */