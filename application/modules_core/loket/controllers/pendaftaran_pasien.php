<?php 

class pendaftaran_pasien extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sosial_agama_model');
        $this->load->model('sosial_pendidikan_model');
        $this->load->model('sosial_pekerjaan_model');
        $this->load->model('pendaftaran_model');
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
            $tot_hal = $this->pendaftaran_model->get_data();
            $config['base_url'] = base_url() . 'loket/pendaftaran_pasien/index';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data["paginator"] =$this->pagination->create_links();

            $data['data_pasien'] = $this->db->query("select * from tbl_pasien where nama_rekanan='' and nama_jabatan='' and nama_ptpn='' limit ".$limit." offset ".$offset);
            
            $this->template->load('template','pendaftaran_pasien_umum/index',$data);
     
    }
    
      public function add () {
        if ($_SERVER ['REQUEST_METHOD']=="POST") {
          $agama=$this->input->post('agama');
          $isi_agama=explode('-',$agama);
          $pekerjaan=$this->input->post('pekerjaan');
          $isi_perkerjaan=explode('-',$pekerjaan);
          $pendidikan=$this->input->post('pendidikan');
          $isi_pendidikan=explode('-',$pendidikan);
          $rekanan=$this->input->post('rekanan');
          if(empty($rekanan)){
              $rekanan="-";
          }
          $isi_rekanan=explode('-',$rekanan);
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
          $insert=array('tanggal_registrasi'=>$this->input->post('tanggal_registrasi'),
                        'no_rm'=>$this->input->post('no_rm'),  
                        'nama_lengkap'=>$this->input->post('nama_pasien'),  
                        'nama_panggilan'=>$this->input->post('nama_panggilan'),  
                        'tempat_lahir'=>$this->input->post('tempat_lahir'),  
                        'tanggal_lahir'=>$this->input->post('tanggal_lahir'),  
                        'umur'=>$this->input->post('umur'),  
                        'jenis_kelamin'=>$this->input->post('jenis_kelamin'),  
                        'alamat'=>$this->input->post('alamat'),  
                        'rt'=>$this->input->post('rt'),      
                        'rw'=>$this->input->post('rw'),      
                        'desa'=>$this->input->post('desa'),      
                        'kecamatan'=>$this->input->post('kecamatan'),      
                        'kota'=>$this->input->post('kota'),      
                        'jenis_identitas'=>$this->input->post('jenis_identitas'),      
                        'no_identitas'=>$this->input->post('no_identitas'),      
                        'no_telepon_rumah'=>$this->input->post('telepon_rumah'),      
                        'no_hp'=>$this->input->post('telepon_hp'),      
                        'agama_id'=>$isi_agama[0],      
                        'nama_agama'=>$isi_agama[1],      
                        'pekerjaan_id'=>$isi_perkerjaan[0],      
                        'nama_pekerjaan'=>$isi_perkerjaan[1],      
                        'status_pernikahan'=>$this->input->post('status_perkawinan'),      
                        'pendidikan_id'=>$isi_pendidikan[0],      
                        'nama_pendidikan'=>$isi_pendidikan[1],      
                        'rekanan_id'=>$isi_rekanan[0],      
                        'nama_rekanan'=>$isi_rekanan[1],      
                        'ptpn_id'=>$isi_ptpn[0],      
                        'nama_ptpn'=>$isi_ptpn[1],      
                        'jabatan_id'=>$isi_jabatan[0],      
                        'nama_jabatan'=>$isi_jabatan[1]      
            );
          $nik=$this->input->post('no_identitas');
          $cek=$this->pendaftaran_model->cek($nik);
          if($cek->num_rows()>0){
                  $this->session->set_flashdata('confirm','Data pasien sudah pernah mendaftar!');
                  ?>
                  <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_pasien/add"; </script>
                  <?php  
          }
          else{
                  $this->pendaftaran_model->add($insert);
                  $this->session->set_flashdata('confirm','Data berhasil disimpan!');
                  ?>
                  <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_pasien/detail/<?php echo $nik;?>"; </script>
                  <?php
          }
        }
        else{ 
              $data['agama']=$this->sosial_agama_model->Get_Agama();
              $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
              $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();
              $data['id_pasien']=$this->pendaftaran_model->Get_id();
              $data['rekanan']=$this->pendaftaran_model->get_rekanan();
              $data['jabatan']=$this->pendaftaran_model->get_jabatan();
              $data['ptpn']=$this->pendaftaran_model->get_ptpn();
              $this->template->load('template','pendaftaran_pasien/add',$data);
        }
    }

    public function edit(){
      if ($_SERVER ['REQUEST_METHOD']=="POST") {
          $id_pasien=$this->input->post('id_pasien');
          $agama=$this->input->post('agama');
          $isi_agama=explode('-',$agama);
          $pekerjaan=$this->input->post('pekerjaan');
          $isi_perkerjaan=explode('-',$pekerjaan);
          $pendidikan=$this->input->post('pendidikan');
          $isi_pendidikan=explode('-',$pendidikan);
          $rekanan=$this->input->post('rekanan');
          if(empty($rekanan)){
              $rekanan="-";
          }
          $isi_rekanan=explode('-',$rekanan);
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
         $insert=array('tanggal_registrasi'=>$this->input->post('tanggal_registrasi'),
                        'no_rm'=>$this->input->post('no_rm'),  
                        'nama_lengkap'=>$this->input->post('nama_pasien'),  
                        'nama_panggilan'=>$this->input->post('nama_panggilan'),  
                        'tempat_lahir'=>$this->input->post('tempat_lahir'),  
                        'tanggal_lahir'=>$this->input->post('tanggal_lahir'),  
                        'umur'=>$this->input->post('umur'),  
                        'jenis_kelamin'=>$this->input->post('jenis_kelamin'),  
                        'alamat'=>$this->input->post('alamat'),  
                        'rt'=>$this->input->post('rt'),      
                        'rw'=>$this->input->post('rw'),      
                        'desa'=>$this->input->post('desa'),      
                        'kecamatan'=>$this->input->post('kecamatan'),      
                        'kota'=>$this->input->post('kota'),      
                        'jenis_identitas'=>$this->input->post('jenis_identitas'),      
                        'no_identitas'=>$this->input->post('no_identitas'),      
                        'no_telepon_rumah'=>$this->input->post('telepon_rumah'),      
                        'no_hp'=>$this->input->post('telepon_hp'),      
                        'agama_id'=>$isi_agama[0],      
                        'nama_agama'=>$isi_agama[1],      
                        'pekerjaan_id'=>$isi_perkerjaan[0],      
                        'nama_pekerjaan'=>$isi_perkerjaan[1],      
                        'status_pernikahan'=>$this->input->post('status_perkawinan'),      
                        'pendidikan_id'=>$isi_pendidikan[0],      
                        'nama_pendidikan'=>$isi_pendidikan[1],      
                        'rekanan_id'=>$isi_rekanan[0],      
                        'nama_rekanan'=>$isi_rekanan[1],      
                        'ptpn_id'=>$isi_ptpn[0],      
                        'nama_ptpn'=>$isi_ptpn[1],      
                        'jabatan_id'=>$isi_jabatan[0],      
                        'nama_jabatan'=>$isi_jabatan[1]      
            );
                $nik=$this->input->post('no_identitas');
                  $this->pendaftaran_model->edit($insert,$id_pasien);
                  $this->session->set_flashdata('confirm','Data berhasil diubah!');
                  ?>
                  <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_pasien/detail/<?php echo $nik;?>"; </script>
                  <?php
      }
      else{
        $data['agama']=$this->sosial_agama_model->Get_Agama();
        $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
        $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();
        $nik=$this->uri->segment(4);
        $data['data_pasien']=$this->pendaftaran_model->get_data_detail($nik);
        $this->template->load('template','pendaftaran_pasien_umum/edit',$data);
      } 
    }

    function cek(){
      $nik=$this->input->post('nik');
      $cek=$this->pendaftaran_model->cek($nik);
      if($cek->num_rows()>0){
        echo "sudah";
      }
      else{
        echo $nik;
      }
    }
    
    public function detail(){
        $nik=$this->uri->segment(4);
        $data['data_registrasi']=$this->pendaftaran_model->get_data_detail($nik);
        $this->template->load('template', 'pendaftaran_pasien_umum/detail',$data);   
    }

    public function delete () {
    $id_pasien = $this->uri->segment(4);
    $this->pendaftaran_model->delete($id_pasien);
    $this->session->set_flashdata('confirm','Data berhasil dihapus!');
        ?>
        <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_pasien"; </script>
        <?php
    }

    public function search(){
        $kata_kunci=$this->input->post("kata_kunci");
        $data['data_pasien']=$this->pendaftaran_model->search($kata_kunci);
        $this->template->load('template','pendaftaran_pasien_umum/search',$data);
    }
    
}