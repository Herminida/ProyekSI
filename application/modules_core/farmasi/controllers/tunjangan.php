<?php
class tunjangan extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('tunjangan_model');
	}

	public function index () {

		$data['tunjangan'] = $this->tunjangan_model->Ambil_Data_Tunjangan();
		$this->template->load('template','tunjangan/index',$data);
	}

	public function add() {

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$sama = $this->input->post('nama_tunjangan');
					$query = $this->tunjangan_model->double($sama);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {

					
			$data['nama_tunjangan'] = $this->input->post('nama_tunjangan');
			$this->tunjangan_model->insert("tunjangan",$data);

			$this->session->set_flashdata('message','Data Berhasil Ditambahkan !');
				?>
			<script>
					window.parent.location.reload(true);
			</script>
			<?php
			}
	

			}
			else {

				$this->load->view('tunjangan/add');
			}

		
	}

	public function delete() {

		$id['id'] = $this->uri->segment(4);
		$this->tunjangan_model->deleteData("tunjangan",$id);
		$this->session->set_flashdata('message','Data Berhasil Dihapus !');
	
		?>
			<script> window.location = "<?php echo base_url(); ?>hrd/tunjangan"; </script>
		<?php
	}

	public function edit() {

		if ($_SERVER['REQUEST_METHOD']=='POST') {

				

					$sama = $this->input->post('nama_tunjangan');
					$query = $this->tunjangan_model->double($sama);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {
						$data['nama_tunjangan'] = $this->input->post('nama_tunjangan');
						$id['id'] = $this->input->post('id');

						$this->tunjangan_model->update("tunjangan",$data,$id);
						$this->session->set_flashdata('message','Data Berhasil Di Update !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
				

			}
			else {
				
				$id['id'] = $this->uri->segment(4);
				$query= $this->tunjangan_model->edit("tunjangan",$id);
				foreach ($query->result_array() as $tampil) {
				$data['id'] = $tampil['id'];
				$data['nama_tunjangan'] = $tampil['nama_tunjangan'];

				}

				$this->load->view('tunjangan/edit',$data);
			}
	}
}