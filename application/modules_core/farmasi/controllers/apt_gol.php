<?php

class Apt_gol extends CI_Controller {
	public function __construct () {
		parent::__construct();
		$this->load->model('apt_gol_model');
	}

	public function index()
	{
		
     		$data['apt_gol']=$this->apt_gol_model->Get_Apt_Gol();
        	$this->template->load('template','apt_gol/index',$data);
        
	}
	

	//Pembuka ADD
	public function add () {
		

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$this->form_validation->set_rules('nama_golongan', 'Golongan Obat', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$data['id_golongan'] = "";
            	$data['nama_golongan'] = "";
            	$this->template->load('template','apt_gol/add',$data);
			}
			else {

				$data2 = $this->input->post('nama_golongan');
				$query = $this->apt_gol_model->double($data2);

				if ($query->num_rows>0) {
					if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
					
				?>
					<script> window.location = "<?php echo base_url(); ?>farmasi/apt_gol"; </script>
					<?php

				}
				else {

				$in['nama_golongan'] = $this->input->post('nama_golongan');
				$in['id_golongan'] = $this->input->post('id_golongan');
				$this->apt_gol_model->insert("apt_gol",$in);
				$this->session->set_flashdata('message','Data Berhasil Disimpan!');

					
				?>
					<script> window.location = "<?php echo base_url(); ?>farmasi/apt_gol"; </script>
					<?php

				}

				
				
			}

				
		}
		else{
       
            $data['id_golongan'] = "";
            $data['nama_golongan'] = "";
            $this->template->load('template','apt_gol/add',$data);
   		}
   		
    }
    //Penutup ADD
	
	//Pembuka Edit
	public function edit() {
		
		
			if ($_SERVER ['REQUEST_METHOD']=="POST") {

				$this->form_validation->set_rules('nama_golongan','Golongan Obat' , 'trim|required');

				$id2['id_golongan']= $this->input->post('id_golongan');
				if ($this->form_validation->run()==FALSE) {

					$query = $this->apt_gol_model->edit("apt_gol",$id2);

					foreach ($query->result_array() as $tampil) {
						$data['id_golongan']=$tampil['id_golongan'];
						$data['nama_golongan']=$tampil['nama_golongan'];

					}

					$this->template->load('template','apt_gol/edit',$data);

				}
				else {
					$data = $this->input->post('nama_golongan');
					$query = $this->apt_gol_model->double($data);

					if ($query->num_rows >0) {
						if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
						
				?>
					<script> window.location = "<?php echo base_url(); ?>farmasi/apt_gol"; </script>
					<?php
					}
					else {

						$up['nama_golongan'] = $this->input->post('nama_golongan');
						$id['id_golongan'] = $this->input->post('id_golongan');
						$this->apt_gol_model->update("apt_gol",$up,$id);
						$this->session->set_flashdata('message','Data Berhasil Diupdate!');
						
						?>
						<script> window.location = "<?php echo base_url(); ?>farmasi/apt_gol"; </script>
						<?php
					}

				}

				
			}
			else {

				$pilih['id_golongan'] = $this->uri->segment(4);
				$dt_apt_gol = $this->apt_gol_model->edit("apt_gol",$pilih);
					foreach($dt_apt_gol->result_array() as $tampil)
				{
					$bc['id_golongan'] = $tampil['id_golongan'];
					$bc['nama_golongan'] = $tampil['nama_golongan'];
				
				}
				$this->template->load('template','apt_gol/edit',$bc);
			}

			
	
	}
	//Penutup Edit
	
	//Pembuka Delete
	public function delete()
	{
		
		
			$id['id_golongan']=$this->uri->segment(4);
			$this->apt_gol_model->delete("apt_gol",$id);

			$this->session->set_flashdata('message','Data Berhasil Dihapus');
			?>
				<script> window.location = "<?php echo base_url(); ?>farmasi/apt_gol"; </script>
			<?php
		
			
		
	}
	//Penutup Edit

	//Pembuka Search
	public function search () {
		

		$this->form_validation->set_rules('keysearch', 'Cari Golongan Obat', 'trim|required');

		if ($this->form_validation->run()==FALSE) {

			$data['apt_gol']=$this->apt_gol_model->Get_Apt_Gol();
			$this->template->load('template','apt_gol/index',$data);

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

			$data['get_data'] = $this->apt_gol_model->search($kata);
			$this->template->load('template','apt_gol/search',$data);

		}
            
		
	
		
	
	}
	//Penutup Search

} //end Controlller 
