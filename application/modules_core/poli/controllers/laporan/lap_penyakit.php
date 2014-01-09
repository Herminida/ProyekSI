<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lap_Penyakit extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('laporan/m_lappenyakit');
}
	public function index()
	{	
		$data['judul'] = '10 Besar Penyakit Puskesmas';
		$data['poli'] = '1';
		$this->template->load('templatePoli','poliklinik/laporan/v_templateheader',$data);

	}

public function getLaporanRekamExcel($poli,$judul,$unker,$tgl_awal,$tgl_akhir){
		$query['list']= $this->m_lappenyakit->list_data_teratas($unker,$tgl_awal,$tgl_akhir);
		$query['file']='poliklinik/laporan/umum/v_lap10penyakit';
		$query['judul']=$judul;
		$this->load->view('poliklinik/laporan/excel', $query);
	}

	public function getLaporanRekam($stat=null){
		$success = '';
		$query['list']= $this->m_lappenyakit->list_data_teratas($this->input->post('unker'),$this->input->post('tgl_awal'),$this->input->post('tgl_akhir'));
		$query['file']='poliklinik/laporan/umum/v_lap10penyakit';
		if (empty($query['list'])){
			return false;
		}else{
				$this->load->view('poliklinik/laporan/umum/v_lap10penyakit',$query);
			}
		}	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */