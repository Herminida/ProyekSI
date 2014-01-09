<?php

class Sosial_anggota_keluarga extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sosial_anggota_keluarga_model');
        $this->load->model('sosial_kepala_keluarga_model');
        $this->load->model('sosial_agama_model');
        $this->load->model('sosial_pendidikan_model');
        $this->load->model('sosial_pekerjaan_model');
        $this->load->model('sosial_status_anggota_model');
    }
	
	public function index () {
        
            $data['kk']=$this->sosial_kepala_keluarga_model->getdetailkk($this->uri->segment(4));
            $data['anggotas']=$this->sosial_anggota_keluarga_model->getAllAnggota($this->uri->segment(4));
            $this->template->load('template','sosial_anggota_keluarga/index',$data);
        
	}


	function add () {
        

        if ($_SERVER ['REQUEST_METHOD']=="POST") {

        $this->form_validation->set_rules('nik', 'Nik', 'trim|required');
        $this->form_validation->set_rules('nama_anggota', 'Nama', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        //$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('sex', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('nama_ayah', 'Ayah', 'trim|required');
        $this->form_validation->set_rules('nama_ibu', 'Ibu', 'trim|required');
       // $this->form_validation->set_rules('nama_agama', 'Agama', 'trim|required');
        //$this->form_validation->set_rules('nama_pendidikan', 'Pendidikan', 'trim|required');
        //$this->form_validation->set_rules('nama_pekerjaan', 'Pekerjaan', 'trim|required');
        //$this->form_validation->set_rules('nama_status_anggota', 'Status Anggota', 'trim|required');
        $this->form_validation->set_rules('kewarganegaran', 'Kewarganegaraan', 'trim|required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');

        if ($this->form_validation->run()==FALSE ) {

        $id=$this->input->post('kk_id');
        $data['kk'] = $this->sosial_kepala_keluarga_model->Get_Kk_id($id);
        $data['no_kk']=$this->input->post('no_kk');
        $data['nama_kk']=$this->input->post('nama_kk');
        $data['agama']=$this->sosial_agama_model->Get_Agama();
        $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
        $data['status_anggota']=$this->sosial_status_anggota_model->Get_Status_Anggota();
        $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();

       $this->template->load('template','sosial_anggota_keluarga/add',$data);

        }
        else {

        $tanggal = $this->input->post('tgl');
        $bulan = $this->input->post('bln');
        $tahun = $this->input->post('thn');

        $tanggal_lahir = $tahun."-".$bulan."-".$tanggal;

         $in=array(
            'nik'=>$this->input->post('nik'),
            'no_rm'=>$this->input->post('no_rm'),
            'nama_anggota'=>$this->input->post('nama_anggota'),
            'tempat_lahir'=>$this->input->post('tempat_lahir'),
            'tanggal_lahir'=>$tanggal_lahir,
            'sex'=>$this->input->post('sex'),
            'nama_ayah' =>$this->input->post('nama_ayah'),
            'nama_ibu' =>$this->input->post('nama_ibu'),
            'agama_id' =>$this->input->post('agama_id'),
            'pendidikan_id' =>$this->input->post('pendidikan_id'),
            'pekerjaan_id' =>$this->input->post('pekerjaan_id'),
            'status_anggota_id' =>$this->input->post('status_anggota_id'),
            'kewarganegaran' =>$this->input->post('kewarganegaran'),
            'unit_kerja_id' =>$this->input->post('unit_kerja_id'),
            'telepon' =>$this->input->post('telepon'),
            'kk_id' =>$this->input->post('kk_id')
        );
        $data = $this->sosial_anggota_keluarga_model->addanggotakk($in);
        $no_kk=$this->input->post('no_kk');
        $data['kk_id'] = $this->sosial_anggota_keluarga_model->getidkk($no_kk);
        $data['no_kk']=$this->input->post('no_kk');
        $data['nama_kk']=$this->input->post('nama_kk');
        $data['agama']=$this->sosial_agama_model->Get_Agama();
        $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
        $data['status_anggota']=$this->sosial_status_anggota_model->Get_Status_Anggota();
        $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();

        redirect('loket/sosial_kepala_keluarga/detail/'.$this->input->post('kk_id').'/'.$this->input->post('no_kk'),'refresh');        

        }

        }
        else {

        $id = $this->uri->segment(4,TRUE);
        $data['kk'] = $this->sosial_kepala_keluarga_model->Get_Kk_id($this->uri->segment(4));
        $data['agama']=$this->sosial_agama_model->Get_Agama();
        $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();
        $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
        $data['status_anggota']=$this->sosial_status_anggota_model->Get_Status_Anggota();
        
        $this->template->load('template','sosial_anggota_keluarga/add',$data);

        }

        
        

		

	}

    function add_anggota () {
        

        $this->form_validation->set_rules('nik', 'Nik', 'trim|required');
        $this->form_validation->set_rules('nama_anggota', 'Nama', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        //$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('sex', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('nama_ayah', 'Ayah', 'trim|required');
        $this->form_validation->set_rules('nama_ibu', 'Ibu', 'trim|required');
       // $this->form_validation->set_rules('nama_agama', 'Agama', 'trim|required');
        //$this->form_validation->set_rules('nama_pendidikan', 'Pendidikan', 'trim|required');
        //$this->form_validation->set_rules('nama_pekerjaan', 'Pekerjaan', 'trim|required');
        //$this->form_validation->set_rules('nama_status_anggota', 'Status Anggota', 'trim|required');
        $this->form_validation->set_rules('kewarganegaran', 'Kewarganegaraan', 'trim|required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');

        if ($this->form_validation->run()==FALSE ) {

        $no_kk=$this->input->post('no_kk');
        $data['kk_id'] = $this->sosial_anggota_keluarga_model->getidkk($no_kk);
        $data['no_kk']=$this->input->post('no_kk');
        $data['nama_kk']=$this->input->post('nama_kk');
        $data['agama']=$this->sosial_agama_model->Get_Agama();
        $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
        $data['status_anggota']=$this->sosial_status_anggota_model->Get_Status_Anggota();
        $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();

       $this->template->load('template','sosial_anggota_keluarga/add_anggota',$data);

        }
        else {

        $tanggal = $this->input->post('tgl');
        $bulan = $this->input->post('bln');
        $tahun = $this->input->post('thn');

        $tanggal_lahir = $tahun."-".$bulan."-".$tanggal;

         $in=array(
            'nik'=>$this->input->post('nik'),
            'no_rm'=>$this->input->post('no_rm'),
            'nama_anggota'=>$this->input->post('nama_anggota'),
            'tempat_lahir'=>$this->input->post('tempat_lahir'),
            'tanggal_lahir'=>$tanggal_lahir,
            'sex'=>$this->input->post('sex'),
            'nama_ayah' =>$this->input->post('nama_ayah'),
            'nama_ibu' =>$this->input->post('nama_ibu'),
            'agama_id' =>$this->input->post('agama_id'),
            'pendidikan_id' =>$this->input->post('pendidikan_id'),
            'pekerjaan_id' =>$this->input->post('pekerjaan_id'),
            'status_anggota_id' =>$this->input->post('status_anggota_id'),
            'kewarganegaran' =>$this->input->post('kewarganegaran'),
            'unit_kerja_id' =>$this->input->post('unit_kerja_id'),
            'telepon' =>$this->input->post('telepon'),
            'kk_id' =>$this->input->post('kk_id')
        );
        $data = $this->sosial_anggota_keluarga_model->addanggotakk($in);
        $no_kk=$this->input->post('no_kk');
        $data['kk_id'] = $this->sosial_anggota_keluarga_model->getidkk($no_kk);
        $data['no_kk']=$this->input->post('no_kk');
        $data['nama_kk']=$this->input->post('nama_kk');
        $data['agama']=$this->sosial_agama_model->Get_Agama();
        $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
        $data['status_anggota']=$this->sosial_status_anggota_model->Get_Status_Anggota();
        $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();

       $this->template->load('template','sosial_anggota_keluarga/add_anggota',$data);
        

        }

       


        
    }

    function delete () {
        
            $this->sosial_anggota_keluarga_model->delete($this->uri->segment(6));
            $this->session->set_flashdata('message','Data Salah Satu Anggota Berhasil Dihapus');
            redirect('loket/sosial_kepala_keluarga/detail/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
        
    }

    function edit () {
        

         if ($_SERVER ['REQUEST_METHOD']=="POST"){

                $this->form_validation->set_rules('nik', 'Nik', 'trim|required');
                $this->form_validation->set_rules('nama_anggota', 'Nama', 'trim|required');
                $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
                //$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
                $this->form_validation->set_rules('sex', 'Jenis Kelamin', 'trim|required');
                $this->form_validation->set_rules('nama_ayah', 'Ayah', 'trim|required');
                $this->form_validation->set_rules('nama_ibu', 'Ibu', 'trim|required');
                // $this->form_validation->set_rules('nama_agama', 'Agama', 'trim|required');
                //$this->form_validation->set_rules('nama_pendidikan', 'Pendidikan', 'trim|required');
                //$this->form_validation->set_rules('nama_pekerjaan', 'Pekerjaan', 'trim|required');
                //$this->form_validation->set_rules('nama_status_anggota', 'Status Anggota', 'trim|required');
                $this->form_validation->set_rules('kewarganegaran', 'Kewarganegaraan', 'trim|required');
                $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');

            $id2['id']= $this->input->post('id');
            if ($this->form_validation->run()==FALSE ) {

                $query = $this->sosial_anggota_keluarga_model->edit("sosial_anggota_keluarga",$id2);

                foreach ($query->result() as $tampil) {

                    $data['id']=$tampil->id;
                    $data['nik']=$tampil->nik;
                    $data['no_rm']=$tampil->no_rm;
                    $data['nama_anggota']=$tampil->nama_anggota;
                    $data['sex']=$tampil->sex;     
                    $data['tempat_lahir']=$tampil->tempat_lahir;
                    $data['tanggal_lahir']=$tampil->tanggal_lahir;
                    $data['agama_id']=$tampil->agama_id;
                    $data['pendidikan_id']=$tampil->pendidikan_id;
                    $data['pekerjaan_id']=$tampil->pekerjaan_id;
                    $data['status_anggota_id']=$tampil->status_anggota_id;
                    $data['kewarganegaran']=$tampil->kewarganegaran;
                    $data['unit_kerja_id']=$tampil->unit_kerja_id;
                    $data['nama_ayah']=$tampil->nama_ayah;
                    $data['nama_ibu']=$tampil->nama_ibu;
                    $data['kk_id']=$tampil->kk_id;
                    $data['telepon']=$tampil->telepon;
                    $data['agama']=$this->sosial_agama_model->Get_Agama();
                    $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
                    $data['status_anggota']=$this->sosial_status_anggota_model->Get_Status_Anggota();
                    $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();
            
                        }
                    $query= $this->sosial_anggota_keluarga_model->gettanggal($data['id']);
                    $query=($query->result());
                    $data['tgl'] =$query[0]->tgl;
                    $data['bln'] =$query[0]->bln;
                    $data['thn'] =$query[0]->thn;


                    $this->template->load('template','sosial_anggota_keluarga/edit',$data);



            }
            else {

                $tanggal = $this->input->post('tgl');
                $bulan = $this->input->post('bln');
                $tahun = $this->input->post('thn');

                $tanggal_lahir = $tahun."-".$bulan."-".$tanggal;

                $up['nik']= $this->input->post('nik');
                $up['no_rm']= $this->input->post('no_rm');
                $up['nama_anggota']= $this->input->post('nama_anggota');
                $up['sex']= $this->input->post('sex');
                $up['tempat_lahir']= $this->input->post('tempat_lahir');
                $up['tanggal_lahir']= $tanggal_lahir;
                $up['agama_id']= $this->input->post('agama_id');
                $up['pendidikan_id']= $this->input->post('pendidikan_id');
                $up['pekerjaan_id']= $this->input->post('pekerjaan_id');
                $up['status_anggota_id']= $this->input->post('status_anggota_id');
                $up['kewarganegaran']= $this->input->post('kewarganegaran');
                $up['nama_ayah']= $this->input->post('nama_ayah');
                $up['nama_ibu']= $this->input->post('nama_ibu');
                $up['kk_id']= $this->input->post('kk_id');
                $up['telepon']= $this->input->post('telepon');
                $id['id'] =$this->input->post('id');

                    $this->sosial_anggota_keluarga_model->update("sosial_anggota_keluarga",$up,$id);
                    $this->session->set_flashdata('message','Data Berhasil Diupdate');
                    redirect('loket/sosial_kepala_keluarga','refresh');
            }

         }
         else {

            $tanggal = $this->input->post('tgl');
            $bulan = $this->input->post('bln');
            $tahun = $this->input->post('thn');

            $id['id'] = $this->uri->segment(4,TRUE);
            $query= $this->sosial_anggota_keluarga_model->edit("sosial_anggota_keluarga",$id);

        foreach ($query->result() as $tampil) {

            $data['id']=$tampil->id;
            $data['nik']=$tampil->nik;
            $data['no_rm']=$tampil->no_rm;
            $data['nama_anggota']=$tampil->nama_anggota;
            $data['sex']=$tampil->sex;     
            $data['tempat_lahir']=$tampil->tempat_lahir;
            $data['tanggal_lahir']=$tampil->tanggal_lahir;
            $data['agama_id']=$tampil->agama_id;
            $data['pendidikan_id']=$tampil->pendidikan_id;
            $data['pekerjaan_id']=$tampil->pekerjaan_id;
            $data['status_anggota_id']=$tampil->status_anggota_id;
            $data['kewarganegaran']=$tampil->kewarganegaran;
            $data['nama_ayah']=$tampil->nama_ayah;
            $data['nama_ibu']=$tampil->nama_ibu;
            $data['kk_id']=$tampil->kk_id;
            $data['telepon']=$tampil->telepon;
            $data['agama']=$this->sosial_agama_model->Get_Agama();
            $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
            $data['status_anggota']=$this->sosial_status_anggota_model->Get_Status_Anggota();
            $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();


        
        }
        $query= $this->sosial_anggota_keluarga_model->gettanggal($data['id']);
        $query=($query->result());
        $data['tgl'] =$query[0]->tgl;
        $data['bln'] =$query[0]->bln;
        $data['thn'] =$query[0]->thn;


        $this->template->load('template','sosial_anggota_keluarga/edit',$data);  
       


         }

        

    }
    
	
}