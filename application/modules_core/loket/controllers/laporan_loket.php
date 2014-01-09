<?php
class laporan_loket extends Ci_controller{
	public function __construct()
    {
        parent::__construct();
        $this->load->model("laporan_loket_model");
    }

    public function laporan_pasien_umum(){
    	if ($_SERVER ['REQUEST_METHOD']=="POST") {
    		$tanggal=$this->input->post('tanggal');
    		$bulan=$this->input->post('bulan');
    		$tahun=$this->input->post('tahun');
    		$pilihan=$this->input->post('pilihan');
    		if($pilihan=="perhari"){
    			$data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_umum_perhari($tanggal,$bulan,$tahun);
    			$data['judul']="Laporan Data pasien tanggal " .$tanggal."-".$bulan."-".$tahun;
    			$data['pencarian']=$tanggal."-".$bulan."-".$tahun;
    		}
    		else{
    			$data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_umum_perbulan($bulan,$tahun);
    			$data['judul']="Laporan Data pasien tanggal " .$bulan."-".$tahun;
    			$data['pencarian']="x-".$bulan."-".$tahun;
    		}
    		$this->load->view('laporan_loket/hasil_laporan_pasien_umum',$data);
    	}
    	else{
    		$this->template->load('template','laporan_loket/laporan_pasien_umum');
    	}
    }

    public function laporan_pasien_umum_excel(){
    	header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=data_pasien_umum.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
    	$pencarian=$this->uri->segment(4);
    	$hasil=explode("-", $pencarian);
    	$tanggal=$hasil[0];
    	$bulan=$hasil[1];
    	$tahun=$hasil[2];
    	if($tanggal!="x"){
    		$data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_umum_perhari($tanggal,$bulan,$tahun);
    		$data['judul']="Laporan Data pasien tanggal " .$tanggal."-".$bulan."-".$tahun;
    	}
    	else{
    		$data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_umum_perbulan($bulan,$tahun);
    		$data['judul']="Laporan Data pasien tanggal " .$bulan."-".$tahun;
    	}
    	$this->load->view('laporan_loket/hasil_laporan_pasien_umum',$data);
    }

    public function laporan_pasien_rekanan(){
        if ($_SERVER ['REQUEST_METHOD']=="POST") {
            $tanggal=$this->input->post('tanggal');
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $pilihan=$this->input->post('pilihan');
            if($pilihan=="perhari"){
                $data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_rekanan_perhari($tanggal,$bulan,$tahun);
                $data['judul']="Laporan Data pasien tanggal " .$tanggal."-".$bulan."-".$tahun;
                $data['pencarian']=$tanggal."-".$bulan."-".$tahun;
            }
            else{
                $data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_rekanan_perbulan($bulan,$tahun);
                $data['judul']="Laporan Data pasien tanggal " .$bulan."-".$tahun;
                $data['pencarian']="x-".$bulan."-".$tahun;
            }
            $this->load->view('laporan_loket/hasil_laporan_pasien_rekanan',$data);
        }
        else{
            $this->template->load('template','laporan_loket/laporan_pasien_rekanan');
        }
    }

    public function laporan_pasien_rekanan_excel(){
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=data_pasien_rekanan.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        $pencarian=$this->uri->segment(4);
        $hasil=explode("-", $pencarian);
        $tanggal=$hasil[0];
        $bulan=$hasil[1];
        $tahun=$hasil[2];
        if($tanggal!="x"){
            $data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_rekanan_perhari($tanggal,$bulan,$tahun);
            $data['judul']="Laporan Data pasien tanggal " .$tanggal."-".$bulan."-".$tahun;
        }
        else{
            $data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_rekanan_perbulan($bulan,$tahun);
            $data['judul']="Laporan Data pasien tanggal " .$bulan."-".$tahun;
        }
        $this->load->view('laporan_loket/hasil_laporan_pasien_rekanan',$data);
    }

    public function laporan_pasien_internal(){
        if ($_SERVER ['REQUEST_METHOD']=="POST") {
            $tanggal=$this->input->post('tanggal');
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $pilihan=$this->input->post('pilihan');
            if($pilihan=="perhari"){
                $data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_internal_perhari($tanggal,$bulan,$tahun);
                $data['judul']="Laporan Data pasien tanggal " .$tanggal."-".$bulan."-".$tahun;
                $data['pencarian']=$tanggal."-".$bulan."-".$tahun;
            }
            else{
                $data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_internal_perbulan($bulan,$tahun);
                $data['judul']="Laporan Data pasien tanggal " .$bulan."-".$tahun;
                $data['pencarian']="x-".$bulan."-".$tahun;
            }
            $this->load->view('laporan_loket/hasil_laporan_pasien_internal',$data);
        }
        else{
            $this->template->load('template','laporan_loket/laporan_pasien_internal');
        }
    }

    public function laporan_pasien_internal_excel(){
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=data_pasien_internal.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        $pencarian=$this->uri->segment(4);
        $hasil=explode("-", $pencarian);
        $tanggal=$hasil[0];
        $bulan=$hasil[1];
        $tahun=$hasil[2];
        if($tanggal!="x"){
            $data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_internal_perhari($tanggal,$bulan,$tahun);
            $data['judul']="Laporan Data pasien tanggal " .$tanggal."-".$bulan."-".$tahun;
        }
        else{
            $data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_internal_perbulan($bulan,$tahun);
            $data['judul']="Laporan Data pasien tanggal " .$bulan."-".$tahun;
        }
        $this->load->view('laporan_loket/hasil_laporan_pasien_internal',$data);
    }

    public function laporan_pasien_ptpn(){
        if ($_SERVER ['REQUEST_METHOD']=="POST") {
            $tanggal=$this->input->post('tanggal');
            $bulan=$this->input->post('bulan');
            $tahun=$this->input->post('tahun');
            $pilihan=$this->input->post('pilihan');
            if($pilihan=="perhari"){
                $data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_ptpn_perhari($tanggal,$bulan,$tahun);
                $data['judul']="Laporan Data pasien tanggal " .$tanggal."-".$bulan."-".$tahun;
                $data['pencarian']=$tanggal."-".$bulan."-".$tahun;
            }
            else{
                $data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_ptpn_perbulan($bulan,$tahun);
                $data['judul']="Laporan Data pasien tanggal " .$bulan."-".$tahun;
                $data['pencarian']="x-".$bulan."-".$tahun;
            }
            $this->load->view('laporan_loket/hasil_laporan_pasien_ptpn',$data);
        }
        else{
            $this->template->load('template','laporan_loket/laporan_pasien_ptpn');
        }
    }

    public function laporan_pasien_ptpn_excel(){
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=data_pasien_ptpn.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        $pencarian=$this->uri->segment(4);
        $hasil=explode("-", $pencarian);
        $tanggal=$hasil[0];
        $bulan=$hasil[1];
        $tahun=$hasil[2];
        if($tanggal!="x"){
            $data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_ptpn_perhari($tanggal,$bulan,$tahun);
            $data['judul']="Laporan Data pasien tanggal " .$tanggal."-".$bulan."-".$tahun;
        }
        else{
            $data["data_pasien"]=$this->laporan_loket_model->laporan_pasien_ptpn_perbulan($bulan,$tahun);
            $data['judul']="Laporan Data pasien tanggal " .$bulan."-".$tahun;
        }
        $this->load->view('laporan_loket/hasil_laporan_pasien_ptpn',$data);
    }
}
?>