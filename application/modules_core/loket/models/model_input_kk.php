<?php
Class Model_input_kk extends CI_Model {
	function __construct(){
		parent::__construct();	
	}
        
        function getkepalakk(){
            $this->db->select('select a.no_kk,
                               a.nama_kk,
                               a.alamat,
                               a.rt,
                               a.rw,
                               b.nama_kelurahan,
                               c.nama_kecamatan');
            $this->db->from('sosial_kepala_keluarga a, sosial_kelurahan b, sosial_kecamatan c');
            $this->db->where('a.id_kelurahan=b.id_kelurahan and b.id_kecamatan=c.id_kecamatan');
            $this->db->order_by('id_kelurahan','DESC');
            $getData = $this->db->get('', $perPage, $uri);
            if($getData->num_rows() > 0)
                return $getData->result_array();
            else
                return null;
            
        }
	
	function getkecamatan(){
		$result = $this->db->get('sosial_kecamatan');
		if ($result->num_rows() > 0 ){
			return $result->result_array();	
		}
		else{
			return array();	
		}
	}
	
	function getkelurahan($id_kecamatan){
		$this->db->where('id_kecamatan',$id_kecamatan);
		$result = $this->db->get('sosial_kelurahan');
		if ($result->num_rows() > 0 ){
			return $result->result_array();	
		}
		else{
			return array();	
		}
	}
        
        function insertdata($tabel,$data) {
            $this->db->insert($tabel,$data);
        }
        
        function getagama () {
            $data=$this->db->query('select * from sosial_agama order by sosial_agama.id desc ');
            return $data;
        }
        
        function getkk () {
            $data=$this->db->query('select * from sosial_kepala_keluarga order by sosial_kepala_keluarga.id desc ');
            return $data;
        }
        function getidkk($no_kk){
            $this->db->where('no_kk',$no_kk);
           return  $this->db->get('sosial_kepala_keluarga');
        }


        function getpekerjaan () {
            $data = $this->db->query ('select * from sosial_pekerjaan order by sosial_pekerjaan.id desc');
            return $data;
                    
        }
        
        function getpendidikan () {
            $data = $this->db->query('select * from sosial_pendidikan order by sosial_pendidikan.id desc');
            return $data;
        }
        
        function getstatusbayar () {
            $data = $this->db->query ('select * from admission_bayar order by admission_bayar.id desc');
            return $data;
        }
        
        function getstatusanggota () {
            $data = $this->db->query('select * from sosial_status_anggota order by sosial_status_anggota.id desc');
            return $data;
        }
        
         function addanggotakk($in) {
            $this->db->insert('sosial_detail_kepala_keluarga',$in);
        }
        
        function cari($no_kk,$nama_kk){
            $result=$this->db->query("select * from sosial_kepala_keluarga where no_kk like '%$no_kk%' or nama_kk like'%$nama_kk%'");
            if($result->num_rows()>0){
                return $result->result_array();
            }
            else{
                return array();
            }
        }
}

?>