<?php
	class jam_kerja_pegawai Extends Ci_Controller{
		public function __construct () {
			parent::__construct();
			$this->load->model("jam_kerja_pegawai_model");/*
			$this->load->model('jam_kerja_model');*/
		}
		public function index(){
			$page=$this->uri->segment(4);
            $limit=20;
            if(!$page):
            $offset = 0;
            else:
            $offset = $page;
            endif;
    
            $data['tot'] = $offset;
            $tot_hal = $this->jam_kerja_pegawai_model->get_data();
            $config['base_url'] = base_url() . 'hrd/jam_kerja_pegawai/index';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data["paginator"] =$this->pagination->create_links();
            $data['data_shift']=$this->jam_kerja_pegawai_model->get_shift();
            $data['data_pegawai'] = $this->db->query("select a.nama_pegawai,a.id_pegawai,b.nama_jabatan,c.*,d.*,e.* from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan  join tbl_jam_kerja_pegawai c on a.id_pegawai=c.pegawai_id join tbl_shift d on c.shift_id=d.id_shift join tbl_jam_kerja e on d.id_shift=e.shift_id limit ".$limit." offset ".$offset);
            
            $this->template->load('template','jam_kerja_pegawai/index',$data);
		}

		public function add(){
			$insert=array('pegawai_id'=>$this->input->post('id_pegawai'),
						  'shift_id'=>$this->input->post('shift')
						  );
			$id_pegawai=$this->input->post('id_pegawai');
			$dobel=$this->jam_kerja_pegawai_model->double($id_pegawai);
			if($dobel->num_rows()>0){
				$this->session->set_flashdata("confirm","Data sudah ada!");
				?>
                  <script> window.location = "<?php echo base_url(); ?>hrd/jam_kerja_pegawai"; </script>
                  <?php
			}
			else{
				$this->jam_kerja_pegawai_model->add($insert);
				$this->session->set_flashdata("confirm","Data berhasil disimpan!");
				?>
                  <script> window.location = "<?php echo base_url(); ?>hrd/jam_kerja_pegawai"; </script>
                  <?php
			}
		}

		public function cari_pegawai(){
			$kata_kunci=$this->input->post('kata_kunci');
			$data['data_pegawai']=$this->jam_kerja_pegawai_model->get_pegawai($kata_kunci);
			$this->load->view('jam_kerja_pegawai/search_pegawai',$data);
		}

		public function edit(){
			$id_jam_kerja_pegawai=$this->uri->segment(4);
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$id_jam_kerja_pegawai=$this->input->post('id_jam_kerja_pegawai');
				$insert['shift_id']=$this->input->post('shift');
				$this->jam_kerja_pegawai_model->update($id_jam_kerja_pegawai,$insert);
				$this->session->set_flashdata('confirm','Data Berhasil Diubah !');
				?>
			<script>
					window.parent.location.reload(true);
			</script>
			<?php
			}
			else{
				$data['data_pegawai']=$this->jam_kerja_pegawai_model->get_Detail($id_jam_kerja_pegawai);
				$data['data_shift']=$this->jam_kerja_pegawai_model->get_shift();
				$this->load->view('jam_kerja_pegawai/edit',$data);
			}
		}

		public function delete(){
			$id_jam_kerja_pegawai=$this->uri->segment(4);
			$this->jam_kerja_pegawai_model->delete($id_jam_kerja_pegawai);
			$this->session->set_flashdata("confirm","Data berhasil dihapus!");
				?>
                  <script> window.location = "<?php echo base_url(); ?>hrd/jam_kerja_pegawai"; </script>
                <?php
		}

		public function search(){
			$kata_kunci=$this->input->post('cari_data');
			$data['data_pegawai']=$this->jam_kerja_pegawai_model->search($kata_kunci);
			$this->template->load('template','jam_kerja_pegawai/search',$data);
		} 
	}
?>