<?php
class Sosial_kelurahan extends CI_Controller{

    public function __construct () {

        parent::__construct();
        $this->load->model('sosial_kelurahan_model');
        $this->load->model('sosial_kecamatan_model');
    }

    function index() {
        
        $data['kelurahan']=$this->sosial_kelurahan_model->Get_Kelurahan();
        $this->template->load('template','sosial_kelurahan/index',$data);
        
    }

    //Pembuka Add
    function add() {
        

        if ($_SERVER ['REQUEST_METHOD']=="POST") {

            $this->form_validation->set_rules('nama_kelurahan', 'Kelurahan', 'trim|required');
            $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $data['id_kelurahan'] = "";
                $data['nama_kelurahan'] = "";
                $data['kecamatan']=$this->sosial_kecamatan_model->Get_Kecamatan();
                $this->template->load('template','sosial_kelurahan/add',$data);
            }
            else {

                $nama_kelurahan = $this->input->post('nama_kelurahan');
                $id_kecamatan = $this->input->post('id_kecamatan');
                $query = $this->sosial_kelurahan_model->double($nama_kelurahan,$id_kecamatan);

                if ($query->num_rows>0) {
                    if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
                    ?>
                        <script> window.location = "<?php echo base_url(); ?>master/sosial_kelurahan"; </script>
                        <?php
                }
                else {

                $in['id_kelurahan'] = $this->input->post('id_kelurahan');
                $in['nama_kelurahan'] = $this->input->post('nama_kelurahan');
                $in['id_kecamatan'] = $this->input->post('id_kecamatan');
                $this->sosial_kelurahan_model->insert("sosial_kelurahan",$in);

                $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
                ?>
                        <script> window.location = "<?php echo base_url(); ?>master/sosial_kelurahan"; </script>
                        <?php
                }
                
            }

                
        }
        else{
       
            $data['id_kelurahan'] = "";
            $data['nama_agama'] = "";
            $data['kecamatan']=$this->sosial_kecamatan_model->Get_Kecamatan();
            $this->template->load('template','sosial_kelurahan/add',$data);
        }
        


    }
    //Penutup Add

    //Pembuka Edit
    function edit () {
        

        if ($_SERVER ['REQUEST_METHOD']=="POST") {

            $this->form_validation->set_rules('nama_kelurahan','Kelurahan','trim|required');
            $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'trim|required');
            $pilih2['id_kelurahan']= $this->input->post('id_kelurahan');

            if($this->form_validation->run()==FALSE) {
                $dt_kelurahan = $this->sosial_kelurahan_model->edit("sosial_kelurahan",$pilih2);
                foreach($dt_kelurahan->result() as $db)
                    {

                        $bc['id_kelurahan'] = $db->id_kelurahan;
                        $bc['nama_kelurahan'] = $db->nama_kelurahan;
                        $bc['id_kecamatan'] = $db->id_kecamatan;
                        $bc['kecamatan']=$this->sosial_kecamatan_model->Get_Kecamatan();
                
                    }
            
                    $this->template->load('template','sosial_kelurahan/edit',$bc); 

            }
            else {

                $nama_kelurahan = $this->input->post('nama_kelurahan');
                $id_kecamatan = $this->input->post('id_kecamatan');
                $query = $this->sosial_kelurahan_model->double($nama_kelurahan,$id_kecamatan);

                if ($query->num_rows>0) {
                    if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
                    ?>
                        <script> window.location = "<?php echo base_url(); ?>master/sosial_kelurahan"; </script>
                        <?php
                }
                else {

                $up['nama_kelurahan']=$this->input->post('nama_kelurahan');
                $up['id_kecamatan'] = $this->input->post('id_kecamatan');
                $id['id_kelurahan'] = $this->input->post('id_kelurahan');

                $this->sosial_kelurahan_model->update("sosial_kelurahan",$up,$id);
                $this->session->set_flashdata('message','Data Berhasil Diupdate');
                ?>
                        <script> window.location = "<?php echo base_url(); ?>master/sosial_kelurahan"; </script>
                        <?php

                }


            }

        }
        else {

            $pilih['id_kelurahan'] = $this->uri->segment(4);
            $dt_kelurahan = $this->sosial_kelurahan_model->edit("sosial_kelurahan",$pilih);

            foreach ($dt_kelurahan->result() as $data) {
                $bc['id_kelurahan']=$data->id_kelurahan;
                $bc['nama_kelurahan']=$data->nama_kelurahan;
                $bc['id_kecamatan'] = $data->id_kecamatan;
                $bc['kecamatan']=$this->sosial_kecamatan_model->Get_Kecamatan();
        }

        $this->template->load('template','sosial_kelurahan/edit',$bc);  

        } 
       

    }
    //Penutup edit

    //Pembuka Delete
    function delete () {
        

        $this->sosial_kelurahan_model->delete($this->uri->segment(4));  
        $this->session->set_flashdata('message','Data Berhasil Dihapus');
        ?>
                        <script> window.location = "<?php echo base_url(); ?>master/sosial_kelurahan"; </script>
                        <?php
       
    }
    //Penutup Delete

    //Pembuka Search
    public function search () {
        

        $this->form_validation->set_rules('keysearch', 'Cari Kelurahan', 'trim|required');

        if ($this->form_validation->run()==FALSE) {

            $data['kelurahan']=$this->sosial_kelurahan_model->Get_Kelurahan();
            $this->template->load('template','sosial_kelurahan/index',$data);

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

            $data['get_data'] = $this->sosial_kelurahan_model->search($kata);
            $this->template->load('template','sosial_kelurahan/search',$data);

        }
        
        
            
    
        
    
    }
    //Penutup Search


}

