<?php 

class apt_supplier extends CI_Controller {
	
	public function __construct () {
		parent::__construct();
		
		$this->load->model('apt_supplier_model');
		
		
	}

	function index () {

		
		
				
			$page=$this->uri->segment(4);
			$limit=20;
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

	
if ($_SERVER ['REQUEST_METHOD']=="POST") {

					$nama=$this->input->post("nama_supplier");
					$cek=$this->apt_supplier_model->get_supplier_nama($nama);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

					}
					else {

					
			$in['nama_supplier'] = $this->input->post('nama_supplier');
			$in['alamat_supplier'] = $this->input->post('alamat_supplier');
			$in['nama_kota'] = $this->input->post('kota');
			$in['kodepos'] = $this->input->post('kodepos');
			$in['bank'] = $this->input->post('bank');
			$in['bank_no'] = $this->input->post('bank_no');
			$in['bank_an'] = $this->input->post('bank_an');
			$in['cp'] = $this->input->post('cp');
			$in['email'] = $this->input->post('email');
			$this->apt_supplier_model->insert2("apt_supplier",$in);

			$this->session->set_flashdata('message','Data Berhasil Ditambahkan !');
				?>
			<script>
					window.parent.location.reload(true);
			</script>
			<?php
			}
	

			}
			else {

				$this->load->view('apt_supplier/add');
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

		
		if ($_SERVER['REQUEST_METHOD']=='POST') {

				
						$up['nama_supplier'] = $this->input->post('nama_supplier');
						$up['alamat_supplier'] = $this->input->post('alamat_supplier');
						$up['nama_kota'] = $this->input->post('nama_kota');
						$up['kodepos'] = $this->input->post('kodepos');
						$up['bank'] = $this->input->post('bank');
						$up['bank_no'] = $this->input->post('bank_no');
						$up['bank_an'] = $this->input->post('bank_an');
						$up['cp'] = $this->input->post('cp');
						$up['email'] = $this->input->post('email');
						$id['id_supplier'] = $this->input->post('id_supplier');
						$this->apt_supplier_model->updateData("apt_supplier",$up,$id);
						
						$this->session->set_flashdata('message','Data Berhasil Diupdate');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

			}
			else {
				$pilih['id_supplier'] = $this->uri->segment(4);
				$dt_apt_supplier = $this->apt_supplier_model->edit("apt_supplier",$pilih);
					foreach($dt_apt_supplier->result() as $db)
				{
					$bc['id_supplier'] = $db->id_supplier;
					$bc['nama_supplier'] = $db->nama_supplier;
					$bc['alamat_supplier'] = $db->alamat_supplier;
					$bc['nama_kota'] = $db->nama_kota;
					$bc['kodepos'] = $db->kodepos;
					$bc['bank'] = $db->bank;
					$bc['bank_no'] = $db->bank_no;
					$bc['bank_an'] = $db->bank_an;
					$bc['cp'] = $db->cp;
					$bc['email'] = $db->email;
				
				}
				$this->load->view('apt_supplier/edit',$bc);
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
		
		
		$this->load->view('apt_supplier/detail',$d);

		
		
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