<?php
class Jabatan extends CI_Controller {
	public function __construct () {
		parent::__construct();
		$this->load->model('jabatan_model');
	}
	public function index () {

		$data['jabatan_data'] = $this->jabatan_model->GetJabatan();
		$this->template->load('template','jabatan/index',$data);

	}

	public function add () {
		 if ($_SERVER ['REQUEST_METHOD']=="POST") {

		 	$this->form_validation->set_rules('nama_jabatan','Jabatan','trim|required');

		 	if ($this->form_validation->run()==FALSE) {
				$this->template->load('template','jabatan/add'); 
		 	}
		 	else {
		 		$sama=$this->input->post('nama_jabatan');
		 		$query = $this->jabatan_model->double($sama);
		 		if ($query->num_rows>0) {
		 			if($query)$this->session->set_flashdata('message','Data sudah Ada !');
		 				?>
		 					<script>window.location="<?php echo base_url();?>master/jabatan"</script>
		 				<?php 

		 		}
		 		else {
		 			$in['nama_jabatan']= $this->input->post('nama_jabatan');
		 			$this->jabatan_model->insert("jabatan",$in);
		 			$this->session->set_flashdata('message','Data Berhasil Disimpan');
		 				?>
		 					<script>window.location="<?php echo base_url();?>master/jabatan"</script>
		 				<?php
		 		}
		 		
		 	}
		 }
		 else {

			$this->template->load('template','jabatan/add'); 	
		 }

		

	}

	public function edit () {

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$this->form_validation->set_rules('nama_jabatan','Jabatan','trim|required');

			if ($this->form_validation->run()==FALSE) {

				$pilih['id_jabatan'] = $this->uri->segment(4);
				$queryedit = $this->jabatan_model->edit("jabatan",$pilih);

					foreach ($queryedit->result_array() as $tampil) {
						$data['id_jabatan'] = $tampil['id_jabatan'];
						$data['nama_jabatan'] = $tampil['nama_jabatan'];

					}

				$this->template->load('template','jabatan/edit',$data);

			}
			else {

				$sama=$this->input->post('nama_jabatan');
		 		$query = $this->jabatan_model->double($sama);
		 			if ($query->num_rows>0) {
		 				if($query)$this->session->set_flashdata('message','Data sudah Ada !');
		 					?>
		 						<script>window.location="<?php echo base_url();?>master/jabatan"</script>
		 					<?php 

		 			}
		 			else {

					$up['nama_jabatan'] = $this->input->post('nama_jabatan');
					$id['id_jabatan'] = $this->input->post('id_jabatan');

					$this->jabatan_model->update("jabatan",$up,$id);
					$this->session->set_flashdata('message','Data Berhasil Diupdate');
					?>
						<script>window.location="<?php echo base_url();?>master/jabatan"</script>
					<?php
					}
			}

		}
		else {

			$pilih['id_jabatan'] = $this->uri->segment(4);
			$queryedit = $this->jabatan_model->edit("jabatan",$pilih);

				foreach ($queryedit->result_array() as $tampil) {
					$data['id_jabatan'] = $tampil['id_jabatan'];
					$data['nama_jabatan'] = $tampil['nama_jabatan'];

				}

			$this->template->load('template','jabatan/edit',$data);


		}

		
	}

	public function delete () {

		$id['id_jabatan'] = $this->uri->segment(4);
		$this->jabatan_model->delete("jabatan",$id);
		$this->session->set_flashdata('message','Data Berhasil Dihapus');

		?>
			<script> window.location ="<?php echo base_url(); ?>master/jabatan"</script>
		<?php

	}

	public function search () {

		$this->form_validation->set_rules('keysearch','Cari','trim|required');

		if ($this->form_validation->run()==FALSE) {

			$data['jabatan_data'] = $this->jabatan_model->GetJabatan();
			$this->template->load('template','jabatan/index',$data);
		}
		else {
			if ($this->input->post("keysearch")=="") {
				$kata = $this->session->userdata('kata_cari');
			}
			else {
				$sess_data['kata_cari'] =$this->input->post('keysearch');
				$this->session->set_userdata($sess_data);
				$kata=$this->session->userdata('kata_cari');

			}

			$data['search_data'] = $this->jabatan_model->search($kata);
			$this->template->load('template','jabatan/search',$data);
		}

	}
}