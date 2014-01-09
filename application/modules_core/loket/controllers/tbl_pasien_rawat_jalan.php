<?php

class tbl_pasien_rawat_jalan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('tbl_pasien_rawat_jalan_model');
		$this->load->model('admission_klinik_model');

	}

	

	public function cari_pasien(){
      $kata_kunci=$this->input->post('kata_kunci');
      $data['data_pasien']=$this->tbl_pasien_rawat_jalan_model->cari_pasien($kata_kunci);
      $this->load->view('tbl_pasien_rawat_jalan/search',$data);
    }

    public function cek() {
      
      $pasien_id = $this->input->post('id_pasien');
      $no_rm = $this->input->post('no_rm');
      $tahun = $this->input->post('tahun');

      $datasama = $this->tbl_pasien_rawat_jalan_model->dataregsama($pasien_id,$no_rm,$tahun);

      $hasil = $datasama->num_rows();

      echo $hasil;




    }

    public function add () {

      $klinik = $this->input->post('klinik');
      $id_pasien = $this->input->post('id_pasien');
      $tahun = $this->input->post('tahun');
      $nama_lengkap = $this->input->post('nama_lengkap');
      $no_rm = $this->input->post('no_rm');
      $umur = $this->input->post('umur');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $alamat = $this->input->post('alamat');
      $no_hp = $this->input->post('no_hp');
      $nama_penanggung_jawab = $this->input->post('nama_penanggung_jawab');
      $no_penanggung_jawab = $this->input->post('no_penanggung_jawab');
      $hubungan_dengan_pasien = $this->input->post('hubungan_dengan_pasien');

      $this->tbl_pasien_rawat_jalan_model->insert($klinik,$id_pasien,$tahun,$nama_lengkap,$no_rm,$umur,$jenis_kelamin,$alamat,$no_hp,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien);


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