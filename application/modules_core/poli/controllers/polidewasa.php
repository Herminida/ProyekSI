<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polidewasa extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_kir');
}
	public function index($id='')
	{	
		$this->template->load('templatePoli','poliklinik/v_polidewasa');

	}

	public function simpan(){
	if ($this->input->post('validasi_reg')=='1'){
		$success=$this->m_pasien->updatePemeriksaan($this->input->post('keluhan_utama'),$this->input->post('keluhan_sekunder'),$this->input->post('respirasi'),$this->input->post('suhu_badan'),$this->input->post('denyut_nadi'),$this->input->post('bb'),$this->input->post('tb'),$this->input->post('fisik'),$this->input->post('register'));
	}else{
		$this->m_pasien->simpanPemeriksaan($this->input->post('keluhan_utama'),$this->input->post('keluhan_sekunder'),$this->input->post('respirasi'),$this->input->post('suhu_badan'),$this->input->post('denyut_nadi'),$this->input->post('bb'),$this->input->post('tb'),$this->input->post('fisik'),$this->input->post('register'));
		//selesai simpan, update validasi reg
		$success=$this->m_pasien->validasireg('1',$this->input->post('register'));
		
	}
		echo '{"success":"'.$success.'","error":""}';
	}

	

	public function diagnosa($id=null){
		if (empty($id)){
		$this->load->view('poliklinik/v_diagnosa');
		}
	}

	public function antrian(){
		$this->view['source'] = 'polidewasa/ajaxantrian';
		$this->load->view('poliklinik/popup/v_antrian2',$this->view);
	}

	
	public function kir(){
		$this->template->load('templatePoli','poliklinik/v_kir');
	}

	public function ajaxkir(){
		echo $this->m_kir->get_listDataKir();
		//echo $this->db->last_query();
	}

	public function simpanKir(){
		$id_kir=$this->input->post('id_kir');
	if (empty($id_kir)){
		//echo 'simpan';
		$success=$this->m_kir->simpanKir($this->input->post('no_kir'),$this->input->post('dokter'),$this->input->post('guna'),$this->input->post('hasil'),$this->input->post('idpemeriksaan'));
		//echo $this->db->last_query();
		//die;
	}else{
		$success=$this->m_kir->updateKir($this->input->post('id_kir'),$this->input->post('dokter'),$this->input->post('guna'),$this->input->post('hasil'));
		
	}
		echo '{"success":"'.$success.'","error":""}';
	}

	public function hapusKir(){
		$success =  $this->m_kir->deleteKir($this->input->post('id_kir'));
		echo '{"success":"'.$success.'","error":""}';
	}

	public function cetakkir(){
		$data = $this->input->post();
		$this->load->view('poliklinik/laporan/kir/v_hasilkir.php',$data);	
	}


	public function ajaxantrian(){


	/*		if ( ( $this->input->get('iDisplayStart') ) && ($this->input->get('iDisplayLength') != '-1') )
	{
		echo $this->m_pasien->get_antrianPasien( $this->input->get('iDisplayStart'),$this->input->get('iDisplayLength'));
		die;
	}else{*/
		 echo $this->m_pasien->get_antrianPasien(null,null,null,3,null,null,null,null);
		
	/*}*/
	}

	public function ajaxSisaAntrian(){
		$data='';
		$data = $this->m_pasien->get_sisaAntrian(3);
		if (!empty($data)){
		echo json_encode($data[0]);
		}else
		{
		$data='';
		echo $data;
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

	


	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */