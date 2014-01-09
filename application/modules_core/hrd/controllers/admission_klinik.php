<?php
class admission_klinik extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('admission_klinik_model');
	}

	public function index () {

		$data['admission_klinik'] = $this->admission_klinik_model->Ambil_Data_Admission();
		$this->template->load('template','admission_klinik/index',$data);
	}

	public function add() {

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$sama = $this->input->post('nama_klinik');
					$query = $this->admission_klinik_model->double($sama);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {

					
			$data['nama_klinik'] = $this->input->post('nama_klinik');
			$this->admission_klinik_model->insert("admission_klinik",$data);

			$this->session->set_flashdata('message','Data Berhasil Ditambahkan !');
				?>
			<script>
					window.parent.location.reload(true);
			</script>
			<?php
			}
	

			}
			else {

				$this->load->view('admission_klinik/add');
			}

		
	}

	public function delete() {

		$id['id'] = $this->uri->segment(4);
		$this->admission_klinik_model->deleteData("admission_klinik",$id);
		$this->session->set_flashdata('message','Data Berhasil Dihapus !');
	
		?>
			<script> window.location = "<?php echo base_url(); ?>hrd/admission_klinik"; </script>
		<?php
	}

	public function edit() {

		if ($_SERVER['REQUEST_METHOD']=='POST') {

				

					$sama = $this->input->post('nama_klinik');
					$query = $this->admission_klinik_model->double($sama);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {
						$data['nama_klinik'] = $this->input->post('nama_klinik');
						$id['id'] = $this->input->post('id');

						$this->admission_klinik_model->update("admission_klinik",$data,$id);
						$this->session->set_flashdata('message','Data Berhasil Di Update !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
				

			}
			else {
				
				$id['id'] = $this->uri->segment(4);
				$query= $this->admission_klinik_model->edit("admission_klinik",$id);
				foreach ($query->result_array() as $tampil) {
				$data['id'] = $tampil['id'];
				$data['nama_klinik'] = $tampil['nama_klinik'];

				}

				$this->load->view('admission_klinik/edit',$data);
			}
	}
}