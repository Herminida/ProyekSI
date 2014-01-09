<?php 
class List_registrasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('list_registrasi_model');
		$this->load->model('admission_bayar_model');
        $this->load->model('admission_klinik_model');
	}

	public function index() {

		$id = $this->session->userdata('id_unit_kerja');
		$tanggal = date('Y-m-d');
		$data['list_registrasi'] = $this->list_registrasi_model->getregistrasi($tanggal,$id);
		$this->template->load('template','list_registrasi/index',$data);
	}

	public function cetak () {

    $id = $this->uri->segment(4);
    $id2 = $this->session->userdata('id_unit_kerja');
		$tanggal = date('Y-m-d');
    $data['cetakregistrasi'] = $this->list_registrasi_model->cetak($tanggal,$id2,$id);
    //echo $this->db->last_query();
    //die;
   
        
    $this->load->view('loket/list_registrasi/cetak',$data);
    }

    public function edit(){
      
            $this->form_validation->set_rules('klinik_id', 'idKlinik', 'required');
            if($this->form_validation->run() == FALSE){
                $data['registrasi']=$this->list_registrasi_model->getRegistrasiByid($this->uri->segment(4));
                $data['kliniks']=$this->admission_klinik_model->getAllKlinik();
                $data['bayars']=$this->admission_bayar_model->getAllBayar();
//                $data['noreg']=$this->admission_registrasi_model->getNoreg();
//                $data['nomor_antrian']=$this->admission_registrasi_model->getNoantrian();
                
                $this->template->load('template','list_registrasi/edit',$data);
            }else{

                $klinik = $this->input->post('klinik_id');
                if ($klinik==9) {
                  $cekidpemeriksaan=$this->input->post('noreg');
                  $labid=$this->list_registrasi_model->ambilidpemeriksaan($cekidpemeriksaan);
                  foreach ($labid->result() as $labidpemeriksaan) {
                    $lab['register']=$labidpemeriksaan->idpemeriksaan;
                }

                  $up['klinik_id']=$this->input->post('klinik_id');
                  $up['bayar_id']=$this->input->post('bayar_id');
                  $up['tanggal_registrasi']=$this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');                    
                  $id['idpemeriksaan'] = $this->input->post('id_pemeriksaan');
                  $up['ket_rujuk']="LAB";
                  $up['validasi_reg']=1;
                  $lab['no_rm']=$this->input->post('nik');
                  $lab['time_lab']= $this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
                
                  $this->list_registrasi_model->edit("admission_registrasi",$up,$id);
                  $data= $this->list_registrasi_model->insertdatalab($lab);

                }
                else {

                  $up['klinik_id']=$this->input->post('klinik_id');
                  $up['bayar_id']=$this->input->post('bayar_id');
                  $up['tanggal_registrasi']=$this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');                    
                  $id['idpemeriksaan'] = $this->input->post('id_pemeriksaan');
                  // $data['noreg']=$this->input->post('noreg');
                
                  $this->list_registrasi_model->edit("admission_registrasi",$up,$id);

                }
                
                  
                redirect('loket/list_registrasi','refresh');

            }
       
    }

	/*public function search() {
		$this->form_validation->set_rules('keysearch', 'Cari Kepala keluarga', 'trim|required');

        if ($this->form_validation->run()==FALSE) {

            $id = $this->session->userdata('id_unit_kerja');
			$tanggal = date('Y-m-d');
			$data['list_registrasi'] = $this->list_registrasi_model->getregistrasi($tanggal,$id);
			$this->template->load('template','list_registrasi/index',$data);

        }
        else {

            if ($this->input->post("keysearch")=="") {
                $kata = $this->session->userdata('kata_cari');
            }
            else {
                $sess_data['kata_cari']=$this->input->post("keysearch");
                $this->session->set_userdata($sess_data);
                $kata = $this->session->userdata('kata_cari');
            }

            $id = $this->session->userdata('id_unit_kerja');
			$tanggal = date('Y-m-d');
            $data['get_data'] = $this->list_registrasi_model->search($tanggal,$id,$kata);
            $this->template->load('template','list_registrasi/search',$data);

        }

	}*/
}