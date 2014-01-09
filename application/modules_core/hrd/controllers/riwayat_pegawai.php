<?php
class riwayat_pegawai extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('sosial_agama_model');
		$this->load->model('jabatan_model');
		$this->load->model('riwayat_pegawai_model');
	}

	public function index () {
		
		$page=$this->uri->segment(4);
			$limit=20;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan 
			join sosial_agama c on a.agama_id = c.id ");
			$config['base_url'] = base_url() . 'hrd/riwayat_pegawai/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['riwayat_pegawai'] = $this->db->query("select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan 
			join sosial_agama c on a.agama_id = c.id order by a.id_pegawai desc
				LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','riwayat_pegawai/index',$d);
	}

	public function detail () {

		$id_pegawai = $this->uri->segment(4);
		$query = $this->pegawai_model->Ambil_Data_Pegawai2($id_pegawai);
		
			foreach ($query->result_array() as $tampil) {
				
				$data['nip_pegawai'] = $tampil['nip_pegawai'];
				$data['nama_pegawai'] = $tampil['nama_pegawai'];
				$data['nama_jabatan'] = $tampil['nama_jabatan'];
				$data['nama_agama'] = $tampil['nama_agama'];
				$data['status'] = $tampil['status'];
				$data['jenis_kelamin'] = $tampil['jenis_kelamin'];
				$data['tempat_lahir'] = $tampil['tempat_lahir'];
				$data['tgl_lahir'] = $tampil['tanggal'];
				$data['alamat'] = $tampil['alamat'];
				$data['email'] = $tampil['email'];
				$data['telepon'] = $tampil['telepon'];
				$data['gambar'] = $tampil['gambar'];
				$data['riwayat'] = $tampil['riwayat'];
				
				
				
				
			}
		$this->load->view('riwayat_pegawai/detail',$data);
	}

	public function edit () {

		if ($_SERVER['REQUEST_METHOD']=='POST') {

			$id_pegawai['id_pegawai'] = $this->input->post('id_pegawai');
			$in_data['riwayat'] = $this->input->post('riwayat');

			$this->pegawai_model->updateData("pegawai",$in_data,$id_pegawai);
			$this->session->set_flashdata('message','Data Berhasil Ditambahkan !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php

		}
		else {
			$id_pegawai = $this->uri->segment(4);
			$query = $this->pegawai_model->Ambil_Data_Pegawai2($id_pegawai);
		
			foreach ($query->result_array() as $tampil) {
				
				$data['nip_pegawai'] = $tampil['nip_pegawai'];
				$data['nama_pegawai'] = $tampil['nama_pegawai'];
				$data['nama_jabatan'] = $tampil['nama_jabatan'];
				$data['nama_agama'] = $tampil['nama_agama'];
				$data['status'] = $tampil['status'];
				$data['jenis_kelamin'] = $tampil['jenis_kelamin'];
				$data['tempat_lahir'] = $tampil['tempat_lahir'];
				$data['tgl_lahir'] = $tampil['tanggal'];
				$data['alamat'] = $tampil['alamat'];
				$data['email'] = $tampil['email'];
				$data['telepon'] = $tampil['telepon'];
				$data['gambar'] = $tampil['gambar'];
				$data['riwayat'] = $tampil['riwayat'];
				$data['id_pegawai'] = $tampil['id_pegawai'];
					
			}
			$this->load->view('riwayat_pegawai/edit',$data);
		}

		
	}

	public function search()
	{
		
			$this->form_validation->set_rules('keysearch', 'Cari Pegawai', 'trim|required');

			if ($this->form_validation->run()==FALSE) {

				$page=$this->uri->segment(4);
			$limit=20;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan 
			join sosial_agama c on a.agama_id = c.id ");
			$config['base_url'] = base_url() . 'hrd/pegawai/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['riwayat_pegawai'] = $this->db->query("select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan 
			join sosial_agama c on a.agama_id = c.id order by a.id_pegawai desc
				LIMIT ".$offset.",".$limit."");
			
			$this->session->set_flashdata('message','Kata Kunci Kosong !');
			$this->template->load('template','riwayat_pegawai/index',$d);

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

				$data['riwayat_pegawai'] = $this->pegawai_model->search($kata);
				$this->template->load('template','riwayat_pegawai/search',$data);
			}
		
		
	}

	


	
}