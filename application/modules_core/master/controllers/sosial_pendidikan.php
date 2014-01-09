<?php

class Sosial_pendidikan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('sosial_pendidikan_model');
    }
    
    public function index() {
    	
	
		$data['pendidikan']=$this->sosial_pendidikan_model->Get_Pendidikan();	
		$this->template->load('template','sosial_pendidikan/index',$data);
		
    }
    
    public function add () {
    	


		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$this->form_validation->set_rules('nama_pendidikan', 'Pendidikan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$data['id'] = "";
            	$data['nama_pendidikan'] = "";
            	$this->template->load('template','sosial_pendidikan/add',$data);
			}
			else {

				$data = $this->input->post('nama_pendidikan');
				$query = $this->sosial_pendidikan_model->double($data);

				if ($query->num_rows>0) {
					if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
					?>
						<script> window.location = "<?php echo base_url(); ?>master/sosial_pendidikan"; </script>
						<?php
				}
				else {

				$in['nama_pendidikan'] = $this->input->post('nama_pendidikan');
				$in['id'] = $this->input->post('id');
				$this->sosial_pendidikan_model->insert("sosial_pendidikan",$in);

				$this->session->set_flashdata('message','Data Berhasil Ditambahkan');
				?>
						<script> window.location = "<?php echo base_url(); ?>master/sosial_pendidikan"; </script>
						<?php
				}
				
			}

				
		}
		else{
       
            $data['id'] = "";
            $data['nama_pendidikan'] = "";
            $this->template->load('template','sosial_pendidikan/add',$data);
   		}
   		
    }
    //Penutup ADD
	
	//Pembuka Edit
	public function edit() {
		
		
			if ($_SERVER ['REQUEST_METHOD']=="POST") {

				$this->form_validation->set_rules('nama_pendidikan','Pendidikan' , 'trim|required');

				$id2['id']= $this->input->post('id');
				if ($this->form_validation->run()==FALSE) {

					$query = $this->sosial_pendidikan_model->edit("sosial_pendidikan",$id2);

					foreach ($query->result() as $tampil) {
						$data['id']=$tampil->id;
						$data['nama_pendidikan']=$tampil->nama_pendidikan;

					}
					$this->template->load('template','sosial_pendidikan/edit',$data);

				}
				else {
					$data = $this->input->post('nama_pendidikan');
					$query = $this->sosial_pendidikan_model->double($data);

					if ($query->num_rows >0) {
						if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/sosial_pendidikan"; </script>
						<?php
					}
					else {

						$up['nama_pendidikan'] = $this->input->post('nama_pendidikan');
						$id['id'] = $this->input->post('id');
						$this->sosial_pendidikan_model->update("sosial_pendidikan",$up,$id);
						$this->session->set_flashdata('message','Data Berhasil Diupdate');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/sosial_pendidikan"; </script>
						<?php
					}

				}

				
			}
			else {

				$pilih['id'] = $this->uri->segment(4);
				$dt_pendidikan = $this->sosial_pendidikan_model->edit("sosial_pendidikan",$pilih);
					foreach($dt_pendidikan->result() as $db)
				{
					$bc['id'] = $db->id;
					$bc['nama_pendidikan'] = $db->nama_pendidikan;
				
				}
				$this->template->load('template','sosial_pendidikan/edit',$bc);
			}

			
	
	}
	//Penutup Edit
	
	//Pembuka Delete
	public function delete()
	{
		
		
			$this->sosial_pendidikan_model->delete($this->uri->segment(4));	
			$this->session->set_flashdata('message','Data Berhasil Dihapus');
			?>
				<script> window.location = "<?php echo base_url(); ?>master/sosial_pendidikan"; </script>
			<?php
			
		
	}
	//Penutup Edit

	//Pembuka Search
	public function search () {

		

		$this->form_validation->set_rules('keysearch', 'Cari pendidikan', 'trim|required');

		if ($this->form_validation->run()==FALSE) {

			$data['pendidikan']=$this->sosial_pendidikan_model->Get_pendidikan();
			$this->template->load('template','sosial_pendidikan/index',$data);

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

			$data['get_data'] = $this->sosial_pendidikan_model->search($kata);
			$this->template->load('template','sosial_pendidikan/search',$data);

		}
		
            
	
		
	
	}
	//Penutup Search

} //end Controlller 