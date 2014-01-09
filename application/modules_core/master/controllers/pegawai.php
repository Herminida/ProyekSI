<?php
class Pegawai extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('unit_kerja_model');
		$this->load->model('jabatan_model');
		$this->load->model('pegawai_model');
	}

	public function index () {
		$data['pegawai_data'] = $this->pegawai_model->GetPegawai();
		$this->template->load('template','pegawai/index',$data);
	}

	public function add () {

		if ($_SERVER ['REQUEST_METHOD']=="POST") {



			$this->form_validation->set_rules('nama_pegawai','Nama Pegawai','trim|required');
			$this->form_validation->set_rules('nip_pegawai','NIP Pegawai','trim|numeric');
			$this->form_validation->set_rules('fk_jabatan','Jabatan','trim|required');
			$this->form_validation->set_rules('fk_unit_kerja','Unit Kerja','trim|required');
			
		
			if ($this->form_validation->run() == FALSE) {

				

				$data['unit_kerja']=$this->unit_kerja_model->Get_Unit_Kerja();
				$data['jabatan_data']=$this->jabatan_model->GetJabatan();
				$this->template->load('template','pegawai/add',$data);
	
			}
			else {

				$datanama =  $this->input->post('nama_pegawai');
				$datanip = $this->input->post('nip_pegawai');
				

				$sama = $this->pegawai_model->double($datanama,$datanip);

				if ($sama->num_rows>0) {

					if($sama)$this->session->set_flashdata('message','Data Sudah Ada !');

						?>
							<script> window.location = "<?php echo base_url(); ?>master/pegawai"; </script>
						<?php

				}
				else {

				$in['nama_pegawai']=$this->input->post('nama_pegawai');
				$in['nip_pegawai']=$this->input->post('nip_pegawai');
				$in['fk_jabatan']=$this->input->post('fk_jabatan');
				$in['fk_unit_kerja']=$this->input->post('fk_unit_kerja');
				
				
				$this->pegawai_model->insert("pegawai",$in);
				$this->session->set_flashdata('message','Data Berhasil Disimpan');
			?>
				<script> window.location = "<?php echo base_url(); ?>master/pegawai"; </script>
			<?php
				}

				
			}


		}
		else {

		$data['unit_kerja']=$this->unit_kerja_model->Get_Unit_Kerja();
		$data['jabatan_data']=$this->jabatan_model->GetJabatan();
		$this->template->load('template','pegawai/add',$data);
	
		}

		
	}

	public function edit () {
		if($_SERVER ['REQUEST_METHOD']=="POST"){
			$this->form_validation->set_rules('nama_pegawai','Nama Pegawai','trim|required');
			$this->form_validation->set_rules('nip_pegawai','NIP Pegawai','trim|numeric');
			$this->form_validation->set_rules('fk_jabatan','Jabatan','trim|required');
			$this->form_validation->set_rules('fk_unit_kerja','Unit Kerja','trim|required');
		
			if ($this->form_validation->run() == FALSE) {
				$pilih['id_pegawai']= $this->uri->segment(4);
				$query = $this->pegawai_model->edit("pegawai",$pilih);
					foreach ($query->result_array() as $tampil) {
						$data['nama_pegawai'] = $tampil['nama_pegawai'];
						$data['nip_pegawai'] = $tampil['nip_pegawai'];
						$data['fk_jabatan'] = $tampil['fk_jabatan'];
						$data['fk_jabatan'] = $tampil['fk_jabatan'];
						$data['id_pegawai'] = $tampil['id_pegawai'];
			}

			$data['unit_kerja']=$this->unit_kerja_model->Get_Unit_Kerja();
			$data['jabatan_data']=$this->jabatan_model->GetJabatan();
			$this->template->load('template','pegawai/edit',$data);
			}
			else {

				$datanama =  $this->input->post('nama_pegawai');
				$datanip = $this->input->post('nip_pegawai');
				

				$sama = $this->pegawai_model->double($datanama,$datanip);
				if ($sama->num_rows>0) {
					if ($sama)$this->session->set_flashdata('message','Data Sudah Ada !');
					
					else 

						$up['fk_jabatan']=$this->input->post('fk_jabatan');
						$up['fk_unit_kerja']=$this->input->post('fk_unit_kerja');
						$id['id_pegawai']=$this->input->post('id_pegawai');

						$this->pegawai_model->updatedata("pegawai",$up,$id);
						$this->session->set_flashdata('message','Data Berhasil Di Update ');
					

					?>
						<script>window.location="<?php echo base_url();?>master/pegawai"</script>
					<?php 

				}
				else {

					$up['nama_pegawai']=$this->input->post('nama_pegawai');
					$up['nip_pegawai']=$this->input->post('nip_pegawai');
					$up['fk_jabatan']=$this->input->post('fk_jabatan');
					$up['fk_unit_kerja']=$this->input->post('fk_unit_kerja');
					$id['id_pegawai']=$this->input->post('id_pegawai');
					$this->pegawai_model->update("pegawai",$up,$id);

					$this->session->set_flashdata('message','Data Berhasil Diupdate');
					?>
						<script> window.location = "<?php echo base_url(); ?>master/pegawai"; </script>
					<?php

				}

				
			}
		}
		else {
		$pilih['id_pegawai']= $this->uri->segment(4);
		$query = $this->pegawai_model->edit("pegawai",$pilih);
		foreach ($query->result_array() as $tampil) {
			$data['nama_pegawai'] = $tampil['nama_pegawai'];
			$data['nip_pegawai'] = $tampil['nip_pegawai'];
			$data['fk_jabatan'] = $tampil['fk_jabatan'];
			$data['fk_unit_kerja'] = $tampil['fk_unit_kerja'];
			$data['id_pegawai'] = $tampil['id_pegawai'];
		}

		$data['unit_kerja']=$this->unit_kerja_model->Get_Unit_Kerja();
		$data['jabatan_data']=$this->jabatan_model->GetJabatan();
		$this->template->load('template','pegawai/edit',$data);
		}
		

	}

	public function delete () {

		$id['id_pegawai'] = $this->uri->segment(4);
		$this->pegawai_model->delete("pegawai",$id);

		$this->session->set_flashdata('message','Data Berhasil Dihapus');
			?>
				<script> window.location = "<?php echo base_url(); ?>master/pegawai"; </script>
			<?php
	}

	public function search() {

		$this->form_validation->set_rules('keysearch', 'Cari', 'trim|required');

		if ($this->form_validation->run()==FALSE) {

			$data['pegawai_data'] = $this->pegawai_model->GetPegawai();
			$this->template->load('template','pegawai/index',$data);

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

			$data['get_data'] = $this->pegawai_model->search($kata);
			$this->template->load('template','pegawai/search',$data);

		}
	}
}