<?php

class tbl_pasien_kebidanan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('tbl_pasien_kebidanan_model');
		

	}

	public function index () {

		
		$this->template->load('template','tbl_pasien_rawat_jalan/index');
	}

	public function cari_pasien(){
      $kata_kunci=$this->input->post('kata_kunci');
      $data['data_pasien']=$this->tbl_pasien_kebidanan_model->cari_pasien($kata_kunci);
      $this->load->view('tbl_pasien_kebidanan/search',$data);
    }

    public function cek() {
      
      $pasien_id = $this->input->post('id_pasienb');
      $no_rm = $this->input->post('no_rmb');
      $tahun = $this->input->post('tahunb');

      $datasama = $this->tbl_pasien_kebidanan_model->dataregsama($pasien_id,$no_rm,$tahun);

      $hasil = $datasama->num_rows();

      echo $hasil;




    }

    public function add () {

     
      $id_pasien = $this->input->post('id_pasienb');
      $tahun = $this->input->post('tahunb');
      $nama_lengkap = $this->input->post('nama_lengkapb');
      $no_rm = $this->input->post('no_rmb');
      $umur = $this->input->post('umurb');
      $jenis_kelamin = $this->input->post('jenis_kelaminb');
      $alamat = $this->input->post('alamatb');
      $no_hp = $this->input->post('no_hpb');
      $nama_penanggung_jawab = $this->input->post('nama_penanggung_jawabb');
      $no_penanggung_jawab = $this->input->post('no_penanggung_jawabb');
      $hubungan_dengan_pasien = $this->input->post('hubungan_dengan_pasienb');

      $this->tbl_pasien_kebidanan_model->insert($id_pasien,$tahun,$nama_lengkap,$no_rm,$umur,$jenis_kelamin,$alamat,$no_hp,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien);


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