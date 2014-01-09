<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('master/m_kegiatan');
}
	public function index()
	{	
		$this->template->load('templatePoli','master/v_kegiatan');

	}

	public function kategori()
	{	
		$this->template->load('templatePoli','master/v_kategori_kegiatan');

	}

	public function getListKategori(){
		$query= $this->m_kegiatan->list_data_master_kategori();
		$query = json_encode($query);
		echo $query;
	}

	public function getListKegiatan(){
		$query= $this->m_kegiatan->list_data_master();
		$query = json_encode($query);
		echo $query;
	}

	public function getDataKegiatan(){
		$query= $this->m_kegiatan->list_data_input();
		$query = json_encode($query);
		echo $query;
	}

	public function ajaxKategori(){
		$data= $this->m_kegiatan->getKategori();
		$response = json_encode($data);
		if (!empty($response)){
		echo $response;
	}else{
		echo null;
	}
	}

	public function ajaxKegiatan($id){
		$data= $this->m_kegiatan->getKegiatan($id);
		$response = json_encode($data);
		if (!empty($response)){
		echo $response;
	}else{
		echo null;
	}
	}
	public function simpaninput(){
		$idD=$this->input->post('id');
		if (empty($idD)){
		 $success=$this->m_kegiatan->create_input();
		 }else{
		 $success=$this->m_kegiatan->update_input();	
		 }
		 echo '{"success":"'.$success.'","error":""}';

	}

	public function hapusInput(){
		$idD=$this->input->post('id');
		if (!empty($idD)){
		 $success=$this->m_kegiatan->delete_input();	
		 }
		 echo '{"success":"'.$success.'","error":""}';
	}

	public function simpanKegiatan(){
		$idD=$this->input->post('kategori');
		if (empty($idD)){
		 $success=$this->m_kegiatan->create_master();
		 }else{
		 $success=$this->m_kegiatan->update_master();	
		 }
		 echo '{"success":"'.$success.'","error":""}';

	}

	public function hapusKegiatan(){
		$idD=$this->input->post('id_kegiatan');
		if (!empty($idD)){
		 $success=$this->m_kegiatan->delete_master();	
		 }
		 echo '{"success":"'.$success.'","error":""}';
	}


	public function simpanKategori(){
		$idD=$this->input->post('id_kategori');
		if (empty($idD)){
		 $success=$this->m_kegiatan->create_master_kategori();
		 }else{
		 $success=$this->m_kegiatan->update_master_kategori();	
		 }
		 echo '{"success":"'.$success.'","error":""}';
	}

	public function hapusKategori(){
		$idD=$this->input->post('id_kategori');
		if (!empty($idD)){
		 $success=$this->m_kegiatan->delete_master_kategori();	
		 }
		 echo '{"success":"'.$success.'","error":""}';
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */