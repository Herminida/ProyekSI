<?php
class list_pasien_rawat_inap extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('tbl_pasien_rawat_inap_model');
	}

	public function index(){

		$hariini = date('Y-m-d');
		$data['data_pasien_rawat_inap'] = $this->tbl_pasien_rawat_inap_model->Ambil_Data_Pasien($hariini);
		$this->template->load('template','list_pasien_rawat_inap/index',$data);
	}

	public function delete() {

		$id_pasien_rawat_inap['id_pasien_rawat_inap'] = $this->uri->segment(4);
		$this->tbl_pasien_rawat_inap_model->delete("tbl_pasien_rawat_inap",$id_pasien_rawat_inap);
	
		?>
			<script> window.location = "<?php echo base_url(); ?>loket/list_pasien_rawat_inap"; </script>
		<?php
	}

	public function detail() {

		
		$id_pasien_rawat_inap = $this->uri->segment(4);
		$query = $this->tbl_pasien_rawat_inap_model->Ambil_Data_Pasien_Detail($id_pasien_rawat_inap);
		
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
				$data['nama_kelas_kamar'] = $tampil['nama_kelas_kamar'];
				$data['nama_ruang_kamar'] = $tampil['nama_ruang_kamar'];
			}
		$this->load->view('list_pasien_rawat_inap/detail',$data);

	}

	public function edit () {

		$id_pasien_rawat_inap = $this->uri->segment(4);
		$query = $this->tbl_pasien_rawat_inap_model->Ambil_Data_Pasien_Edit($id_pasien_rawat_inap);
		foreach ($query->result_array() as $tampil) {
				$data['id_pasien_rawat_inap'] = $tampil['id_pasien_rawat_inap'];
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
				$data['nama_kelas_kamar'] = $tampil['nama_kelas_kamar'];
				$data['nama_ruang_kamar'] = $tampil['nama_ruang_kamar'];

			}

		
		$this->load->view('list_pasien_rawat_inap/edit',$data);
	}

	public function update () {

		$id_pasien_rawat_inap = $this->input->post('id_pasien_rawat_inap');
		$nama_penanggung_jawab = $this->input->post('nama_penanggung_jawab');
		$no_penanggung_jawab = $this->input->post('no_penanggung_jawab');
		$hubungan_dengan_pasien = $this->input->post('hubungan_dengan_pasien');

		$this->tbl_pasien_rawat_inap_model->updatepasien($id_pasien_rawat_inap,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien);
	}

	public function search () {
        $kata_kunci=$this->input->post("kata_kunci");
        $data['data_pasien_rawat_inap']=$this->tbl_pasien_rawat_inap_model->search($kata_kunci);
        $this->template->load('template','list_pasien_rawat_inap/search',$data);
    }
}