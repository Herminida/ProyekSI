<?php
class list_pasien_pendukung extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('tbl_pasien_pendukung_model');
		$this->load->model('tbl_pendukung_model');
	}

	public function index(){

		$hariini = date('Y-m-d');
		$data['data_pasien_pendukung'] = $this->tbl_pasien_pendukung_model->Ambil_Data_Pasien($hariini);
		$this->template->load('template','list_pasien_pendukung/index',$data);
	}

	public function delete() {

		$id_pasien_pendukung['id_pasien_pendukung'] = $this->uri->segment(4);
		$this->tbl_pasien_pendukung_model->delete("tbl_pasien_pendukung",$id_pasien_pendukung);
	
		?>
			<script> window.location = "<?php echo base_url(); ?>loket/list_pasien_pendukung"; </script>
		<?php
	}

	public function detail() {

		
		$id_pasien_pendukung = $this->uri->segment(4);
		$query = $this->tbl_pasien_pendukung_model->Ambil_Data_Pasien_Detail($id_pasien_pendukung);
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
				$data['nama_pendukung'] = $tampil['nama_pendukung'];
			}
		$this->load->view('list_pasien_pendukung/detail',$data);

	}

	public function edit () {

		$id_pasien_pendukung = $this->uri->segment(4);
		$query = $this->tbl_pasien_pendukung_model->Ambil_Data_Pasien_Edit($id_pasien_pendukung);
		foreach ($query->result_array() as $tampil) {
				$data['id_pasien_pendukung'] = $tampil['id_pasien_pendukung'];
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
				$data['nama_pendukung'] = $tampil['nama_pendukung'];
				$data['pendukung_id'] = $tampil['pendukung_id'];

			}

		$data['data_pendukung']=$this->tbl_pendukung_model->Get_Pendukung2();
		$this->load->view('list_pasien_pendukung/edit',$data);
	}

	public function update () {

		$pendukung = $this->input->post('pendukung');
		$id_pasien_pendukung = $this->input->post('id_pasien_pendukung');
		$nama_penanggung_jawab = $this->input->post('nama_penanggung_jawab');
		$no_penanggung_jawab = $this->input->post('no_penanggung_jawab');
		$hubungan_dengan_pasien = $this->input->post('hubungan_dengan_pasien');

		$this->tbl_pasien_pendukung_model->updatepasien($id_pasien_pendukung,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien,$pendukung);
	}

	public function search () {
        $kata_kunci=$this->input->post("kata_kunci");
        $data['data_pasien_pendukung']=$this->tbl_pasien_pendukung_model->search($kata_kunci);
        $this->template->load('template','list_pasien_pendukung/search',$data);
    }
}