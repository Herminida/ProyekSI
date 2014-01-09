<?php

class Apt_Satuan extends CI_Controller {
	public function __construct () {
		parent::__construct();
		$this->load->model('apt_satuan_model');
	}

	public function index()
	{

		$page=$this->uri->segment(4);
			$limit=20;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select a.* from apt_satuan a order by id_satuan desc");
			$config['base_url'] = base_url() . 'farmasi/apt_satuan/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_apt_satuan'] = $this->db->query("select a.* from apt_satuan a order by a.id_satuan desc
				LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','apt_satuan/index',$d);
		
     		
        
	}
	

	//Pembuka ADD
	public function add () {
		


		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$data = $this->input->post('nama_satuan');
					$query = $this->apt_satuan_model->double($data);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {

					
			$in['nama_satuan'] = $this->input->post('nama_satuan');
			$this->apt_satuan_model->insert("apt_satuan",$in);

			$this->session->set_flashdata('message','Data Berhasil Ditambahkan !');
				?>
			<script>
					window.parent.location.reload(true);
			</script>
			<?php
			}
	

			}
			else {

				$this->load->view('apt_satuan/add');
			}
   		
    }
    //Penutup ADD
	
	//Pembuka Edit
	public function edit() {
		
		
			if ($_SERVER['REQUEST_METHOD']=='POST') {

				

					$data = $this->input->post('nama_satuan');
					$query = $this->apt_satuan_model->double($data);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {
						$up['nama_satuan'] = $this->input->post('nama_satuan');
						$id['id_satuan'] = $this->input->post('id_satuan');
						$this->apt_satuan_model->update("apt_satuan",$up,$id);
						$this->session->set_flashdata('message','Data Berhasil Diupdate');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
				

			}
			else {
				$pilih['id_satuan'] = $this->uri->segment(4);
				$dt_apt_satuan_obat = $this->apt_satuan_model->edit("apt_satuan",$pilih);
					foreach($dt_apt_satuan_obat->result() as $db)
				{
					$bc['id_satuan'] = $db->id_satuan;
					$bc['nama_satuan'] = $db->nama_satuan;
				
				}
				$this->load->view('apt_satuan/edit',$bc);
			}
			
	
	}
	//Penutup Edit
	
	//Pembuka Delete
	public function delete()
	{
		
		
			$this->apt_satuan_model->delete($this->uri->segment(4));	
			$this->session->set_flashdata('message','Data Berhasil Dihapus');
			?>
				<script> window.location = "<?php echo base_url(); ?>farmasi/apt_satuan"; </script>
			<?php	
		
		
	}
	//Penutup Edit

	//Pembuka Search
	public function search () {
		

			$this->form_validation->set_rules('keysearch', 'Cari Satuan Obat', 'trim|required');

			if ($this->form_validation->run()==FALSE) {

				$data['apt_satuan']=$this->apt_satuan_model->Get_Apt_Satuan();
				$this->template->load('template','apt_satuan/index',$data);

			}
			else {

				if ($this->input->post("keysearch")=="") {
					$kata = $this->session->userdata('kata_cari');
				}
				else {
					$sess_data['kata_cari']=$this->input->post("keysearch");
					$this->session->set_userdata($sess_data);
					$kata = $this->session->userdata('kata_cari');
				}

				$data['get_data'] = $this->apt_satuan_model->search($kata);
				$this->template->load('template','apt_satuan/search',$data);

			}
            
		
	
	}
	//Penutup Search

} //end Controlller 
