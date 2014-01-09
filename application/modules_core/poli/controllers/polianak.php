<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polianak extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('m_pasien');
	}

	public function index($id='')
	{	$this->view['namapoli'] = 'polianak';
		$this->template->load('templatePoli','poliklinik/v_polianak',$this->view);

	}

	public function simpan(){
		if($frm=$this->input->post()){
			// echo json_encode($frm);
			if ($this->input->post('validasi_reg')==='1'){
				$success=$this->m_pasien->updatePemeriksaan($this->input->post('keluhan_utama'),$this->input->post('keluhan_sekunder'),$this->input->post('respirasi'),$this->input->post('suhu_badan'),$this->input->post('denyut_nadi'),$this->input->post('bb'),$this->input->post('tb'),$this->input->post('fisik'),$this->input->post('idpemeriksaan'));
			}else{
				$this->m_pasien->simpanPemeriksaan($this->input->post('keluhan_utama'),$this->input->post('keluhan_sekunder'),$this->input->post('respirasi'),$this->input->post('suhu_badan'),$this->input->post('denyut_nadi'),$this->input->post('bb'),$this->input->post('tb'),$this->input->post('fisik'),$this->input->post('idpemeriksaan'));
				$success=$this->m_pasien->validasireg('1',$this->input->post('idpemeriksaan'));
			}
			// echo($this->db->last_query());
			echo '{"success":"'.$success.'","error":""}';
		}
	}

	public function diagnosa($id=null){
		if (empty($id)){
		$this->load->view('poliklinik/v_diagnosa');
		}
	}

	public function antrian(){
		// $this->view['data'] = $this->m_pasien->get_antrianPasien(0,10);
		$this->view['source'] = 'polianak/ajaxantrian';
		$this->load->view('poliklinik/popup/v_antrian2',$this->view);
	}

	public function ajaxantrian(){
	/*		if ( ( $this->input->get('iDisplayStart') ) && ($this->input->get('iDisplayLength') != '-1') )
	{
		echo $this->m_pasien->get_antrianPasien( $this->input->get('iDisplayStart'),$this->input->get('iDisplayLength'));
		die;
	}else{*/
		echo $this->m_pasien->get_antrianPasien(null,null,null,1,null,null,null,null);
		// $key=$this->input->post('key');
		// echo $this->m_pasien->get_antrianPasien(null,null,$key,$this->id_poliklinik);
	/*}*/
	}

	public function ajaxSisaAntrian(){
		$data='';
		$data = $this->m_pasien->get_sisaAntrian(1);
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