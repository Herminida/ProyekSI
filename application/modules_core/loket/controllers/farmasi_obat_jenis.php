<?php

class Farmasi_Obat_Jenis extends CI_Controller {
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
			$tot_hal = $this->db->get("farmasi_obat_jenis");
			$config['base_url'] = base_url() . 'farmasi_obat_jenis/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->get("farmasi_obat_jenis",$limit,$offset);
			
			$this->template->load('template','farmasi/view_farmasi_obat_jenis',$d);
			
		}
	}

	function add () {
		$d['id']="";
		$d['nama_obat_jenis']="";
		$d['st']="add";
		$this->template->load('template','farmasi/view_input_farmasi_obat_jenis',$d);
	}

	function edit () {
		if ($this->session->userdata) {
			$id_get['id']=$this->uri->segment(3);
			$query=$this->db->get_where("farmasi_obat_jenis",$id_get)->row();
			$data['id']=$query->id;
			$data['nama_obat_jenis']=$query->nama_obat_jenis;

			$data['st']="edit";
			$this->template->load('template','farmasi/view_input_farmasi_obat_jenis',$data);
		}
	}

	function save () {
		if($this->session->userdata)
		{
			$this->form_validation->set_rules('nama_obat_jenis', 'Nama Jenis Obat', 'trim|required');
			$id['id'] = $this->input->post("id");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				
				if($st=="edit")
				{
					$q = $this->db->get_where("farmasi_obat_jenis",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id'] = $dt->id;
						$d['nama_obat_jenis'] = $dt->nama_obat_jenis;
					}
					$d['st'] = $st;
					$this->template->load('template','farmasi/view_input_farmasi_obat_jenis',$d);
				}
				else if($st=="add")
				{
					$d['id'] = "";
					$d['nama_obat_jenis'] = "";
					$d['st'] = $st;
					$this->template->load('template','farmasi/view_input_farmasi_obat_jenis',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				
				if($st=="edit")
				{
					$upd['nama_obat_jenis'] = $this->input->post("nama_obat_jenis");
					$this->db->update("farmasi_obat_jenis",$upd,$id);
					?>
					<script> window.location = "<?php echo base_url(); ?>farmasi_obat_jenis"; </script>
					<?php
				}
				else if($st=="add")
				{
					$in['nama_obat_jenis'] = $this->input->post("nama_obat_jenis");
					$this->db->insert("farmasi_obat_jenis",$in);
					?>
					<script> window.location = "<?php echo base_url(); ?>farmasi_obat_jenis"; </script>
					<?php
				}
			
			}
		}
	}

	function delete () {
		if ($this->session->userdata) {
			$id['id'] = $this->uri->segment(3);
			$this->db->delete("farmasi_obat_jenis",$id);

			?>
				<script>window.location="<?php echo base_url(); ?>farmasi_obat_jenis";</script>
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
			$tot_hal = $this->db->query("select * from farmasi_obat_jenis where nama_obat_jenis like '%".$kata."%'");
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
			
			$d['data_get'] = $this->db->query("select * from farmasi_obat_jenis where nama_obat_jenis like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','farmasi/view_farmasi_obat_jenis',$d);
		}
		
	}




}