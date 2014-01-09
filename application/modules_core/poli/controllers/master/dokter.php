<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('master/mm_dokter');
}
	public function index()
	{	
		$this->template->load('templatePoli','master/v_dokter');

	}

	public function getListDokter(){
		$query= $this->mm_dokter->list_data_master_dokter();
		$query = json_encode($query);
		echo $query;
	}

	public function simpanDokter(){
		$idD=$this->input->post('id_dokter');
		if (empty($idD)){
		 $success=$this->mm_dokter->create_dokter();
		 }else{
		 $success=$this->mm_dokter->update_dokter();	
		 }
		 echo '{"success":"'.$success.'","error":""}';

	}

	public function hapusDokter(){
		$idD=$this->input->post('id_dokter');
		if (!empty($idD)){
		 $success=$this->mm_dokter->delete_dokter();	
		 }
		 echo '{"success":"'.$success.'","error":""}';
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */