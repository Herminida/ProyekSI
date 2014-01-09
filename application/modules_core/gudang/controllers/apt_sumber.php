<?php

class apt_sumber extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('apt_sumber_model');
	}

	function index () {
		
			$page=$this->uri->segment(4);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("apt_sumber");
			$config['base_url'] = base_url() . 'farmasi/apt_sumber/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->query("Select * from apt_sumber order by id_sumber desc LIMIT ".$offset.",".$limit." ");
			
			$this->template->load('template','apt_sumber/index',$d);
		
			
	}

	function add () {
		
		if ($_SERVER ['REQUEST_METHOD']=="POST"){
			$this->form_validation->set_rules('nama_sumber', 'Nama', 'trim|required');

			if ($this->form_validation->run() == FALSE)
			{
					$this->template->load('template','apt_sumber/add');
			}
			else{
				$nama=$this->input->post('nama_sumber');
				$cek=$this->apt_sumber_model->double($nama);
					if ($cek->num_rows()>0){
						$this->session->set_flashdata('message','Data Sudah Ada');
						?>
						<script>
						
						window.location = "<?php echo base_url(); ?>farmasi/apt_sumber"; 
						</script>
						<?php
					}
					else{
						$this->apt_sumber_model->insert($nama);
						$this->session->set_flashdata('message','Data berhasil disimpan');
						?>
						<script> 
						
						window.location = "<?php echo base_url(); ?>farmasi/apt_sumber";
				 		</script>
					<?php
					}
			}
		}
		else{
			$this->template->load('template','apt_sumber/add');	
		}

		
	}


	function delete () {
		
		$id= $this->uri->segment(4);
		$this->apt_sumber_model->delete($id);
		$this->session->set_flashdata('message','Data berhasil dihapus');
			?>
			<script>
			
			 window.location = "<?php echo base_url(); ?>farmasi/apt_sumber"; 
			 </script>
			<?php

		
		
	}

	function edit () {
		
			if ($_SERVER ['REQUEST_METHOD']=="POST"){
				$this->form_validation->set_rules('nama_sumber', 'Nama', 'trim|required');
				if ($this->form_validation->run() == FALSE)
				{
					$id_get = $this->input->post('id_sumber');
					$ambil=$this->apt_sumber_model->get_nama($id_get);
					foreach ($ambil->result_array() as $hasil) {
						$data['nama_sumber']=$hasil['nama_sumber'];
						$data['id_sumber']=$hasil['id_sumber'];
					}
					$this->template->load('template','apt_sumber/edit',$data);
				}
				else{

					$data=$this->input->post('nama_sumber');
				$query=$this->apt_sumber_model->double($data);

				if($query->num_rows>0) {
					if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
					
				?>
					<script> window.location = "<?php echo base_url(); ?>farmasi/apt_sumber"; </script>
					<?php

				} 
				else {
					$nama_sumber=$this->input->post('nama_sumber');
					$id_sumber=$this->input->post('id_sumber');
					$this->apt_sumber_model->update($id_sumber,$nama_sumber);
					$this->session->set_flashdata('message','Data berhasil diubah');
					?>
					<script>
						
			 			window.location = "<?php echo base_url(); ?>farmasi/apt_sumber"; 
			 		</script>
					<?php
				}
				}
			}
			else{
				$id_get = $this->uri->segment(4);
				$ambil=$this->apt_sumber_model->get_nama($id_get);
				foreach ($ambil->result_array() as $hasil) {
					$data['nama_sumber']=$hasil['nama_sumber'];
					$data['id_sumber']=$hasil['id_sumber'];
				}
			$this->template->load('template','apt_sumber/edit',$data);
			}

		
	}

	
	public function search() {
		
			if($this->session->userdata)
			{
				if($this->input->post("cari")=="")
				{
					$kata = $this->session->userdata('kata');
				}
				else
				{
					$sess_data['kata'] = $this->input->post("cari");
					$this->session->set_userdata($sess_data);
					$kata = $this->session->userdata('kata');
				}
			
				$page=$this->uri->segment(4);
				$limit=$this->config->item('limit_data');
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;
			
				$d['tot'] = $offset;
				$tot_hal = $this->db->query("select * from apt_sumber where nama_sumber like '%".$kata."%'");
				$config['base_url'] = base_url() . 'farmasi/apt_sumber/search/';
				$config['total_rows'] = $tot_hal->num_rows();
				$config['per_page'] = $limit;
				$config['uri_segment'] = 4;
				$config['first_link'] = 'Awal';
				$config['last_link'] = 'Akhir';
				$config['next_link'] = 'Selanjutnya';
				$config['prev_link'] = 'Sebelumnya';
				$this->pagination->initialize($config);
				$d["paginator"] =$this->pagination->create_links();
			
				$d['data_get'] = $this->db->query("select * from apt_sumber where nama_sumber like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			
				$this->template->load('template','apt_sumber/search',$d);
			}
			else
			{
			header('location:'.base_url().'farmasi/apt_sumber');
			}

		
	}

}