<?php

class Sosial_status_anggota extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('sosial_status_anggota_model');
    }
    
    public function index() {

    	
	
		$data['status_anggota']=$this->sosial_status_anggota_model->Get_Status_Anggota();
		$this->template->load('template','sosial_status_anggota/index',$data);
		
    }
    
    public function add () {
    	


		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$this->form_validation->set_rules('nama_status_anggota', 'Status Anggota', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$data['id'] = "";
            	$data['nama_status_anggota'] = "";
            	$this->template->load('template','sosial_status_anggota/add',$data);
			}
			else {

				$data = $this->input->post('nama_status_anggota');
				$query = $this->sosial_status_anggota_model->double($data);

				if ($query->num_rows>0) {
					if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
					?>
						<script> window.location = "<?php echo base_url(); ?>loket/sosial_status_anggota"; </script>
						<?php
				}
				else {

				$in['nama_status_anggota'] = $this->input->post('nama_status_anggota');
				$in['id'] = $this->input->post('id');
				$this->sosial_status_anggota_model->insert("sosial_status_anggota",$in);

				$this->session->set_flashdata('message','Data Berhasil Ditambahkan');
				?>
						<script> window.location = "<?php echo base_url(); ?>loket/sosial_status_anggota"; </script>
						<?php
				}
				
			}

				
		}
		else{
       
            $data['id'] = "";
            $data['nama_status_anggota'] = "";
            $this->template->load('template','sosial_status_anggota/add',$data);
   		}
   		
    }
    //Penutup ADD
	
	//Pembuka Edit
	public function edit() {
		
		
			if ($_SERVER ['REQUEST_METHOD']=="POST") {

				$this->form_validation->set_rules('nama_status_anggota','Status Anggota' , 'trim|required');

				$id2['id']= $this->input->post('id');
				if ($this->form_validation->run()==FALSE) {

					$query = $this->sosial_status_anggota_model->edit("sosial_status_anggota",$id2);

					foreach ($query->result() as $tampil) {
						$data['id']=$tampil->id;
						$data['nama_status_anggota']=$tampil->nama_status_anggota;

					}

					$this->template->load('template','sosial_status_anggota/edit',$data);

				}
				else {
					$data = $this->input->post('nama_status_anggota');
					$query = $this->sosial_status_anggota_model->double($data);

					if ($query->num_rows >0) {
						if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
						?>
						<script> window.location = "<?php echo base_url(); ?>loket/sosial_status_anggota"; </script>
						<?php
					}
					else {

						$up['nama_status_anggota'] = $this->input->post('nama_status_anggota');
						$id['id'] = $this->input->post('id');
						$this->sosial_status_anggota_model->update("sosial_status_anggota",$up,$id);
						$this->session->set_flashdata('message','Data Berhasil Diupdate');
						?>
						<script> window.location = "<?php echo base_url(); ?>loket/sosial_status_anggota"; </script>
						<?php
					}

				}

				
			}
			else {

				$pilih['id'] = $this->uri->segment(4);
				$dt_status_anggota = $this->sosial_status_anggota_model->edit("sosial_status_anggota",$pilih);
					foreach($dt_status_anggota->result() as $db)
				{
					$bc['id'] = $db->id;
					$bc['nama_status_anggota'] = $db->nama_status_anggota;
				
				}
				$this->template->load('template','sosial_status_anggota/edit',$bc);
			}
			
	
	}
	//Penutup Edit
	
	//Pembuka Delete
	public function delete()
	{
		
		
			$this->sosial_status_anggota_model->delete($this->uri->segment(4));	
			$this->session->set_flashdata('message','Data Berhasil Dihapus');
			?>
				<script> window.location = "<?php echo base_url(); ?>loket/sosial_status_anggota"; </script>
			<?php
		
		
	}
	//Penutup Edit

	//Pembuka Search
	public function search () {
		

		$this->form_validation->set_rules('keysearch', 'Cari Status Anggota', 'trim|required');

		if ($this->form_validation->run()==FALSE) {

			$data['status_anggota']=$this->sosial_status_anggota_model->Get_status_anggota();
			$this->template->load('template','sosial_status_anggota/index',$data);

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

			$data['get_data'] = $this->sosial_status_anggota_model->search($kata);
			$this->template->load('template','sosial_status_anggota/search',$data);

		}
            
	
		
	
	}
	//Penutup Search

} //end Controlller 