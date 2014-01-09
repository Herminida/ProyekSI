<?php 

class apt_supplier extends CI_Controller {
	
	public function __construct () {
		parent::__construct();
		
		$this->load->model('apt_supplier_model');
		
		
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
			$tot_hal = $this->db->query("select * from apt_supplier ");
			$config['base_url'] = base_url() . 'farmasi/supplier/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->query("select a.id_supplier, a.nama_supplier, a.alamat_supplier	,
			a.kodepos, a.telp,a.bank,a.bank_no,a.bank_an,a.cp,a.email
			from  apt_supplier a 
			LIMIT ".$offset.",".$limit.""); 
			
			
			$this->template->load('template','apt_supplier/index',$d);

			
		
	}

	function add () {

	

		if ($_SERVER ['REQUEST_METHOD']=="POST"){
		
			$this->form_validation->set_rules('nama_supplier', 'Nama', 'trim|required');
			$this->form_validation->set_rules('alamat_supplier', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('kodepos', 'Kode Pos', 'trim|numeric');
			$this->form_validation->set_rules('telp', 'Telphon', 'trim|numeric');
			$this->form_validation->set_rules('nama_kota', 'Kota', 'trim|required');
			$this->form_validation->set_rules('bank', 'Bank', 'trim|required');
			$this->form_validation->set_rules('bank_no', 'No Bank', 'trim|numeric');
			$this->form_validation->set_rules('bank_an', 'Pemilik Bank', 'trim|required');
			$this->form_validation->set_rules('cp', 'Contact', 'trim|numeric');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
			$id['id_supplier'] = $this->input->post("id_supplier");
			
			if ($this->form_validation->run() == FALSE)
			{
					$data['error']=validation_errors();
					$this->template->load('template','apt_supplier/add',$data);
			}
			else
			{
				$in=array('nama_supplier'=>$this->input->post("nama_supplier"),
							   'alamat_supplier'=>$this->input->post("alamat_supplier"),
							   'kodepos'=>$this->input->post("kodepos"),
							   'telp'=>$this->input->post("telp"),
							   'bank'=>$this->input->post("bank"),
							   'bank_no'=>$this->input->post("bank_no"),
							   'bank_an'=>$this->input->post("bank_an"),
							   'cp'=>$this->input->post("cp"),
							   'email'=>$this->input->post("email"),
							   'nama_kota'=>$this->input->post("nama_kota")
							   
						);
					$nama=$this->input->post("nama_supplier");
					$cek=$this->apt_supplier_model->get_supplier_nama($nama);
					if ($cek->num_rows()>0){
						$this->session->set_flashdata('message','Data Sudah Ada');
						?>
						<script>
						
						window.location = "<?php echo base_url(); ?>farmasi/apt_supplier"; 
						</script>
						<?php
					}
					else{

					$this->apt_supplier_model->insert($in);
					$this->session->set_flashdata('message','Data Berhasil Disimpan');
					?>
						<script>
						 
						window.location = "<?php echo base_url(); ?>farmasi/apt_supplier"; 
						</script>
					<?php
			
					}
				}
			}
			else{
			$this->template->load('template','apt_supplier/add');
			}

	

		
	}

	function delete () {

		
			$id_supplier=$this->uri->segment(4);
			$this->apt_supplier_model->delete($id_supplier);
			$this->apt_supplier_model->deletesales($id_supplier);
			$this->session->set_flashdata('message','Data Berhasil Dihapus');
		?>
		<script> window.location="<?php echo base_url();?>farmasi/apt_supplier"; </script>
		<?php
		

		
	}


	function edit () {

		
		if ($_SERVER ['REQUEST_METHOD']=="POST"){
			$this->form_validation->set_rules('nama_supplier', 'Nama', 'trim|required');
			$this->form_validation->set_rules('alamat_supplier', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('kodepos', 'Kode Pos', 'trim|numeric');
			$this->form_validation->set_rules('telp', 'Telphon', 'trim|numeric');
			$this->form_validation->set_rules('nama_kota', 'Kota', 'trim|required');
			$this->form_validation->set_rules('bank', 'Bank', 'trim|required');
			$this->form_validation->set_rules('bank_no', 'No Bank', 'trim|numeric');
			$this->form_validation->set_rules('bank_an', 'Pemilik Bank', 'trim|required');
			$this->form_validation->set_rules('cp', 'Contact', 'trim|numeric');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
			$id_supplier = $this->input->post("id_supplier");
			
			if ($this->form_validation->run() == FALSE)
			{
					$data['error']=validation_errors();
					$hasil=$this->apt_supplier_model->get_supplier($id_supplier);
					foreach ($hasil->result_array() as $dt) {
						$d['id_supplier'] = $dt['id_supplier'];
						$d['nama_supplier'] = $dt['nama_supplier'];
						$d['nama_kota'] = $dt['nama_kota'];
						$d['alamat_supplier'] = $dt['alamat_supplier'];
						$d['kodepos'] =$dt['kodepos'];
						$d['telp'] = $dt['telp'];
						$d['bank'] = $dt['bank'];
						$d['bank_no'] = $dt['bank_no'];
						$d['bank_an'] = $dt['bank_an'];
						$d['cp'] = $dt['cp'];
						$d['email'] = $dt['email'];
						
						
			}
					$this->template->load('template','apt_supplier/edit',$d);
			}
			else{
				$in=array('nama_supplier'=>$this->input->post("nama_supplier"),
							   'alamat_supplier'=>$this->input->post("alamat_supplier"),
							   'kodepos'=>$this->input->post("kodepos"),
							   'telp'=>$this->input->post("telp"),
							   'bank'=>$this->input->post("bank"),
							   'bank_no'=>$this->input->post("bank_no"),
							   'bank_an'=>$this->input->post("bank_an"),
							   'cp'=>$this->input->post("cp"),
							   'email'=>$this->input->post("email"),
							   'nama_kota'=>$this->input->post("nama_kota")
							  
						);
					$this->apt_supplier_model->update($in,$id_supplier);
					$this->session->set_flashdata('message','Data Berhasil Diubah');
					?>
						<script>
						 
						window.location = "<?php echo base_url(); ?>farmasi/apt_supplier"; 
						</script>
					<?php
			

			}

		}
		else{
			$id_supplier = $this->uri->segment(4);
			$hasil=$this->apt_supplier_model->get_supplier($id_supplier);
			foreach ($hasil->result_array() as $dt) {
				$d['id_supplier'] = $dt['id_supplier'];
				$d['nama_supplier'] = $dt['nama_supplier'];
				$d['alamat_supplier'] = $dt['alamat_supplier'];
				$d['kodepos'] =$dt['kodepos'];
				$d['telp'] = $dt['telp'];
				$d['bank'] = $dt['bank'];
				$d['bank_no'] = $dt['bank_no'];
				$d['bank_an'] = $dt['bank_an'];
				$d['cp'] = $dt['cp'];
				$d['email'] = $dt['email'];
				$d['nama_kota'] = $dt['nama_kota'];
				
				
			}
			
			$this->template->load('template','apt_supplier/edit',$d);

		}

		
	}
	
    function detail () {

    	

		$id_get= $this->uri->segment(4);
		$data=$this->apt_supplier_model->detail($id_get);
		foreach ($data->result_array() as $hasil) {
			$d['nama_supplier'] = $hasil['nama_supplier'];
			$d['alamat_supplier'] = $hasil['alamat_supplier'];
			$d['nama_kota'] = $hasil['nama_kota'];
			$d['kodepos'] = $hasil['kodepos'];
			$d['telp'] = $hasil['telp'];
			$d['bank'] = $hasil['bank'];
			$d['bank_no'] = $hasil['bank_no'];
			$d['bank_an'] = $hasil['bank_an'];
			$d['cp'] = $hasil['cp'];
			$d['email'] = $hasil['email'];
			
			
		}
		
		
		$this->template->load('template','apt_supplier/detail',$d);

		
		
	}    

	
	function search() {

		
		$this->form_validation->set_rules('cari', 'Isian pencarian harus diisi', 'trim|required');
		if ($this->form_validation->run() == FALSE)
			{
					$d['error']=validation_errors();
					$page=$this->uri->segment(4);
				$limit=$this->config->item('limit_data');
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;
			
				$d['tot'] = $offset;
				$tot_hal = $this->db->query("select * from apt_supplier");
				$config['base_url'] = base_url() . 'farmasi/supplier/index/';
				$config['total_rows'] = $tot_hal->num_rows();
				$config['per_page'] = $limit;
				$config['uri_segment'] = 4;
				$config['first_link'] = 'Awal';
				$config['last_link'] = 'Akhir';
				$config['next_link'] = 'Selanjutnya';
				$config['prev_link'] = 'Sebelumnya';
				$this->pagination->initialize($config);
				$d["paginator"] =$this->pagination->create_links();
			
				$d['data_get'] = $this->db->query("select *
				from apt_supplier 
				LIMIT ".$offset.",".$limit.""); 
			
			
				$this->template->load('template','apt_supplier/index',$d);
			}
		else{
		$kata=$this->input->post('cari');		
			$page=$this->uri->segment(4);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select * from apt_supplier a
			where a.nama_supplier like '%".$kata."%' or 
			a.alamat_supplier like '%".$kata."%' or
			a.nama_kota like '%".$kata."%' or
			a.telp like '%".$kata."%' or
			a.bank like '%".$kata."%' or
			a.bank_no like '%".$kata."%' or
			a.cp like '%".$kata."%' or
			a.email like '%".$kata."%'");
			$config['base_url'] = base_url() . 'supplier/search/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->query("select * from apt_supplier a
			where a.nama_supplier like '%".$kata."%' or 
			a.alamat_supplier like '%".$kata."%' or
			a.nama_kota like '%".$kata."%' or
			a.telp like '%".$kata."%' or
			a.bank like '%".$kata."%' or
			a.bank_no like '%".$kata."%' or
			a.cp like '%".$kata."%' or
			a.email like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','apt_supplier/search',$d);
		}

		

	}
}