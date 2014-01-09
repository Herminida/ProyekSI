<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polilab extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_laboratorium');
}
	public function index($id='')
	{	
		$this->template->load('templatePoli','poliklinik/v_polilab');

	}

	public function antrian(){
		$this->view['source'] = 'polilab/ajaxantrian/1';
		$this->load->view('poliklinik/popup/v_antrianperiksalab',$this->view);
	}

	public function simpan(){
	if ($this->input->post('f_lab')==''){
			$success=$this->m_laboratorium->simpanPeriksa();
			if($success){
				$this->m_pasien->validasireg('1',$this->input->post('idpemeriksaan'));
			}
		}else{

		$success=$this->m_laboratorium->updatePeriksa();
		}
		
		echo '{"success":"'.$success.'","error":""}';
	}

	public function cetak(){
		$this->template->load('templatePoli','poliklinik/v_cetaklab');
	}


	public function antrianhasil(){
		$this->view['source'] = 'polilab/ajaxantrian/3';
		$this->load->view('poliklinik/popup/v_antrianhasillab',$this->view);
	}

	public function cetakhasillab(){
		$this->view['source'] = $this->input->post();
		echo $this->load->view('poliklinik/v_cetakhasillab',$this->view);
		return true;

	}


	public function ajaxantrian($stat){
		echo $this->m_laboratorium->getRujukanLab($stat);
		//echo $this->db->last_query();
		
	}

	public function ajaxantrianlabkesda($stat){
		echo $this->m_laboratorium->getRujukanLabkesda($stat);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */