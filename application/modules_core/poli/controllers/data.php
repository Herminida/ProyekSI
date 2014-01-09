<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	}
	public function index()
	{	
		//$this->template->load('templatePoli','poliklinik/v_polidewasa');

	}

	public function getdatabbtbterakhir($anggota_keluarga_id,$idpemeriksaan){
		
		$query= $this->m_pasien->get_bbTbTerakhir($anggota_keluarga_id,$idpemeriksaan);
		$query = json_encode($query);
		echo $query;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */