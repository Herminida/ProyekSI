<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

function __construct(){
	parent::__construct();
	//$this->load->model('m_pasien');
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
		//$this->load->view('poliklinik/v_polianak',$this->view);
		$this->load->view('templateboot');

		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */