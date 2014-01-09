<?php
class pegawai extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->model('sosial_agama_model');
		$this->load->model('jabatan_model');
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
			
			$d['pegawai'] = $this->db->query("select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan 
			join sosial_agama c on a.agama_id = c.id order by a.id_pegawai desc
				LIMIT ".$offset.",".$limit."");
			
			$this->template->load('template','pegawai/index',$d);
		

		/*$data['pegawai'] = $this->pegawai_model->Ambil_Data_Pegawai();
		$this->template->load('template','pegawai/index',$data);*/
	}

	public function cek () {

		$nip_pegawai = $this->input->post('nip_pegawai');
      	$datasama = $this->pegawai_model->dataregsama($nip_pegawai);

      	$hasil = $datasama->num_rows();

      	echo $hasil;



	}



	public function add() {

		if ($_SERVER ['REQUEST_METHOD']=="POST") {

			
				$this->form_validation->set_rules('nip_pegawai', 'Nip Pegawai', 'trim|required');
				$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required');
				$this->form_validation->set_rules('agama_id', 'Agama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
				$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
				$this->form_validation->set_rules('fk_jabatan', 'Jabatan', 'trim|required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$data['data_jabatan'] = $this->jabatan_model->Ambil_Data_Jabatan();
				$data['data_agama'] = $this->sosial_agama_model->Ambil_Data_Agama();
				$this->load->view('pegawai/add',$data);
				}
				else
				{

					$config['upload_path'] = './images/pegawai/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/pegawai/".$data['file_name'] ;
						$destination_thumb	= "./images/pegawai/thumb/" ;
						$destination_medium	= "./images/pegawai/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 200 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;


						
						$in_data['nama_pegawai'] = $this->input->post("nama_pegawai");
						$in_data['nip_pegawai'] = $this->input->post("nip_pegawai");
						$in_data['fk_jabatan'] = $this->input->post("fk_jabatan");
						$in_data['status'] = $this->input->post("status");
						$in_data['jenis_kelamin'] = $this->input->post("jenis_kelamin");
						$in_data['tempat_lahir'] = $this->input->post("tempat_lahir");
						$in_data['tgl_lahir'] = $this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
						$in_data['agama_id'] = $this->input->post("agama_id");
						$in_data['alamat'] = $this->input->post("alamat");
						$in_data['email'] = $this->input->post("email");
						$in_data['telepon'] = $this->input->post("telepon");
						$in_data['gambar'] = $data['file_name'];
						
						$this->db->insert("pegawai",$in_data);
				
						unlink($source);

						$this->session->set_flashdata('message','Data Berhasil Ditambahkan !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}

			}
			else {

				$data['data_jabatan'] = $this->jabatan_model->Ambil_Data_Jabatan();
				$data['data_agama'] = $this->sosial_agama_model->Ambil_Data_Agama();
				$this->load->view('pegawai/add',$data);
			}

		
	}

	public function delete() {

		$id['id_pegawai'] = $this->uri->segment(4);
		$this->pegawai_model->deleteData("pegawai",$id);
		$this->session->set_flashdata('message','Data Berhasil Dihapus !');
	
		?>
			<script> window.location = "<?php echo base_url(); ?>hrd/pegawai"; </script>
		<?php
	}

	public function edit() {

		if ($_SERVER['REQUEST_METHOD']=='POST') {

				

				$this->form_validation->set_rules('nip_pegawai', 'Nip Pegawai', 'trim|required');
				$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required');
				$this->form_validation->set_rules('agama_id', 'Agama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
				$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
				$this->form_validation->set_rules('fk_jabatan', 'Jabatan', 'trim|required');

				if ($this->form_validation->run() == FALSE)
				{
					$id['id_pegawai'] = $this->input->post('id_pegawai');
					$query= $this->pegawai_model->edit("pegawai",$id);
					foreach ($query->result() as $tampil) {
					$data['id_pegawai'] = $tampil->id_pegawai;
					$data['nip_pegawai'] = $tampil->nip_pegawai;
					$data['nama_pegawai'] = $tampil->nama_pegawai;
					$data['status'] = $tampil->status;
					$data['jenis_kelamin'] = $tampil->jenis_kelamin;
					$data['tempat_lahir'] = $tampil->tempat_lahir;
					$data['agama_id'] = $tampil->agama_id;
					$data['alamat'] = $tampil->alamat;
					$data['email'] = $tampil->email;
					$data['telepon'] = $tampil->telepon;
					$data['fk_jabatan'] = $tampil->fk_jabatan;
				


				}
					$query= $this->pegawai_model->gettanggal($data['id_pegawai']);
			        $query=($query->result());
			        $data['tgl'] =$query[0]->tgl;
			        $data['bln'] =$query[0]->bln;
			        $data['thn'] =$query[0]->thn;

			        $data['data_agama']=$this->sosial_agama_model->Get_Agama();
			        $data['data_jabatan']=$this->jabatan_model->Get_Jabatan();


					$this->load->view('pegawai/edit',$data);
				}
				else
				{
					/*$nip_pegawai = $this->input->post('nip_pegawai');
					$query = $this->pegawai_model->dataregsama($nip_pegawai);

					if ($query->num_rows>0) {

						$this->session->set_flashdata('message','Update Gagal, NIP Sudah Terpakai !');

						?>
						<script>
							window.parent.location.reload(true);
						</script>
						<?php 

					}
					else {*/


				if(empty($_FILES['userfile']['name']))
				{
						$in_data['nama_pegawai'] = $this->input->post("nama_pegawai");
						$in_data['nip_pegawai'] = $this->input->post("nip_pegawai");
						$in_data['fk_jabatan'] = $this->input->post("fk_jabatan");
						$in_data['status'] = $this->input->post("status");
						$in_data['jenis_kelamin'] = $this->input->post("jenis_kelamin");
						$in_data['tempat_lahir'] = $this->input->post("tempat_lahir");
						$in_data['tgl_lahir'] = $this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
						$in_data['agama_id'] = $this->input->post("agama_id");
						$in_data['alamat'] = $this->input->post("alamat");
						$in_data['email'] = $this->input->post("email");
						$in_data['telepon'] = $this->input->post("telepon");
					$in_id['id_pegawai'] =$this->input->post("id_pegawai");
					$this->pegawai_model->updateData("pegawai",$in_data,$in_id);
					$this->session->set_flashdata('message','Data Berhasil DiUpdate !');

					?>
						<script>window.parent.location.reload(true);</script>
					<?php
				}
				else
				{
					$config['upload_path'] = './images/pegawai/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./images/pegawai/".$data['file_name'] ;
						$destination_thumb	= "./images/pegawai/thumb/" ;
						$destination_medium	= "./images/pegawai/medium/" ;
			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_medium   = 800 ;
						$limit_thumb    = 200 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_medium = $limit_medium/$limit_use ;
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
	 
						////// Making MEDIUM /////////////
						$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
						$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_medium ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$in_data['nama_pegawai'] = $this->input->post("nama_pegawai");
						$in_data['nip_pegawai'] = $this->input->post("nip_pegawai");
						$in_data['fk_jabatan'] = $this->input->post("fk_jabatan");
						$in_data['status'] = $this->input->post("status");
						$in_data['jenis_kelamin'] = $this->input->post("jenis_kelamin");
						$in_data['tempat_lahir'] = $this->input->post("tempat_lahir");
						$in_data['tgl_lahir'] = $this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
						$in_data['agama_id'] = $this->input->post("agama_id");
						$in_data['alamat'] = $this->input->post("alamat");
						$in_data['email'] = $this->input->post("email");
						$in_data['telepon'] = $this->input->post("telepon");
						$in_data['gambar'] = $data['file_name'];
						$in_id['id_pegawai'] = $this->input->post("id_pegawai");
					
						$this->pegawai_model->updateData("pegawai",$in_data,$in_id);
				
						$old_thumb	= "./images/pegawai/thumb/".$this->input->post("gambar")."" ;
						$old_medium	= "./images/pegawai/medium/".$this->input->post("gambar")."" ;
						

						$this->session->set_flashdata('message','Data Berhasil Diupdate !');
						
						?>
							<script>window.parent.location.reload(true);</script>
						<?php
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				/*}*/
			}

			}

			}
			else {
				
				$id['id_pegawai'] = $this->uri->segment(4);
				$query= $this->pegawai_model->edit("pegawai",$id);
				foreach ($query->result() as $tampil) {
				$data['id_pegawai'] = $tampil->id_pegawai;
				$data['nip_pegawai'] = $tampil->nip_pegawai;
				$data['nama_pegawai'] = $tampil->nama_pegawai;
				$data['status'] = $tampil->status;
				$data['jenis_kelamin'] = $tampil->jenis_kelamin;
				$data['tempat_lahir'] = $tampil->tempat_lahir;
				$data['agama_id'] = $tampil->agama_id;
				$data['alamat'] = $tampil->alamat;
				$data['email'] = $tampil->email;
				$data['telepon'] = $tampil->telepon;
				$data['fk_jabatan'] = $tampil->fk_jabatan;
				


				}
				$query= $this->pegawai_model->gettanggal($data['id_pegawai']);
        $query=($query->result());
        $data['tgl'] =$query[0]->tgl;
        $data['bln'] =$query[0]->bln;
        $data['thn'] =$query[0]->thn;

        $data['data_agama']=$this->sosial_agama_model->Get_Agama();
        $data['data_jabatan']=$this->jabatan_model->Get_Jabatan();


				$this->load->view('pegawai/edit',$data);
			}
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
				
				
				
				
			}
		$this->load->view('pegawai/detail',$data);
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
			
			$d['pegawai'] = $this->db->query("select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan 
			join sosial_agama c on a.agama_id = c.id order by a.id_pegawai desc
				LIMIT ".$offset.",".$limit."");
			
			$this->session->set_flashdata('message','Kata Kunci Kosong !');
			$this->template->load('template','pegawai/index',$d);

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

				$data['pegawai'] = $this->pegawai_model->search($kata);
				$this->template->load('template','pegawai/search',$data);
			}
		
		
	}
}