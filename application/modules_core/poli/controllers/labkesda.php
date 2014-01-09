<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class labkesda extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_laboratorium');
}
	public function index($id='')
	{	
		$this->template->load('templateLabkesda','poliklinik/v_labkesda');

	}
	public function simpan(){
		$id = $this->input->post('id_lab');
		if (empty($id)){
			$success=$this->m_laboratorium->create_reg(
			$this->input->post('id_unit_kerja'),$this->input->post('no_rm'),'','',$this->input->post('sedimen'),$this->input->post('urine'),$this->input->post('hematologi'),$this->input->post('bakteriologi'),$this->input->post('tes_hamil'),$this->input->post('lainlain'),$this->input->post('id_kunjungan'));
		}else{
			$success=$this->m_laboratorium->update_reg($this->input->post('id_lab'),$this->input->post('id_unit_kerja'),$this->input->post('no_rm'),'','',$this->input->post('sedimen'),$this->input->post('urine'),$this->input->post('hematologi'),$this->input->post('bakteriologi'),$this->input->post('tes_hamil'),$this->input->post('lainlain'),$this->input->post('id_kunjungan'),$this->input->post('id_unit_kerja'));
			//echo $this->db->last_query();
		}
		echo '{"success":"'.$success.'","error":""}';
	}

	public function antrian(){
		$this->view['source'] = 'labkesda/ajaxkk';
		$this->load->view('poliklinik/popup/v_antrianlabkesda',$this->view);
	}

	


	public function ajaxantrian(){
	echo $this->m_laboratorium->getRujukanLabkesda(4);
	//echo $this->db->last_query();
	}

	public function ajaxkk(){
		echo $this->m_pasien->get_allpasien();
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */