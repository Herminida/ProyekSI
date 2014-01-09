<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poligigi extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_gigi');
}
	public function index($id='')
	{	
		$this->template->load('templatePoli','poliklinik/v_poligigi');

	}

	public function simpan(){
		//echo $this->input->post('validasi_reg');
		if ($this->input->post('validasi_reg')=='1'){
			$success=$this->m_gigi->updateGigi($this->input->post('termal'),$this->input->post('soundase'),$this->input->post('percusi'),$this->input->post('druk'), $this->input->post('jaringan_lunak'),$this->input->post('debris_index'),$this->input->post('calculus_index'),$this->input->post('status_localis'),$this->input->post('ekstra_oral'),$this->input->post('idpemeriksaan'));
			$success=$this->m_pasien->updatePemeriksaan($this->input->post('keluhan_utama'),$this->input->post('keluhan_sekunder'),$this->input->post('respirasi'),$this->input->post('suhu_badan'),$this->input->post('denyut_nadi'),$this->input->post('bb'),$this->input->post('tb'),$this->input->post('fisik'),$this->input->post('idpemeriksaan'));
		}else{
			$success=$this->m_gigi->simpanGigi($this->input->post('termal'),$this->input->post('soundase'),$this->input->post('percusi'),$this->input->post('druk'), $this->input->post('jaringan_lunak'),$this->input->post('debris_index'),$this->input->post('calculus_index'),$this->input->post('status_localis'),$this->input->post('ekstra_oral'),$this->input->post('idpemeriksaan'));
			$success=$this->m_pasien->simpanPemeriksaan($this->input->post('keluhan_utama'),$this->input->post('keluhan_sekunder'),$this->input->post('respirasi'),$this->input->post('suhu_badan'),$this->input->post('denyut_nadi'),$this->input->post('bb'),$this->input->post('tb'),$this->input->post('fisik'),$this->input->post('idpemeriksaan'));
			$success=$this->m_pasien->validasireg('1',$this->input->post('idpemeriksaan'));		



			
		}
		//echo $this->db->last_query();
		echo '{"success":"'.$success.'","error":""}';
	}


	public function antrian(){
		$this->view['source'] = 'poligigi/ajaxantrian';
		$this->load->view('poliklinik/popup/v_antrian2',$this->view);
	}


	public function ajaxantrian(){
		echo $this->m_pasien->get_antrianPasien(null,null,null,5,null,null,null,null);
	}

	public function ajaxSisaAntrian(){
		$data='';
		$data = $this->m_pasien->get_sisaAntrian(5);
		if (!empty($data)){
		echo json_encode($data[0]);
		}else
		{
		$data='';
		echo $data;
		}
	}

	public function ajaxpemeriksaan($idpemeriksaan){
		$query=$this->m_gigi->getPemeriksaanGigi($idpemeriksaan);
		$response = json_encode($query[0]);
		if (!empty($response)){
		echo $response;
		}else{
		echo null;
	}

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */