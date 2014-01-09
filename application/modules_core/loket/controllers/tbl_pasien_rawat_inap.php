<?php

class tbl_pasien_rawat_inap extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('tbl_pasien_rawat_inap_model');
    $this->load->model('admission_klinik_model');
		$this->load->model('tbl_ruang_kamar_model');

	}

	

	public function cari_pasien(){
      $kata_kunci=$this->input->post('kata_kunci');
      $data['data_pasien']=$this->tbl_pasien_rawat_inap_model->cari_pasien($kata_kunci);
      $this->load->view('tbl_pasien_rawat_inap/search',$data);
    }

    public function get_kamar(){
      
      $data['data_kamar']=$this->tbl_pasien_rawat_inap_model->get_kamar();
      $this->load->view('tbl_pasien_rawat_inap/kamar',$data);
    }

    public function cek() {
      
      $pasien_id = $this->input->post('id_pasieni');
      $no_rm = $this->input->post('no_rmi');
      

      $datasama = $this->tbl_pasien_rawat_inap_model->dataregsama($pasien_id,$no_rm);

      $hasil = $datasama->num_rows();

      echo $hasil;




    }

    public function add () {

      /*$klinik = $this->input->post('klinik');*/
      $id_pasien = $this->input->post('id_pasieni');
      $tahun = $this->input->post('tahuni');
      $nama_lengkap = $this->input->post('nama_lengkapi');
      $no_rm = $this->input->post('no_rmi');
      $umur = $this->input->post('umuri');
      $jenis_kelamin = $this->input->post('jenis_kelamini');
      $alamat = $this->input->post('alamati');
      $no_hp = $this->input->post('no_hpi');
      $nama_penanggung_jawab = $this->input->post('nama_penanggung_jawabi');
      $no_penanggung_jawab = $this->input->post('no_penanggung_jawabi');
      $hubungan_dengan_pasien = $this->input->post('hubungan_dengan_pasieni');
      $kelas_kamar_id = $this->input->post('kelas_kamar_idk');
      $nama_kelas_kamar = $this->input->post('nama_kelas_kamark');
      $ruang_kamar_id = $this->input->post('ruang_kamar_idk');
      $ruang_kamar_ida = $this->input->post('ruang_kamar_id2');
      $nama_ruang_kamar = $this->input->post('nama_ruang_kamark');
     /* $status = $this->input->post('statusk');*/

      $this->tbl_pasien_rawat_inap_model->insert($id_pasien,$tahun,$nama_lengkap,$no_rm,$umur,$jenis_kelamin,$alamat,$no_hp,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien,$kelas_kamar_id,$nama_kelas_kamar,$ruang_kamar_id,$nama_ruang_kamar);

       $this->tbl_ruang_kamar_model->updatekamar($ruang_kamar_ida);
        
    }

    /*public function updatekamarpakai() {
      
      $ruang_kamar_ida = $this->input->post('ruang_kamar_id2');


     $this->tbl_ruang_kamar_model->updatekamar($ruang_kamar_ida);




    }*/


}