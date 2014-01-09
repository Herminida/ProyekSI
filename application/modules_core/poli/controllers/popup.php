<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Popup extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_pasien');
	$this->load->model('m_klinik');
	$this->load->model('m_laboratorium');
	$this->load->model('m_icd');
	$this->load->model('m_resep');
	$this->load->model('m_dokter');

}
	public function index($id='')
	{	
		$this->load->view('poliklinik/v_polianak');

	}

	public function diagnosa(){
		$this->load->view('poliklinik/popup/v_diagnosa');
	}

	public function deleteDiagnosa(){
		$id = $this->input->post('idDiag');
		$success=$this->m_pasien->deleteDiagnosa($id);
	//	echo $this->db->last_query();
		echo '{"success":"'.$success.'","error":""}';

	}

	public function simpanDiagnosa(){
		$idD=$this->input->post('idDiag');
		if (empty($idD)){
		 $success=$this->m_pasien->createDiagnosa($this->input->post('register'),$this->input->post('kasus'),$this->input->post('icd'));
		 }else{
		 $success=$this->m_pasien->updateDiagnosa($this->input->post('idDiag'),$this->input->post('kasus'),$this->input->post('icd'));	
		 }
		 echo '{"success":"'.$success.'","error":""}';
	}
	public function ajaxListDiagnosa($no_rm){
		$query['aaData']=$this->m_pasien->get_diagnosaPasienByRm($no_rm);
		echo json_encode($query);
	}

	public function ajaxListPenyakit(){
		$query=$this->m_icd->get_listDataPenyakit();
		echo json_encode($query);//json_encode($query);
	}

	///resep start here

	public function ajaxListObat(){
		$query = $this->m_resep->get_listDataObat();
		echo json_encode($query);
	}

	public function ajaxListResep($idpemeriksaan){
		$query = $this->m_resep->get_listDataResep($idpemeriksaan);
		echo json_encode($query);
	}

	public function simpanDetailResep(){
		$message='';
		if ($this->input->post('obat_id')==''){
			if($this->m_resep->cekObatSama($this->input->post('kode_item'),$this->input->post('idpemeriksaan'))>0)
			{
			//echo $this->db->last_query();
			 $success=0;
			 $message='Obat Sudah Ada Dalam Resep';
			}else{
		//update resep, id dokter = dokter id 
		// tampilkan nama dokter di cetak resep
		 $this->m_resep->updateDokterResep();
		 $success = $this->m_resep->simpanDetailResep();

		 }
		}else{
		 $this->m_resep->updateDokterResep();
		 $success = $this->m_resep->updateDetailResep();	
		}


		echo '{"success":"'.$success.'","error":"","message":"'.$message.'"}';
	}

	public function cetakResep($idpemeriksaan){
		$data=$this->m_resep->get_listCetakResep($idpemeriksaan);
		$response=json_encode($data);
		if (empty($response)){
			$response='';
		}
		echo $response;
	}


	///resep end here


	public function antrian(){
		$this->view['data'] = $this->m_pasien->get_antrianPasien(1,10);
		//echo $this->db->last_query();
		$this->load->view('poliklinik/popup/v_antrian');
	}
	public function dataAntri(){
		echo $this->m_pasien->get_antrianPasien(0,10);
	}
	public function rujukPoli($id){
		
		//$this->view['source'] = 'popup/ajaxRujukPoli/'.$id;
		$this->load->view('poliklinik/popup/v_rujukpoli');
	}

	public function noAntrianRujukPoli($id_poli){
		echo $this->m_pasien->get_noAntrianRujuk($id_poli);
	}
	public function simpanRujukPoli(){
		$nomor_antrian = $this->m_pasien->get_noAntrianRujuk($this->input->post('klinik_id'));
		$this->m_pasien->validasireg('1',$this->input->post('idpemeriksaan'));
		$success = $this->m_pasien->createRujukAntrian($this->input->post('id'),$this->input->post('anggota_keluarga_id'),$this->input->post('klinik_id'),$this->input->post('bayar_id'),$this->input->post('petugas_id'),$nomor_antrian,$this->input->post('unit_kerja_id'),$this->input->post('kunjungan_jenis'),$this->input->post('klinik_perujuk_id'),$this->input->post('ket_rujuk'));


		//echo $this->db->last_query();
		//die;
		echo '{"success":"'.$success.'","error":""}';
	}

	public function cetakRujukLuar(){
		$this->view['source'] = $this->input->post();
		$diagnosa = $this->m_pasien->get_diagnosaPasienByRm($this->input->post('idpemeriksaan'));
		if (!empty($diagnosa)){
			$this->view['diagnosa'] = $diagnosa[0];
		}
			else{
			$this->view['diagnosa'] = "";
		}
		$tindakan = $this->m_klinik->get_ListTindakanPasien($this->input->post('idpemeriksaan'));
		if (!empty($tindakan)){
			$this->view['tindakan'] = $tindakan;
		}else{
			$this->view['tindakan'] = "";
		}
		$pemeriksaan = $this->m_pasien->get_pemeriksaanByRegister($this->input->post('idpemeriksaan'));
		if (!empty($pemeriksaan)){
				$this->view['pemeriksaan']= $pemeriksaan[0];
		}else{
			$this->view['pemeriksaan']="";
		}

		$this->view['obat'] = '';
		echo $this->load->view('poliklinik/popup/v_cetakrujukluar',$this->view);
		return true;
	}


	public function ajaxTindakanPasien($id_pemeriksaan){
		$query['aaData'] =  $this->m_klinik->get_ListTindakanPasien($id_pemeriksaan);
	    echo json_encode($query);

	}

	public function ajaxTindakanKlinik($id_poli){
		$query=$this->m_klinik->get_ListTindakanKlinik($id_poli);
		echo json_encode($query);
	}


	public function tindakanMedis($id_pemeriksaan){
		//$this->view['source'] = 'popup/ajaxTindakanPasien/'.$id_pemeriksaan;
		$this->load->view('poliklinik/popup/v_tindakanmedis');

	}

	public function simpanTindakanMedis(){
		$id=$this->input->post('id');
		if (!empty($id)){
		$success=$this->m_klinik->updateTindakanpasien();
	}else{
		$success=$this->m_klinik->insertTindakanPasien();
	}	
		echo '{"success":"'.$success.'","error":""}';
	}

	public function deleteTindakanMedis(){
		$id = $this->input->post('id');
		$success=$this->m_klinik->deleteTindakanPasien($id);
		//echo $this->db->last_query();
		echo '{"success":"'.$success.'","error":""}';
	}

	public function rujukLuar(){
		//$this->view['data'] = $this->m_pasien->get_antrianPasien(1,10);
		$this->load->view('poliklinik/popup/v_rujukluar');
	}

	public function rujukLab($register){
		$this->view['source'] = 'popup/ajaxRujukLab/'.$register;
		$this->load->view('poliklinik/popup/v_rujuklab',$this->view);
	}
	public function deleteRujukLab(){
		$id = $this->input->post('id_lab');
		$success=$this->m_laboratorium->delete($id);
		echo '{"success":"'.$success.'","error":""}';

		//$this->load->view('poliklinik/popup/v_rujuklab',$this->view);
	}

	public function simpanRujukLab(){
		$id = $this->input->post('id_lab');
		if (empty($id)){
		$nomor_antrian = $this->m_pasien->get_noAntrianRujuk(9);
		$success = $this->m_pasien->updateRujukLab();
		$this->m_pasien->validasireg('1',$this->input->post('idpemeriksaan'));
		$this->m_laboratorium->create_reg($this->input->post('unker'),$this->input->post('no_rm'),$this->input->post('idpemeriksaan'),$this->input->post('dari_poli'),$this->input->post('sedimen'),$this->input->post('urine'),$this->input->post('hematologi'),$this->input->post('bakteriologi'),$this->input->post('tes_hamil'),$this->input->post('lainlain'),'');

		}else{
			$success=$this->m_laboratorium->update_reg($this->input->post('id_lab'),$this->input->post('unker'),$this->input->post('no_rm'),$this->input->post('idpemeriksaan'),$this->input->post('dari_poli'),$this->input->post('sedimen'),$this->input->post('urine'),$this->input->post('hematologi'),$this->input->post('bakteriologi'),$this->input->post('tes_hamil'),$this->input->post('lainlain'),$this->input->post('hasil'));

		}
		echo '{"success":"'.$success.'","error":""}';

	}

	public function ajaxRujukLab($no_rm){
		//$no_rm = $this->m_pasien->get_NoRMByRegister($register);
		echo $this->m_laboratorium->get_listDataTabRujuk($no_rm);
		//echo $this->db->last_query();
	}

	public function ajaxRujukPoli($register){
		$query['aaData']=$this->m_pasien->get_listRujukPoli($register);
		echo json_encode($query);
		
	}

	public function resep(){
		//$this->view['data'] = $this->m_pasien->get_antrianPasien(1,10);
		$this->load->view('poliklinik/popup/v_resep');
	}

	public function ajaxDokter(){

		$query = $this->m_dokter->getDokter($this->input->get('klinik_id'));
		echo json_encode($query);
	}

	public function cekDokter($idpemeriksaan){
		$stat=false;
		$dokter_id='';
		if($this->m_resep->cekDetailResep($idpemeriksaan)>0){
				$dokter_id=$this->m_resep->getDokterResep($idpemeriksaan);
				$dokter_id = $dokter_id['dokter_id'];
				//echo $this->db->last_query();
                $stat=true;
            }else{
                $stat=false;
            }
           echo '{"status":"'.$stat.'","dokter":'.$dokter_id.'}';
	}

	public function deleteResep(){
		$success = $this->m_resep->deleteDetailResep();
		echo '{"success":"'.$success.'","error":""}';
	}
	public function icd(){
		$this->load->view('poliklinik/popup/v_icd');
	}


	function pasien(){
		$this->load->view('tb/pop_pasien');
	}
	function ajax_data_pasien(){
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->m_pasien->list_data(true),
            'aaData'=>$this->m_pasien->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
	}

	function kpp($callback=''){
		$this->view['callback']=$callback;
		$this->load->view('tb/pop_kpp',$this->view);
	}

	
	function ajax_data_kpp(){
		$this->load->model('mtb_kpp');
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_kpp->list_data(true),
            'aaData'=>$this->mtb_kpp->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
	}

	function permohonan($caller_id=0){
		$this->view['caller_id']=$caller_id;
		$this->load->view('tb/pop_permohonan',$this->view);
	}
	function ajax_data_permohonan(){
		$this->load->model('mtb_permohonan');
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_permohonan->list_data('',true),
            'aaData'=>$this->mtb_permohonan->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
	}

	function laboran(){
		$this->load->view('tb/pop_laboran');
	}
	function ajax_data_laboran(){
		$this->load->model('mtb_laboran');
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_laboran->list_data(true),
            'aaData'=>$this->mtb_laboran->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
	}

	function unitkerja($callback=''){
		$this->view['callback']=$callback;
		$this->load->view('tb/pop_unitkerja',$this->view);
	}
	function ajax_data_unitkerja(){
		$this->load->model('mtb_unitkerja');
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_unitkerja->list_data(true),
            'aaData'=>$this->mtb_unitkerja->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
	}

	function pegawai($callback=''){
		$this->view['callback']=$callback;
		$this->load->view('tb/pop_pegawai',$this->view);
	}
	function ajax_data_pegawai(){
		$this->load->model('mtb_pegawai');
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_pegawai->list_data(true),
            'aaData'=>$this->mtb_pegawai->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
	}

	function lab($callback=''){
		$this->view['callback']=$callback;
		$this->load->view('tb/pop_lab',$this->view);
	}
	function ajax_data_lab(){
		$this->load->model('mtb_lab');
        $data=array(
            'sEcho'=>(int)$this->input->post('sEcho'),
            'iTotalRecords'=>$this->mtb_lab->list_data(true),
            'aaData'=>$this->mtb_lab->list_data()->result_array(),
        );
        $data['iTotalDisplayRecords']=$data['iTotalRecords'];
        echo json_encode($data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */