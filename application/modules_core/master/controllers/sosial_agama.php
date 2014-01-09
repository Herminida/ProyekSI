<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sosial_agama extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('sosial_agama_model');
    }
	
	public function index()
	{
		
     	$data['agama']=$this->sosial_agama_model->Get_Agama();
        $this->template->load('template','sosial_agama/index',$data);
        
	}
	

	//Pembuka ADD
	public function add () {

		

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$this->form_validation->set_rules('nama_agama', 'Agama', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$data['id'] = "";
            	$data['nama_agama'] = "";
            	$this->template->load('template','sosial_agama/add',$data);
			}
			else {

				$data = $this->input->post('nama_agama');
				$query = $this->sosial_agama_model->double($data);

				if ($query->num_rows>0) {
					if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
					?>
						<script> window.location = "<?php echo base_url(); ?>master/sosial_agama"; </script>
						<?php
				}
				else {

				$in['nama_agama'] = $this->input->post('nama_agama');
				$in['id'] = $this->input->post('id');
				$this->sosial_agama_model->insert("sosial_agama",$in);
				$this->session->set_flashdata('message','Data Berhasil Disimpan!');
				?>
						<script> window.location = "<?php echo base_url(); ?>master/sosial_agama"; </script>
						<?php
				}

				
				
			}

				
		}
		else{
       
            $data['id'] = "";
            $data['nama_agama'] = "";
            $this->template->load('template','sosial_agama/add',$data);
   		}

   		
    }
    //Penutup ADD
	
	//Pembuka Edit
	public function edit() {
		
		
			if ($_SERVER ['REQUEST_METHOD']=="POST") {

				$this->form_validation->set_rules('nama_agama','Agama' , 'trim|required');

				$id2['id']= $this->input->post('id');
				if ($this->form_validation->run()==FALSE) {

					$query = $this->sosial_agama_model->edit("sosial_agama",$id2);

					foreach ($query->result() as $tampil) {
						$data['id']=$tampil->id;
						$data['nama_agama']=$tampil->nama_agama;

					}

					$this->template->load('template','sosial_agama/edit',$data);

				}
				else {
					$data = $this->input->post('nama_agama');
					$query = $this->sosial_agama_model->double($data);

					if ($query->num_rows >0) {
						if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/sosial_agama"; </script>
						<?php
					}
					else {

						$up['nama_agama'] = $this->input->post('nama_agama');
						$id['id'] = $this->input->post('id');
						$this->sosial_agama_model->update("sosial_agama",$up,$id);
						$this->session->set_flashdata('message','Data Berhasil Diupdate');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/sosial_agama"; </script>
						<?php
					}

				}

				
			}
			else {

				$pilih['id'] = $this->uri->segment(4);
				$dt_agama = $this->sosial_agama_model->edit("sosial_agama",$pilih);
					foreach($dt_agama->result() as $db)
				{
					$bc['id'] = $db->id;
					$bc['nama_agama'] = $db->nama_agama;
				
				}
				$this->template->load('template','sosial_agama/edit',$bc);
			}

		
	
	}
	//Penutup Edit
	
	//Pembuka Delete
	public function delete()
	{
		
		
			$this->sosial_agama_model->delete($this->uri->segment(4));	
			$this->session->set_flashdata('message','Data Berhasil Dihapus');
			?>
			<script> window.location = "<?php echo base_url(); ?>master/sosial_agama"; </script>
			<?php	
		
		
	}
	//Penutup Edit

	//Pembuka Search
	public function search () {
		

		$this->form_validation->set_rules('keysearch', 'Cari Agama', 'trim|required');

		if ($this->form_validation->run()==FALSE) {

			$data['agama']=$this->sosial_agama_model->Get_Agama();
			$this->template->load('template','sosial_agama/index',$data);

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

			$data['get_data'] = $this->sosial_agama_model->search($kata);
			$this->template->load('template','sosial_agama/search',$data);

		}
            
	
	
	
	}
	//Penutup Search

} //end Controlller 
