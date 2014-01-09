<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tindakan extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('mm_tindakan');
}
	public function index(){
		$this->template->load('templatePoli','tindakan/v_tindakan');
	}

	public function kelompok()
	{	
		$this->template->load('templatePoli','tindakan/v_kelompok_tindakan');

	}

	public function getListKelompok(){
		$query= $this->mm_tindakan->list_data_master_kelompok();
		$query = json_encode($query);
		echo $query;
	}

	public function getListTindakan(){
	$query= $this->mm_tindakan->list_data_master_tindakan();
		$query = json_encode($query);
		echo $query;
	}


	public function ajaxKelompok(){
		$data= $this->mm_tindakan->getKelompok();
		$response = json_encode($data);
		if (!empty($response)){
		echo $response;
	}else{
		echo null;
	}
	}

	public function ajaxKlinikKelompok($id){
		$data= $this->mm_tindakan->getKlinikKelompok($id);
		$response = json_encode($data);
		if (!empty($response)){
		echo $response;
	}else{
		echo null;
	}
	}

	public function simpanKelompok(){
		$idD=$this->input->post('id_kelompok');
		if (empty($idD)){
		 $success=$this->mm_tindakan->create_master_kelompok();
		 }else{
		 $success=$this->mm_tindakan->update_master_kelompok();
		 }
		 echo '{"success":"'.$success.'","error":""}';

	}

	public function hapusKelompok(){
		$idD=$this->input->post('id_kelompok');
		if (!empty($idD)){
		 $success=$this->mm_tindakan->delete_master_kelompok();	
		 }
		 echo '{"success":"'.$success.'","error":""}';
	}

	public function simpanTindakan(){
		$idD=$this->input->post('id_tindakan');
		if (empty($idD)){
		 $success=$this->mm_tindakan->create_master_tindakan();
		 }else{
		 $success=$this->mm_tindakan->update_master_tindakan();	
		 }
		 echo '{"success":"'.$success.'","error":""}';

	}

	public function hapusTindakan(){
		$idD=$this->input->post('id_tindakan');
		if (!empty($idD)){
		 $success=$this->mm_tindakan->delete_master_tindakan();	
		 }
		 echo '{"success":"'.$success.'","error":""}';
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */