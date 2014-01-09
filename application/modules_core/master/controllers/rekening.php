<?php
	class rekening extends Ci_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('rekening_model');
	}

	public function index(){
		$data['data_rekening']=$this->rekening_model->getData();
		$this->template->load('template',"rekening/index",$data);
	}

	function add(){
		if ($_SERVER ['REQUEST_METHOD']=="POST") {
			$this->form_validation->set_rules('rekening', 'rekening', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
            	$this->template->load('template','rekening/add');
			}
			else {
				$data = $this->input->post('rekening');
				$query = $this->rekening_model->double($data);

				if ($query->num_rows>0) {
					$this->session->set_flashdata('message','Data Sudah Ada !');
					?>
						<script> window.location = "<?php echo base_url(); ?>master/rekening/add"; </script>
						<?php
				}
				else {
				$in['nama_rekening'] = $this->input->post('rekening');
				$this->rekening_model->insert($in);
				$this->session->set_flashdata('message','Data Berhasil Disimpan!');
				?>
						<script> window.location = "<?php echo base_url(); ?>master/rekening"; </script>
						<?php
				}
			}
		}
		else{
            $this->template->load('template','rekening/add');
   		}
	}

	function edit(){
			if ($_SERVER ['REQUEST_METHOD']=="POST") {
				$this->form_validation->set_rules('rekening','rekening' , 'trim|required');
				$id2= $this->input->post('id_rekening');
				if ($this->form_validation->run()==FALSE) {
					$dt_kamar = $this->rekening_model->search($id2);
					foreach($dt_kamar->result_array() as $db)
					{
						$bc['id'] = $db['id_rekening'];
						$bc['nama_kamar'] = $db['nama_rekening'];
					}
					$this->template->load('template','rekening/edit',$bc);
				}
				else {
					$data = $this->input->post('rekening');
					$query = $this->rekening_model->double($data);;
					if ($query->num_rows >0) {
						if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/rekening/edit/<?php echo $id2;?>"; </script>
						<?php
					}
					else {
						$up['nama_rekening'] = $this->input->post('rekening');
						$this->rekening_model->update($up,$id2);
						$this->session->set_flashdata('message','Data Berhasil Diupdate');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/rekening"; </script>
						<?php
					}
				}
			}
			else {

				$pilih = $this->uri->segment(4);
				$dt_kamar = $this->rekening_model->search($pilih);
					foreach($dt_kamar->result_array() as $db)
				{
					$bc['id'] = $db['id_rekening'];
					$bc['nama_kamar'] = $db['nama_rekening'];
				}
				$this->template->load('template','rekening/edit',$bc);
			}

		
	}

	function delete(){
		$id = $this->uri->segment(4);
		$this->rekening_model->delete($id);
		$this->session->set_flashdata('message','Data Berhasil Dihapus');
		?>
		<script> window.location = "<?php echo base_url(); ?>master/rekening"; </script>
		<?php
	}
	}
?>