<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polisampel extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_laboratorium');
}
	public function index($id='')
	{	
		$this->template->load('templatePoli','poliklinik/v_polisampellab');

	}
	public function simpan(){
		$success = $this->m_laboratorium->updateSampling();
		echo '{"success":"'.$success.'","error":""}';
	}

	public function antrian(){
		$this->view['source'] = 'polisampel/ajaxantrian';
		$this->load->view('poliklinik/popup/v_antrianlab',$this->view);
	}

	public function ajaxantrian(){
	echo $this->m_laboratorium->getRujukanLab(0);
	//echo $this->db->last_query();
	//	echo $this->db->last_query();

	}

	public function cetakhasillab(){
		$this->view['source'] = $this->input->post();
		echo $this->load->view('poliklinik/v_cetakhasillab',$this->view);
		return true;

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */