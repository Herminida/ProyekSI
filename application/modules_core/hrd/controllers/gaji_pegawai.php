<?php
class gaji_pegawai extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( 'pegawai_model' );
		$this->load->model( 'sosial_agama_model' );
		$this->load->model( 'jabatan_model' );
		$this->load->model( 'gaji_pegawai_model' );
		$this->load->model( 'gaji_model' );
	}

	public function index() {

		$page=$this->uri->segment( 4 );
		$limit=20;
		if ( !$page ):
			$offset = 0;
		else:
			$offset = $page;
		endif;

		$d['tot'] = $offset;
		$tot_hal = $this->db->query( "select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan
			join sosial_agama c on a.agama_id = c.id " );
		$config['base_url'] = base_url() . 'hrd/gaji_pegawai/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize( $config );
		$d["paginator"] =$this->pagination->create_links();

		$d['gaji_pegawai'] = $this->db->query( "select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan
			join sosial_agama c on a.agama_id = c.id order by a.id_pegawai desc
				LIMIT ".$offset.",".$limit."" );

		$this->template->load( 'template', 'gaji_pegawai/index', $d );
	}

	public function detail() {

		$id_pegawai = $this->uri->segment( 4 );
		$query = $this->gaji_pegawai_model->Ambil_Data_Gaji_Pegawai( $id_pegawai );

		foreach ( $query->result_array() as $tampil ) {

			$data['nip_pegawai'] = $tampil['nip_pegawai'];
			$data['nama_pegawai'] = $tampil['nama_pegawai'];
			$data['nama_jabatan'] = $tampil['nama_jabatan'];

		}
		$this->load->view( 'gaji_pegawai/detail', $data );
	}

	public function edit() {


		$id_pegawai = $this->uri->segment( 4 );
		$query = $this->pegawai_model->Ambil_Data_Pegawai3( $id_pegawai );

		foreach ( $query->result_array() as $tampil ) {

			$data['nip_pegawai'] = $tampil['nip_pegawai'];
			$data['nama_pegawai'] = $tampil['nama_pegawai'];
			$data['nama_jabatan'] = $tampil['nama_jabatan'];
			$data['id_jabatan'] = $tampil['id_jabatan'];
			$data['id_pegawai'] = $tampil['id_pegawai'];

		}
		$this->load->view( 'gaji_pegawai/edit', $data );



	}

	public function search() {

		$this->form_validation->set_rules( 'keysearch', 'Cari Pegawai', 'trim|required' );

		if ( $this->form_validation->run()==FALSE ) {

			$page=$this->uri->segment( 4 );
			$limit=20;
			if ( !$page ):
				$offset = 0;
			else:
				$offset = $page;
			endif;

			$d['tot'] = $offset;
			$tot_hal = $this->db->query( "select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan
			join sosial_agama c on a.agama_id = c.id " );
			$config['base_url'] = base_url() . 'hrd/gaji_pegawai/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$this->pagination->initialize( $config );
			$d["paginator"] =$this->pagination->create_links();

			$d['gaji_pegawai'] = $this->db->query( "select a.*,b.nama_jabatan as nama_jabatan,c.nama_agama as nama_agama from pegawai a join jabatan b on a.fk_jabatan=b.id_jabatan
			join sosial_agama c on a.agama_id = c.id order by a.id_pegawai desc
				LIMIT ".$offset.",".$limit."" );

			$this->session->set_flashdata( 'message', 'Kata Kunci Kosong !' );
			$this->template->load( 'template', 'gaji_pegawai/index', $d );

		}
		else {

			if ( $this->input->post( "keysearch" )=="" ) {
				$kata = $this->session->userdata( 'kata_cari' );
			}
			else {
				$sess_data['kata_cari']=$this->input->post( "keysearch" );
				$this->session->set_userdata( $sess_data );
				$kata = $this->session->userdata( 'kata_cari' );
			}

			$data['gaji_pegawai'] = $this->pegawai_model->search( $kata );
			$this->template->load( 'template', 'gaji_pegawai/search', $data );
		}


	}

	public function get_gaji() {

		$data['data_gaji']=$this->gaji_model->Ambil_Data_Gaji();
		$this->load->view( 'gaji_pegawai/gaji', $data );
	}

	public function ajaxListGaji() {
		$query=$this->gaji_pegawai_model->get_listGaji();
		echo json_encode( $query );//json_encode($query);
	}

	public function simpanGaji() {


		$id_gaji_pegawai=$this->input->post( 'id_gaji_pegawai' );
		if ( empty( $id_gaji_pegawai ) ) {
			$success=$this->gaji_pegawai_model->insertGajiPegawai( $this->input->post( 'gaji_id' ), $this->input->post( 'nilai_gaji' ), $this->input->post( 'pegawai_id' ) );
		}else {
			$success=$this->gaji_pegawai_model->updateGajiPegawai( $this->input->post( 'id_gaji_pegawai' ), $this->input->post( 'gaji_id' ), $this->input->post( 'nilai_gaji' ) );
		}
		echo '{"success":"'.$success.'","error":""}';

	}

	public function hapus() {
		$data['id_gaji_pegawai']=$this->input->post( 'id_gaji_pegawai' );
		$success=$this->gaji_pegawai_model->deleteGajiPegawai( "gaji_pegawai", $data );
		echo '{"success":"'.$success.'","error":""}';
	}

	public function cek() {

		$pegawai_id = $this->input->post( 'pegawai_id' );
		$gaji_id = $this->input->post( 'gaji_id' );


		$datasama = $this->gaji_pegawai_model->dataregsama( $pegawai_id, $gaji_id );

		$hasil = $datasama->num_rows();

		echo $hasil;
	}

	public function ajaxListGajiPegawai( $pegawai_id ) {
		$queryd['aaData']=$this->gaji_pegawai_model->getGajiPegawai( $pegawai_id );
		echo json_encode( $queryd );
	}





}
