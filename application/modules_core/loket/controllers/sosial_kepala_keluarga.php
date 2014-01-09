<?php

class Sosial_kepala_keluarga extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sosial_kepala_keluarga_model');
        $this->load->model('sosial_kecamatan_model');
        $this->load->model('sosial_kelurahan_model');
        $this->load->model('sosial_anggota_keluarga_model');
        
    }

    public function index() {
       
            /*$page=$this->uri->segment(4);
            $limit=$this->config->item('limit_data');
            if(!$page):
            $offset = 0;
            else:
            $offset = $page;
            endif;
    
            $data['tot'] = $offset;
            $tot_hal = $this->sosial_kepala_keluarga_model->getAllData();
            $config['base_url'] = base_url() . 'loket/sosial_kepala_keluarga/index';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data["paginator"] =$this->pagination->create_links();

            $data['kk'] = $this->sosial_kepala_keluarga_model->getAllDataLimited($limit,$offset);*/
            
            $this->template->load('template','home');

       
    }

    function add () {
        

        if ($_SERVER ['REQUEST_METHOD']=="POST") {

            $this->form_validation->set_rules('no_kk', 'No KK', 'trim|required');
            $this->form_validation->set_rules('nama_kk', 'Nama KK', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('rt', 'RT', 'trim|required');
            $this->form_validation->set_rules('rw', 'RW', 'trim|required');
            $this->form_validation->set_rules('kecamatan_id', 'Kecamatan', 'trim|required');
            $this->form_validation->set_rules('kelurahan_id', 'Kelurahan', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $data['id']="";
                $data['no_kk']="";
                $data['nama_kk']="";
                $data['alamat']="";
                $data['rt']="";
                $data['rw']="";
                $data['kecamatan'] = $this->sosial_kecamatan_model->Get_Kecamatan();

                $this->template->load('template','sosial_kepala_keluarga/add',$data);
               
            }
            else {

                $data = $this->input->post('no_kk');
                $query = $this->sosial_kepala_keluarga_model->double($data);

                if ($query->num_rows>0) {
                    if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
                    ?>
                    <script> window.location = "<?php echo base_url(); ?>loket/sosial_kepala_keluarga"; </script>
                    <?php
                    
                }
                else {

                $in['id'] = $this->input->post('id');
                $in['no_kk'] = $this->input->post('no_kk');
                $in['nama_kk'] = $this->input->post('nama_kk');
                $in['alamat'] = $this->input->post('alamat');
                $in['rt']=$this->input->post('rt');
                $in['rw']=$this->input->post('rw');
                $in['kecamatan_id']=$this->input->post('kecamatan_id');
                $in['kelurahan_id']=$this->input->post('kelurahan_id');

                $this->sosial_kepala_keluarga_model->insert("sosial_kepala_keluarga",$in);
                $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
                ?>
                    <script> window.location = "<?php echo base_url(); ?>loket/sosial_kepala_keluarga"; </script>
                    <?php
                }

            }

            

        }

        else {

        $data['id']="";
        $data['no_kk']="";
        $data['nama_kk']="";
        $data['alamat']="";
        $data['rt']="";
        $data['rw']="";
        $data['kecamatan'] = $this->sosial_kecamatan_model->Get_Kecamatan();

        $this->template->load('template','sosial_kepala_keluarga/add',$data);

        }

        

        
    }

    function edit () {
       

        if ($_SERVER ['REQUEST_METHOD']=="POST") {

            $this->form_validation->set_rules('no_kk', 'No KK', 'trim|required');
            $this->form_validation->set_rules('nama_kk', 'Nama KK', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('rt', 'RT', 'trim|required');
            $this->form_validation->set_rules('rw', 'RW', 'trim|required');
            $this->form_validation->set_rules('kecamatan_id', 'Kecamatan', 'trim|required');
            $this->form_validation->set_rules('kelurahan_id', 'Kelurahan', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $id = $this->input->post("id");
                $sosial_kepala_keluarga  = $this->sosial_kepala_keluarga_model->Get_Kk_Id($id);
                $d = array();
                foreach($sosial_kepala_keluarga->result() as $dt)
                {
                    $d['id'] = $dt->id;
                    $d['no_kk'] = $dt->no_kk;
                    $d['nama_kk'] = $dt->nama_kk;
                    $d['alamat'] = $dt->alamat;
                    $d['rt'] = $dt->rt;
                    $d['rw'] = $dt->rw;
                    $d['kecamatan_id'] = $dt->kecamatan_id;
                    $d['kelurahan_id'] = $dt->kelurahan_id;
                    $d['kecamatan'] = $this->sosial_kecamatan_model->Get_Kecamatan();
                    $d['kelurahan'] = $this->sosial_kelurahan_model->Get_Kelurahan();
                }
                $this->template->load('template','sosial_kepala_keluarga/edit',$d);
               
            }
            else {

                

                $up['no_kk']=$this->input->post('no_kk');
                $up['nama_kk'] = $this->input->post('nama_kk');
                $up['alamat'] = $this->input->post('alamat');
                $up['rt'] = $this->input->post('rt');
                $up['rw'] = $this->input->post('rw');
                $up['kecamatan_id'] = $this->input->post('kecamatan_id');
                $up['kelurahan_id'] = $this->input->post('kelurahan_id');
                $id['id'] = $this->input->post('id');

                $this->sosial_kepala_keluarga_model->update("sosial_kepala_keluarga",$up,$id);
                $this->session->set_flashdata('message','Data Berhasil Diupdate');
                ?>
                    <script> window.location = "<?php echo base_url(); ?>loket/sosial_kepala_keluarga"; </script>
                    <?php
               

            }

        }
        else {

            $id['id']=$this->uri->segment(4);
            $sosial_kepala_keluarga = $this->sosial_kepala_keluarga_model->edit("sosial_kepala_keluarga",$id); 
            foreach ($sosial_kepala_keluarga->result() as $d) {
            $data['id'] = $d->id;
            $data['no_kk'] = $d->no_kk;
            $data['nama_kk'] = $d->nama_kk;
            $data['alamat'] = $d->alamat;
            $data['rt'] = $d->rt;
            $data['rw'] = $d->rw;
            $data['kecamatan_id'] = $d->kecamatan_id;
            $data['kelurahan_id'] = $d->kelurahan_id;
            $data['kecamatan'] = $this->sosial_kecamatan_model->Get_Kecamatan();
            $data['kelurahan'] = $this->sosial_kelurahan_model->Get_Kelurahan();
        }

        $this->template->load('template','sosial_kepala_keluarga/edit',$data);

        }

       

        
    }

    function delete () {

        

            $this->sosial_kepala_keluarga_model->delete($this->uri->segment(5));  
            $this->session->set_flashdata('message','Data Berhasil Dihapus');
            redirect('loket/sosial_kepala_keluarga');  
        
    }

    function Get_Kelurahan () {

        

        $id_kecamatan = $this->input->post('kecamatan_id');
        $kecamatan = $this->sosial_kelurahan_model->Get_Kelurahan_Kecamatan($id_kecamatan);
        $data .= "<option value=''>--Pilih Kelurahan--</option>";
        foreach ($kecamatan->result_array() as $mp){
        $data .= "<option value='$mp[id_kelurahan]'> $mp[nama_kelurahan]</option>\n";   
    } 
    echo $data;

       

    }

    function detail() {

        

        $id = $this->uri->segment(4,TRUE);
        $data['kepala_keluarga']=$this->sosial_kepala_keluarga_model->Get_Kk_id($id);
        $data['anggota_keluarga']=$this->sosial_anggota_keluarga_model->Get_Anggota_KK($id);
        $this->template->load('template','sosial_kepala_keluarga/detail',$data);

        
    }
        
    
   public function search () {

    

        $this->form_validation->set_rules('keysearch', 'Cari Kepala keluarga', 'trim|required');

        if ($this->form_validation->run()==FALSE) {

            $data['kk']=$this->sosial_kepala_keluarga_model->Get_Kk();
            $this->template->load('template','sosial_kepala_keluarga/index',$data);

        }
        else {

            if ($this->input->post("keysearch")=="") {
                $kata = $this->session->userdata('kata_cari');
            }
            else {
                $sess_data['kata_cari']=$this->input->post("keysearch");
                $this->session->set_userdata($sess_data);
                $kata = $this->session->userdata('kata_cari');
            }

            $data['get_data'] = $this->sosial_kepala_keluarga_model->search($kata);
            $this->template->load('template','sosial_kepala_keluarga/search',$data);

        }

        
            
    
        
    
    }
    //Penutup Search


}