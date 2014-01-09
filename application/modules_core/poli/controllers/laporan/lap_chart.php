<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lap_Chart extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('laporan/m_lappenyakit');
	$this->load->helper('rekam_medis');
}
	public function index()
	{	
		$data['judul'] = 'Grafik 10 Besar Penyakit Puskesmas';
		$data['poli'] = '1';
		$this->template->load('templatePoli','poliklinik/laporan/v_lapchart',$data);

	}

public function getGrafikPenyakit(){
		$query['data']= $this->m_lappenyakit->ajaxDataPenyakit();
		//echo $this->db->last_query();
		if($query['data']){

		$i=0;
		foreach ($query['data'] as $key) {
//*rand(5,17)
		 $isi[$i]=array((float)$i+1,(float)$key['jml']);
		 //$isi[$i]=array($key['nama_penyakit'],(float)$key['jml']);
		 $label[$i]=$key['nama_penyakit'];
			$i++;
		}
		
		$query['data']=array($isi);
		$query['label']=$label;
		print_r(json_encode($query));
	}else
	{
		$query="";
		print_r(json_encode($query));

	}
		/*if (empty($query['data'])){
			return false;
		}else{
			if ($stat){
			 $this->load->view('poliklinik/laporan/umum/v_laprekamdewasa',$query,true);
			}else{
				$this->load->view('poliklinik/laporan/umum/v_laprekamdewasa',$query);
			}
	}*/

}
}
