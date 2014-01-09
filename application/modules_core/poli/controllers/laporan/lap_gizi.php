<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lap_Gizi extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('laporan/m_lappasien');
	$this->load->model('laporan/m_lapgizi');
	$this->load->helper('rekam_medis');
}
	public function index()
	{	
		//$data['maru']= $this->getLaporanRekam(1,'IGD',true);
		//print_r($data['maru']);
		$data['judul'] = 'GIZI';
		$data['poli'] = '4';
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
		//echo $this->db->last_query();
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

	public function posyandu(){
		$data['judul'] = 'POSYANDU';
		$this->template->load('templatePoli','poliklinik/laporan/v_templateheaderkelurahan',$data);
	}

	public function getLaporanRekamposyandu(){
		$query['list']= $this->m_lapgizi->list_data_posyandu($this->input->post('tgl_awal'),$this->input->post('tgl_akhir'),$this->input->post('id_kelurahan'));
		//$query['file']='poliklinik/laporan/gizi/v_lapposyandu';
		if (empty($query['list'])){
			return false;
		}else{
		//	if ($stat){
			 $this->load->view('poliklinik/laporan/gizi/v_lapposyandu',$query);
		/*	}else{
				$this->load->view('poliklinik/laporan/umum/v_laprekamdewasa',$query);
			}*/
		}	

	}

	public function getLaporanRekamExcelposyandu($tgl_awal,$tgl_akhir,$id_kelurahan){
		$query['list']= $this->m_lapgizi->list_data_posyandu($tgl_awal,$tgl_akhir,$id_kelurahan);
		$query['file']='poliklinik/laporan/gizi/v_lapposyandu';
		$query['judul']='POSYANDU';
		$this->load->view('poliklinik/laporan/excel', $query);
	}

	public function vitamin(){
		$data['judul'] = 'VITAMIN';
		$this->template->load('templatePoli','poliklinik/laporan/v_templateheaderkelurahan',$data);
	}

	public function getLaporanRekamvitamin(){
		$query['list']= $this->m_lapgizi->list_data_vitamin($this->input->post('tgl_awal'),$this->input->post('tgl_akhir'),$this->input->post('id_kelurahan'));
		if (empty($query['list'])){
			return false;
		}else{
			 $this->load->view('poliklinik/laporan/gizi/v_lapvitamin',$query);
		}	

	}

	public function getLaporanRekamExcelvitamin($tgl_awal,$tgl_akhir,$id_kelurahan){
		$query['list']= $this->m_lapgizi->list_data_vitamin($tgl_awal,$tgl_akhir,$id_kelurahan);
		$query['file']='poliklinik/laporan/gizi/v_lap_vitamin';
		$query['judul']='vitamin';
		$this->load->view('poliklinik/laporan/excel', $query);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */