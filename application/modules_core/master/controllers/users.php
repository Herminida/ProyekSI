<?php
class Users extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('unit_kerja_model');
		$this->load->model('users_groups_model');
		$this->load->model('users_role_model');
		$this->load->model('users_model');
		$this->load->model('users_operators_model');
	}

	public function index () {
		$data['users_data'] = $this->users_model->GetUsers();
		$this->template->load('template','users/index',$data);
	}

	public function add () {

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');
			$this->form_validation->set_rules('users_groups_id','Group','trim|required');
			$this->form_validation->set_rules('users_operators_id','Operator','trim|required');
			$this->form_validation->set_rules('telp','Telpon','trim|numeric');
			$this->form_validation->set_rules('email','Email','trim|valid_email');
		
			if ($this->form_validation->run() == FALSE) {

				

				$data['users_groups_data']=$this->users_groups_model->GetUsersGroups();
				$this->template->load('template','users/add',$data);
	
			}
			else {

				
				$in['nama']=$this->input->post('nama');
				$in['pegawai_id']=$this->input->post('pegawai_id');
				$in['username']=$this->input->post('username');
				$in['password']=$this->input->post('password');
				$in['telp']=$this->input->post('telp');
				$in['email']=$this->input->post('email');
				$in['users_groups_id']=$this->input->post('users_groups_id');
				$in['users_operators_id']=$this->input->post('users_operators_id');
				
				$this->users_model->insert($in);
				$this->session->set_flashdata('message','Data Berhasil Disimpan');
			?>
				<script> window.location = "<?php echo base_url(); ?>master/users"; </script>
			<?php
				

				
			}


		}
		else {

		$data['users_groups_data']=$this->users_groups_model->GetUsersGroups();
		$this->template->load('template','users/add',$data);
	
		}

		
	}

	public function edit () {
		if($_SERVER ['REQUEST_METHOD']=="POST"){
			//$this->form_validation->set_rules('nama','Nama','trim|required');
			//$this->form_validation->set_rules('username','Username','trim|required|min_length[4]');
			$this->form_validation->set_rules('users_groups_id','Group','trim|required');
			$this->form_validation->set_rules('users_operators_id','Operator','trim|required');
			$this->form_validation->set_rules('telp','Telpon','trim|numeric');
			$this->form_validation->set_rules('email','Email','trim|valid_email');
		
			if ($this->form_validation->run() == FALSE) {
				$pilih['id']= $this->uri->segment(4);
				$query = $this->users_model->edit("tbl_users",$pilih);
					foreach ($query->result_array() as $tampil) {
						$data['nama'] = $tampil['nama'];
						$data['username'] = $tampil['username'];
						$data['password'] = $tampil['password'];
						$data['pegawai_id'] = $tampil['pegawai_id'];
						$data['users_groups_id'] = $tampil['users_groups_id'];
						$data['users_operators_id'] = $tampil['users_operators_id'];
						$data['telp'] = $tampil['telp'];
						$data['email'] = $tampil['email'];
						$data['id'] = $tampil['id'];
					}

				$data['users_groups_data']=$this->users_groups_model->GetUsersGroups();
				$data['users_operators_data']=$this->users_operators_model->Get_UsersOperators();

		$this->template->load('template','users/edit',$data);
		}
			else {

				$pass=$this->input->post('password');
				if($pass!="")
				{

				$up['pegawai_id']=$this->input->post('pegawai_id');
				$up['nama']=$this->input->post('nama');
				$up['username']=$this->input->post('username');
				$up['users_groups_id']=$this->input->post('users_groups_id');
				$up['users_operators_id']=$this->input->post('users_operators_id');
				$up['telp']=$this->input->post('telp');
				$up['email']=$this->input->post('email');
				$id['id'] = $this->input->post('id');
				$pass=$this->input->post('password');

				$this->users_model->update("tbl_users",$up,$id);
				$this->users_model->update_password($pass,$id['id']);

					$this->session->set_flashdata('message','Data Berhasil Diupdate');
			?>
				<script> window.location = "<?php echo base_url(); ?>master/users"; </script>
			<?php


				}
				else {

				$up['pegawai_id']=$this->input->post('pegawai_id');
				$up['nama']=$this->input->post('nama');
				$up['username']=$this->input->post('username');
				$up['users_groups_id']=$this->input->post('users_groups_id');
				$up['users_operators_id']=$this->input->post('users_operators_id');
				$up['telp']=$this->input->post('telp');
				$up['email']=$this->input->post('email');
				$id['id'] = $this->input->post('id');
				$this->users_model->update("tbl_users",$up,$id);

				$this->session->set_flashdata('message','Data Berhasil Diupdate');
			?>
				<script> window.location = "<?php echo base_url(); ?>master/users"; </script>
			<?php

				}

				

			}

		}
		else {
		$pilih['id']= $this->uri->segment(4);
		$query = $this->users_model->edit("tbl_users",$pilih);
		foreach ($query->result_array() as $tampil) {
			$data['nama'] = $tampil['nama'];
			$data['username'] = $tampil['username'];
			$data['password'] = $tampil['password'];
			$data['pegawai_id'] = $tampil['pegawai_id'];
			$data['users_groups_id'] = $tampil['users_groups_id'];
			$data['users_operators_id'] = $tampil['users_operators_id'];
			$data['telp'] = $tampil['telp'];
			$data['email'] = $tampil['email'];
			$data['id'] = $tampil['id'];
		}

		$data['users_groups_data']=$this->users_groups_model->GetUsersGroups();
		$data['users_operators_data']=$this->users_operators_model->Get_UsersOperators();

		$this->template->load('template','users/edit',$data);
		}
		

	}

	public function delete () {

		$id['id'] = $this->uri->segment(4);
		$this->users_model->delete("users",$id);

		$this->session->set_flashdata('message','Data Berhasil Dihapus');
			?>
				<script> window.location = "<?php echo base_url(); ?>master/users"; </script>
			<?php
	}

	public function search() {

		$this->form_validation->set_rules('keysearch', 'Cari', 'trim|required');

		if ($this->form_validation->run()==FALSE) {

			$data['users_data'] = $this->users_model->GetUsers();
			$this->template->load('template','users/index',$data);

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

			$data['get_data'] = $this->users_model->search($kata);
			$this->template->load('template','users/search',$data);

		}
	}

	public function getall() {


		
       $datanip = $this->input->post('nip_pegawai');
       $datanama = $this->input->post('nama_pegawai');
       
        $tampil=$this->users_model->searchpegawai($datanip,$datanama);
               echo "<table>";
                 echo "<thead><tr>";
                    echo "<th>Aksi</th>";
                    echo "<th>NIP</th>";
                    echo "<th>Nama</th>";
                    echo "<th>Jabatan</th>";
                    echo "<th>Unit Kerja</th>";
                    
            echo "</tr></thead>";
       foreach ($tampil->result_array() as $mp){
        
           $id_pegawai= $mp['id_pegawai'];
           $nip_pegawai = $mp['nip_pegawai'];
           $nama_pegawai = $mp['nama_pegawai'];
           $nama_jabatan = $mp['nama_jabatan'];
           $nama_unit_kerja = $mp['nama_unit_kerja'];
           
            echo "<tr>";
                echo "<td><a href='#' class='daftar'
                                      id_pegawai='$id_pegawai'
                                      nip_pegawai='$nip_pegawai' 
                                      nama_pegawai='$nama_pegawai' 
                                      nama_jabatan='$nama_jabatan' 
                                      nama_unit_kerja='$nama_unit_kerja' 
                                      
                           >Pilih</a></td>";
                echo "<td>".$mp['nip_pegawai']."</td>";
                echo "<td>".$mp['nama_pegawai']."</td>";
                echo "<td>".$mp['nama_jabatan']."</td>";
                echo "<td>".$mp['nama_unit_kerja']."</td>";
            echo "</tr>";
         
    }
     echo"</table>";
     
        
        
    }

    public function Get_Operators () {

        $users_groups_id = $this->input->post('users_groups_id');
        $operators = $this->users_operators_model->Get_Users_Operators($users_groups_id);
        $data .= "<option value=''>-Pilih Operator-</option>";
        foreach ($operators->result_array() as $mp){
        $data .= "<option value='$mp[id]'> $mp[nama_users_operators]</option>\n";   
    } 
    echo $data;

    }
}