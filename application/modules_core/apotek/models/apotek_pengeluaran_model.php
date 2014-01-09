<?php

class Apotek_pengeluaran_model extends CI_Model {

	public function lookup($keyword){
		$this->db->where('aksi','belum');
		$this->db->select('*')->from('farmasi_obats');
        $this->db->like('nama_obat',$keyword,'after');
        $query = $this->db->get();    
        
        return $query->result();
	}

	public function getregistrasi ($tgl) {
		$this->db->select('*');
		$this->db->from('admission_registrasi');
		$this->db->where('tanggal_registrasi',$tgl);
		$sql=$this->db->get();

		return $sql;
	}

	public function Ambil_Semua ($offset,$limit) {

		return  $this->db->query("
                select farmasi_pengeluaran.tanggal_keluar, farmasi_pengeluaran.jumlah, farmasi_pengeluaran.keterangan,unit_kerja.nama_unit_kerja, farmasi_obats.nama_obat
                from farmasi_pengeluaran join farmasi_obats on
                farmasi_pengeluaran.obat_id = farmasi_obats.id
                join unit_kerja on
                farmasi_pengeluaran.unit_kerja_id = id_unit_kerja
                order by farmasi_pengeluaran.tanggal_keluar desc  LIMIT ".$offset.",".$limit."");
	}

	public function getpengeluaranid () {

		$this->db->select('*');
        $this->db->from("farmasi_pengeluaran_header");
        $this->db->like('tanggal_keluar',date ('Y-m-d'));
        $sql=$this->db->get();

        return $sql;
	}

	public function insert ($table,$data) {

		return $this->db->insert($table,$data);
	}

	public function getresep() {

		return $this->db->query('select a.*, b.*,DATE_FORMAT(b.tanggal_registrasi,"%d %b %Y") as tanggal_registrasi, c.nama_klinik,d.nama_anggota,sex,DATE_FORMAT(d.tanggal_lahir,"%d %b %Y") as tanggal,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur,e.alamat
				from x_resep a join 
				admission_registrasi b on
				a.pemeriksaan_id = b.idpemeriksaan
				join admission_klinik c on
				b.klinik_id = c.id
				join sosial_anggota_keluarga d on
				b.anggota_keluarga_id = d.id
				join sosial_kepala_keluarga e on
				d.kk_id = e.id');
	}

	public function getresepbyid($id) {
		
		return $this->db->query('select a.*, b.*,DATE_FORMAT(b.tanggal_registrasi,"%d %b %Y") as tanggal_registrasi, c.nama_klinik,d.nama_anggota,no_rm,sex,DATE_FORMAT(d.tanggal_lahir,"%d %b %Y") as tanggal,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur,e.alamat,f.nama_dokter
				from x_resep a join 
				admission_registrasi b on
				a.pemeriksaan_id = b.idpemeriksaan
				join admission_klinik c on
				b.klinik_id = c.id
				join sosial_anggota_keluarga d on
				b.anggota_keluarga_id = d.id
				join sosial_kepala_keluarga e on
				d.kk_id = e.id
				join dokter f on
				a.dokter_id = f.nik_dokter
				where a.pemeriksaan_id='.$id.'
				');
	}

	public function getresepitem($id){
		return $this->db->query("
				select a.*, b.*, c.*
				from x_resep_detail a join
				x_resep b on a.pemeriksaan_id = b.pemeriksaan_id
				join farmasi_obats c on c.id=a.item_id
				where a.pemeriksaan_id='$id'
			");
	}
	public function deleteitem ($table,$data) {

		return $this->db->delete($table,$data);
	}

	public function update_jumlah ($table,$data,$field_key) {

		return $this->db->update($table,$data,$field_key);
		
	}

	

	public function seacrh($tgl,$bln,$thn) {

		return $this->db->query('select a.*,DAY(tanggal_registrasi) as tgl2,MONTH(tanggal_registrasi) as bulan2,YEAR(tanggal_registrasi) as thn2, b.*,DATE_FORMAT(b.tanggal_registrasi,"%d %b %Y") as tanggal_registrasi, c.nama_klinik,d.nama_anggota,sex,DATE_FORMAT(d.tanggal_lahir,"%d %b %Y") as tanggal,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur,e.alamat
				from x_resep a join 
				admission_registrasi b on
				a.pemeriksaan_id = b.idpemeriksaan
				join admission_klinik c on
				b.klinik_id = c.id
				join sosial_anggota_keluarga d on
				b.anggota_keluarga_id = d.id
				join sosial_kepala_keluarga e on
				d.kk_id = e.id
				where DAY(tanggal_registrasi) ='.$tgl.' and MONTH(tanggal_registrasi) ='.$bln.' and YEAR(tanggal_registrasi) ='.$thn.'
				');
	}

	public function insertpengeluaran ($table,$data) {

		$this->db->insert($table,$data);
	}

	function double ($data) {
	
	return $this->db->query("select * from apotek_pengeluaran where keluar_id='$data' ");

	}

	public function cekdoubleobat ($obat_id,$keluar_id) {
		return $this->db->query("select * from x_resep_detail where item_id='$obat_id' and pemeriksaan_id='$keluar_id' ");
	}

}