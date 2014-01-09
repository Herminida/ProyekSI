<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poliriwayat extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_pasien');
		$this->load->model('m_klinik');
		$this->load->model('m_resep');
		$this->load->helper('hasil_lab');

	}

	public function index(){
		//TODO
	}

	public function perawatan($id=0){
		$history=$this->m_pasien->get_historiDetailPasienByRmnPoli($id)->result();
		
		//echo $this->db->last_query();
		// print_r($history);
		$return=array();

		foreach ($history as $key => $value) {
			$penyakits='';
			$tindakans='';
			$reseps='';
			if(!isset($return[$value->poli])){
				$return[$value->poli]['jumlah']=0;
				$return[$value->poli]['data']='<table class="table table-bordered"><tr>';
			}
			$return[$value->poli]['jumlah']++;
			$diagnosa = $this->m_pasien->get_diagnosaPasienByRm($value->idpemeriksaan);
			$tindakan = $this->m_klinik->get_ListTindakanPasien($value->idpemeriksaan);
			$resep    = $this->m_resep->get_listDataResep($value->idpemeriksaan);
			$resep = $resep['aaData'];
			if (!empty($tindakan)){
			foreach ($tindakan as $kunci) {
				$tindakans = $tindakans.$kunci['namatindakan'].'('.$kunci['qtt_produk'].');';
				}
			}
			if (!empty($resep)){
			foreach ($resep as $kunci => $key ) {
				$reseps = $reseps.$key->nama_item.'('.$key->jumlah.');';
				}
			}
			if (!empty($diagnosa)){
			foreach($diagnosa as $kunci){
				$penyakits=$penyakits.$kunci['nama_penyakit'].';';
				}
			}

			$return[$value->poli]['data'].='<td width="50%"><b># '.$value->register.'</b>'
											.'<br>tanggal: '.$value->tanggal_registrasi
											.'<br>poli: '.$value->poli
											.'<br>amamnesa: '.$value->keluhan_utama
											.'<br>vital sign: '.$value->respirasi.','.$value->suhu_badan.','.$value->denyut_nadi.','.$value->bb.','.$value->tb
											.'<br>pemeriksaan fisik: '.$value->fisik
											.'<br><b>diagnosa</b>: '.$penyakits
											.'<br><b>tindakan medis</b>: '.$tindakans
											.'<br>resep:' .$reseps
											.'<br>rujuk intern: '.$value->ket_rujuk
											.'</td>';

			if($return[$value->poli]['jumlah']%2==0){
				$return[$value->poli]['data'].='</tr><tr>';
			}
		}
		foreach ($return as $key => $value) {
			$return[$key]['data'].='</tr></table>';
		}
		echo json_encode($return);

	}

	public function perawatanlab($id=0){
		$history=$this->m_pasien->get_historiDetailPasienByRmnPoli($id,9)->result();
		
		//echo $this->db->last_query();
		// print_r($history);
		$return=array();

		foreach ($history as $key => $value) {
			if(!isset($return[$value->poli])){
				$return[$value->poli]['jumlah']=0;
				$return[$value->poli]['data']='<table class="table table-bordered"><tr>';
			}
			$return[$value->poli]['jumlah']++;

			$return[$value->poli]['data'].='<td width="50%"><b># '.$value->register.'</b>'
											.'<br>Urine BJ: '.$value->urine_bj
											.'<br>Urine PH: '.$value->urine_ph
											.'<br>Urine Reduksi: '.negpos($value->urine_reduksi)
											.'<br>Urine Protein: '.negpos($value->urine_protein)
											.'<br>Sedimen Eri: '.$value->sedimen_eri
											.'<br>Sedimen Leuko:' .$value->sedimen_leuko
											.'<br>Sedimen Epitel: '.$value->sedimen_epitel
											.'<br>Sedimen Kristal: '.kristal($value->sedimen_kristal)
											.'<br>Sedimen Silinder: '.silinder($value->sedimen_silinder)
											.'<br>Sedimen Bakteri: '.bakteri($value->sedimen_bakteri)
											.'<br>Faeces Makroskopis: '.$value->faeces_makroskopis
											.'<br>Faeces Mikroskopis: '.$value->faeces_mikroskopis
											.'<br>Faeces Leuko: '.$value->faeces_leuko
											.'<br>Faeces Amuba: '.negpospolos($value->faeces_amuba)
											.'<br>Faeces Cyste: '.negpospolos($value->faeces_cyste)
											.'<br>Faeces Ova: '.ova($value->faeces_ova)
											.'<br>Hematologi HB: '.$value->hematologi_hb.'g/dl'
											.'<br>Hematologi LED: '.$value->hematologi_led.'mm/jam'
											.'<br>Hematologi Lekosit: '.$value->hematologi_lekosit.'/cc'
											.'<br>Hematologi Eritrosit: '.$value->hematologi_eritrosit.'jt/cc'
											.'<br>Hematologi Trombosit: '.$value->hematologi_trombosit.'cc'
											.'<br>Hematologi Hematokrit: '.$value->hematologi_hematrokit.'%'
											.'<br>Mikrobiologi Malaria: '.malaria($value->mikro_malaria)
											.'<br>Mikrobiologi Prep Gram: '.negpospolos($value->mikro_pep_gram)
											.'<br>Mikrobiologi BTA: '.$value->mikro_bta
											.'<br>Mikrobiologi A: '.$value->mikro_a
											.'<br>Mikrobiologi B: '.$value->mikro_b
											.'<br>Mikrobiologi C: '.$value->mikro_c
											.'<br>Mikrobiologi KOH: '.koh($value->mikro_koh)
											.'<br>Glukosa Puasa: '.$value->glukosa_puasa.'mg/dl'
											.'<br>Glukosa 2 Jam PP: '.$value->glukosa_2jam.'mg/dl'
											.'<br>Pemeriksaan Lain: '.$value->lain_pemeriksaan
											.'<br>Hasil Pemeriksaan Lain: '.$value->lain_hasil
											.'<br>Tes Hamil: '.negpospolos($value->tes_hamil)
											.'</td>';

			if($return[$value->poli]['jumlah']%2==0){
				$return[$value->poli]['data'].='</tr><tr>';
			}
		}
		foreach ($return as $key => $value) {
			$return[$key]['data'].='</tr></table>';
		}
		echo json_encode($return);

	}

	
	public function kesehatan($id=0){
		$history=$this->m_pasien->get_AlergiPasienByRM($id)->result();
        $return = array();
        foreach ($history as $key => $value) {
        	$return[$value->id_alergi]=array(
        			'id_alergi'=>$value->id_alergi,
        			'alergi_obat'=>$value->alergi_obat,
        			'kronis_sebelumnya'=>$value->kronis_sebelumnya,
        			'kronis_keluarga'=>$value->kronis_keluarga,
        			'waktu'=>$value->time_alergi,
        		);
        }
		echo json_encode($return);
	}

	public function simpanalergi(){
		if($id=$this->input->post('id_alergi')){
			$success=$this->m_pasien->updateAlergi($id,$this->input->post('no_rm'),$this->input->post('nama'),$this->input->post('alergi_obat'),$this->input->post('kronis_sebelumnya'),$this->input->post('kronis_keluarga'));
		}else{
			$success=$this->m_pasien->createAlergi($this->input->post('no_rm'),$this->input->post('nama'),$this->input->post('alergi_obat'),$this->input->post('kronis_sebelumnya'),$this->input->post('kronis_keluarga'));
		}
		$return=array(
			'success'=>$success,
			'error'=>$this->db->_error_message()
		);
		echo json_encode($return);
	}
	public function hapusalergi($id_alergi=0){
		$success=$this->m_pasien->deleteAlergi($id_alergi);
		$return=array(
			'success'=>$success,
			'error'=>$this->db->_error_message()
		);
		echo json_encode($return);
	}



}

/* End of file */
/* Location: ./application/controllers/ */