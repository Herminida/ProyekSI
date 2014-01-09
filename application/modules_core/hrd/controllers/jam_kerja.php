<?php
class jam_kerja Extends Ci_Controller{
	public function __construct () {
		parent::__construct();
		$this->load->model('jam_kerja_model');
	}

	public function index(){
		$data['jam_kerja'] = $this->jam_kerja_model->GetData();
		$this->template->load('template','jam_kerja/index',$data);
	}

	public function add(){
		if ($_SERVER ['REQUEST_METHOD']=="POST") {
			$data=array('jam_masuk'=>$this->input->post('jam_masuk'),
						'jam_keluar'=>$this->input->post('jam_keluar'),
						'jam_keluar_istirahat'=>$this->input->post('jam_keluar_istirahat'),
						'jam_masuk_istirahat'=>$this->input->post('jam_masuk_istirahat'),
						'shift_id'=>$this->input->post('nama_shift'),
				);
			$this->jam_kerja_model->insert($data);
			$this->session->set_flashdata('message','Data Berhasil Ditambahkan !');
				?>
			<script>
					window.parent.location.reload(true);
			</script>
			<?php
			}
			else {
				$data['shift']=$this->jam_kerja_model->getShift();
				$this->load->view('jam_kerja/add',$data);
			}
	}

	public function edit(){
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			$id_jam_kerja=$this->input->post('id_jam_kerja');
			$data=array('jam_masuk'=>$this->input->post('jam_masuk'),
						'jam_keluar'=>$this->input->post('jam_keluar'),
						'jam_keluar_istirahat'=>$this->input->post('jam_keluar_istirahat'),
						'jam_masuk_istirahat'=>$this->input->post('jam_masuk_istirahat'),
						'shift_id'=>$this->input->post('nama_shift'),
				);
			$this->jam_kerja_model->update($data,$id_jam_kerja);
			$this->session->set_flashdata('message','Data Berhasil Diubah !');
				?>
			<script>
					window.parent.location.reload(true);
			</script>
			<?php
			}
			else {
				$id_jam_kerja = $this->uri->segment(4);
				$data['shift']=$this->jam_kerja_model->getShift();
				$data['data_jam_kerja']= $this->jam_kerja_model->search($id_jam_kerja);
				$this->load->view('jam_kerja/edit',$data);
			}
	}
	public function delete() {
		$id_jam_kerja = $this->uri->segment(4);
		$this->jam_kerja_model->deleteData($id_jam_kerja);
		$this->session->set_flashdata('message','Data Berhasil Dihapus !');
		?>
			<script> window.location = "<?php echo base_url(); ?>hrd/jam_kerja"; </script>
		<?php
	}
}
?>