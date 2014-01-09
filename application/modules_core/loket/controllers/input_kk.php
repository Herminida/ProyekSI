<?php
class Input_kk extends CI_Controller{


    public function __construct() {
        parent::__construct();
        $this->load->model('model_input_kk');
    }
    
    function index(){
        $data['kecamatan'] = $this->model_input_kk->getkecamatan();
        $this->template->load('template','input_kk/view_input_kk',$data);
    }
    function getkelurahan(){
	$id_kecamatan = $this->input->post('id_kecamatan');
	$Kecamatan = $this->model_input_kk->getkelurahan($id_kecamatan);
	$data .= "<option value=''>--Pilih Kelurahan--</option>";
	foreach ($Kecamatan as $mp){
		$data .= "<option value='$mp[id_kelurahan]'>$mp[nama_kelurahan]</option>\n";	
	}
	echo $data;
	}
        
    function addinsert () {
        
        $in['no_kk'] = $this->input->post('no_kk');
        $in['nama_kk'] = $this->input->post('nama_kk');
        $in['alamat'] = $this->input->post('alamat');
        $in['rt'] = $this->input->post('rt');
        $in['rw'] = $this->input->post('rw');
        $in['id_kelurahan'] = $this->input->post('id_kelurahan');
        $this->model_input_kk->insertdata("sosial_kepala_keluarga",$in);
     
        $no_kk=$this->input->post('no_kk');
        $data['id_kk'] = $this->model_input_kk->getidkk($no_kk);
        $data['id_agama'] = $this->model_input_kk->getagama();
        $data['id_pekerjaan'] = $this->model_input_kk->getpekerjaan();
        $data['id_bayar'] =  $this->model_input_kk->getstatusbayar();
        $data['id_pendidikan'] = $this->model_input_kk->getpendidikan ();
        $data['id_status'] = $this->model_input_kk->getstatusanggota();
        $data['no_kk'] = $this->input->post('no_kk');
        $data['nama_kk'] = $this->input->post('nama_kk');
        $this->template->load('template','anggota_kk/view_input_anggota',$data);
        
        
    }
    
    function addanggota () {
         $in=array(
            'nomer_induk_anggota'=>$this->input->post('nomer_induk_anggota'),
            'nama_anggota'=>$this->input->post('nama_anggota'),
            'tempat_lahir_anggota'=>$this->input->post('tempat_lahir_anggota'),
            'tgl_lahir_anggota'=>$this->input->post('tgl_lahir_anggota'),
            'kelamin_anggota'=>$this->input->post('kelamin_anggota'),
            'ayah_anggota' =>$this->input->post('ayah_anggota'),
            'ibu_anggota' =>$this->input->post('ibu_anggota'),
            'id_agama' =>$this->input->post('id_pendidikan'),
            'id_pendidikan' =>$this->input->post('id_pendidikan'),
            'id_pekerjaan' =>$this->input->post('id_pekerjaan'),
            'id_bayar' =>$this->input->post('id_bayar'),
            'id_status' =>$this->input->post('id_status'),
            'telp_anggota' =>$this->input->post('telp_anggota'),
            'id_kepala_keluarga' =>$this->input->post('id_kk')
        );
        $data = $this->model_input_kk->addanggotakk($in);
        $data['no_kk']=$this->input->post('no_kk');
        $no_kk=$this->input->post('no_kk');
        $data['id_kk'] = $this->model_input_kk->getidkk($no_kk);
        $data['nama_kk']=$this->input->post('nama_kk');
        $data['id_agama'] = $this->model_input_kk->getagama();
        $data['id_pekerjaan'] = $this->model_input_kk->getpekerjaan();
        $data['id_bayar'] =  $this->model_input_kk->getstatusbayar();
        $data['id_pendidikan'] = $this->model_input_kk->getpendidikan ();
        $data['id_status'] = $this->model_input_kk->getstatusanggota();
        
       
        $data['id_agama'] = $this->model_input_kk->getagama();
       $this->template->load('template','anggota_kk/view_input_anggota',$data);
    }
    
    function addanggotakklama(){
     $data['nama_kk']=$this->input->post('nama_kk');
     $data['no_kk']=$this->input->post('no_kk');
     $data['id_kk']=$this->input->post('id');
     $data['id_agama'] = $this->model_input_kk->getagama();
        $data['id_pekerjaan'] = $this->model_input_kk->getpekerjaan();
        $data['id_bayar'] =  $this->model_input_kk->getstatusbayar();
        $data['id_pendidikan'] = $this->model_input_kk->getpendidikan ();
        $data['id_status'] = $this->model_input_kk->getstatusanggota();
        
     $this->template->load('template','anggota_kk/view_tambah_anggota_kk',$data);
    }
    
    
}
?>
