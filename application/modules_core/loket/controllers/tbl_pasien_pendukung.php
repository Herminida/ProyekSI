<?php

class tbl_pasien_pendukung extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('tbl_pasien_pendukung_model');
		$this->load->model('tbl_pendukung_model');

	}

	

	public function cari_pasien(){
      $kata_kunci=$this->input->post('kata_kunci');
      $data['data_pasien']=$this->tbl_pasien_pendukung_model->cari_pasien($kata_kunci);
      $this->load->view('tbl_pasien_pendukung/search',$data);
    }

    public function cek() {
      
      $pasien_id = $this->input->post('id_pasien');
      $no_rm = $this->input->post('no_rm');
      $tahun = $this->input->post('tahun');

      $datasama = $this->tbl_pasien_pendukung_model->dataregsama($pasien_id,$no_rm,$tahun);

      $hasil = $datasama->num_rows();

      echo $hasil;




    }

    public function add () {

      $pendukung = $this->input->post('pendukungp');
      $id_pasien = $this->input->post('id_pasienp');
      $tahun = $this->input->post('tahunp');
      $nama_lengkap = $this->input->post('nama_lengkapp');
      $no_rm = $this->input->post('no_rmp');
      $umur = $this->input->post('umurp');
      $jenis_kelamin = $this->input->post('jenis_kelaminp');
      $alamat = $this->input->post('alamatp');
      $no_hp = $this->input->post('no_hpp');
      $nama_penanggung_jawab = $this->input->post('nama_penanggung_jawabp');
      $no_penanggung_jawab = $this->input->post('no_penanggung_jawabp');
      $hubungan_dengan_pasien = $this->input->post('hubungan_dengan_pasienp');

      $this->tbl_pasien_pendukung_model->insert($pendukung,$id_pasien,$tahun,$nama_lengkap,$no_rm,$umur,$jenis_kelamin,$alamat,$no_hp,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien);


      /*$in['tgl_registrasi']=$this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
      $in['pasien_id'] = $this->input->post('pasien_id');
      $in['no_rm'] = $this->input->post('no_rm');
      $in['nama_lengkap'] = $this->input->post('nama_lengkap');
      $in['umur'] = $this->input->post('umur');
      $in['jenis_kelamin'] = $this->input->post('jenis_kelamin');
      $in['alamat'] = $this->input->post('alamat');
      $in['no_hp'] = $this->input->post('no_hp');
      $in['nama_penanggung_jawab'] = $this->input->post('nama_penanggung_jawab');
      $in['no_penanggung_jawab'] = $this->input->post('no_penanggung_jawab');
      $in['hubungan_dengan_pasien'] = $this->input->post('hubungan_dengan_pasien');
      $in['klinik_id'] = $this->input->post('klinik_id');

      $this->tbl_pasien_rawat_jalan_model->insert($in);*/
      

       
       

         
        
    }


}