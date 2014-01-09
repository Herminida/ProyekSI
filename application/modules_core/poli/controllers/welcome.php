<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		
		//$this->view['dataview']=$this->m_pasien->get_antrianPasien('year(time_kunjungan) > 2012');
		
		//
		//$this->view['dataview'] = $this->m_pasien->get_alergiPasien('6473025606000009','','');
		/*if (empty($id)){
		$this->view['form'] =$this->m_pasien->get_alergiPasienByRm('');
		}else{
		$this->view['form']=$this->m_pasien->get_alergiPasienByRm('6473025606000009');
		}
		$this->load->view('poliklinik/v_polianak',$this->view);*/
	}

	public function edit(){
		//$this->view['form'] = $this->m_pasien->get_alergiPasienByRm('$id');
		$this->load->view('poliklinik/v_polianak');
	}

	public function diagnosa($id=null){
		if (empty($id)){
		$this->load->view('poliklinik/popup/v_diagnosa');
		}
	}

	public function antrian(){
		$this->view['data'] = $this->m_pasien->get_antrianPasien(1,10);
		$this->load->view('poliklinik/popup/v_antrian',$this->view);
	}
	public function dataAntri(){
		echo $this->m_pasien->get_antrianPasien(0,10);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */