<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admission_bayar extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('admission_bayar_model');
    }
	
	public function index()
	{
		
		
		$data['admission_bayar']=$this->admission_bayar_model->Get_Admission_Bayar();
		$this->template->load('template','admission_bayar/index',$data);
		
	}
	
	public function add () {

		

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$this->form_validation->set_rules('cara_bayar', 'Admission Bayar', 'trim|required');

			if ($this->form_validation->run() == FALSE) {

				$data['id'] = "";
            	$data['cara_bayar'] = "";
            	$this->template->load('template','admission_bayar/add',$data);
			}
			else {

				$data = $this->input->post('cara_bayar');
				$query = $this->admission_bayar_model->double($data);

				if ($query->num_rows>0) {
					if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
					?>
						<script> window.location = "<?php echo base_url(); ?>master/admission_bayar"; </script>
						<?php
				}
				else {

				$in['cara_bayar'] = $this->input->post('cara_bayar');
				$in['id'] = $this->input->post('id');
				$this->admission_bayar_model->insert("admission_bayar",$in);

				$this->session->set_flashdata('message','Data Berhasil Ditambahkan');
				?>
						<script> window.location = "<?php echo base_url(); ?>master/admission_bayar"; </script>
						<?php
				}
				
			}

				
		}
		else{
       
            $data['id'] = "";
            $data['cara_bayar'] = "";
            $this->template->load('template','admission_bayar/add',$data);
   		}
   		
    }
    //Penutup ADD
	
	//Pembuka Edit
	public function edit() {
		
		
			if ($_SERVER ['REQUEST_METHOD']=="POST") {

				$this->form_validation->set_rules('cara_bayar','Admission Bayar' , 'trim|required');

				$id2['id']= $this->input->post('id');
				if ($this->form_validation->run()==FALSE) {

					$query = $this->admission_bayar_model->edit("admission_bayar",$id2);

					foreach ($query->result() as $tampil) {
						$data['id']=$tampil->id;
						$data['cara_bayar']=$tampil->cara_bayar;

					}

					$this->template->load('template','admission_bayar/edit',$data);

				}
				else {
					$data = $this->input->post('cara_bayar');
					$query = $this->admission_bayar_model->double($data);

					if ($query->num_rows >0) {
						if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/admission_bayar"; </script>
						<?php
					}
					else {

						$up['cara_bayar'] = $this->input->post('cara_bayar');
						$id['id'] = $this->input->post('id');
						$this->admission_bayar_model->update("admission_bayar",$up,$id);
						$this->session->set_flashdata('message','Data Berhasil Diupdate');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/admission_bayar"; </script>
						<?php
					}

				}

				
			}
			else {

				$pilih['id'] = $this->uri->segment(4);
				$dt_admission_bayar = $this->admission_bayar_model->edit("admission_bayar",$pilih);
					foreach($dt_admission_bayar->result() as $db)
				{
					$bc['id'] = $db->id;
					$bc['cara_bayar'] = $db->cara_bayar;
				
				}
				$this->template->load('template','admission_bayar/edit',$bc);
			}	
		
	
	}
	//Penutup Edit
	
	//Pembuka Delete
	public function delete()
	{
		
		
			$this->admission_bayar_model->delete($this->uri->segment(4));	
			$this->session->set_flashdata('message','Data Berhasil Dihapus');
			?>
				<script> window.location = "<?php echo base_url(); ?>admission_bayar"; </script>
			<?php
			
		
	}
	//Penutup Edit

	//Pembuka Search
	public function search () {
		

		$this->form_validation->set_rules('keysearch', 'Cari Admission Bayar', 'trim|required');

		if ($this->form_validation->run()==FALSE) {

			$data['admission_bayar']=$this->admission_bayar_model->Get_admission_bayar();
			$this->template->load('template','admission_bayar/index',$data);

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

			$data['get_data'] = $this->admission_bayar_model->search($kata);
			$this->template->load('template','admission_bayar/search',$data);

		}
		
            
	
		
	
	}
	//Penutup Search

} //end Controlller 