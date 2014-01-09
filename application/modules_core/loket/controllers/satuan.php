<?php

class Satuan extends CI_Controller {
	public function __construct () {
		parent::__construct();
	}

	function index () {
		if($this->session->userdata)
		{
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("apt_satuan");
			$config['base_url'] = base_url() . 'satuan/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->get("apt_satuan",$limit,$offset);
			
			$this->template->load('template','satuan/view_satuan',$d);
			
		}
	}

	function add () {
		$d['id_satuan']="";
		$d['nama_satuan']="";
		$d['st']="add";
		$this->template->load('template','satuan/view_input_satuan',$d);
	}

	function edit () {
		if ($this->session->userdata) {
			$id_get['id_satuan']=$this->uri->segment(3);
			$query=$this->db->get_where("apt_satuan",$id_get)->row();
			$data['id_satuan']=$query->id_satuan;
			$data['nama_satuan']=$query->nama_satuan;

			$data['st']="edit";
			$this->template->load('template','satuan/view_input_satuan',$data);
		}
	}

	function save () {
		if($this->session->userdata)
		{
			$this->form_validation->set_rules('nama_satuan', 'Satuan', 'trim|required');
			$id['id_satuan'] = $this->input->post("id_satuan");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				
				if($st=="edit")
				{
					$q = $this->db->get_where("apt_satuan",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_satuan'] = $dt->id_sumber;
						$d['nama_satuan'] = $dt->nama_sumber;
					}
					$d['st'] = $st;
					$this->template->load('template','satuan/view_input_satuan',$d);
				}
				else if($st=="add")
				{
					$d['id_satuan'] = "";
					$d['nama_satuan'] = "";
					$d['st'] = $st;
					$this->template->load('template','satuan/view_input_satuan',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				
				if($st=="edit")
				{
					$upd['nama_satuan'] = $this->input->post("nama_satuan");
					$this->db->update("apt_satuan",$upd,$id);
					?>
					<script> window.location = "<?php echo base_url(); ?>satuan"; </script>
					<?php
				}
				else if($st=="add")
				{
					$in['nama_satuan'] = $this->input->post("nama_satuan");
					$this->db->insert("apt_satuan",$in);
					?>
					<script> window.location = "<?php echo base_url(); ?>satuan"; </script>
					<?php
				}
			
			}
		}
	}

	function delete () {
		if ($this->session->userdata) {
			$id['id_satuan'] = $this->uri->segment(3);
			$this->db->delete("apt_satuan",$id);

			?>
				<script>window.location="<?php echo base_url(); ?>satuan";</script>
			<?php 
		}
	}

	public function search()
	{
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
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select * from apt_satuan where nama_satuan like '%".$kata."%'");
			$config['base_url'] = base_url() . 'satuan/search/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->query("select * from apt_satuan where nama_satuan like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','satuan/view_satuan',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}




}