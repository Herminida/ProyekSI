<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lap_LB extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->helper('lap_lb');
	$this->load->model('laporan/m_lb1');
}
	public function index()
	{	
		$data['judul'] = 'LB 1';
		$data['poli'] = '1';
		$this->template->load('templatePoli','poliklinik/laporan/v_templateheader',$data);

	}

public function getLaporanRekamExcel($poli,$judul,$unker,$tgl_awal,$tgl_akhir){
		$query['list']= $this->m_lb1->list_data_lb1($unker,$tgl_awal,$tgl_akhir);
		$query['file']='poliklinik/laporan/umum/v_lapLB1';
		$query['judul']=$judul;
		$this->load->view('poliklinik/laporan/excel', $query);
	}

	public function getLaporanRekam($stat=null){
		$success = '';
		$query['list']= $this->m_lb1->list_data_lb1($this->input->post('unker'),$this->input->post('tgl_awal'),$this->input->post('tgl_akhir'));
		//print_r($query['list']);die;
		$query['file']='poliklinik/laporan/umum/v_lapLB1';
		if (empty($query['list'])){
			return false;
		}else{
			if ($stat){
			 $this->load->view('poliklinik/laporan/umum/v_lapLB1',$query,true);
			}else{
				$this->load->view('poliklinik/laporan/umum/v_lapLB1',$query);
			}
			}
		}	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */