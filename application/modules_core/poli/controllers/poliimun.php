<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poliimun extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_imun');
}
	public function index($id='')
	{	
		$this->template->load('templatePoli','poliklinik/v_poliimun');

	}

	public function simpan(){
		if ($this->input->post('validasi_reg')=='1'){
			$success=$this->m_imun->updateImun($this->input->post('bcg'),$this->input->post('hb07'),$this->input->post('dpthb1'),$this->input->post('pol1'),$this->input->post('campak'),$this->input->post('hb828'),$this->input->post('dpthb2'),$this->input->post('pol2'),$this->input->post('dpthb3'),$this->input->post('pol3'),$this->input->post('pol4'),$this->input->post('ket'),$this->input->post('idpemeriksaan'));
			$success=$this->m_pasien->updatePemeriksaan($this->input->post('keluhan_utama'),$this->input->post('keluhan_sekunder'),$this->input->post('respirasi'),$this->input->post('suhu_badan'),$this->input->post('denyut_nadi'),$this->input->post('bb'),$this->input->post('tb'),$this->input->post('fisik'),$this->input->post('idpemeriksaan'));
		}else{
			$success=$this->m_pasien->simpanPemeriksaan($this->input->post('keluhan_utama'),$this->input->post('keluhan_sekunder'),$this->input->post('respirasi'),$this->input->post('suhu_badan'),$this->input->post('denyut_nadi'),$this->input->post('bb'),$this->input->post('tb'),$this->input->post('fisik'),$this->input->post('idpemeriksaan'));
			$success=$this->m_imun->simpanImun($this->input->post('bcg'),$this->input->post('hb07'),$this->input->post('dpthb1'),$this->input->post('pol1'),$this->input->post('campak'),$this->input->post('hb828'),$this->input->post('dpthb2'),$this->input->post('pol2'),$this->input->post('dpthb3'),$this->input->post('pol3'),$this->input->post('pol4'),$this->input->post('ket'),$this->input->post('idpemeriksaan'));
			$success=$this->m_pasien->validasireg('1',$this->input->post('idpemeriksaan'));
			
		}
		//echo $this->db->last_query();
		echo '{"success":"'.$success.'","error":""}';
	}


	public function antrian(){
		$this->view['source'] = 'poliimun/ajaxantrian';
		$this->load->view('poliklinik/popup/v_antrian2',$this->view);
	}


	public function ajaxantrian(){
		echo $this->m_pasien->get_antrianPasien(null,null,null,6,null,null,null,null);
	}

	public function ajaxSisaAntrian(){
		$data='';
		$data = $this->m_pasien->get_sisaAntrian(6);
		if (!empty($data)){
		echo json_encode($data[0]);
		}else
		{
		$data='';
		echo $data;
		}
	}

	public function ajaxpemeriksaan($idpemeriksaan){
		$data=$this->m_imun->getPemeriksaanImun($idpemeriksaan);
		$response=json_encode($data[0]);
		if (!empty($response)){
		echo $response;
	}else{
		echo null;
	}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */