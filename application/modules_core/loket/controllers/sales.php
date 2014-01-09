<?php
	class sales extends Ci_Controller{
		public function __construct () {
			parent::__construct();
			$this->load->model('model_sales');
		}

		function index () {

		
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("apt_sales");
			$config['base_url'] = base_url() . 'sales/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->get("apt_sales",$limit,$offset);
			
			$this->template->load('template','sales/view_sales',$d);
		}

		function add(){
			$d['st'] = "add";
			$this->template->load('template','sales/view_add_sales',$d);
		}

		function adddata(){
			$d['st'] = "add";
			$this->form_validation->set_rules('nama_sales', 'Nama', 'trim|required');
			$this->form_validation->set_rules('alamat_sales', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
			$this->form_validation->set_rules('telepon', 'No Telepon', 'trim|required');
			$this->form_validation->set_rules('opsi_komisi', 'Opsi Komisi', 'trim|required');
			$this->form_validation->set_rules('opsi_nominal', 'Opsi Nominal', 'trim|required');
			$this->form_validation->set_rules('jumlah', 'Jumlah Nominal', 'trim|required');

			if($this->form_validation->run()==false){
				$this->template->load('template','sales/view_add_sales',$d);
			}
			else{
				$data=array(
						'nama_sales'=>$this->input->post('nama_sales'),
						'alamat_sales'=>$this->input->post('alamat_sales'),
						'id_kabupaten'=>$this->input->post('kabupaten'),
						'telp'=>$this->input->post('telepon'),
						'komisi_opsi'=>$this->input->post('opsi_komisi'),
						'nominal_opsi'=>$this->input->post('opsi_nominal'),
						'nominal_jumlah'=>$this->input->post('jumlah')
					);
					$this->model_sales->adddata($data);
					$this->index();
			}
		}

		function delete () {

		if ($this->session->userdata) {
			$id['id_sales']= $this->uri->segment(3);
			$this->db->delete("apt_sales",$id);

					?>
					<script> window.location = "<?php echo base_url(); ?>sales"; </script>
					<?php
			}
		}

		function edit(){
			$idsales= $this->uri->segment(3);
			$data['datasales']=$this->model_sales->getdatasales($idsales);
			$data['st']="edit";
			$data['id_sales']=$idsales;
			$this->template->load('template','sales/view_add_sales',$data);
		}

		function updatedata(){
			$data=array(
						'nama_sales'=>$this->input->post('nama_sales'),
						'alamat_sales'=>$this->input->post('alamat_sales'),
						'id_kabupaten'=>$this->input->post('kabupaten'),
						'telp'=>$this->input->post('telepon'),
						'komisi_opsi'=>$this->input->post('opsi_komisi'),
						'nominal_opsi'=>$this->input->post('opsi_nominal'),
						'nominal_jumlah'=>$this->input->post('jumlah')
					);
			$id_sales=$this->input->post('id_sales');
			$this->model_sales->updatedata($id_sales,$data);
            $this->index();
			
		}

		function caridata(){
			$page=$this->uri->segment(3);
			$cari=$this->input->post('search');
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("apt_sales");
			$config['base_url'] = base_url() . 'sales/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->query("select * from apt_sales where nama_sales like '%".$cari."%' or
			alamat_sales like'%".$cari."%' ");
			
			$this->template->load('template','sales/view_sales',$d);
		}
	}
?>