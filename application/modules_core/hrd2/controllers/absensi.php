<?php
	class absensi Extends Ci_Controller{
		public function __construct () {
			parent::__construct();
			$this->load->model('absensi_model');
		}

		public function index(){
			$this->template->load('template','absensi/index');
		}
		public function add(){
			$nip_pegawai=$this->input->post("nip_pegawai");
			$tanggal_sekarang=date("Y-m-d");
			$cek=$this->absensi_model->cek_pegawai($nip_pegawai);
			if($cek->num_rows()>0){
				$cek_absen=$this->absensi_model->cek_absen($nip_pegawai,$tanggal_sekarang);
				if($cek_absen->num_rows()>0){
					foreach ($cek_absen->result_array() as $tampil) {
						$jam_keluar=$tampil['jam_keluar'];
					}
					if(empty($jam_keluar)){
						$insert=array('jam_keluar'=>date('H:i:s')
						);
						$this->absensi_model->update($nip_pegawai,$insert);
						echo "Anda berhasil Absen!";

					}
					else{
						echo "Anda sudah absen 2 x hari ini";					}

				}
				else{
					$insert=array('nip_pegawai'=>$nip_pegawai,
								  'jam_masuk'=>date('H:i:s'),
								  'tanggal_absensi'=>date('Y-m-d')
						);
					$this->absensi_model->add($insert);
					echo "Anda berhasil Absen!";
				}

			}
			else{
				echo "Data pegawai tidak ada!!!";
			}

		}

		function tampil(){
			$data['data_absensi']=$this->absensi_model->getdata();
			$this->load->view('absensi/tampil',$data);
		}

	}
?>