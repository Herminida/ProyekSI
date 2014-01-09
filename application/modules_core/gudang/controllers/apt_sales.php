<?php
	class apt_sales extends Ci_Controller{
		public function __construct () {
			parent::__construct();
			$this->load->model('apt_sales_model');
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
			$tot_hal = $this->db->get("apt_sales");
			$config['base_url'] = base_url() . 'farmasi/sales/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->get("apt_sales",$limit,$offset);
			
			$this->template->load('template','apt_sales/index',$d);
		
	}

	function add(){
		
			if($_SERVER ['REQUEST_METHOD']=="POST"){
				$this->form_validation->set_rules('nama_sales', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat_sales', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('supplier_id', 'Supplier', 'trim|required');
				$this->form_validation->set_rules('nama_kota', 'Kota', 'trim|required');
				$this->form_validation->set_rules('telepon_sales', 'No Telepon', 'trim|numeric');
				$this->form_validation->set_rules('opsi_komisi', 'Opsi Komisi', 'trim|required');
				$this->form_validation->set_rules('opsi_nominal', 'Opsi Nominal', 'trim|required');
				$this->form_validation->set_rules('jumlah', 'Jumlah Nominal', 'trim|required');
				if($this->form_validation->run()==false){
				$data['data_supplier']=$this->apt_supplier_model->getsupplier();
				$this->template->load('template','apt_sales/add',$data);
				}
				else{
					$data=array(
						'supplier_id'=>$this->input->post('supplier_id'),
						'nama_sales'=>$this->input->post('nama_sales'),
						'alamat_sales'=>$this->input->post('alamat_sales'),
						'nama_kota'=>$this->input->post('nama_kota'),
						
						'telp'=>$this->input->post('telepon_sales'),
						'komisi_opsi'=>$this->input->post('opsi_komisi'),
						'nominal_opsi'=>$this->input->post('opsi_nominal'),
						'nominal_jumlah'=>$this->input->post('jumlah')
					);
					$nama=$this->input->post('nama_sales');
					$cek=$this->apt_sales_model->get_nama($nama);
					if ($cek->num_rows()>0){
						$this->session->set_flashdata('message','Data Sudah Ada');
						?>
						<script>
						  
						window.location = "<?php echo base_url(); ?>farmasi/apt_sales"; 
						</script>
						<?php
					}
					else{
						$this->apt_sales_model->insert($data);
						$this->session->set_flashdata('message','Data berhasil disimpan');
					?>
						<script> 
						
						window.location = "<?php echo base_url(); ?>farmasi/apt_sales";
				 		</script>
					<?php
					}
				}
			}
			else{
				$data['data_supplier']=$this->apt_supplier_model->getsupplier();
				
				$this->template->load('template','apt_sales/add',$data);
			}
		
	}

	function delete () {
		
			$id['id_sales']= $this->uri->segment(4);
			$this->db->delete("apt_sales",$id);
			$this->session->set_flashdata('message','Data berhasil dihapus');
					?>
					<script>
					
					 window.location = "<?php echo base_url(); ?>farmasi/apt_sales"; 
					 </script>
					<?php

	}

	function detail(){
		
			$idsales=$this->uri->segment(4);
			$datasales=$this->apt_sales_model->getdatasales($idsales);
			foreach ($datasales->result_array() as $hasil) {
				$data=array('nama_sales'=>$hasil['nama_sales'],
						    'alamat_sales'=>$hasil['alamat_sales'],
						    'nama_kota'=>$hasil['nama_kota'],
						    'telepon'=>$hasil['telp'],
						    'opsi_komisi'=>$hasil['komisi_opsi'],
						    'opsi_nominal'=>$hasil['nominal_opsi'],
						    'jumlah'=>$hasil['nominal_jumlah'],
						    'supplier_id'=>$hasil['nama_supplier']
				);
			}
			$this->template->load('template','apt_sales/detail',$data);
		
	}

	function edit(){
		
			if($_SERVER ['REQUEST_METHOD']=="POST"){
				$this->form_validation->set_rules('nama_sales', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat_sales', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('nama_kota', 'Kota', 'trim|required');
				$this->form_validation->set_rules('supplier_id', 'Supplier', 'trim|required');
				$this->form_validation->set_rules('telepon_sales', 'No Telepon', 'trim|numeric');
				$this->form_validation->set_rules('opsi_komisi', 'Opsi Komisi', 'trim|required');
				$this->form_validation->set_rules('opsi_nominal', 'Opsi Nominal', 'trim|required');
				$this->form_validation->set_rules('jumlah', 'Jumlah Nominal', 'trim|required');
				if($this->form_validation->run()==false){
					$idsales=$this->uri->segment(4);
					$datasales=$this->apt_sales_model->getdatasalesedit($idsales);
					foreach ($datasales->result_array() as $hasil) {
					$data=array('nama_sales'=>$hasil['nama_sales'],
						    'alamat_sales'=>$hasil['alamat_sales'],
						    'nama_kota'=>$hasil['nama_kota'],
						    'supplier_id'=>$hasil['supplier_id'],
						    'nama_supplier'=>$hasil['nama_supplier'],
						    'telepon'=>$hasil['telp'],
						    'opsi_komisi'=>$hasil['komisi_opsi'],
						    'opsi_nominal'=>$hasil['nominal_opsi'],
						    'jumlah'=>$hasil['nominal_jumlah'],
						    'id_sales'=>$hasil['id_sales']
					);
					}
				
				$data['data_supplier']=$this->apt_supplier_model->getsupplier();
				$this->template->load('template','apt_sales/edit',$data);
				}
				else{
					$idsales=$this->uri->segment(4);
					$data=array(
						'nama_sales'=>$this->input->post('nama_sales'),
						'alamat_sales'=>$this->input->post('alamat_sales'),
						'nama_kota'=>$this->input->post('nama_kota'),
						'supplier_id'=>$this->input->post('supplier_id'),
						'telp'=>$this->input->post('telepon_sales'),
						'komisi_opsi'=>$this->input->post('opsi_komisi'),
						'nominal_opsi'=>$this->input->post('opsi_nominal'),
						'nominal_jumlah'=>$this->input->post('jumlah')
					);
						$this->apt_sales_model->updatedata($idsales,$data);
						$this->session->set_flashdata('message','Data berhasil diubah');
					?>
						<script> 
						
						window.location = "<?php echo base_url(); ?>farmasi/apt_sales";
				 		</script>
					<?php

				}

			}
			else{
				$idsales=$this->uri->segment(4);
				$datasales=$this->apt_sales_model->getdatasalesedit($idsales);
				foreach ($datasales->result_array() as $hasil) {
				$data=array('nama_sales'=>$hasil['nama_sales'],
						    'alamat_sales'=>$hasil['alamat_sales'],
						    'nama_kota'=>$hasil['nama_kota'],
						    'supplier_id'=>$hasil['supplier_id'],
						    'nama_supplier'=>$hasil['nama_supplier'],
						    'telepon'=>$hasil['telp'],
						    'opsi_komisi'=>$hasil['komisi_opsi'],
						    'opsi_nominal'=>$hasil['nominal_opsi'],
						    'jumlah'=>$hasil['nominal_jumlah'],
						    'id_sales'=>$hasil['id_sales']
				);
				}
				
				$data['data_supplier']=$this->apt_supplier_model->getsupplier();
				$this->template->load('template','apt_sales/edit',$data);
			}
			
	}

		function search(){
			$page=$this->uri->segment(4);
			$cari=$this->input->post('search');
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("apt_sales");
			$config['base_url'] = base_url() . 'farmasi/sales/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->query("select * from apt_sales where nama_sales like '%".$cari."%' or
			alamat_sales like'%".$cari."%' ");
			
			$this->template->load('template','apt_sales/search',$d);
		}
	}
?>