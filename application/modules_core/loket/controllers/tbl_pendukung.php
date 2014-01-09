<?php
class tbl_pendukung extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('tbl_pendukung_model');
	}

	public function index () {

		$data['tbl_pendukung'] = $this->tbl_pendukung_model->Ambil_Data_Pendukung();
		$this->template->load('template','tbl_pendukung/index',$data);
	}

	public function add() {

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$sama = $this->input->post('nama_pendukung');
					$query = $this->tbl_pendukung_model->double($sama);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {

					
			$data['nama_pendukung'] = $this->input->post('nama_pendukung');
			$this->tbl_pendukung_model->insert("tbl_pendukung",$data);

			$this->session->set_flashdata('message','Data Berhasil Ditambahkan !');
				?>
			<script>
					window.parent.location.reload(true);
			</script>
			<?php
			}
	

			}
			else {

				$this->load->view('tbl_pendukung/add');
			}

		
	}

	public function delete() {

		$id['id_pendukung'] = $this->uri->segment(4);
		$this->tbl_pendukung_model->deleteData("tbl_pendukung",$id);
		$this->session->set_flashdata('message','Data Berhasil Dihapus !');
	
		?>
			<script> window.location = "<?php echo base_url(); ?>loket/tbl_pendukung"; </script>
		<?php
	}

	public function edit() {

		if ($_SERVER['REQUEST_METHOD']=='POST') {

				

					$sama = $this->input->post('nama_pendukung');
					$query = $this->tbl_pendukung_model->double($sama);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {
						$data['nama_pendukung'] = $this->input->post('nama_pendukung');
						$id['id_pendukung'] = $this->input->post('id_pendukung');

						$this->tbl_pendukung_model->update("tbl_pendukung",$data,$id);
						$this->session->set_flashdata('message','Data Berhasil Di Update !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
				

			}
			else {
				
				$id['id_pendukung'] = $this->uri->segment(4);
				$query= $this->tbl_pendukung_model->edit("tbl_pendukung",$id);
				foreach ($query->result_array() as $tampil) {
				$data['id_pendukung'] = $tampil['id_pendukung'];
				$data['nama_pendukung'] = $tampil['nama_pendukung'];

				}

				$this->load->view('tbl_pendukung/edit',$data);
			}
	}
}