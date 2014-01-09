<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polidewasa extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
}
	public function index($id='')
	{	
		$this->template->load('templatePoli','poliklinik/v_polidewasa');

	}

	public function edit(){
		$this->view['form'] = $this->m_pasien->get_alergiPasienByRm('$id');
		$this->load->view('poliklinik/v_polianak');
	}

	public function diagnosa($id=null){
		if (empty($id)){
		$this->load->view('poliklinik/v_diagnosa');
		}
	}

	public function antrian(){
		$this->view['data'] = $this->m_pasien->get_antrianPasien(0,10);
		$this->load->view('poliklinik/v_antrian',$this->view);
	}
	public function kir(){
		//$this->view['data'] = $this->m_pasien->get_antrianPasien(0,10);
		$this->load->view('poliklinik/v_kir');
	}

	public function ajaxantrian(){
	/*		if ( ( $this->input->get('iDisplayStart') ) && ($this->input->get('iDisplayLength') != '-1') )
	{
		echo $this->m_pasien->get_antrianPasien( $this->input->get('iDisplayStart'),$this->input->get('iDisplayLength'));
		die;
	}else{*/
		echo $this->m_pasien->get_antrianPasien('0','10');
	/*}*/
	}

	public function dataAntri(){
		echo $this->m_pasien->get_antrianPasien(0,10);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */