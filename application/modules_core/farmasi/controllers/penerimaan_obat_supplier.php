<?php
class penerimaan_obat_supplier extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('sosial_agama_model');
		$this->load->model('jabatan_model');
		$this->load->model('penerimaan_obat_supplier_model');
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
			$config['base_url'] = base_url() . 'farmasi/penerimaan_obat_supplier/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['penerimaan_obat_supplier'] = $this->db->query("select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan 
			join sosial_agama c on a.agama_id = c.id order by a.id_pegawai desc
				LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','penerimaan_obat_supplier/index',$d);
	}

	public function detail () {

		$pegawai_id = $this->uri->segment(4);
		

			$data['detail_pegawai'] = $this->penerimaan_obat_supplier_model->Ambil_Data_Tunjangan_Pegawai($pegawai_id);
			$data['detail_penerimaan_obat_supplier'] = $this->penerimaan_obat_supplier_model->Ambil_Tunjangan_Saja($pegawai_id);
			$this->load->view('penerimaan_obat_supplier/detail',$data);
	}

	public function add(){
		echo "asdasd";
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
			$this->load->view('penerimaan_obat_supplier/edit',$data);
		

		
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
			$config['base_url'] = base_url() . 'farmasi/penerimaan_obat_supplier/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['penerimaan_obat_supplier'] = $this->db->query("select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan 
			join sosial_agama c on a.agama_id = c.id order by a.id_pegawai desc
				LIMIT ".$offset.",".$limit."");
			
			$this->session->set_flashdata('message','Kata Kunci Kosong !');
			$this->template->load('template','penerimaan_obat_supplier/index',$d);

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

				$data['penerimaan_obat_supplier'] = $this->pegawai_model->search($kata);
				$this->template->load('template','penerimaan_obat_supplier/search',$data);
			}
		
		
	}

	public function get_tunjangan () {

		$data['data_tunjangan']=$this->tunjangan_model->Ambil_Data_Tunjangan();
      	$this->load->view('penerimaan_obat_supplier/tunjangan',$data);
	}

	public function ajaxListTunjangan(){
		$query=$this->penerimaan_obat_supplier_model->get_listTunjangan();
		echo json_encode($query);//json_encode($query);
	}

	public function simpanTunjangan(){


		$id_penerimaan_obat_supplier=$this->input->post('id_penerimaan_obat_supplier');
		if (empty($id_penerimaan_obat_supplier)){
		 $success=$this->penerimaan_obat_supplier_model->insertTunjanganPegawai($this->input->post('tunjangan_id'),$this->input->post('nilai_tunjangan'),$this->input->post('pegawai_id'));
		}else{
		 $success=$this->penerimaan_obat_supplier_model->updateTunjanganPegawai($this->input->post('id_penerimaan_obat_supplier'),$this->input->post('nilai_tunjangan'));	
		 }
		 echo '{"success":"'.$success.'","error":""}';

	}

	public function cek () {

		$pegawai_id = $this->input->post('pegawai_id');
      	$tunjangan_id = $this->input->post('tunjangan_id');
      	

      $datasama = $this->penerimaan_obat_supplier_model->dataregsama($pegawai_id,$tunjangan_id);

      $hasil = $datasama->num_rows();

      echo $hasil;
	}

	public function ajaxListTunjanganPegawai($pegawai_id){
		$queryd['aaData']=$this->penerimaan_obat_supplier_model->getTunjanganPegawai($pegawai_id);
		echo json_encode($queryd);
	}

	public function deleteTunjanganPegawai(){
		$id = $this->input->post('idTunjanganPegawai');
		$success=$this->penerimaan_obat_supplier_model->deletepenerimaan_obat_supplier($id);
	//	echo $this->db->last_query();
		echo '{"success":"'.$success.'","error":""}';

	}

	


	
}