<?php
class shift Extends Ci_Controller{
	public function __construct () {
		parent::__construct();
		$this->load->model('shift_model');
	}

	public function index(){
		$data['shift'] = $this->shift_model->GetData();
		$this->template->load('template','shift/index',$data);
	}

	public function add(){
		if ($_SERVER ['REQUEST_METHOD']=="POST") {
			$sama = $this->input->post('nama_shift');
					$query = $this->shift_model->double($sama);
					if ($query->num_rows>0) {
						$this->session->set_flashdata('message','Data Sudah Ada !');		
						?>
							<script>window.parent.location.reload(true);</script>
						<?php
					}
					else {
			$data['nama_shift'] = $this->input->post('nama_shift');
			$this->shift_model->insert($data);
			$this->session->set_flashdata('message','Data Berhasil Ditambahkan !');
				?>
			<script>
					window.parent.location.reload(true);
			</script>
			<?php
			}
			}
			else {

				$this->load->view('shift/add');
			}
	}

	public function edit(){
		if ($_SERVER['REQUEST_METHOD']=='POST') {
					$sama = $this->input->post('nama_shift');
					$id_shift=$this->input->post('id_shift');
					$query = $this->shift_model->double($sama);
					if ($query->num_rows>0) {
						$this->session->set_flashdata('message','Data Sudah Ada !');
						?>
							<script>window.parent.location.reload(true);</script>
						<?php
					}
					else {
						$data['nama_shift'] = $this->input->post('nama_shift');
						$id_shift = $this->input->post('id_shift');
						$this->shift_model->update($data,$id_shift);
						$this->session->set_flashdata('message','Data Berhasil Di Update !');
						?>
							<script>window.parent.location.reload(true);</script>
						<?php
					}
			}
			else {
				$id_shift = $this->uri->segment(4);
				$query= $this->shift_model->search($id_shift);
				foreach ($query->result_array() as $tampil) {
				$data['id_shift'] = $tampil['id_shift'];
				$data['nama_shift'] = $tampil['nama_shift'];
				}
				$this->load->view('shift/edit',$data);
			}
	}
	public function delete() {
		$id_shift = $this->uri->segment(4);
		$this->shift_model->deleteData($id_shift);
		$this->session->set_flashdata('message','Data Berhasil Dihapus !');
		?>
			<script> window.location = "<?php echo base_url(); ?>hrd/shift"; </script>
		<?php
	}
}
?>