<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class farmasi_obats extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('farmasi_obats_model');
		$this->load->model('apt_satuan_model');
		$this->load->model('apt_gol_model');
		$this->load->model('farmasi_obat_jenis_model');
	}
	

	public function index () {

		


			$page=$this->uri->segment(4);
            $limit=$this->config->item('limit_data');
            if(!$page):
            $offset = 0;
            else:
            $offset = $page;
            endif;
    
            $data['tot'] = $offset;
            $tot_hal = $this->farmasi_obats_model->getAllData();
            $config['base_url'] = base_url() . 'farmasi/farmasi_obats/index';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $data["paginator"] =$this->pagination->create_links();

            $data['farmasi_obats'] = $this->farmasi_obats_model->getAllDataLimited($limit,$offset);
            
            $this->template->load('template','farmasi_obats/index',$data);
        

		
	}

	public function add () {
		

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			$this->form_validation->set_rules('nama_obat','Nama Obat','trim|required');
			$this->form_validation->set_rules('obat_jenis_id','Jenis Obat','trim|required');
			$this->form_validation->set_rules('satuan_obat_id','Satuan Obat','trim|required');
			$this->form_validation->set_rules('golongan_id','Golongan Obat','trim|required');
			$this->form_validation->set_rules('dosis','Dosis','trim|required');
			$this->form_validation->set_rules('qtt','Stok','trim|required');
			$this->form_validation->set_rules('harga_beli','Harga Beli','trim|required');
			$this->form_validation->set_rules('harga_jual','Harga Jual','trim|required');

			if ($this->form_validation->run()==FALSE) {

				$data['id']="";
				$data['nama_obat']="";
				$data['obat_jenis_id']="";
				$data['satuan_obat_id']="";
				$data['golongan_id']="";
				$data['dosis']="";
				$data['qtt']="";
				$data['harga_beli']="";
				$data['harga_jual']="";
				$data['apt_satuan']=$this->apt_satuan_model->Get_Apt_Satuan();
				$data['apt_gol']=$this->apt_gol_model->Get_Apt_Gol();
				$data['farmasi_obat_jenis']=$this->farmasi_obat_jenis_model->Get_Farmasi_Obat_Jenis();
				$this->template->load('template','farmasi_obats/add',$data);

			}
			else {

				$data=$this->input->post('nama_obat');
				$query=$this->farmasi_obats_model->double($data);

				if($query->num_rows>0) {
					if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
					
				?>
					<script> window.location = "<?php echo base_url(); ?>farmasi/farmasi_obats"; </script>
					<?php

				} 
				else {

					$in['id']=$this->input->post('id');
					$in['nama_obat']=$this->input->post('nama_obat');
					$in['obat_jenis_id']=$this->input->post('obat_jenis_id');
					$in['satuan_obat_id']=$this->input->post('satuan_obat_id');
					$in['golongan_id']=$this->input->post('golongan_id');
					$in['dosis']=$this->input->post('dosis');
					$in['qtt']=$this->input->post('qtt');
					$in['harga_beli']=$this->input->post('harga_beli');
					$in['harga_jual']=$this->input->post('harga_jual');
					$in['aksi']="belum";

					$this->farmasi_obats_model->insert("farmasi_obats",$in);
					$this->session->set_flashdata('message','Data Berhasil Disimpan!');
					

					?>
						<script>window.location ="<?php echo base_url();?>farmasi/farmasi_obats"; </script>
					<?php
				}

			}

		}
		else {

		$data['id']="";
		$data['nama_obat']="";
		$data['obat_jenis_id']="";
		$data['satuan_obat_id']="";
		$data['golongan_id']="";
		$data['dosis']="";
		$data['qtt']="";
		$data['harga_beli']="";
		$data['harga_jual']="";
		$data['apt_satuan']=$this->apt_satuan_model->Get_Apt_Satuan();
		$data['apt_gol']=$this->apt_gol_model->Get_Apt_Gol();
		$data['farmasi_obat_jenis']=$this->farmasi_obat_jenis_model->Get_Farmasi_Obat_Jenis();
		$this->template->load('template','farmasi_obats/add',$data);

		}

		

		
	}

	public function edit () {
		

		if ($_SERVER ["REQUEST_METHOD"]=="POST" ) {

			$this->form_validation->set_rules('nama_obat','Nama Obat','trim|required');
			$this->form_validation->set_rules('obat_jenis_id','Jenis Obat','trim|required');
			$this->form_validation->set_rules('satuan_obat_id','Satuan Obat','trim|required');
			$this->form_validation->set_rules('golongan_id','Golongan Obat','trim|required');
			$this->form_validation->set_rules('dosis','Dosis','trim|required');
			$this->form_validation->set_rules('qtt','Stok','trim|required');
			$this->form_validation->set_rules('harga_beli','Harga Beli','trim|required');
			$this->form_validation->set_rules('harga_jual','Harga Jual','trim|required');

			$pilih2['id']=$this->input->post('id');

			if ($this->form_validation->run()==FALSE) {

				$query = $this->farmasi_obats_model->edit("farmasi_obats",$pilih2);
				foreach ($query->result_array() as $tampil) {
					$data['id']=$tampil['id'];
					$data['nama_obat']=$tampil['nama_obat'];
					$data['obat_jenis_id']=$tampil['obat_jenis_id'];
					$data['satuan_obat_id']=$tampil['satuan_obat_id'];
					$data['golongan_id']=$tampil['golongan_id'];
					$data['dosis']=$tampil['dosis'];
					$data['qtt']=$tampil['qtt'];
					$data['harga_beli']=$tampil['harga_beli'];
					$data['harga_jual']=$tampil['harga_jual'];
				}
				$data['apt_satuan']=$this->apt_satuan_model->Get_Apt_Satuan();
				$data['apt_gol']=$this->apt_gol_model->Get_Apt_Gol();
				$data['farmasi_obat_jenis']=$this->farmasi_obat_jenis_model->Get_Farmasi_Obat_Jenis();
				$this->template->load('template','farmasi_obats/edit',$data);

			}
			else {

				$data=$this->input->post('nama_obat');
				$query=$this->farmasi_obats_model->double($data);

				if($query->num_rows>1) {
					if($query)$this->session->set_flashdata('message','Data Sudah Ada !');
					
				?>
					<script> window.location = "<?php echo base_url(); ?>farmasi/farmasi_obats"; </script>
					<?php

				} 
				else {


				$up['nama_obat']=$this->input->post('nama_obat');
				$up['obat_jenis_id']=$this->input->post('obat_jenis_id');
				$up['satuan_obat_id']=$this->input->post('satuan_obat_id');
				$up['golongan_id']=$this->input->post('golongan_id');
				$up['dosis']=$this->input->post('dosis');
				$up['qtt']=$this->input->post('qtt');
				$up['harga_beli']=$this->input->post('harga_beli');
				$up['harga_jual']=$this->input->post('harga_jual');
				$up['aksi']="belum";
				$id['id']=$this->input->post('id');

				$this->farmasi_obats_model->update("farmasi_obats",$up,$id);
				$this->session->set_flashdata('message','Data Berhasil Diupdate');
				

				?>
				<script>window.location="<?php echo base_url();?>farmasi/farmasi_obats"</script>
				<?php
				}

			}

		}
		else {
			$id['id'] = $this->uri->segment(4);
			$query = $this->farmasi_obats_model->edit("farmasi_obats",$id);
				foreach ($query->result_array() as $tampil) {
					$data['id']=$tampil['id'];
					$data['nama_obat']=$tampil['nama_obat'];
					$data['obat_jenis_id']=$tampil['obat_jenis_id'];
					$data['satuan_obat_id']=$tampil['satuan_obat_id'];
					$data['golongan_id']=$tampil['golongan_id'];
					$data['dosis']=$tampil['dosis'];
					$data['qtt']=$tampil['qtt'];
					$data['harga_beli']=$tampil['harga_beli'];
					$data['harga_jual']=$tampil['harga_jual'];
				}
			$data['apt_satuan']=$this->apt_satuan_model->Get_Apt_Satuan();
			$data['apt_gol']=$this->apt_gol_model->Get_Apt_Gol();
			$data['farmasi_obat_jenis']=$this->farmasi_obat_jenis_model->Get_Farmasi_Obat_Jenis();
			$this->template->load('template','farmasi_obats/edit',$data);
		
		}

		

	}

	

	public function delete () {
		
			$pilih['id']=$this->uri->segment(4);
			$this->farmasi_obats_model->delete("farmasi_obats",$pilih);
			$this->session->set_flashdata('message','Data Berhasil dihapus');
				?>
				<script>window.location="<?php echo base_url();?>farmasi/farmasi_obats"</script>
				<?php
		

	}

	public function search () {
		

			$this->form_validation->set_rules('keysearch', 'Cari Obat', 'trim|required');

			if ($this->form_validation->run()==FALSE) {

				$data['farmasi_obats'] = $this->farmasi_obats_model->Get_Farmasi_Obats();
				$this->template->load('template','farmasi_obats/index',$data);

			}
			else {

				if ($this->input->post("keysearch")=="") {
					$kata = $this->session->userdata('kata_cari');
				}
				else {
					$sess_data['kata_cari']=$this->input->post("keysearch");
					$this->session->set_userdata($sess_data);
					$kata = $this->session->userdata('kata_cari');
				}

				$data['get_data'] = $this->farmasi_obats_model->search($kata);
				$this->template->load('template','farmasi_obats/search',$data);
			}

		
	}
	 
	



	

	

	
}
