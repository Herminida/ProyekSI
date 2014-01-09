<?php
class ruang_kamar extends Ci_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('kelas_kamar_model');
        $this->load->model('ruang_kamar_model');
	}

	public function index(){
		$data['data_ruang_kamar']=$this->ruang_kamar_model->getData();
		$this->template->load('template',"ruang_kamar/index",$data);
	}

	function add(){
		if ($_SERVER ['REQUEST_METHOD']=="POST") {
			$this->form_validation->set_rules('ruang_kamar', 'Ruang Kamar', 'trim|required');
			$this->form_validation->set_rules('kelas_kamar', 'Kelas Kamar', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
			$data['data_kelas_kamar']=$this->kelas_kamar_model->getData();
            $this->template->load('template','ruang_kamar/add',$data);
			}
			else {
				$data = $this->input->post('ruang_kamar');
				$data2 = $this->input->post('kelas_kamar');
				$query = $this->ruang_kamar_model->double($data,$data2);

				if ($query->num_rows>0) {
					$this->session->set_flashdata('message','Data Sudah Ada !');
					?>
						<script> window.location = "<?php echo base_url(); ?>master/ruang_kamar/add"; </script>
						<?php
				}
				else {
				$in =array('nama_ruang_kamar'=>$this->input->post('ruang_kamar'),
						   'kelas_kamar_id'=>$this->input->post('kelas_kamar')
						   );
				$this->ruang_kamar_model->insert($in);
				$this->session->set_flashdata('message','Data Berhasil Disimpan!');
				?>
						<script> window.location = "<?php echo base_url(); ?>master/ruang_kamar"; </script>
						<?php
				}
			}
		}
		else{
			$data['data_kelas_kamar']=$this->kelas_kamar_model->getData();
            $this->template->load('template','ruang_kamar/add',$data);
   		}
	}

	function edit(){
			if ($_SERVER ['REQUEST_METHOD']=="POST") {
				$this->form_validation->set_rules('ruang_kamar', 'Ruang Kamar', 'trim|required');
				$this->form_validation->set_rules('kelas_kamar', 'Kelas Kamar', 'trim|required');
				$id2= $this->input->post('id_ruang_kamar');
				if ($this->form_validation->run()==FALSE) {
					$bc['data_kelas_kamar']=$this->kelas_kamar_model->getData();
					$dt_kamar = $this->ruang_kamar_model->search($id2);
						foreach($dt_kamar->result_array() as $db)
							{
							$bc['id'] = $db['id_ruang_kamar'];
							$bc['id_kelas_kamar'] = $db['id_kelas_kamar'];
							$bc['nama_ruang_kamar'] = $db['nama_ruang_kamar'];
							}
					$this->template->load('template','ruang_kamar/edit',$bc);
				}
				else {
					$data = $this->input->post('ruang_kamar');
					$data2 = $this->input->post('kelas_kamar');
					$query = $this->ruang_kamar_model->double($data,$data2);;
					if ($query->num_rows >0) {
						if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/ruang_kamar/edit/<?php echo $id2;?>"; </script>
						<?php
					}
					else {
						$in =array('nama_ruang_kamar'=>$this->input->post('ruang_kamar'),
						   'kelas_kamar_id'=>$this->input->post('kelas_kamar')
						);
						$this->ruang_kamar_model->update($in,$id2);
						$this->session->set_flashdata('message','Data Berhasil Diupdate');
						?>
						<script> window.location = "<?php echo base_url(); ?>master/ruang_kamar"; </script>
						<?php
					}
				}
			}
			else {
				$bc['data_kelas_kamar']=$this->kelas_kamar_model->getData();
				$pilih = $this->uri->segment(4);
				$dt_kamar = $this->ruang_kamar_model->search($pilih);
					foreach($dt_kamar->result_array() as $db)
						{
						$bc['id'] = $db['id_ruang_kamar'];
						$bc['id_kelas_kamar'] = $db['id_kelas_kamar'];
						$bc['nama_ruang_kamar'] = $db['nama_ruang_kamar'];
						}
				$this->template->load('template','ruang_kamar/edit',$bc);
			}
	}
		
	
	function delete(){
		$id = $this->uri->segment(4);
		$this->ruang_kamar_model->delete($id);
		$this->session->set_flashdata('message','Data Berhasil Dihapus');
		?>
		<script> window.location = "<?php echo base_url(); ?>master/ruang_kamar"; </script>
		<?php
	}	

}
?>