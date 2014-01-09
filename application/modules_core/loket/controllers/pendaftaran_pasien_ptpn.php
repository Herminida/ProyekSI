<?php 

class pendaftaran_pasien_ptpn extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sosial_agama_model');
        $this->load->model('sosial_pendidikan_model');
        $this->load->model('sosial_pekerjaan_model');
        $this->load->model('pendaftaran_model_ptpn');
    }
    
    public function index () {
            $page=$this->uri->segment(4);
            $limit=20;
            if(!$page):
            $offset = 0;
            else:
            $offset = $page;
            endif;
    
            $data['tot'] = $offset;
            $tot_hal = $this->pendaftaran_model_ptpn->get_data();
            $config['base_url'] = base_url() . 'loket/pendaftaran_pasien_ptpn/index';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data["paginator"] =$this->pagination->create_links();

            $data['data_pasien'] = $this->db->query("select * from tbl_pasien where nama_ptpn !='' limit ".$limit." offset ".$offset);
            
            $this->template->load('template','pendaftaran_pasien_ptpn/index',$data);
     
    }
    
      public function add () {
        if ($_SERVER ['REQUEST_METHOD']=="POST") {
          $agama=$this->input->post('agama_ptpn');
          $isi_agama=explode('-',$agama);
          $pekerjaan=$this->input->post('pekerjaan_ptpn');
          $isi_perkerjaan=explode('-',$pekerjaan);
          $pendidikan=$this->input->post('pendidikan_ptpn');
          $isi_pendidikan=explode('-',$pendidikan);
          $ptpn=$this->input->post('ptpn');
          if(empty($ptpn)){
              $ptpn="-";
          }
          $isi_ptpn=explode('-',$ptpn);
          $ptpn=$this->input->post('ptpn');
          if(empty($ptpn)){
              $ptpn="-";
          }
          $isi_ptpn=explode('-',$ptpn);
          $jabatan=$this->input->post('jabatan');
          if(empty($jabatan)){
              $jabatan="-";
          }
          $isi_jabatan=explode('-',$jabatan);
          $insert=array('tanggal_registrasi'=>$this->input->post('tanggal_registrasi_ptpn'),
                        'no_rm'=>$this->input->post('no_rm'),  
                        'nama_lengkap'=>$this->input->post('nama_pasien_ptpn'),  
                        'nama_panggilan'=>$this->input->post('nama_panggilan_ptpn'),  
                        'tempat_lahir'=>$this->input->post('tempat_lahir_ptpn'),  
                        'tanggal_lahir'=>$this->input->post('tanggal_lahir_ptpn'),  
                        'umur'=>$this->input->post('umur'),  
                        'jenis_kelamin'=>$this->input->post('jenis_kelamin'),  
                        'alamat'=>$this->input->post('alamat_ptpn'),  
                        'rt'=>$this->input->post('rt_ptpn'),      
                        'rw'=>$this->input->post('rw_ptpn'),      
                        'desa'=>$this->input->post('desa_ptpn'),      
                        'kecamatan'=>$this->input->post('kecamatan_ptpn'),      
                        'kota'=>$this->input->post('kota_ptpn'),      
                        'jenis_identitas'=>$this->input->post('jenis_identitas'),      
                        'no_identitas'=>$this->input->post('no_identitas_ptpn'),      
                        'no_telepon_rumah'=>$this->input->post('telepon_rumah'),      
                        'no_hp'=>$this->input->post('telepon_hp'),      
                        'agama_id'=>$isi_agama[0],      
                        'nama_agama'=>$isi_agama[1],      
                        'pekerjaan_id'=>$isi_perkerjaan[0],      
                        'nama_pekerjaan'=>$isi_perkerjaan[1],      
                        'status_pernikahan'=>$this->input->post('status_perkawinan'),      
                        'pendidikan_id'=>$isi_pendidikan[0],      
                        'nama_pendidikan'=>$isi_pendidikan[1],      
                        'ptpn_id'=>$isi_ptpn[0],      
                        'nama_ptpn'=>$isi_ptpn[1],      
                        'ptpn_id'=>$isi_ptpn[0],      
                        'nama_ptpn'=>$isi_ptpn[1],      
                        'jabatan_id'=>$isi_jabatan[0],      
                        'nama_jabatan'=>$isi_jabatan[1]      
            );
          $nik=$this->input->post('no_identitas_ptpn');
          $cek=$this->pendaftaran_model_ptpn->cek($nik);
          if($cek->num_rows()>0){
                  $this->session->set_flashdata('confirm','Data pasien sudah pernah mendaftar!');
                  ?>
                  <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_pasien_ptpn/add"; </script>
                  <?php  
          }
          else{
                  $this->pendaftaran_model_ptpn->add($insert);
                  $this->session->set_flashdata('confirm','Data berhasil disimpan!');
                  ?>
                  <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_pasien_ptpn/detail/<?php echo $nik;?>"; </script>
                  <?php
          }
        }
        else{ 
              $data['agama']=$this->sosial_agama_model->Get_Agama();
              $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
              $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();
              $data['id_pasien']=$this->pendaftaran_model_ptpn->Get_id();
              $data['ptpn']=$this->pendaftaran_model_ptpn->get_ptpn();
              $this->template->load('template','pendaftaran_pasien_ptpn/add',$data);
        }
    }

    public function edit(){
      if ($_SERVER ['REQUEST_METHOD']=="POST") {
          $id_pasien=$this->input->post('id_pasien');
          $agama=$this->input->post('agama_ptpn');
          $isi_agama=explode('-',$agama);
          $pekerjaan=$this->input->post('pekerjaan_ptpn');
          $isi_perkerjaan=explode('-',$pekerjaan);
          $pendidikan=$this->input->post('pendidikan_ptpn');
          $isi_pendidikan=explode('-',$pendidikan);
          $ptpn=$this->input->post('ptpn');
          if(empty($ptpn)){
              $ptpn="-";
          }
          $isi_ptpn=explode('-',$ptpn);
          $ptpn=$this->input->post('ptpn');
          if(empty($ptpn)){
              $ptpn="-";
          }
          $isi_ptpn=explode('-',$ptpn);
          $jabatan=$this->input->post('jabatan');
          if(empty($jabatan)){
              $jabatan="-";
          }
          $isi_jabatan=explode('-',$jabatan);      
        $insert=array('tanggal_registrasi'=>$this->input->post('tanggal_registrasi_ptpn'), 
                        'nama_lengkap'=>$this->input->post('nama_pasien_ptpn'),  
                        'nama_panggilan'=>$this->input->post('nama_panggilan_ptpn'),  
                        'tempat_lahir'=>$this->input->post('tempat_lahir_ptpn'),  
                        'tanggal_lahir'=>$this->input->post('tanggal_lahir_ptpn'),  
                        'umur'=>$this->input->post('umur'),  
                        'jenis_kelamin'=>$this->input->post('jenis_kelamin'),  
                        'alamat'=>$this->input->post('alamat_ptpn'),  
                        'rt'=>$this->input->post('rt_ptpn'),      
                        'rw'=>$this->input->post('rw_ptpn'),      
                        'desa'=>$this->input->post('desa_ptpn'),      
                        'kecamatan'=>$this->input->post('kecamatan_ptpn'),      
                        'kota'=>$this->input->post('kota_ptpn'),      
                        'jenis_identitas'=>$this->input->post('jenis_identitas'),      
                        'no_identitas'=>$this->input->post('no_identitas_ptpn'),      
                        'no_telepon_rumah'=>$this->input->post('telepon_rumah'),      
                        'no_hp'=>$this->input->post('telepon_hp'),      
                        'agama_id'=>$isi_agama[0],      
                        'nama_agama'=>$isi_agama[1],      
                        'pekerjaan_id'=>$isi_perkerjaan[0],      
                        'nama_pekerjaan'=>$isi_perkerjaan[1],      
                        'status_pernikahan'=>$this->input->post('status_perkawinan'),      
                        'pendidikan_id'=>$isi_pendidikan[0],      
                        'nama_pendidikan'=>$isi_pendidikan[1],      
                        'ptpn_id'=>$isi_ptpn[0],      
                        'nama_ptpn'=>$isi_ptpn[1],      
                        'ptpn_id'=>$isi_ptpn[0],      
                        'nama_ptpn'=>$isi_ptpn[1],      
                        'jabatan_id'=>$isi_jabatan[0],      
                        'nama_jabatan'=>$isi_jabatan[1]      
            );
                $nik=$this->input->post('no_identitas_ptpn');
                  $this->pendaftaran_model_ptpn->edit($insert,$id_pasien);
                  $this->session->set_flashdata('confirm','Data berhasil diubah!');
                  ?>
                  <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_pasien_ptpn/detail/<?php echo $nik;?>"; </script>
                  <?php
      }
      else{
        $data['agama']=$this->sosial_agama_model->Get_Agama();
        $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
        $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();
        $nik=$this->uri->segment(4);
        $data['id_pasien']=$this->pendaftaran_model_ptpn->Get_id();
        $data['ptpn']=$this->pendaftaran_model_ptpn->get_ptpn();
        $data['data_pasien']=$this->pendaftaran_model_ptpn->get_data_detail($nik);
        $this->template->load('template','pendaftaran_pasien_ptpn/edit',$data);
      } 
    }

    function cek(){
      $nik=$this->input->post('nik');
      $cek=$this->pendaftaran_model_ptpn->cek($nik);
      if($cek->num_rows()>0){
        echo "sudah";
      }
      else{
        echo $nik;
      }
    }
    
    public function detail(){
        $nik=$this->uri->segment(4);
        $data['data_registrasi']=$this->pendaftaran_model_ptpn->get_data_detail($nik);
        $this->template->load('template', 'pendaftaran_pasien_ptpn/detail',$data);   
    }

    public function delete () {
    $id_pasien = $this->uri->segment(4);
    $this->pendaftaran_model_ptpn->delete($id_pasien);
    $this->session->set_flashdata('confirm','Data berhasil dihapus!');
        ?>
        <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_pasien_ptpn"; </script>
        <?php
    }

    public function search(){
        $kata_kunci=$this->input->post("kata_kunci");
        $data['data_pasien']=$this->pendaftaran_model_ptpn->search($kata_kunci);
        $this->template->load('template','pendaftaran_pasien_ptpn/search',$data);
    }
    
}