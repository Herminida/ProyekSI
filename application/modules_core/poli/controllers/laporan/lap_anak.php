<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lap_Anak extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('laporan/m_lappasien');
	$this->load->helper('rekam_medis');
}
	public function index()
	{	
		$data['judul'] = 'ANAK';
		$data['poli'] = '1';
		$this->template->load('templatePoli','poliklinik/laporan/v_templateheader',$data);

	}

public function getLaporanRekamExcel($poli,$judul,$unker,$tgl_awal,$tgl_akhir){
		$query['data']= $this->m_lappasien->getDataPasienByPoli($poli,$unker,$tgl_awal,$tgl_akhir);
		$query['file']='poliklinik/laporan/umum/v_laprekamdewasa';
		$query['poli']=$poli;
		$query['judul']=$judul;
		$this->load->view('poliklinik/laporan/excel', $query);
	}

	public function getLaporanRekam($stat=null){
		$success = '';
		$query['data']= $this->m_lappasien->getDataPasienByPoli($this->input->post('poli'),$this->input->post('unker'),$this->input->post('tgl_awal'),$this->input->post('tgl_akhir'));
		$query['file']='poliklinik/laporan/umum/v_laprekamdewasa';
		$query['poli']=$this->input->post('poli');
		if (empty($query['data'])){
			return false;
		}else{
			if ($stat){
			 $this->load->view('poliklinik/laporan/umum/v_laprekamdewasa',$query,true);
			}else{
				$this->load->view('poliklinik/laporan/umum/v_laprekamdewasa',$query);
			}
		}	
	}	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */