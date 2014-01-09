<?php
class list_pasien_rawat_jalan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('tbl_pasien_rawat_jalan_model');
		$this->load->model('admission_klinik_model');
	}

	public function index() {
		
		$hariini = date('Y-m-d');
		$data['data_pasien_rawat_jalan'] = $this->tbl_pasien_rawat_jalan_model->Ambil_Data_Pasien($hariini);
		$this->template->load('template','list_pasien_rawat_jalan/index',$data);
	}

	public function delete() {

		$id_pasien_rawat_jalan['id_pasien_rawat_jalan'] = $this->uri->segment(4);
		$this->tbl_pasien_rawat_jalan_model->delete("tbl_pasien_rawat_jalan",$id_pasien_rawat_jalan);
	
		?>
			<script> window.location = "<?php echo base_url(); ?>loket/list_pasien_rawat_jalan"; </script>
		<?php
	}

	public function detail() {

		
		$id_pasien_rawat_jalan = $this->uri->segment(4);
		$query = $this->tbl_pasien_rawat_jalan_model->Ambil_Data_Pasien_Detail($id_pasien_rawat_jalan);
		/*$this->db->last_query();
		die;*/
			foreach ($query->result_array() as $tampil) {
				
				$data['tgl_registrasi'] = $tampil['tgl_registrasi'];
				$data['no_rm'] = $tampil['no_rm'];
				$data['nama_lengkap'] = $tampil['nama_lengkap'];
				$data['umur'] = $tampil['umur'];
				$data['jenis_kelamin'] = $tampil['jenis_kelamin'];
				$data['alamat'] = $tampil['alamat'];
				$data['no_hp'] = $tampil['no_hp'];
				$data['nama_penanggung_jawab'] = $tampil['nama_penanggung_jawab'];
				$data['no_penanggung_jawab'] = $tampil['no_penanggung_jawab'];
				$data['hubungan_dengan_pasien'] = $tampil['hubungan_dengan_pasien'];
				$data['nama_klinik'] = $tampil['nama_klinik'];
			}
		$this->load->view('list_pasien_rawat_jalan/detail',$data);

	}

	public function edit () {

		$id_pasien_rawat_jalan = $this->uri->segment(4);
		$query = $this->tbl_pasien_rawat_jalan_model->Ambil_Data_Pasien_Edit($id_pasien_rawat_jalan);
		foreach ($query->result_array() as $tampil) {
				$data['id_pasien_rawat_jalan'] = $tampil['id_pasien_rawat_jalan'];
				$data['tgl_registrasi'] = $tampil['tgl_registrasi'];
				$data['no_rm'] = $tampil['no_rm'];
				$data['nama_lengkap'] = $tampil['nama_lengkap'];
				$data['umur'] = $tampil['umur'];
				$data['jenis_kelamin'] = $tampil['jenis_kelamin'];
				$data['alamat'] = $tampil['alamat'];
				$data['no_hp'] = $tampil['no_hp'];
				$data['nama_penanggung_jawab'] = $tampil['nama_penanggung_jawab'];
				$data['no_penanggung_jawab'] = $tampil['no_penanggung_jawab'];
				$data['hubungan_dengan_pasien'] = $tampil['hubungan_dengan_pasien'];
				$data['nama_klinik'] = $tampil['nama_klinik'];
				$data['klinik_id'] = $tampil['klinik_id'];

			}

		$data['data_klinik'] = $this->admission_klinik_model->Get_Klinik2();
		$this->load->view('list_pasien_rawat_jalan/edit',$data);
	}

	public function update () {

		$klinik = $this->input->post('klinik');
		$id_pasien_rawat_jalan = $this->input->post('id_pasien_rawat_jalan');
		$nama_penanggung_jawab = $this->input->post('nama_penanggung_jawab');
		$no_penanggung_jawab = $this->input->post('no_penanggung_jawab');
		$hubungan_dengan_pasien = $this->input->post('hubungan_dengan_pasien');

		$this->tbl_pasien_rawat_jalan_model->updatepasien($id_pasien_rawat_jalan,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien,$klinik);
	}

	public function search () {
        $kata_kunci=$this->input->post("kata_kunci");
        $data['data_pasien_rawat_jalan']=$this->tbl_pasien_rawat_jalan_model->search($kata_kunci);
        $this->template->load('template','list_pasien_rawat_jalan/search',$data);
    }
}