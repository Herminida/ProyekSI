<?php
class pendaftaran_rawat_inap extends Ci_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('master/kelas_kamar_model');
        $this->load->model('ruang_kamar_model');
        $this->load->model('admission_registrasi_model');
        $this->load->model('pendaftaran_rawat_inap_model');
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
            $tot_hal = $this->pendaftaran_rawat_inap_model->get_data();
            $config['base_url'] = base_url() . 'loket/pendaftaran_rawat_inap/index';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data["paginator"] =$this->pagination->create_links();

            $data['data_pasien'] = $this->db->query("select a.*,a.tanggal_registrasi as tanggal_registrasi_pasien,b.*,b.id as id_pasien,c.* from tbl_pasien_rawat_inap a join sosial_anggota_keluarga b on a.pasien_id=b.id join tbl_ruang_kamar c on a.kamar_id=c.id_ruang_kamar limit ".$limit." offset ".$offset);
            
            $this->template->load('template','pendaftaran_rawat_inap/index',$data);
    }

    public function add(){
    	if ($_SERVER ['REQUEST_METHOD']=="POST") {
    		$insert=array('pasien_id'=>$this->input->post('id_pasien'),
    					  'kamar_id'=>$this->input->post('ruang_kamar'),
    					  'penanggung_jawab'=>$this->input->post('penanggung_jawab'),
    					  'tanggal_registrasi'=>$this->input->post('tanggal_registrasi')
    			);

            //keterangan "harus ada update kamar yang sudah dipakai,, sementara ini belum"
    		$this->pendaftaran_rawat_inap_model->add($insert);
    		$this->session->set_flashdata('message','Data Berhasil Disimpan');
                ?>
                    <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_rawat_inap"; </script>
                    <?php
               

    	}
    	else{
    		$data['data_kelas_kamar']=$this->kelas_kamar_model->getData();
    		$this->template->load('template','pendaftaran_rawat_inap/add',$data);
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
      $this->load->view('pendaftaran_rawat_inap/search',$data);
    }

    function detail(){
        $nik=$this->uri->segment(4);
        $hasil = explode("n", $nik);
        $nik_pasien=$hasil[1];
        $tanggal_registrasi=$hasil[2];
        $data['data_pasien']=$this->pendaftaran_rawat_inap_model->getDetail($nik_pasien,$tanggal_registrasi);
        $this->template->load('template','pendaftaran_rawat_inap/detail',$data);
    }

    function delete(){
        $id_pasien = $this->uri->segment(4);
        $this->pendaftaran_rawat_inap_model->delete($id_pasien);
        $this->session->set_flashdata('confirm','Data berhasil dihapus!');
        ?>
        <script> window.location = "<?php echo base_url(); ?>loket/pendaftaran_rawat_inap"; </script>
        <?php
    }
    
}
?>