<?php

class Users_operators extends CI_Controller {
	public function __construct () {
		parent::__construct();
		$this->load->model('users_operators_model');
		$this->load->model('users_groups_model');
	}

	public function index () {


		$page=$this->uri->segment(4);
            $limit=$this->config->item('limit_data');
            if(!$page):
            $offset = 0;
            else:
            $offset = $page;
            endif;
    
            $data['tot'] = $offset;
            $tot_hal = $this->users_operators_model->getAllData();
            $config['base_url'] = base_url() . 'master/users_operators/index';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data["paginator"] =$this->pagination->create_links();

            $data['users_operators_data'] = $this->users_operators_model->getAllDataLimited($limit,$offset);
            
            $this->template->load('template','users_operators/index',$data);

		
	}

	public function add () {

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$this->form_validation->set_rules('nama_users_operators','Nama Operator','trim|required');
			$this->form_validation->set_rules('users_groups_id','Group','trim|required');
			

			if ($this->form_validation->run()==FALSE) {

				
				$data['users_groups_data']=$this->users_groups_model->GetUsersGroups();
				$this->template->load('template','users_operators/add',$data);

			}
			else {

				$data=$this->input->post('nama_users_operators');
				$query=$this->users_operators_model->double($data);

				if($query->num_rows>0) {
					if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
					
				?>
					<script> window.location = "<?php echo base_url(); ?>master/users_operators"; </script>
					<?php

				} 
				else {

					$in['id']=$this->input->post('id');
					$in['nama_users_operators']=$this->input->post('nama_users_operators');
					$in['users_groups_id']=$this->input->post('users_groups_id');
					

					$this->users_operators_model->insert("users_operators",$in);
					$this->session->set_flashdata('message','Data Berhasil Disimpan!');
					

					?>
						<script>window.location ="<?php echo base_url();?>master/users_operators"; </script>
					<?php
				}

			}

		}
		else {

		
		
		
		$data['users_groups_data']=$this->users_groups_model->GetUsersGroups();
		$this->template->load('template','users_operators/add',$data);

		}

		
	}

	public function edit () {

		if ($_SERVER ["REQUEST_METHOD"]=="POST" ) {

			$this->form_validation->set_rules('nama_users_operators','Nama Operator','trim|required');
			$this->form_validation->set_rules('users_groups_id','Group','trim|required');
			

			$pilih2['id']=$this->input->post('id');

			if ($this->form_validation->run()==FALSE) {

				$query = $this->users_operators_model->edit("users_operators",$pilih2);
				foreach ($query->result_array() as $tampil) {
					$data['id']=$tampil['id'];
					$data['nama_users_operators']=$tampil['nama_users_operators'];
					$data['users_groups_id']=$tampil['users_groups_id'];
					
				}
				
				$data['users_groups_data']=$this->users_groups_model->GetUsersGroups();
				$this->template->load('template','users_operators/edit',$data);

			}
			else {

				$data=$this->input->post('nama_users_operators');
				$query=$this->users_operators_model->double($data);

				if($query->num_rows>0) {
					if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
					
				?>
					<script> window.location = "<?php echo base_url(); ?>master/users_operators"; </script>
					<?php

				} 
				else {


				$up['nama_users_operators']=$this->input->post('nama_users_operators');
				$up['users_groups_id']=$this->input->post('users_groups_id');
				$id['id']=$this->input->post('id');

				$this->users_operators_model->update("users_operators",$up,$id);
				$this->session->set_flashdata('message','Data Berhasil Diupdate');
				

				?>
				<script>window.location="<?php echo base_url();?>master/users_operators"</script>
				<?php
				}

			}

		}
		else {
			$id['id'] = $this->uri->segment(4);
			$query = $this->users_operators_model->edit("users_operators",$id);
				foreach ($query->result_array() as $tampil) {
					$data['id']=$tampil['id'];
					$data['nama_users_operators']=$tampil['nama_users_operators'];
					$data['users_groups_id']=$tampil['users_groups_id'];
					
				}
			$data['users_groups_data']=$this->users_groups_model->GetUsersGroups();
			$this->template->load('template','users_operators/edit',$data);
		
		}

		}

	

	public function delete () {
		$pilih['id']=$this->uri->segment(4);
		$this->users_operators_model->delete("users_operators",$pilih);
		$this->session->set_flashdata('message','Data Berhasil dihapus');
		redirect('master/users_operators');

	}

	public function search () {

		$this->form_validation->set_rules('keysearch', 'Cari Obat', 'trim|required');

		if ($this->form_validation->run()==FALSE) {

			$data['users_groups_data']=$this->users_groups_model->GetUsersGroups();
			$this->template->load('template','users_operators/index',$data);

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

			$data['get_data'] = $this->users_operators_model->search($kata);
			$this->template->load('template','users_operators/search',$data);
	}
}
	 
	



	

	

	
}
