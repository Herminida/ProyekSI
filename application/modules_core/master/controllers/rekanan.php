<?php
	class rekanan extends Ci_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('rekanan_model');
	}

	public function index(){
		$data['data_rekanan']=$this->rekanan_model->getData();
		$this->template->load('template',"rekanan/index",$data);
	}

	function add(){
		if ($_SERVER ['REQUEST_METHOD']=="POST") {
			$this->form_validation->set_rules('rekanan', 'Rekanan', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
            	$this->template->load('template','rekanan/add');
			}
			else {
				$data = $this->input->post('rekanan');
				$query = $this->rekanan_model->double($data);

				if ($query->num_rows>0) {
					$this->session->set_flashdata('message','Data Sudah Ada !');
					?>
						<script> window.location = "<?php echo base_url(); ?>master/rekanan/add"; </script>
						<?php
				}
				else {
				$in['nama_rekanan'] = $this->input->post('rekanan');
				$this->rekanan_model->insert($in);
				$this->session->set_flashdata('message','Data Berhasil Disimpan!');
				?>
						<script> window.location = "<?php echo base_url(); ?>master/rekanan"; </script>
						<?php
				}
			}
		}
		else{
            $this->template->load('template','rekanan/add');
   		}
	}

	function edit(){
			if ($_SERVER ['REQUEST_METHOD']=="POST") {
				$this->form_validation->set_rules('rekanan','Rekanan' , 'trim|required');
				$id2= $this->input->post('id_rekanan');
				if ($this->form_validation->run()==FALSE) {
					$dt_kamar = $this->rekanan_model->search($id2);
					foreach($dt_kamar->result_array() as $db)
					{
						$bc['id'] = $db['id_rekanan'];
						$bc['nama_kamar'] = $db['nama_rekanan'];
					}
					$this->template->load('template','rekanan/edit',$bc);
				}
				else {
					$data = $this->input->post('rekanan');
					$query = $this->rekanan_model->double($data);;
					if ($query->num_rows >0) {
						if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/rekanan/edit/<?php echo $id2;?>"; </script>
						<?php
					}
					else {
						$up['nama_rekanan'] = $this->input->post('rekanan');
						$this->rekanan_model->update($up,$id2);
						$this->session->set_flashdata('message','Data Berhasil Diupdate');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/rekanan"; </script>
						<?php
					}
				}
			}
			else {

				$pilih = $this->uri->segment(4);
				$dt_kamar = $this->rekanan_model->search($pilih);
					foreach($dt_kamar->result_array() as $db)
				{
					$bc['id'] = $db['id_rekanan'];
					$bc['nama_kamar'] = $db['nama_rekanan'];
				}
				$this->template->load('template','rekanan/edit',$bc);
			}

		
	}

	function delete(){
		$id = $this->uri->segment(4);
		$this->rekanan_model->delete($id);
		$this->session->set_flashdata('message','Data Berhasil Dihapus');
		?>
		<script> window.location = "<?php echo base_url(); ?>master/rekanan"; </script>
		<?php
	}
	}
?>