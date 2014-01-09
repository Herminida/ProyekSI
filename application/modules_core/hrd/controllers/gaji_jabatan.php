<?php
class gaji_jabatan extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('gaji_model');
		$this->load->model('jabatan_model');
		$this->load->model('gaji_jabatan_model');
		
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
			$tot_hal = $this->db->query("select a.*,c.nama_gaji,b.nama_jabatan as nama_jabatan from gaji_jabatan a join jabatan b on a.jabatan_id = b.id_jabatan join gaji c on a.gaji_id = c.id_gaji");
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
			
			$d['gaji_jabatan'] = $this->db->query("select a.*,c.nama_gaji,b.nama_jabatan as nama_jabatan from gaji_jabatan a join jabatan b on a.jabatan_id = b.id_jabatan join gaji c on a.gaji_id = c.id_gaji
				order by a.id_gaji_jabatan desc
				LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','gaji_jabatan/index',$d);
	}

	public function detail () {

		$id_gaji_jabatan = $this->uri->segment(4);
		$query = $this->gaji_jabatan_model->ambilDataById($id_gaji_jabatan);
		
			foreach ($query->result_array() as $tampil) {
				
				$data['id_gaji'] = $tampil['id_gaji_jabatan'];
				$data['nama_gaji'] = $tampil['nama_gaji'];
				$data['nama_jabatan'] = $tampil['nama_jabatan'];
				$data['nilai_gaji'] = $tampil['nilai_gaji_jabatan'];
				
				
				

			}
		$this->load->view('gaji_jabatan/detail',$data);
	}

	public function edit () {

		
			$id_gaji_jabatan = $this->uri->segment(4);
			$query = $this->gaji_jabatan_model->ambilDataById($id_gaji_jabatan);
		
			foreach ($query->result_array() as $tampil) {
				
				$data['id_gaji'] = $tampil['id_gaji_jabatan'];
				$data['nama_gaji'] = $tampil['id_gaji'];
				$data['nama_jabatan'] = $tampil['id_jabatan'];
				$data['nilai_gaji'] = $tampil['nilai_gaji_jabatan'];
			}
			$this->load->view('gaji_jabatan/add',$data);
		

		
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

		$success=$this->tunjangan_pegawai_model->insertTunjanganPegawai($this->input->post('tunjangan_id'),$this->input->post('nilai_tunjangan'),$this->input->post('pegawai_id'));
		 
		
		
	
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

	public function getListGaji(){
		$data = $this->gaji_model->ambilData();
		$data = $data->result();
		echo json_encode($data);
	}

	public function getListJabatan(){
		$data = $this->jabatan_model->Ambil_Data_Jabatan();
		$data = $data->result();
		echo json_encode($data);
	}

	public function add() {

		if ($_SERVER ['REQUEST_METHOD']=="POST") {
				if ($this->input->post('id_gaji_jabatan')==''){
					$query = $this->gaji_jabatan_model->double();

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Data Sudah Ada !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php
					}

					}
					else {

					
			$data['gaji_id'] = $this->input->post('id_gaji');
			$data['jabatan_id'] = $this->input->post('id_jabatan');
			$data['nilai_gaji_jabatan'] = $this->input->post('nilai_gaji');
			
			if($this->input->post('id_gaji_jabatan')==''){
			$this->gaji_model->insert("gaji_jabatan",$data);
			$this->session->set_flashdata('message','Data Berhasil Ditambahkan !');
			}else{
			$where['id_gaji_jabatan'] = $this->input->post('id_gaji_jabatan');
			$this->gaji_model->update("gaji_jabatan",$data,$where);
			$this->session->set_flashdata('message','Data Berhasil Diupdate !');
			}

			
				?>
			<script>
					window.parent.location.reload(true);
			</script>
			<?php
			}
	

			}
			else {

				$this->load->view('gaji_jabatan/add');
			}

		
	}

	


	
}