<?php 

class Supplyer extends CI_Controller {
	
	public function __construct () {
		parent::__construct();
		$this->load->model('model_supplyer');
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
			$tot_hal = $this->db->query("select * from apt_supplier a left join sosial_kabupaten b on a.id_kabupaten=b.id_kabupaten ");
			$config['base_url'] = base_url() . 'supplyer/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->query("select a.id_supplier, a.nama_supplier, a.alamat_supplier	,b.nama_kabupaten,
			a.kodepos, a.telp,a.bank,a.bank_no,a.bank_an,a.cp,a.email
			from  apt_supplier a left join sosial_kabupaten b on a.id_kabupaten=b.id_kabupaten
			LIMIT ".$offset.",".$limit."");
			
			
			$this->template->load('template','supplyer/view_supplyer',$d);
		}
	}

	function add () {
		
		if($this->session->userdata)
		{
			
			$d['id_supplier'] = "";
			$d['nama_supplier'] = "";
			$d['alamat_supplier']="";
			$d['id_kabupaten']="";
			$d['kodepos']="";
			$d['telp']="";
			$d['bank'] = "";
			$d['bank_no'] = "";
			$d['bank_an']="";
			$d['cp']="";
			$d['email']="";
			$d['st'] = "add";

			$d['data_kabupaten'] =$this->db->get(' sosial_kabupaten');
			
			$this->template->load('template','supplyer/view_input_supplyer',$d);
		}
	}

	function edit () {
		if ($this->session->userdata) {

			$id_get['id_supplier'] = $this->uri->segment(3);
			$dt = $this->db->get_where("apt_supplier",$id_get)->row();
			$d['id_supplier'] = $dt->id_supplier;
			$d['nama_supplier'] = $dt->nama_supplier;
			$d['alamat_supplier'] = $dt->alamat_supplier;
			$d['kodepos'] = $dt->kodepos;
			$d['telp'] = $dt->telp;
			$d['bank'] = $dt->bank;
			$d['bank_no'] = $dt->bank_no;
			$d['bank_an'] = $dt->bank_an;
			$d['cp'] = $dt->cp;
			$d['email'] = $dt->email;
			$d['id_kabupaten'] = $dt->id_kabupaten;
			$d['data_kabupaten'] = $this->db->get("sosial_kabupaten");
			$d['st'] = "edit";
			
			$this->template->load('template','supplyer/view_input_supplyer',$d);
		}
	}
	
        

	function save () {

		if($this->session->userdata)
		{
			$this->form_validation->set_rules('nama_supplier', 'Nama', 'trim|required');
			$this->form_validation->set_rules('alamat_supplier', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('kodepos', 'Kode Pos', 'trim|required');
			$this->form_validation->set_rules('telp', 'Telphon', 'trim|required');
			$this->form_validation->set_rules('bank', 'Bank', 'trim|required');
			$this->form_validation->set_rules('bank_no', 'No Bank', 'trim|required');
			$this->form_validation->set_rules('bank_an', 'Pemilik Bank', 'trim|required');
			$this->form_validation->set_rules('cp', 'Contact', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$id['id_supplier'] = $this->input->post("id_supplier");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				
				if($st=="edit")
				{
					$q = $this->db->get_where("apt_supplier",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_supplier'] = $dt->id_supplier;
						$d['nama_supplier'] = $dt->nama_supplier;
						$d['alamat_supplier'] = $dt->alamat_supplier;
						$d['kodepos'] = $dt->kodepos;
						$d['telp'] = $dt->telp;
						$d['bank'] = $dt->bank;
						$d['bank_no'] = $dt->bank_no;
						$d['bank_an'] = $dt->bank_an;
						$d['cp'] = $dt->cp;
						$d['email'] = $dt->email;
						$d['id_kabupaten'] = $dt->id_kabupaten;
					}
					$d['data_kabupaten'] = $this->db->get("sosial_kabupaten");
					$d['st'] = $st;
					$this->template->load('supplyer/view_input_supplyer',$d);
				}
				else if($st=="add")
				{
					$d['id_supplier'] = "";
					$d['nama_supplier'] = "";
					$d['alamat_supplier'] ="";
					$d['kodepos'] = "";
					$d['telp'] = "";
					$d['bank'] = "";
					$d['bank_no'] = "";
					$d['bank_an'] = "";
					$d['cp'] = "";
					$d['email'] = "";
					$d['id_kabupaten'] = "";
					$d['data_kabupaten'] = $this->db->get("sosial_kabupaten");
					$d['st'] = $st;
					$this->load->view('supplyer/view_input_supplyer',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['nama_supplier'] = $this->input->post("nama_supplier");
					$upd['alamat_supplier'] = $this->input->post("alamat_supplier");
					$upd['kodepos'] = $this->input->post("kodepos");
					$upd['telp'] = $this->input->post("telp");
					$upd['bank'] = $this->input->post("bank");
					$upd['bank_no'] = $this->input->post("bank_no");
					$upd['bank_an'] = $this->input->post("bank_an");
					$upd['cp'] = $this->input->post("cp");
					$upd['email'] = $this->input->post("email");
					$upd['id_kabupaten'] = $this->input->post("id_kabupaten");
					$this->db->update("apt_supplier",$upd,$id);
					?>
						<script> window.location = "<?php echo base_url(); ?>supplyer"; </script>
					<?php
				}
				else if($st=="add")
				{
					$in['nama_supplier'] = $this->input->post("nama_supplier");
					$in['alamat_supplier'] = $this->input->post("alamat_supplier");
					$in['kodepos'] = $this->input->post("kodepos");
					$in['telp'] = $this->input->post("telp");
					$in['bank'] = $this->input->post("bank");
					$in['bank_no'] = $this->input->post("bank_no");
					$in['bank_an'] = $this->input->post("bank_an");
					$in['cp'] = $this->input->post("cp");
					$in['email'] = $this->input->post("email");
					$in['id_kabupaten'] = $this->input->post("id_kabupaten");
					$this->db->insert("apt_supplier",$in);
					?>
						<script> window.location = "<?php echo base_url(); ?>supplyer"; </script>
					<?php
				}
			
			}
		}
		
	}

	function delete () {

		$hapus['id_supplier']=$this->uri->segment(3);
		$this->db->delete("apt_supplier",$hapus);

		?>
		<script>window.location="<?php echo base_url();?>supplyer";</script>
		<?php
	}

	function search() {

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
			$tot_hal = $this->db->query("select a.id_supplier, a.nama_supplier, a.alamat_supplier	,b.nama_kabupaten,
			a.kodepos, a.telp,a.bank,a.bank_no,a.bank_an,a.cp,a.email
			from  apt_supplier a left join sosial_kabupaten b on a.id_kabupaten=b.id_kabupaten
where a.nama_supplier like '%".$kata."%' or 
a.alamat_supplier like '%".$kata."%' or
b.nama_kabupaten like '%".$kata."%' or
a.telp like '%".$kata."%' or
a.bank like '%".$kata."%' or
a.bank_no like '%".$kata."%' or
a.cp like '%".$kata."%' or
a.email like '%".$kata."%'");
			$config['base_url'] = base_url() . 'supplyer/search/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->query("select a.id_supplier, a.nama_supplier, a.alamat_supplier	,b.nama_kabupaten,
			a.kodepos, a.telp,a.bank,a.bank_no,a.bank_an,a.cp,a.email
			from  apt_supplier a left join sosial_kabupaten b on a.id_kabupaten=b.id_kabupaten
where a.nama_supplier like '%".$kata."%' or 
a.alamat_supplier like '%".$kata."%' or
b.nama_kabupaten like '%".$kata."%' or
a.telp like '%".$kata."%' or
a.bank like '%".$kata."%' or
a.bank_no like '%".$kata."%' or
a.cp like '%".$kata."%' or
a.email like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','supplyer/view_supplyer',$d);
		}
		
	}
	}


}