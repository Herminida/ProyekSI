<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poliigd extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_pasien');
	}

	public function index($id='')
	{	$this->view['namapoli'] = 'poliigd';
		$this->template->load('templatePoli','poliklinik/v_poliigd',$this->view);

	}

	public function simpan(){
		
			if ($this->input->post('validasi_reg')==='1'){
				$success=$this->m_pasien->updatePemeriksaan($this->input->post('keluhan_utama'),$this->input->post('keluhan_sekunder'),$this->input->post('respirasi'),$this->input->post('suhu_badan'),$this->input->post('denyut_nadi'),$this->input->post('bb'),$this->input->post('tb'),$this->input->post('fisik'),$this->input->post('idpemeriksaan'));
			}else{
				$this->m_pasien->simpanPemeriksaan($this->input->post('keluhan_utama'),$this->input->post('keluhan_sekunder'),$this->input->post('respirasi'),$this->input->post('suhu_badan'),$this->input->post('denyut_nadi'),$this->input->post('bb'),$this->input->post('tb'),$this->input->post('fisik'),$this->input->post('idpemeriksaan'));
				$success=$this->m_pasien->validasireg('1',$this->input->post('register'));
			}
			// echo($this->db->last_query());
			echo '{"success":"'.$success.'","error":""}';
		
	}

	public function diagnosa($id=null){
		if (empty($id)){
		$this->load->view('poliklinik/v_diagnosa');
		}
	}

	public function ajaxpemeriksaan($id_pemeriksaan){
		$data=$this->m_pasien->get_PemeriksaanByregister($id_pemeriksaan);
		$response=json_encode($data[0]);
		if (!empty($response)){
		echo $response;
	}else{
		echo null;
	}
	}

	public function antrian(){
		$this->view['source'] = 'poliigd/ajaxantrianawal';
		$this->load->view('poliklinik/popup/v_antrian2',$this->view);
	}

	public function ajaxantrian(){
		echo $this->m_pasien->get_antrianPasien();
	}

	public function ajaxantrianawal(){
	
		echo $this->m_pasien->get_antrianPasien(null,null,null,2,null,null,null,null);
	}

	public function ajaxSisaAntrian(){
		$data='';
		$data = $this->m_pasien->get_sisaAntrian(2);
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