<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poliposyandu extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_gizi');
	$this->load->model('m_kelurahan');
}
	public function index($id='')
	{	
		$this->template->load('templatePoli','poliklinik/v_posyandu');

	}

	public function hapus(){
		$success=$this->m_gizi->deletePosyandu($this->input->post('id_posyandu'));
		echo '{"success":"'.$success.'","error":""}';
	}

	public function simpan(){
		if ($this->input->post('id_posyandu')==''){
			$success=$this->m_gizi->simpanPosyandu($this->input->post('kelurahan'),$this->input->post('tgl'),$this->input->post('jml_pend'),$this->input->post('jml_by'),$this->input->post('jml_blt'),$this->input->post('jml_posy'),$this->input->post('posy_jml'),$this->input->post('posy_by'),$this->input->post('posy_blt'),$this->input->post('status'),$this->input->post('tindak_lanjut'));
		}else{

		$success=$this->m_gizi->updatePosyandu($this->input->post('id_posyandu'),$this->input->post('kelurahan'),$this->input->post('tgl'),$this->input->post('jml_pend'),$this->input->post('jml_by'),$this->input->post('jml_blt'),$this->input->post('jml_posy'),$this->input->post('posy_jml'),$this->input->post('posy_by'),$this->input->post('posy_blt'),$this->input->post('status'),$this->input->post('tindak_lanjut'));
		}
		echo '{"success":"'.$success.'","error":""}';
	}

	public function diagnosa($id=null){
		if (empty($id)){
		$this->load->view('poliklinik/v_diagnosa');
		}
	}

	public function ajaxPosyandu(){
		echo $this->m_gizi->list_data_posyandu();
	}

	public function ajaxKelurahan(){
		$data= $this->m_kelurahan->getKelurahan();
		$response = json_encode($data);
		if (!empty($response)){
		echo $response;
	}else{
		echo null;
	}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */