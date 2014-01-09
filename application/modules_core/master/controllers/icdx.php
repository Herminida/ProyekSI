<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Icdx extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('mm_icdx');
}
	public function index(){
		$this->template->load('templatePoli','master/icdx/v_icdx');
	}

	public function kelompok()
	{	
		$this->template->load('templatePoli','icdx/v_kelompok_icdx');

	}

	public function subkelompok()
	{	
		$this->template->load('templatePoli','icdx/v_subkelompok_icdx');

	}

	public function getListKelompok(){
		$query= $this->mm_icdx->list_data_master_kelompok();
		$query = json_encode($query);
		echo $query;
	}

	public function getListSubKelompok(){
	$query= $this->mm_icdx->list_data_master_subkelompok();
		$query = json_encode($query);
		echo $query;
	}

	public function getListPenyakit(){
		$query= $this->mm_icdx->list_data_master_penyakit();
		$query = json_encode($query);
		echo $query;
	}

	public function ajaxKelompok(){
		$data= $this->mm_icdx->getKelompok();
		$response = json_encode($data);
		if (!empty($response)){
		echo $response;
	}else{
		echo null;
	}
	}

	public function ajaxSubKelompok($id){
		$data= $this->mm_icdx->getSubKelompok($id);
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
		 $success=$this->mm_icdx->create_master_kelompok();
		 }else{
		 $success=$this->mm_icdx->update_master_kelompok();
		 }
		 echo '{"success":"'.$success.'","error":""}';

	}

	public function hapusKelompok(){
		$idD=$this->input->post('id_kelompok');
		if (!empty($idD)){
		 $success=$this->mm_icdx->delete_master_kelompok();	
		 }
		 echo '{"success":"'.$success.'","error":""}';
	}

	public function simpanSubKelompok(){
		$idD=$this->input->post('id_subkelompok');
		if (empty($idD)){
		 $success=$this->mm_icdx->create_master_subkelompok();
		 }else{
		 $success=$this->mm_icdx->update_master_subkelompok();	
		 }
		 echo '{"success":"'.$success.'","error":""}';

	}

	public function hapusSubKelompok(){
		$idD=$this->input->post('id_subkelompok');
		if (!empty($idD)){
		 $success=$this->mm_icdx->delete_master_subkelompok();	
		 }
		 echo '{"success":"'.$success.'","error":""}';
	}


	public function simpanPenyakit(){
		$idD=$this->input->post('id');
		if (empty($idD)){
		 $success=$this->mm_icdx->create_master_penyakit();
		 }else{
		 $success=$this->mm_icdx->update_master_penyakit();	
		 }
		 echo '{"success":"'.$success.'","error":""}';

	}

	public function hapusPenyakit(){
		$idD=$this->input->post('id');
		if (!empty($idD)){
		 $success=$this->mm_icdx->delete_master_penyakit();	
		 }
		 echo '{"success":"'.$success.'","error":""}';
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */