<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polikb extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_kb');
}
	public function index($id='')
	{
		$this->template->load('templatePoli','poliklinik/v_polikb');
	}

	public function getkb($no_rm='',$register=''){
		$return=$this->m_kb->getKbStatus($no_rm,$register);
		// echo $this->db->last_query();
		echo json_encode($return);
	}

	public function simpan(){
		if($frm=$this->input->post()){
			// echo json_encode($frm);
			if ($this->input->post('validasi_reg')!='1'){
				//$this->m_pasien->validasireg('1',$this->input->post('register'));
			}
			$return=array(
				'success'=>$this->m_kb->simpanKbStatus(),
				'error'=>$this->db->_error_message()
			);
			echo json_encode($return);
		}
	}

	public function getkbulang($no_rm='',$register=''){
		$return=$this->m_kb->getKbKunjunganUlang($no_rm,$register);
		// echo $this->db->last_query();
		echo json_encode($return);
	}

	public function simpanulang(){
		if($frm=$this->input->post()){
			// echo json_encode($frm);
			if ($this->input->post('validasi_reg')!='1'){
				//$this->m_pasien->validasireg('1',$this->input->post('register'));
			}
			$return=array(
				'success'=>$this->m_kb->simpanKunjunganUlang(),
				'error'=>$this->db->_error_message()
			);
			echo json_encode($return);
		}
	}

	public function antrian(){
		$this->view['source'] = 'polikb/ajaxantrian';
		$this->load->view('poliklinik/popup/v_antrian2',$this->view);
	}

	public function ajaxantrian(){
		echo $this->m_pasien->get_antrianPasien(null,null,null,8,null,null,null,null);
		// echo $this->db->last_query();
	}

	public function ajaxSisaAntrian(){
		$data='';
		$data = $this->m_pasien->get_sisaAntrian(8);
		if (!empty($data)){
		echo json_encode($data[0]);
		}else
		{
		$data='';
		echo $data;
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */