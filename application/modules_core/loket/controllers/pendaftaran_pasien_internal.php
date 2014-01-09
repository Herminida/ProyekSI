<?php 

class pendaftaran_pasien_internal extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sosial_agama_model');
        $this->load->model('sosial_pendidikan_model');
        $this->load->model('sosial_pekerjaan_model');
        $this->load->model('pendaftaran_model_internal');
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
            $tot_hal = $this->pendaftaran_model_internal->get_data();
            $config['base_url'] = base_url() . 'loket/pendaftaran_pasien_internal/index';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data["paginator"] =$this->pagination->create_links();

            $data['data_pasien'] = $this->db->query("select * from tbl_pasien where nama_jabatan !='' limit ".$limit." offset ".$offset);
            
            $this->template->load('template','pendaftaran_pasien_internal/index',$data);
     
    }
    
      public function add () {
        if ($_SERVER ['REQUEST_METHOD']=="POST") {
          $agama=$this->input->post('agama_internal');
          $isi_agama=explode('-',$agama);
          $pekerjaan=$this->input->post('pekerjaan_internal');
          $isi_perkerjaan=explode('-',$pekerjaan);
          $pendidikan=$this->input->post('pendidikan_internal');
          $isi_pendidikan=explode('-',$pendidikan);
          $jabatan=$this->input->post('jabatan');
          if(empty($jabatan)){
              $jabatan="-";
          }
          $isi_internal=explode('-',$jabatan);
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
          $insert=array('tanggal_registrasi'=>$this->input->post('tanggal_registrasi_internal'),
                        'no_rm'=>$this->input->post('no_rm'),  
                        'nama_lengkap'=>$this->input->post('nama_pasien_internal'),  
                        'nama_panggilan'=>$this->input->post('nama_panggilan_internal'),  
                        'tempat_lahir'=>$this->input->post('tempat_lahir_internal'),  
                        'tanggal_lahir'=>$this->input->post('tanggal_lahir_internal'),  
                        'umur'=>$this->input->post('umur'),  
                        'jenis_kelamin'=>$this->input->post('jenis_kelamin'),  
                        'alamat'=>$this->input->post('alamat_internal'),  
                        'rt'=>$this->input->post('rt_internal'),      
                        'rw'=>$this->input->post('rw_internal'),      
                        'desa'=>$this->input->post('desa_internal'),      
                        'kecamatan'=>$this->input->post('kecamatan_internal'),      
                        'kota'=>$this->input->post('kota_internal'),      
                        'jenis_identitas'=>$this->input->post('jenis_identitas'),      
                        'no_identitas'=>$this->input->post('no_identitas_internal'),      
                        'no_telepon_rumah'=>$this->input->post('telepon_rumah'),      
                        'no_hp'=>$this->input->post('telepon_hp'),      
                        'agama_id'=>$isi_agama[0],      
                        'nama_agama'=>$isi_agama[1],      
                        'pekerjaan_id'=>$isi_perkerjaan[0],      
                        'nama_pekerjaan'=>$isi_perkerjaan[1],      
                        'status_pernikahan'=>$this->input->post('status_perkawinan'),      
                        'pendidikan_id'=>$isi_pendidikan[0],      
                        'nama_pendidikan'=>$isi_pendidikan[1],      
                        'jabatan_id'=>$isi_jabatan[0],      
                        'nama_jabatan'=>$isi_jabatan[1],      
                        'ptpn_id'=>$isi_ptpn[0],      
                        'nama_ptpn'=>$isi_ptpn[1],      
                        'jabatan_id'=>$isi_jabatan[0],      
                        'nama_jabatan'=>$isi_jabatan[1]      
            );
          $nik=$this->input->post('no_identitas_internal');
          $cek=$this->pendaftaran_model_internal->cek($nik);
          if($cek->num_rows()>0){
                  $this->session->set_flashdata('confirm','Data pasien sudah pernah mendaftar!');
                  ?>
                  <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_pasien_internal/add"; </script>
                  <?php  
          }
          else{
                  $this->pendaftaran_model_internal->add($insert);
                  $this->session->set_flashdata('confirm','Data berhasil disimpan!');
                  ?>
                  <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_pasien_internal/detail/<?php echo $nik;?>"; </script>
                  <?php
          }
        }
        else{ 
              $data['agama']=$this->sosial_agama_model->Get_Agama();
              $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
              $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();
              $data['id_pasien']=$this->pendaftaran_model_internal->Get_id();
              $data['internal']=$this->pendaftaran_model_internal->get_internal();
              $this->template->load('template','pendaftaran_pasien_internal/add',$data);
        }
    }

    public function edit(){
      if ($_SERVER ['REQUEST_METHOD']=="POST") {
          $id_pasien=$this->input->post('id_pasien');
          $agama=$this->input->post('agama_internal');
          $isi_agama=explode('-',$agama);
          $pekerjaan=$this->input->post('pekerjaan_internal');
          $isi_perkerjaan=explode('-',$pekerjaan);
          $pendidikan=$this->input->post('pendidikan_internal');
          $isi_pendidikan=explode('-',$pendidikan);
          $jabatan=$this->input->post('jabatan');
          if(empty($jabatan)){
              $jabatan="-";
          }
          $isi_jabatan=explode('-',$jabatan);
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
        $insert=array('tanggal_registrasi'=>$this->input->post('tanggal_registrasi_internal'), 
                        'nama_lengkap'=>$this->input->post('nama_pasien_internal'),  
                        'nama_panggilan'=>$this->input->post('nama_panggilan_internal'),  
                        'tempat_lahir'=>$this->input->post('tempat_lahir_internal'),  
                        'tanggal_lahir'=>$this->input->post('tanggal_lahir_internal'),  
                        'umur'=>$this->input->post('umur'),  
                        'jenis_kelamin'=>$this->input->post('jenis_kelamin'),  
                        'alamat'=>$this->input->post('alamat_internal'),  
                        'rt'=>$this->input->post('rt_internal'),      
                        'rw'=>$this->input->post('rw_internal'),      
                        'desa'=>$this->input->post('desa_internal'),      
                        'kecamatan'=>$this->input->post('kecamatan_internal'),      
                        'kota'=>$this->input->post('kota_internal'),      
                        'jenis_identitas'=>$this->input->post('jenis_identitas'),      
                        'no_identitas'=>$this->input->post('no_identitas_internal'),      
                        'no_telepon_rumah'=>$this->input->post('telepon_rumah'),      
                        'no_hp'=>$this->input->post('telepon_hp'),      
                        'agama_id'=>$isi_agama[0],      
                        'nama_agama'=>$isi_agama[1],      
                        'pekerjaan_id'=>$isi_perkerjaan[0],      
                        'nama_pekerjaan'=>$isi_perkerjaan[1],      
                        'status_pernikahan'=>$this->input->post('status_perkawinan'),      
                        'pendidikan_id'=>$isi_pendidikan[0],      
                        'nama_pendidikan'=>$isi_pendidikan[1],      
                        'jabatan_id'=>$isi_jabatan[0],      
                        'nama_jabatan'=>$isi_jabatan[1],      
                        'ptpn_id'=>$isi_ptpn[0],      
                        'nama_ptpn'=>$isi_ptpn[1],      
                        'jabatan_id'=>$isi_jabatan[0],      
                        'nama_jabatan'=>$isi_jabatan[1]      
            );
                $nik=$this->input->post('no_identitas_internal');
                  $this->pendaftaran_model_internal->edit($insert,$id_pasien);
                  $this->session->set_flashdata('confirm','Data berhasil diubah!');
                  ?>
                  <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_pasien_internal/detail/<?php echo $nik;?>"; </script>
                  <?php
      }
      else{
        $data['agama']=$this->sosial_agama_model->Get_Agama();
        $data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
        $data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();
        $nik=$this->uri->segment(4);
        $data['id_pasien']=$this->pendaftaran_model_internal->Get_id();
        $data['jabatan']=$this->pendaftaran_model_internal->get_jabatan();
        $data['data_pasien']=$this->pendaftaran_model_internal->get_data_detail($nik);
        $this->template->load('template','pendaftaran_pasien_internal/edit',$data);
      } 
    }

    function cek(){
      $nik=$this->input->post('nik');
      $cek=$this->pendaftaran_model_internal->cek($nik);
      if($cek->num_rows()>0){
        echo "sudah";
      }
      else{
        echo $nik;
      }
    }
    
    public function detail(){
        $nik=$this->uri->segment(4);
        $data['data_registrasi']=$this->pendaftaran_model_internal->get_data_detail($nik);
        $this->template->load('template', 'pendaftaran_pasien_internal/detail',$data);   
    }

    public function delete () {
    $id_pasien = $this->uri->segment(4);
    $this->pendaftaran_model_internal->delete($id_pasien);
    $this->session->set_flashdata('confirm','Data berhasil dihapus!');
        ?>
        <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_pasien_internal"; </script>
        <?php
    }

    public function search(){
        $kata_kunci=$this->input->post("kata_kunci");
        $data['data_pasien']=$this->pendaftaran_model_internal->search($kata_kunci);
        $this->template->load('template','pendaftaran_pasien_internal/search',$data);
    }
    
}