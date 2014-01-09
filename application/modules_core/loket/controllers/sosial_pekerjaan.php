<?php 

class Sosial_pekerjaan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('sosial_pekerjaan_model');
    }
    
    public function index() {
    	
	    
		$data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
		$this->template->load('template','sosial_pekerjaan/index',$data);
		
    }

    //Pembuka Add
    public function add() {
    	
        
           if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$this->form_validation->set_rules('nama_pekerjaan', 'Pekerjaan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$data['id'] = "";
            	$data['nama_pekerjaan'] = "";
            	$this->template->load('template','sosial_pekerjaan/add',$data);
			}
			else {

				$data = $this->input->post('nama_pekerjaan');
				$query = $this->sosial_pekerjaan_model->double($data);

				if ($query->num_rows>0) {
					if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
					?>
						<script> window.location = "<?php echo base_url(); ?>loket/sosial_pekerjaan"; </script>
						<?php
				}
				else {

				$in['nama_pekerjaan'] = $this->input->post('nama_pekerjaan');
				$in['id'] = $this->input->post('id');
				$this->sosial_pekerjaan_model->insert("sosial_pekerjaan",$in);

				$this->session->set_flashdata('message','Data Berhasil Ditambahkan');
				?>
						<script> window.location = "<?php echo base_url(); ?>loket/sosial_pekerjaan"; </script>
						<?php
				}
				
			}

				
		}
		else{
       
            $data['id'] = "";
            $data['nama_pekerjaan'] = "";
            $this->template->load('template','sosial_pekerjaan/add',$data);
   		}
   		
    }
    //Penutup Add
    
    //Pembuka Edit
    public function edit() {
    	
            if ($_SERVER ['REQUEST_METHOD']=="POST") {

				$this->form_validation->set_rules('nama_pekerjaan','Pekerjaan' , 'trim|required');

				$id2['id']= $this->input->post('id');
				if ($this->form_validation->run()==FALSE) {

					$query = $this->sosial_pekerjaan_model->edit("sosial_pekerjaan",$id2);

					foreach ($query->result() as $tampil) {
						$data['id']=$tampil->id;
						$data['nama_pekerjaan']=$tampil->nama_pekerjaan;

					}

					$this->template->load('template','sosial_pekerjaan/edit',$data);

				}
				else {
					$data = $this->input->post('nama_pekerjaan');
					$query = $this->sosial_pekerjaan_model->double($data);

					if ($query->num_rows >0) {
						if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
						?>
						<script> window.location = "<?php echo base_url(); ?>loket/sosial_pekerjaan"; </script>
						<?php
					}
					else {

						$up['nama_pekerjaan'] = $this->input->post('nama_pekerjaan');
						$id['id'] = $this->input->post('id');
						$this->sosial_pekerjaan_model->update("sosial_pekerjaan",$up,$id);
						$this->session->set_flashdata('message','Data Berhasil Diupdate');
						?>
						<script> window.location = "<?php echo base_url(); ?>loket/sosial_pekerjaan"; </script>
						<?php
					}

				}

				
			}
			else {

				$pilih['id'] = $this->uri->segment(4);
				$dt_pekerjaan = $this->sosial_pekerjaan_model->edit("sosial_pekerjaan",$pilih);
					foreach($dt_pekerjaan->result() as $db)
				{
					$bc['id'] = $db->id;
					$bc['nama_pekerjaan'] = $db->nama_pekerjaan;
				
				}
				$this->template->load('template','sosial_pekerjaan/edit',$bc);
			}

			
	
	}
	//Penutup Edit
    
    
    
    public function delete () {
    	
        
        $this->sosial_pekerjaan_model->delete($this->uri->segment(4));	
		$this->session->set_flashdata('message','Data Berhasil Dihapus');
			?>
				<script> window.location = "<?php echo base_url(); ?>loket/sosial_pekerjaan"; </script>
			<?php
			
    }
	
	public function search () {
		
		$this->form_validation->set_rules('keysearch', 'Cari Pekerjaan', 'trim|required');

		if ($this->form_validation->run()==FALSE) {

			$data['pekerjaan']=$this->sosial_pekerjaan_model->Get_Pekerjaan();
			$this->template->load('template','sosial_pekerjaan/index',$data);

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

			$data['get_data'] = $this->sosial_pekerjaan_model->search($kata);
			$this->template->load('template','sosial_pekerjaan/search',$data);

		}
		
		
	}


}

