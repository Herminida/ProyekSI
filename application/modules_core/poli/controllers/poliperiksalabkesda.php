<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class poliperiksalabkesda extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_laboratorium');
}
	public function index($id='')
	{	
		$this->template->load('templateLabkesda','poliklinik/v_polilab');

	}

	public function antrian(){
		$this->view['source'] = 'poliperiksalabkesda/ajaxantrian/1';
		$this->load->view('poliklinik/popup/v_antrianperiksalab',$this->view);
	}

	public function simpan(){
	if ($this->input->post('f_lab')==''){
			$success=$this->m_laboratorium->simpanPeriksa();
		}else{

		$success=$this->m_laboratorium->updatePeriksa();
		}
		
		echo '{"success":"'.$success.'","error":""}';
	}
	

	public function cetakhasillab(){
		$this->view['source'] = $this->input->post();
		echo $this->load->view('poliklinik/v_cetakhasillab',$this->view);
		return true;

	}


	public function ajaxantrian($stat){
		echo $this->m_laboratorium->getRujukanLabkesda($stat);
		//echo $this->db->last_query();
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */