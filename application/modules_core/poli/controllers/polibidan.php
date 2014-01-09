<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polibidan extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_kebidanan');
}
	public function index($id='')
	{	
		$this->template->load('templatePoli','poliklinik/v_polibidan');

	}

	public function antrian(){
		$this->view['source'] = 'polibidan/ajaxantrian';
		$this->load->view('poliklinik/popup/v_antrian2',$this->view);
	}

	public function ajaxantrian(){
		echo $this->m_pasien->get_antrianPasien(null,null,null,7,null,null,null,null);
		// echo $this->db->last_query();
	}

	public function getkia($rm=0){
		$return=$this->m_kebidanan->getKia($rm);
		echo json_encode($return);
	}

	public function simpankia(){
		if($frm=$this->input->post()){
			// echo json_encode($frm);
			if ($this->input->post('validasi_reg')!='1'){
				//$this->m_pasien->validasireg('1',$this->input->post('register'));
			}
			$success=$this->m_kebidanan->simpanKia($this->input->post('id_kia'),$this->input->post('no_rm'),$this->input->post('puskesmas'),$this->input->post('tgl_kia'));
			$return=array(
				'success'=>$success,
				'error'=>$this->db->_error_message()
			);
			echo json_encode($return);
		}
	}

	public function getkehamilan($reg=0){
		$return=$this->m_kebidanan->getKehamilanByRegister($reg);
		echo json_encode($return);
	}

	public function simpankehamilan(){
		if($frm=$this->input->post()){
			// echo json_encode($frm);
			if ($this->input->post('validasi_reg')!='1'){
				//$this->m_pasien->validasireg('1',$this->input->post('register'));
			}
			$success=$this->m_kebidanan->simpanKehamilan();
			$return=array(
				'success'=>$success,
				'error'=>$this->db->_error_message()
			);
			echo json_encode($return);
		}
	}

	public function getantenatal($rm=0){
		$return=$this->m_kebidanan->getAntenatal($rm);
		echo json_encode($return);
	}

	public function simpanantenatal(){
		if($frm=$this->input->post()){
			// echo json_encode($frm);
			if ($this->input->post('validasi_reg')!='1'){
				//$this->m_pasien->validasireg('1',$this->input->post('register'));
			}
			$success=$this->m_kebidanan->simpanAntenatal();
			$return=array(
				'success'=>$success,
				'error'=>$this->db->_error_message()
			);
			echo json_encode($return);
		}
	}

	public function hapusanantenatal($id=0){
		$success=$this->m_kebidanan->hapusAntenatal($id);
		$return=array(
			'success'=>$success,
			'error'=>$this->db->_error_message()
		);
		echo json_encode($return);
	}

	public function getpersalinan($rm=0){
		$return=$this->m_kebidanan->getPersalinan($rm);
		echo json_encode($return);
	}

	public function simpanpersalinan(){
		if($frm=$this->input->post()){
			// echo json_encode($frm);
			if ($this->input->post('validasi_reg')!='1'){
				//$this->m_pasien->validasireg('1',$this->input->post('register'));
			}
			$success=$this->m_kebidanan->simpanPersalinan();
			$return=array(
				'success'=>$success,
				'error'=>$this->db->_error_message()
			);
			echo json_encode($return);
		}
	}

	public function hapuspersalinan($id=0){
		$success=$this->m_kebidanan->hapusPersalinan($id);
		$return=array(
			'success'=>$success,
			'error'=>$this->db->_error_message()
		);
		echo json_encode($return);
	}

	public function getnifas($rm=0){
		$return=$this->m_kebidanan->getNifas($rm);
		echo json_encode($return);
	}

	public function ajaxSisaAntrian(){
		$data='';
		$data = $this->m_pasien->get_sisaAntrian(7);
		if (!empty($data)){
		echo json_encode($data[0]);
		}else
		{
		$data='';
		echo $data;
		}
	}

	public function simpannifas(){
		if($frm=$this->input->post()){
			// echo json_encode($frm);
			if ($this->input->post('validasi_reg')!='1'){
				//$this->m_pasien->validasireg('1',$this->input->post('register'));
			}
			$success=$this->m_kebidanan->simpanNifas();
			$return=array(
				'success'=>$success,
				'error'=>$this->db->_error_message()
			);
			echo json_encode($return);
		}
	}

	public function hapusnifas($id=0){
		$success=$this->m_kebidanan->hapusNifas($id);
		$return=array(
			'success'=>$success,
			'error'=>$this->db->_error_message()
		);
		echo json_encode($return);
	}

	public function selesaibidan(){
		$success = $this->m_pasien->validasireg('1',$this->input->post('idpemeriksaan'));
		$return=array(
			'success'=>$success,
			'error'=>$this->db->_error_message()
		);
		echo json_encode($return);
	}
}

/* End of file */
/* Location: ./application/controllers/ */