<?php

class Farmasi_Obats extends CI_Controller {
	public function __construct () {
		parent::__construct();
	}
	 
	public function index()
	{
		
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
			$tot_hal = $this->db->query("select * from farmasi_obats a left join farmasi_obat_jenis b on a.obat_jenis_id=b.id ");
			$config['base_url'] = base_url() . 'farmasi_obats/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->query("select a.id,b.nama_obat_jenis,a.nama_obat,a.satuan_obat,a.dosis 
				from  farmasi_obats a left join farmasi_obat_jenis b on a.obat_jenis_id = b.id order by a.id
				LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','farmasi/view_farmasi_obats',$d);
		}
	}
	 
	public function add()
	{
		
		if($this->session->userdata)
		
		{
			$d['id'] = "";
			$d['nama_obat'] = "";
			$d['obat_jenis_id'] = "";
			$d['satuan_obat']="";
			$d['dosis']="";
			$d['st'] = "add";
			$d['data_obat_jenis'] = $this->db->get("farmasi_obat_jenis");
			
			$this->template->load('template','farmasi/view_input_farmasi_obats',$d);
		}
	}
	 
	public function edit()
	{
		if($this->session->userdata)
		
		{
			$id_get['id'] = $this->uri->segment(3);
			$dt = $this->db->get_where("farmasi_obats",$id_get)->row();
			$d['id'] = $dt->id;
			$d['nama_obat'] = $dt->nama_obat;
			$d['obat_jenis_id'] = $dt->obat_jenis_id;
			$d['satuan_obat']=$dt->satuan_obat;
			$d['dosis']=$dt->dosis;
			$d['data_obat_jenis'] = $this->db->get("farmasi_obat_jenis");
			$d['st'] = "edit";
			
			$this->template->load('template','farmasi/view_input_farmasi_obats',$d);
		}
	}
	 
	

	public function save()
	{
		if($this->session->userdata)
		{
			
			$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required');
			$this->form_validation->set_rules('obat_jenis_id', 'Jenis Obat', 'trim|required');
			$this->form_validation->set_rules('satuan_obat', 'Satuan', 'trim|required');
			$this->form_validation->set_rules('dosis', 'Dosis', 'trim|required');
			$id['id'] = $this->input->post("id");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("farmasi_obats",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id'] = $dt->id;
						$d['nama_obat'] = $dt->nama_obat;
						$d['obat_jenis_id'] = $dt->obat_jenis_id;
						$d['satuan_obat']=$dt->satuan_obat;
						$d['obat_jenis_id'] = $dt->obat_jenis_id;
					}
					$d['data_obat_jenis'] = $this->db->get("farmasi_obat_jenis");
					$d['st'] = $st;
					$this->template->load('template','farmasi/view_input_farmasi_obats',$d);
				}
				else if($st=="add")
				{
					$d['id'] = "";
					$d['nama_obat'] = "";
					$d['obat_jenis_id'] = "";
					$d['satuan_obat']="";
					$d['dosis']="";
					$d['data_obat_jenis'] = $this->db->get("farmasi_obat_jenis");
					$d['st'] = $st;
					$this->template->load('template','farmasi/view_input_farmasi_obats',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['obat_jenis_id'] = $this->input->post("obat_jenis_id");
					$upd['nama_obat'] = $this->input->post("nama_obat");
					$upd['satuan_obat'] = $this->input->post("satuan_obat");
					$upd['dosis'] = $this->input->post("dosis");
					$this->db->update("farmasi_obats",$upd,$id);
					?>
						<script>
							window.location = "<?php echo base_url(); ?>farmasi_obats"; 
						</script>
					<?php
				}
				else if($st=="add")
				{
					$in['obat_jenis_id'] = $this->input->post("obat_jenis_id");
					$in['nama_obat'] = $this->input->post("nama_obat");
					$in['satuan_obat'] = $this->input->post("satuan_obat");
					$in['dosis'] = $this->input->post("dosis");
					$this->db->insert("farmasi_obats",$in);
					?>
						<script>
							window.location = "<?php echo base_url(); ?>farmasi_obats"; 
						</script>
					<?php
				}
			
			}
		}
		
	}

	

	public function delete()
	{
		if($this->session->userdata)
		{
			$hapus['id'] = $this->uri->segment(3);
			$this->db->delete("farmasi_obats",$hapus);

			?>
				<script>window.location="<?php echo base_url(); ?>farmasi_obats";</script>
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
			$tot_hal = $this->db->query("select a.id,b.nama_obat_jenis,a.nama_obat,a.satuan_obat,a.dosis 
from  farmasi_obats a left join farmasi_obat_jenis b on a.obat_jenis_id = b.id
where a.nama_obat like '%".$kata."%' or b.nama_obat_jenis like '%".$kata."%'
or a.satuan_obat like '%".$kata."%'
or a.dosis like '%".$kata."%'");
			$config['base_url'] = base_url() . 'farmasi_obats/search/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->query("select a.id,b.nama_obat_jenis,a.nama_obat,a.satuan_obat,a.dosis 
from  farmasi_obats a left join farmasi_obat_jenis b on a.obat_jenis_id = b.id
where a.nama_obat like '%".$kata."%' or b.nama_obat_jenis like '%".$kata."%'
or a.satuan_obat like '%".$kata."%'
or a.dosis like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','farmasi/view_farmasi_obats',$d);
		}
		
	}

	

	
}
