<?php
class Users_groups extends CI_Controller {
	public function __construct () {
		parent::__construct();
		$this->load->model('users_groups_model');
	}
	public function index () {

		$data['users_groups_data'] = $this->users_groups_model->GetUsersGroups();
		$this->template->load('template','users_groups/index',$data);

	}

	public function add () {
		 if ($_SERVER ['REQUEST_METHOD']=="POST") {

		 	$this->form_validation->set_rules('nama_users_groups','Group','trim|required');

		 	if ($this->form_validation->run()==FALSE) {
				$this->template->load('template','users_groups/add'); 
		 	}
		 	else {
		 		$sama=$this->input->post('nama_users_groups');
		 		$query = $this->users_groups_model->double($sama);
		 		if ($query->num_rows>0) {
		 			if($query)$this->session->set_flashdata('message','Data sudah Ada !');
		 				?>
		 					<script>window.location="<?php echo base_url();?>master/users_groups"</script>
		 				<?php 

		 		}
		 		else {
		 			$in['nama_users_groups']= $this->input->post('nama_users_groups');
		 			$this->users_groups_model->insert("users_groups",$in);
		 			$this->session->set_flashdata('message','Data Berhasil Disimpan');
		 				?>
		 					<script>window.location="<?php echo base_url();?>master/users_groups"</script>
		 				<?php
		 		}
		 		
		 	}
		 }
		 else {

			$this->template->load('template','users_groups/add'); 	
		 }

		

	}

	public function edit () {

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$this->form_validation->set_rules('nama_users_groups','Group','trim|required');

			if ($this->form_validation->run()==FALSE) {

				$pilih['id'] = $this->uri->segment(4);
				$queryedit = $this->users_groups_model->edit("users_groups",$pilih);

					foreach ($queryedit->result_array() as $tampil) {
						$data['id'] = $tampil['id'];
						$data['nama_users_groups'] = $tampil['nama_users_groups'];

					}

				$this->template->load('template','users_groups/edit',$data);

			}
			else {

				$sama=$this->input->post('nama_users_groups');
		 		$query = $this->users_groups_model->double($sama);
		 			if ($query->num_rows>0) {
		 				if($query)$this->session->set_flashdata('message','Data sudah Ada !');
		 					?>
		 						<script>window.location="<?php echo base_url();?>master/users_groups"</script>
		 					<?php 

		 			}
		 			else {

					$up['nama_users_groups'] = $this->input->post('nama_users_groups');
					$id['id'] = $this->input->post('id');

					$this->users_groups_model->update("users_groups",$up,$id);
					$this->session->set_flashdata('message','Data Berhasil Diupdate');
					?>
						<script>window.location="<?php echo base_url();?>master/users_groups"</script>
					<?php
					}
			}

		}
		else {

			$pilih['id'] = $this->uri->segment(4);
			$queryedit = $this->users_groups_model->edit("users_groups",$pilih);

				foreach ($queryedit->result_array() as $tampil) {
					$data['id'] = $tampil['id'];
					$data['nama_users_groups'] = $tampil['nama_users_groups'];

				}

			$this->template->load('template','users_groups/edit',$data);


		}

		
	}

	public function delete () {

		$id['id'] = $this->uri->segment(4);
		$this->users_groups_model->delete("users_groups",$id);
		$this->session->set_flashdata('message','Data Berhasil Dihapus');

		?>
			<script> window.location ="<?php echo base_url(); ?>master/users_groups"</script>
		<?php

	}

	public function search () {

		$this->form_validation->set_rules('keysearch','Cari','trim|required');

		if ($this->form_validation->run()==FALSE) {

			$data['users_groups_data'] = $this->users_groups_model->GetUsersGroups();
			$this->template->load('template','users_groups/index',$data);
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

			$data['search_data'] = $this->users_groups_model->search($kata);
			$this->template->load('template','users_groups/search',$data);
		}

	}
}