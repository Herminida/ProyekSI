<?php
class kelas_kamar extends Ci_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('kelas_kamar_model');
	}

	public function index(){
		$data['data_kelas_kamar']=$this->kelas_kamar_model->getData();
		$this->template->load('template',"kelas_kamar/index",$data);
	}

	function add(){
		if ($_SERVER ['REQUEST_METHOD']=="POST") {
			$this->form_validation->set_rules('kelas_kamar', 'Kelas Kamar', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
            	$this->template->load('template','kelas_kamar/add');
			}
			else {
				$data = $this->input->post('kelas_kamar');
				$query = $this->kelas_kamar_model->double($data);

				if ($query->num_rows>0) {
					$this->session->set_flashdata('message','Data Sudah Ada !');
					?>
						<script> window.location = "<?php echo base_url(); ?>master/kelas_kamar/add"; </script>
						<?php
				}
				else {
				$in['nama_kelas_kamar'] = $this->input->post('kelas_kamar');
				$this->kelas_kamar_model->insert($in);
				$this->session->set_flashdata('message','Data Berhasil Disimpan!');
				?>
						<script> window.location = "<?php echo base_url(); ?>master/kelas_kamar"; </script>
						<?php
				}
			}
		}
		else{
            $this->template->load('template','kelas_kamar/add');
   		}
	}

	function edit(){
			if ($_SERVER ['REQUEST_METHOD']=="POST") {
				$this->form_validation->set_rules('kelas_kamar','Kelas Kamar' , 'trim|required');
				$id2= $this->input->post('id_kelas_kamar');
				if ($this->form_validation->run()==FALSE) {
					$dt_kamar = $this->kelas_kamar_model->search($id2);
					foreach($dt_kamar->result_array() as $db)
					{
						$bc['id'] = $db['id_kelas_kamar'];
						$bc['nama_kamar'] = $db['nama_kelas_kamar'];
					}
					$this->template->load('template','kelas_kamar/edit',$bc);
				}
				else {
					$data = $this->input->post('kelas_kamar');
					$query = $this->kelas_kamar_model->double($data);;
					if ($query->num_rows >0) {
						if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/kelas_kamar/edit/<?php echo $id2;?>"; </script>
						<?php
					}
					else {
						$up['nama_kelas_kamar'] = $this->input->post('kelas_kamar');
						$this->kelas_kamar_model->update($up,$id2);
						$this->session->set_flashdata('message','Data Berhasil Diupdate');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/kelas_kamar"; </script>
						<?php
					}
				}
			}
			else {

				$pilih = $this->uri->segment(4);
				$dt_kamar = $this->kelas_kamar_model->search($pilih);
					foreach($dt_kamar->result_array() as $db)
				{
					$bc['id'] = $db['id_kelas_kamar'];
					$bc['nama_kamar'] = $db['nama_kelas_kamar'];
				}
				$this->template->load('template','kelas_kamar/edit',$bc);
			}

		
	}

	function delete(){
		$id = $this->uri->segment(4);
		$this->kelas_kamar_model->delete($id);
		$this->session->set_flashdata('message','Data Berhasil Dihapus');
		?>
		<script> window.location = "<?php echo base_url(); ?>master/kelas_kamar"; </script>
		<?php
	}
}
?>