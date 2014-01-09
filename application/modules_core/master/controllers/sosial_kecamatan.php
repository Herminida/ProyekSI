<?php
class Sosial_kecamatan extends CI_Controller{

    public $input = "";
    function __construct() {
        parent::__construct();
        $this->load->model('sosial_kecamatan_model');
    }
    
    public function index()
    {
        
        $data['kecamatan']=$this->sosial_kecamatan_model->Get_Kecamatan();
        $this->template->load('template','sosial_kecamatan/index',$data);
        
    }
    

    //Pembuka ADD
    public function add () {
       



        if ($_SERVER ['REQUEST_METHOD']=="POST") {

            $this->form_validation->set_rules('nama_kecamatan', 'Kecamatan', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $data['id_kecamatan'] = "";
                $data['nama_kecamatan'] = "";
                $this->template->load('template','sosial_kecamatan/add',$data);
            }
            else {

                $data = $this->input->post('nama_kecamatan');
                $query = $this->sosial_kecamatan_model->double($data);

                if ($query->num_rows>0) {
                    if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
                    ?>
                        <script> window.location = "<?php echo base_url(); ?>master/sosial_kecamatan"; </script>
                        <?php
                }
                else {

                $in['nama_kecamatan'] = $this->input->post('nama_kecamatan');
                $in['id_kecamatan'] = $this->input->post('id_kecamatan');
                $this->sosial_kecamatan_model->insert("sosial_kecamatan",$in);

                $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
                ?>
                        <script> window.location = "<?php echo base_url(); ?>master/sosial_kecamatan"; </script>
                        <?php
                }
                
            }

                
        }
        else{
       
            $data['id_kecamatan'] = "";
            $data['nama_kecamatan'] = "";
            $this->template->load('template','sosial_kecamatan/add',$data);
        }
        
    }
    //Penutup ADD
    
    //Pembuka Edit
    public function edit() {
        
        
            if ($_SERVER ['REQUEST_METHOD']=="POST") {

                $this->form_validation->set_rules('nama_kecamatan','Kecamatan' , 'trim|required');

                $id2['id_kecamatan']= $this->input->post('id_kecamatan');
                if ($this->form_validation->run()==FALSE) {

                   $query = $this->sosial_kecamatan_model->edit("sosial_kecamatan",$id2);

                    foreach ($query->result() as $tampil) {
                        $data['id_kecamatan']=$tampil->id_kecamatan;
                        $data['nama_kecamatan']=$tampil->nama_kecamatan;

                    }

                    $this->template->load('template','sosial_kecamatan/edit',$data);

                }
                else {
                    $data = $this->input->post('nama_kecamatan');
                    $query = $this->sosial_kecamatan_model->double($data);

                    if ($query->num_rows >0) {
                        if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
                        ?>
                        <script> window.location = "<?php echo base_url(); ?>master/sosial_kecamatan"; </script>
                        <?php
                    }
                    else {

                        $up['nama_kecamatan'] = $this->input->post('nama_kecamatan');
                        $id['id_kecamatan'] = $this->input->post('id_kecamatan');
                        $this->sosial_kecamatan_model->update("sosial_kecamatan",$up,$id);
                        $this->session->set_flashdata('message','Data Berhasil Diupdate');
                        ?>
                        <script> window.location = "<?php echo base_url(); ?>master/sosial_kecamatan"; </script>
                        <?php
                    }

                }

                
            }
            else {

                $pilih['id_kecamatan'] = $this->uri->segment(4);
                $dt_kecamatan = $this->sosial_kecamatan_model->edit("sosial_kecamatan",$pilih);
                    foreach($dt_kecamatan->result() as $db)
                {
                    $bc['id_kecamatan'] = $db->id_kecamatan;
                    $bc['nama_kecamatan'] = $db->nama_kecamatan;
                
                }
                $this->template->load('template','sosial_kecamatan/edit',$bc);
            }  
        
    
    }
    //Penutup Edit
    
    //Pembuka Delete
    public function delete()
    {
        
        
            $this->sosial_kecamatan_model->delete($this->uri->segment(4));  
            $this->session->set_flashdata('message','Data Berhasil Dihapus');
            ?>
                <script> window.location = "<?php echo base_url(); ?>master/sosial_kecamatan"; </script>
            <?php  
        
        
    }
    //Penutup Edit

    //Pembuka Search
    public function search () {
       

        $this->form_validation->set_rules('keysearch', 'Cari Kecamatan', 'trim|required');

        if ($this->form_validation->run()==FALSE) {

            $data['kecamatan']=$this->sosial_kecamatan_model->Get_Kecamatan();
            $this->template->load('template','sosial_kecamatan/index',$data);

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

            $data['get_data'] = $this->sosial_kecamatan_model->search($kata);
            $this->template->load('template','sosial_kecamatan/search',$data);

        }

        
            
    
        
    
    }
    //Penutup Search

} //end Controlller 
