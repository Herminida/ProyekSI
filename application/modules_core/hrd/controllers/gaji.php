<?php
class gaji extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('gaji_model');
	}

	public function index () {

		$data['gaji'] = $this->gaji_model->ambilData();
		$this->template->load('template','gaji/index',$data);
	}

	public function add() {

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$sama = $this->input->post('nama_gaji');
					$query = $this->gaji_model->double($sama);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {

					
			$data['nama_gaji'] = $this->input->post('nama_gaji');
			$this->gaji_model->insert("gaji",$data);

			$this->session->set_flashdata('message','Data Berhasil Ditambahkan !');
				?>
			<script>
					window.parent.location.reload(true);
			</script>
			<?php
			}
	

			}
			else {

				$this->load->view('gaji/add');
			}

		
	}

	public function delete() {

		$id['id_gaji'] = $this->uri->segment(4);
		$this->gaji_model->deleteData("gaji",$id);
		$this->session->set_flashdata('message','Data Berhasil Dihapus !');
	
		?>
			<script> window.location = "<?php echo base_url(); ?>hrd/gaji"; </script>
		<?php
	}

	public function edit() {

		if ($_SERVER['REQUEST_METHOD']=='POST') {

				

					$sama = $this->input->post('nama_gaji');
					$query = $this->gaji_model->double($sama);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {
						$data['nama_gaji'] = $this->input->post('nama_gaji');
						$id['id_gaji'] = $this->input->post('id');

						$this->gaji_model->update("gaji",$data,$id);
						$this->session->set_flashdata('message','Data Berhasil Di Update !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
				

			}
			else {
				
				$id['id_gaji'] = $this->uri->segment(4);
				$query= $this->gaji_model->edit("gaji",$id);
				foreach ($query->result_array() as $tampil) {
				$data['id_gaji'] = $tampil['id_gaji'];
				$data['nama_gaji'] = $tampil['nama_gaji'];

				}

				$this->load->view('gaji/edit',$data);
			}
	}
}