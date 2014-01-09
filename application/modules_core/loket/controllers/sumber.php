<?php

class Sumber extends CI_Controller {

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
			$tot_hal = $this->db->get("apt_sumber");
			$config['base_url'] = base_url() . 'sumber/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->get("apt_sumber",$limit,$offset);
			
			$this->template->load('template','sumber/view_sumber',$d);
			
		}
		
	}

	function add () {

		$d['id_sumber']="";
		$d['nama_sumber']="";
		$d['st'] = "add";
		$this->template->load('template','sumber/view_input_sumber',$d);
	}

		function edit () {
		if ($this->session->userdata) {
			$id_get['id_sumber'] = $this->uri->segment(3);
			$query = $this->db->get_where("apt_sumber",$id_get)->row();
			$data['id_sumber']=$query->id_sumber;
			$data['nama_sumber']=$query->nama_sumber;

			$data['st'] = "edit";
			$this->template->load('template','sumber/view_input_sumber',$data);
		}
	}

	function save () {

		if($this->session->userdata)
		{
			$this->form_validation->set_rules('nama_sumber', 'Sumber', 'trim|required');
			$id['id_sumber'] = $this->input->post("id_sumber");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				
				if($st=="edit")
				{
					$q = $this->db->get_where("apt_sumber",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_sumber'] = $dt->id_sumber;
						$d['nama_sumber'] = $dt->nama_sumber;
					}
					$d['st'] = $st;
					$this->template->load('template','sumber/view_input_sumber',$d);
				}
				else if($st=="add")
				{
					$d['id_sumber'] = "";
					$d['nama_sumber'] = "";
					$d['st'] = $st;
					$this->template->load('template','sumber/view_input_sumber',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				
				if($st=="edit")
				{
					$upd['nama_sumber'] = $this->input->post("nama_sumber");
					$this->db->update("apt_sumber",$upd,$id);
					?>
					<script> window.location = "<?php echo base_url(); ?>sumber"; </script>
					<?php
				}
				else if($st=="add")
				{
					$in['nama_sumber'] = $this->input->post("nama_sumber");
					$this->db->insert("apt_sumber",$in);
					?>
					<script> window.location = "<?php echo base_url(); ?>sumber"; </script>
					<?php
				}
			
			}
		}
		
	}



	function delete () {

		if ($this->session->userdata) {
			$id['id_sumber']= $this->uri->segment(3);
			$this->db->delete("apt_sumber",$id);

					?>
					<script> window.location = "<?php echo base_url(); ?>sumber"; </script>
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
			$tot_hal = $this->db->query("select * from apt_sumber where nama_sumber like '%".$kata."%'");
			$config['base_url'] = base_url() . 'sumber/search/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->query("select * from apt_sumber where nama_sumber like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','sumber/view_sumber',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

}