<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class farmasi_obat_jenis extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('farmasi_obat_jenis_model');

	}
	

	public function index()
	{
		
     	$data['farmasi_obat_jenis']=$this->farmasi_obat_jenis_model->Get_Farmasi_Obat_Jenis();
        $this->template->load('template','farmasi_obat_jenis/index',$data);
        
	}
	

	//Pembuka ADD
	public function add () {

		



		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$sama = $this->input->post('nama_obat_jenis');
					$query = $this->farmasi_obat_jenis_model->double($sama);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {

					
			$in['nama_obat_jenis'] = $this->input->post('nama_obat_jenis');
			$this->farmasi_obat_jenis_model->insert("farmasi_obat_jenis",$in);

			$this->session->set_flashdata('message','Data Berhasil Ditambahkan !');
				?>
			<script>
					window.parent.location.reload(true);
			</script>
			<?php
			}
	

			}
			else {

				$this->load->view('farmasi_obat_jenis/add');
			}

   		
    }
    //Penutup ADD
	
	//Pembuka Edit
	public function edit() {

		
		
			if ($_SERVER['REQUEST_METHOD']=='POST') {

				

					$sama = $this->input->post('nama_obat_jenis');
					$query = $this->farmasi_obat_jenis_model->double($sama);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {
						$up['nama_obat_jenis'] = $this->input->post('nama_obat_jenis');
						$id['id'] = $this->input->post('id');
						$this->farmasi_obat_jenis_model->update("farmasi_obat_jenis",$up,$id);
						$this->session->set_flashdata('message','Data Berhasil Diupdate');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
				

			}
			else {
				$pilih['id'] = $this->uri->segment(4);
			$dt_farmasi_obat_jenis = $this->farmasi_obat_jenis_model->edit("farmasi_obat_jenis",$pilih);
					foreach($dt_farmasi_obat_jenis->result() as $db)
				{
					$bc['id'] = $db->id;
					$bc['nama_obat_jenis'] = $db->nama_obat_jenis;
				
				}
				$this->load->view('farmasi_obat_jenis/edit',$bc);
			}

			
	
	}
	//Penutup Edit
	
	//Pembuka Delete
	public function delete()
	{

		
		
			$this->farmasi_obat_jenis_model->delete($this->uri->segment(4));	
			$this->session->set_flashdata('message','Data Berhasil Dihapus');
			?>
				<script> window.location = "<?php echo base_url(); ?>farmasi/farmasi_obat_jenis"; </script>
			<?php	

			
		
	}
	//Penutup Edit

	//Pembuka Search
	public function search () {

		
			$this->form_validation->set_rules('keysearch', 'Cari Jenis Obat', 'trim|required');

			if ($this->form_validation->run()==FALSE) {

				$data['farmasi_obat_jenis']=$this->farmasi_obat_jenis_model->Get_Farmasi_Obat_Jenis();
				$this->template->load('template','farmasi_obat_jenis/index',$data);

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

			$data['get_data'] = $this->farmasi_obat_jenis_model->search($kata);
			$this->template->load('template','farmasi_obat_jenis/search',$data);

		}
            
		
	
	}
	//Penutup Search

} //end Controlller 
