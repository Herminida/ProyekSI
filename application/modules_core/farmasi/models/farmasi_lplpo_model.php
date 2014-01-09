<?php
class Farmasi_lplpo_model extends CI_Model {

	public function getlplpoBydate ($tanggal) {
            $this->db->select('*');
            $this->db->from('farmasi_lplpo');
            $this->db->like('tanggal_lplpo',$tanggal);
            $sql=$this->db->get();
            return $sql;
	}

	public function getPengeluaranBydate($tanggal1,$tanggal2) {
            
            $this->db->select("sum(jumlah) as jumlah,obat_id");
            $this->db->from('farmasi_pengeluaran_item a');
            $this->db->join('farmasi_pengeluaran_header b','b.id=a.keluar_id');
            $this->db->where('b.tanggal_keluar >=',$tanggal1);
            $this->db->where('b.tanggal_keluar <=',$tanggal2);
            $sql=$this->db->get();
            return $sql;
	}

        public function getPenerimaanBydate($tanggal1,$tanggal2) {
            
            $this->db->select("sum(a.jumlah) as jumlah,a.obat_id");
            $this->db->from('farmasi_penerimaan_header b');
            $this->db->join('farmasi_penerimaan_item a','b.id=a.terima_id');
            $this->db->where('b.tanggal_terima >=',$tanggal1);
            $this->db->where('b.tanggal_terima <=',$tanggal2);
            $this->db->group_by(array("a.obat_id"));
            $sql=$this->db->get();
            return $sql;
	}

        public function getStokawalBydate($tanggal) {
            
            $this->db->select("obat_id,stok_real");
            $this->db->from('farmasi_lplpo');
            $this->db->like('tanggal_lplpo',$tanggal);
            $sql=$this->db->get();
            return $sql;
	}
        
        public function generateLplpo($data){
            return $this->db->insert('farmasi_lplpo',$data);
        }


        public function delete ($table,$data) {

		return $this->db->delete($table,$data);
	}

	public function insert ($table,$data) {

		return $this->db->insert($table,$data);
	}

	public function double ($data) {

		return $this->db->query("select * from farmasi_obats where BINARY nama_obat='$data' ");
	}

	public function search ($kata) {

		return $this->db->query("select *
			from farmasi_obats a join farmasi_obat_jenis b on a.obat_jenis_id=b.id  
			join apt_satuan c on a.satuan_obat_id = c.id_satuan
			join apt_gol d on a.golongan_id = d.id_golongan
			where a.nama_obat like '%".$kata."%' or a.dosis like '%".$kata."%' or b.nama_obat_jenis like '%".$kata."%' or c.nama_satuan like '%".$kata."%' or d.nama_golongan like '%".$kata."%' ");
	}
	public function edit ($table,$data) {

		return $this->db->get_where($table,$data);
	}

	public function update ($table,$data,$field_key) {

		return $this->db->update($table,$data,$field_key);
		//echo $this->db->last_query();
	}

	public function Ambil_ID_Obats($obat_id) {
		return $this->db->query("select id,qtt from farmasi_obats where nama_obat='$obat_id'");
	}

	public function Updates_Obats($obat_id) {

		return $this->db->query ("update farmasi_obats  SET  aksi = 'belum' where nama_obat ='$obat_id' ");
	}

	

	public function Update_Obats($nama_obat) {

		$this->db->query ("update farmasi_obats  SET  aksi = 'sudah' where nama_obat ='$nama_obat' ");
	}

	public function Update_Batal($nama_obat) {

		$this->db->query ("update farmasi_obats  SET  aksi = 'belum' where nama_obat ='$nama_obat' ");
	}
}