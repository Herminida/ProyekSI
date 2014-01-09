<?php 

class Admission_registrasi extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admission_registrasi_model');
        $this->load->model('sosial_anggota_keluarga_model');
        $this->load->model('admission_bayar_model');
        $this->load->model('admission_klinik_model');
        
    }
    
    function index () {
      
        $explodes[0]="";
        $explodes[8]="";
        $explodes[4]="";
        $harib="";
        $tahunb="";
        $bulanb="";
        $id = $this->uri->segment(4);
        $data['reg']=$this->sosial_anggota_keluarga_model->getreg();
        
        $data['anggotas']= $this->sosial_anggota_keluarga_model->getAnggotaByid($id);
        $data['anggotasumurs'] = $data['anggotas']->result_array();
        if (isset($data['anggotasumurs'][0])){
        $data['anggotasumurs'] = $data['anggotasumurs'][0];
        $explodes = explode(' ',$data['anggotasumurs']['umur']);
        }
         
      if ((isset($explodes[0]))&&(isset($explodes[4]))&&(isset($explodes[8]))){
    $tahunb = $explodes[0];
    $bulanb = $explodes[4];
    $harib = $explodes[8];
    }
   
     
    $umurs = $this->admission_registrasi_model->cekumurs();
     $idumur =0;
     foreach ($umurs->result_array() as $usia):
            
            if($tahunb <=0 ){
                if($harib < 29 && $bulanb<=0){
                    if(($harib>=$usia['batas_bawah']) && ($harib<$usia['batas_atas'])){
                        $idumur=$usia['id'];
                    }
                        
                }else{
                    $idumur='3';
                }
            }else{
                if(($tahunb>=$usia['batas_bawah']) && ($tahunb<$usia['batas_atas'])){
                    $idumur=$usia['id'];
                }
            }
                    
        endforeach;
        $data['umurs']= $idumur;
        $data['admission_klinik'] = $this->admission_registrasi_model->Get_Klinik();
        $data['admission_bayar'] = $this->admission_registrasi_model->Get_Admission_Bayar();
         
         $this->template->load('template','admission_registrasi/index',$data);
      
        
    }

    function cari_pasien(){
      $kata_kunci=$this->input->post('kata_kunci');
      $data['data_pasien']=$this->admission_registrasi_model->cari_pasien($kata_kunci);
      $this->load->view('admission_registrasi/search',$data);
    }
    
    function getall() {
      
        
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
       
        $tampil=$this->admission_registrasi_model->search($nik,$nama);
               echo "<table>";
                 echo "<thead><tr>";
                    echo "<th>Aksi</th>";
                    echo "<th>No IKK</th>";
                    echo "<th>Nama</th>";
                    echo "<th>Alamat </th>";
            echo "</tr></thead>";
       foreach ($tampil as $mp){
        
           $id= $mp['id'];
           $nik = $mp['nik'];
           $nama = $mp['nama_anggota'];
           $sex = $mp['sex'];
           $alamat = $mp['alamat'];
           $tgl = $mp['tanggal'];
           $tgl2 = $mp['tanggal_lahir'];
           $tahun =  $mp['umur'];
           $noregtahun = date ('Y');
           $noregbulan = date ('m');
           $noreghari = date ('d');
           $tglregistrasi = date ('Y-m-d');
           $noreg = date('Ymd');


    $explodes = explode(' ',$tahun);

    $tahunb = $explodes[0];
    $bulanb = $explodes[4];
    $harib = $explodes[8];
   
     
    $umurs = $this->admission_registrasi_model->cekumurs();
     $idumur =0;
     foreach ($umurs->result_array() as $usia):
            
            if($tahunb <=0 ){
                if($harib < 29 && $bulanb<=0){
                    if(($harib>=$usia['batas_bawah']) && ($harib<$usia['batas_atas'])){
                        $idumur=$usia['id'];
                    }
                        
                }else{
                    $idumur='3';
                }
            }else{
                if(($tahunb>=$usia['batas_bawah']) && ($tahunb<$usia['batas_atas'])){
                    $idumur=$usia['id'];
                }
            }
                    
        endforeach;
            echo "<tr>";
                echo "<td><a href='#' class='daftar'
                                      id='$id'
                                      nik='$nik' 
                                      nama='$nama' 
                                      sex='$sex' 
                                      alamat='$alamat'
                                      tgl='$tgl'
                                      tahun='$tahun'
                                      idumur ='$idumur'
                                      noreg='$noreg'
                                      tglregistrasi ='$tglregistrasi'
                           >Pilih</a></td>";
                echo "<td>".$mp['nik']."</td>";
                echo "<td>".$mp['nama_anggota']."</td>";
                echo "<td>".$mp['alamat']."</td>";
            echo "</tr>";
         
    }
     echo"</table>";

     
        
    }

    public function cek() {
      $klinik = $this->input->post('klinik');
      $idanggota = $this->input->post('idanggota');
      $tahun = $this->input->post('tahun');

      $datasama = $this->admission_registrasi_model->dataregsama($idanggota,$klinik,$tahun);

      $hasil = $datasama->num_rows();

      echo $hasil;




    }
    
    public function add () {
      

        $this->form_validation->set_rules('noreg', 'No Registrasi', 'trim|required');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');
        $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('sex', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('umur', 'Umur', 'trim|required');
        $this->form_validation->set_rules('id_klinik', 'Klinik', 'trim|required');
        $this->form_validation->set_rules('id_bayar', 'Cara Bayar', 'trim|required');

         if ($this->form_validation->run()==FALSE ) {
          $this->session->set_flashdata('noreg','Form No Reg Harus Diisi !');
          $this->session->set_flashdata('nik','Form NIK Harus Diisi !');
          $this->session->set_flashdata('nama_anggota','Form Nama Anggota Harus Diisi !');
          $this->session->set_flashdata('alamat','Form Alamat Harus Diisi !');
          $this->session->set_flashdata('sex','Form Jenis Kelamin Harus Diisi !');
          $this->session->set_flashdata('tgl_lahir','Form Tanggal Lahir Harus Diisi !');
          $this->session->set_flashdata('umur','Form Umur Harus Diisi !');
          $this->session->set_flashdata('id_klinik','Form Klinik Harus Diisi !');
          $this->session->set_flashdata('id_bayar','Form Cara Bayar Harus Diisi !');
          redirect('loket/admission_registrasi');

        }
        else {
            

        $klinik_id['klinik_id']= $this->input->post('id_klinik');
        $klinik_id['tanggal_registrasi']= date('Y-m-d');
        $hasil = $this->admission_registrasi_model->Get_Data("admission_registrasi",$klinik_id);
        $no=1;
        foreach ($hasil->result_array() as $key ) {
          $no++;
        }

            
            $adaidsama = $this->admission_registrasi_model->idsama();
              if ($adaidsama->num_rows()>0) {
                foreach ($adaidsama->result() as $ada ) {
                   $noreg = $ada->id+1;
                  
                }
                  $in['id']=$noreg;
                  $in['anggota_keluarga_id']=$this->input->post('id_anggota_keluarga');
                  $in['klinik_id']=$this->input->post('id_klinik');
                  $in['bayar_id']=$this->input->post('id_bayar');
                  $in['tanggal_registrasi']=$this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
                  $in['nomor_antrian']=$no;
                  $in['unit_kerja_id']=$this->input->post('unit_kerja_id'); 
                  $in['umur_id']=$this->input->post('umur_id'); 

              }
              else {
                $in['id']=$this->input->post('noreg');
                $in['anggota_keluarga_id']=$this->input->post('id_anggota_keluarga');
                $in['klinik_id']=$this->input->post('id_klinik');
                $in['bayar_id']=$this->input->post('id_bayar');
                $in['tanggal_registrasi']=$this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
                $in['nomor_antrian']=$no;
                $in['unit_kerja_id']=$this->input->post('unit_kerja_id'); 
                $in['umur_id']=$this->input->post('umur_id'); 
              }

      
            
       

        $id=$this->input->post('id_anggota_keluarga');
        $klinik = $this->input->post('id_klinik');
        if ($klinik==9) {
          $cekidpemeriksaan=$this->input->post('noreg');
          $labid=$this->admission_registrasi_model->ambilidpemeriksaan($cekidpemeriksaan);
          foreach ($labid->result() as $labidpemeriksaan) {
            $lab['register']=$labidpemeriksaan->idpemeriksaan;
          }

          

          $in['ket_rujuk']="LAB";
          $in['validasi_reg']=1;
          $lab['no_rm']=$this->input->post('nik');
          $lab['time_lab']= $this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
          
          



               
          
          $data=$this->admission_registrasi_model->insertdataadmission($in);
          $data= $this->admission_registrasi_model->insertdatalab($lab);

        }
        else {
          
          $data=$this->admission_registrasi_model->insertdataadmission($in);
          
        }
        $data['detail_registrasi']=$this->admission_registrasi_model->getanggota_keluarga_id($id);
        $data['id']= $id;
        ?>
        <script> window.location = "<?php echo base_url(); ?>loket/list_registrasi"; </script>
        <?php

        }

    

        
        
    }

    function selesai () {
      
        redirect('loket/admission_registrasi','refresh');
     
    }

    public function edit(){
      
            $this->form_validation->set_rules('klinik_id', 'idKlinik', 'required');
            if($this->form_validation->run() == FALSE){
                $data['registrasi']=$this->admission_registrasi_model->getRegistrasiByid($this->uri->segment(4));
                $data['kliniks']=$this->admission_klinik_model->getAllKlinik();
                $data['bayars']=$this->admission_bayar_model->getAllBayar();
//                $data['noreg']=$this->admission_registrasi_model->getNoreg();
//                $data['nomor_antrian']=$this->admission_registrasi_model->getNoantrian();
                
                $this->template->load('template','admission_registrasi/edit',$data);
            }else{

                $klinik = $this->input->post('klinik_id');
                if ($klinik==9) {
                  $cekidpemeriksaan=$this->input->post('noreg');
                  $labid=$this->admission_registrasi_model->ambilidpemeriksaan($cekidpemeriksaan);
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
                
                  $this->admission_registrasi_model->edit("admission_registrasi",$up,$id);
                  $data= $this->admission_registrasi_model->insertdatalab($lab);

                }
                else {

                  $up['klinik_id']=$this->input->post('klinik_id');
                  $up['bayar_id']=$this->input->post('bayar_id');
                  $up['tanggal_registrasi']=$this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');                    
                  $id['idpemeriksaan'] = $this->input->post('id_pemeriksaan');
                  // $data['noreg']=$this->input->post('noreg');
                
                  $this->admission_registrasi_model->edit("admission_registrasi",$up,$id);

                }
                
                  
                redirect('loket/admission_registrasi','refresh');

            }
       
    }
    
    public function detail(){
      
        $data['detail_registrasi']=$this->admission_registrasi_model->getRegistrasiBydate();
        $this->template->load('template', 'admission_registrasi/detail',$data);
     
        
    }

    public function cetak () {

    $id = $this->uri->segment(4);
    $data['cetakregistrasi'] = $this->admission_registrasi_model->cetak($id);
    //echo $this->db->last_query();
    //die;
   
        
    $this->load->view('loket/admission_registrasi/cetak_admission_registrasi',$data);
    }
    
}