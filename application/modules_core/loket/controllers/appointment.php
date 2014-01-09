<?php
class appointment extends Ci_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('master/kelas_kamar_model');
        $this->load->model('ruang_kamar_model');
        $this->load->model('admission_registrasi_model');
        $this->load->model('appointment_model');
    }

    public function index(){
    	$page=$this->uri->segment(4);
            $limit=20;
            if(!$page):
            $offset = 0;
            else:
            $offset = $page;
            endif;
    
            $data['tot'] = $offset;
            $tot_hal = $this->appointment_model->get_data();
            $config['base_url'] = base_url() . 'loket/appointment/index';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data["paginator"] =$this->pagination->create_links();

            $data['data_pasien'] = $this->db->query("select a.*,b.nama_dokter,c.nama_klinik,d.* from tbl_appointment a join dokter b on a.id_dokter=b.nik_dokter join admission_klinik c on a.id_unit_layanan=c.id join sosial_anggota_keluarga d on a.id_pasien=d.id limit ".$limit." offset ".$offset);
            
            $this->template->load('template','appointment/index',$data);
    }

    public function add(){
    	if ($_SERVER ['REQUEST_METHOD']=="POST") {
    		$insert=array('id_pasien'=>$this->input->post('id_pasien'),
                          'tanggal_registrasi'=>$this->input->post('tanggal_registrasi'),
    					  'id_unit_layanan'=>$this->input->post('unit_layanan'),
    					  'id_dokter'=>$this->input->post('dokter'),
    					  'keluhan'=>$this->input->post('keluhan')
    			);

            //keterangan "harus ada update kamar yang sudah dipakai,, sementara ini belum"
    		$this->appointment_model->add($insert);
    		$this->session->set_flashdata('message','Data Berhasil Disimpan');
                ?>
                    <script> window.location = "<?php echo base_url(); ?>loket/appointment"; </script>
                    <?php
               

    	}
    	else{
    		$data['data_kelas_kamar']=$this->kelas_kamar_model->getData();
    		$data['data_dokter']=$this->appointment_model->getDokter();
    		$data['data_unit_layanan']=$this->appointment_model->getUnitLayanan();
    		$this->template->load('template','appointment/add',$data);
    	}
    }

    function GetRuangkamar () {
    	$data="";
        $id_kelas_kamar = $this->input->post('id_kelas_kamar');
        $ruang_kamar = $this->ruang_kamar_model->search($id_kelas_kamar);
        $data .= "<option value=''>==Pilih Ruang Kamar==</option>";
        foreach ($ruang_kamar->result_array() as $mp){
        $data .= "<option value='$mp[id_ruang_kamar]'> $mp[nama_ruang_kamar]</option>\n";   
    } 
    echo $data;
    }

    function cari_pasien(){
      $kata_kunci=$this->input->post('kata_kunci');
      $data['data_pasien']=$this->admission_registrasi_model->cari_pasien($kata_kunci);
      $this->load->view('appointment/search',$data);
    }

    function detail(){
        $nik=$this->uri->segment(4);
        $hasil = explode("n", $nik);
        $nik_pasien=$hasil[1];
        $tanggal_registrasi=$hasil[2];
        $data['data_pasien']=$this->appointment_model->getDetail($nik_pasien,$tanggal_registrasi);
        $this->template->load('template','appointment/detail',$data);
    }

    function delete(){
        $id_pasien = $this->uri->segment(4);
        $this->appointment_model->delete($id_pasien);
        $this->session->set_flashdata('confirm','Data berhasil dihapus!');
        ?>
        <script> window.location = "<?php echo base_url(); ?>loket/appointment"; </script>
        <?php
    }
    
}
?>