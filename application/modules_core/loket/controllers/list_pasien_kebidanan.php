<?php
class list_pasien_kebidanan extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('tbl_pasien_kebidanan_model');
	}

	public function index(){

		$hariini = date('Y-m-d');
		$data['data_pasien_kebidanan'] = $this->tbl_pasien_kebidanan_model->Ambil_Data_Pasien($hariini);
		$this->template->load('template','list_pasien_kebidanan/index',$data);
	}

	public function delete() {

		$id_pasien_kebidanan['id_pasien_kebidanan'] = $this->uri->segment(4);
		$this->tbl_pasien_kebidanan_model->delete("tbl_pasien_kebidanan",$id_pasien_kebidanan);
	
		?>
			<script> window.location = "<?php echo base_url(); ?>loket/list_pasien_kebidanan"; </script>
		<?php
	}

	public function detail() {

		
		$id_pasien_kebidanan = $this->uri->segment(4);
		$query = $this->tbl_pasien_kebidanan_model->Ambil_Data_Pasien_Detail($id_pasien_kebidanan);
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
				
			}
		$this->load->view('list_pasien_kebidanan/detail',$data);

	}

	public function edit () {

		$id_pasien_kebidanan = $this->uri->segment(4);
		$query = $this->tbl_pasien_kebidanan_model->Ambil_Data_Pasien_Edit($id_pasien_kebidanan);
		foreach ($query->result_array() as $tampil) {
				$data['id_pasien_kebidanan'] = $tampil['id_pasien_kebidanan'];
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
				

			}

		
		$this->load->view('list_pasien_kebidanan/edit',$data);
	}

	public function update () {

		
		$id_pasien_kebidanan = $this->input->post('id_pasien_kebidanan');
		$nama_penanggung_jawab = $this->input->post('nama_penanggung_jawab');
		$no_penanggung_jawab = $this->input->post('no_penanggung_jawab');
		$hubungan_dengan_pasien = $this->input->post('hubungan_dengan_pasien');

		$this->tbl_pasien_kebidanan_model->updatepasien($id_pasien_kebidanan,$nama_penanggung_jawab,$no_penanggung_jawab,$hubungan_dengan_pasien);
	}

	public function search () {
        $kata_kunci=$this->input->post("kata_kunci");
        $data['data_pasien_kebidanan']=$this->tbl_pasien_kebidanan_model->search($kata_kunci);
        $this->template->load('template','list_pasien_kebidanan/search',$data);
    }
}