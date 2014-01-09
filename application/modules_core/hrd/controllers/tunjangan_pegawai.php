<?php
class tunjangan_pegawai extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('sosial_agama_model');
		$this->load->model('jabatan_model');
		$this->load->model('tunjangan_pegawai_model');
		$this->load->model('tunjangan_model');
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
			$config['base_url'] = base_url() . 'hrd/tunjangan_pegawai/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['tunjangan_pegawai'] = $this->db->query("select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan 
			join sosial_agama c on a.agama_id = c.id order by a.id_pegawai desc
				LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','tunjangan_pegawai/index',$d);
	}

	public function detail () {

		$pegawai_id = $this->uri->segment(4);
		

			$data['detail_pegawai'] = $this->tunjangan_pegawai_model->Ambil_Data_Tunjangan_Pegawai($pegawai_id);
			$data['detail_tunjangan_pegawai'] = $this->tunjangan_pegawai_model->Ambil_Tunjangan_Saja($pegawai_id);
			$this->load->view('tunjangan_pegawai/detail',$data);
	}

	public function edit () {

		
			$id_pegawai = $this->uri->segment(4);
			$query = $this->pegawai_model->Ambil_Data_Pegawai3($id_pegawai);
		
			foreach ($query->result_array() as $tampil) {
				
				$data['nip_pegawai'] = $tampil['nip_pegawai'];
				$data['nama_pegawai'] = $tampil['nama_pegawai'];
				$data['nama_jabatan'] = $tampil['nama_jabatan'];
				$data['id_jabatan'] = $tampil['id_jabatan'];
				$data['id_pegawai'] = $tampil['id_pegawai'];
					
			}
			$this->load->view('tunjangan_pegawai/edit',$data);
		

		
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
			$config['base_url'] = base_url() . 'hrd/tunjangan_pegawai/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['tunjangan_pegawai'] = $this->db->query("select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan 
			join sosial_agama c on a.agama_id = c.id order by a.id_pegawai desc
				LIMIT ".$offset.",".$limit."");
			
			$this->session->set_flashdata('message','Kata Kunci Kosong !');
			$this->template->load('template','tunjangan_pegawai/index',$d);

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

				$data['tunjangan_pegawai'] = $this->pegawai_model->search($kata);
				$this->template->load('template','tunjangan_pegawai/search',$data);
			}
		
		
	}

	public function get_tunjangan () {

		$data['data_tunjangan']=$this->tunjangan_model->Ambil_Data_Tunjangan();
      	$this->load->view('tunjangan_pegawai/tunjangan',$data);
	}

	public function ajaxListTunjangan(){
		$query=$this->tunjangan_pegawai_model->get_listTunjangan();
		echo json_encode($query);//json_encode($query);
	}

	public function simpanTunjangan(){


		$id_tunjangan_pegawai=$this->input->post('id_tunjangan_pegawai');
		if (empty($id_tunjangan_pegawai)){
		 $success=$this->tunjangan_pegawai_model->insertTunjanganPegawai($this->input->post('tunjangan_id'),$this->input->post('nilai_tunjangan'),$this->input->post('pegawai_id'));
		}else{
		 $success=$this->tunjangan_pegawai_model->updateTunjanganPegawai($this->input->post('id_tunjangan_pegawai'),$this->input->post('nilai_tunjangan'));	
		 }
		 echo '{"success":"'.$success.'","error":""}';

	}

	public function cek () {

		$pegawai_id = $this->input->post('pegawai_id');
      	$tunjangan_id = $this->input->post('tunjangan_id');
      	

      $datasama = $this->tunjangan_pegawai_model->dataregsama($pegawai_id,$tunjangan_id);

      $hasil = $datasama->num_rows();

      echo $hasil;
	}

	public function ajaxListTunjanganPegawai($pegawai_id){
		$queryd['aaData']=$this->tunjangan_pegawai_model->getTunjanganPegawai($pegawai_id);
		echo json_encode($queryd);
	}

	public function deleteTunjanganPegawai(){
		$id = $this->input->post('idTunjanganPegawai');
		$success=$this->tunjangan_pegawai_model->deleteTunjangan_Pegawai($id);
	//	echo $this->db->last_query();
		echo '{"success":"'.$success.'","error":""}';

	}

	


	
}