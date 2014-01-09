<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poligiziburuk extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_gizi');

}
	public function index($id='')
	{	
		$this->template->load('templatePoli','poliklinik/v_poligiziburuk');

	}


	public function antrian(){
		$this->view['source'] = 'poligizi/ajaxantrianawal';
		$this->load->view('poliklinik/popup/v_antrian2',$this->view);
	}
	public function ajaxgiziburuk(){
		
		$res['aaData']=$this->m_gizi->getPemeriksaanGiziBuruk();
        echo json_encode($res);
	}

	public function ajaxpemeriksaan($idpemeriksaan){
		$query=$this->m_gizi->getPemeriksaanGiziBuruk($idpemeriksaan);
		echo $this->db->last_query();
		if (!empty($query)){
			echo json_encode($query[0]);
		}else{
			echo null;
		}
	}
	public function simpan(){

		if ($this->input->post('id_sgb')!=''){
			$success=$this->m_gizi->updateGiziBuruk($this->input->post('id_sgb'),$this->input->post('id_penyakit'),$this->input->post('tindak_lanjut'),$this->input->post('status_kasus'));
		}else{
			$success=$this->m_gizi->simpanGiziBuruk($this->input->post('idpemeriksaan'),$this->input->post('id_penyakit'),$this->input->post('tindak_lanjut'),$this->input->post('status_kasus'));
			$success=$this->m_pasien->validasireg('1',$this->input->post('idpemeriksaan'));		
		}

		echo '{"success":"'.$success.'","error":""}';
			}
			
	public function hapus(){
		$success = $this->m_gizi->deleteGiziBuruk($this->input->post('id'));
		echo '{"success":"'.$success.'","error":""}';
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */