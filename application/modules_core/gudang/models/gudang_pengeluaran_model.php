<?php

class Gudang_pengeluaran_model extends CI_Model {

	public function lookup($keyword){
		$this->db->where('aksi','belum');
		$this->db->select('*')->from('farmasi_obats');
        $this->db->like('nama_obat',$keyword,'after');
        $query = $this->db->get();    
        
        return $query->result();
	}

	public function Ambil_Gudang_Pengeluaran () {

		return $this->db->query("select * from gudang_pengeluaran a left join farmasi_obats b ON a.obat_id = b.id left join unit_kerja c ON a.unit_kerja_id = c.id_unit_kerja ");
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
        $this->db->from("gudang_pengeluaran_header");
        $this->db->like('tanggal_keluar',date ('Y-m-d'));
        $sql=$this->db->get();

        return $sql;
	}

	public function getpengeluaranid2 () {

		$this->db->select('*');
        $this->db->from("gudang_pengeluaran_header");
        $this->db->like('id',date ('Ymd'));
        $sql=$this->db->get();

        return $sql;
	}

	public function insert ($table,$data) {

		return $this->db->insert($table,$data);
	}

	public function insert2 ($table,$data) {

		return $this->db->insert($table,$data);
	}

	public function Get_Pengeluaran_header ($id) {

		return $this->db->query("select a.*,DATE_FORMAT(a.tanggal_keluar,'%d %b %Y') as tanggal,b.nama_unit_kerja, (select nama_unit_kerja from unit_kerja where id_unit_kerja = tujuan ) as tujuan from gudang_pengeluaran_header a join
unit_kerja b on a.unit_kerja_id = b.id_unit_kerja where id='$id' ");

	}

	public function Get_Pengeluaran_Id ($id) {

		return $this->db->query("select a.*,b.id as id2,c.nama_obat
			from gudang_pengeluaran_item a join gudang_pengeluaran_header b on
			a.keluar_id=b.id
			join farmasi_obats c on 
			a.obat_id = c.id
			where a.keluar_id ='$id'
 ");

	}

	public function Get_Pengeluaran ($tgl) {

		return $this->db->query("select a.*,DATE_FORMAT(a.tanggal_keluar,'%d %b %Y') as tanggal,b.nama_unit_kerja, (select nama_unit_kerja from unit_kerja where id_unit_kerja = tujuan ) as tujuan from gudang_pengeluaran_header a join
unit_kerja b on a.unit_kerja_id = b.id_unit_kerja
where a.tanggal_keluar='$tgl' order by a.id desc");

	}

	 public function deleteitem ($table,$data) {

		return $this->db->delete($table,$data);
	}

	public function update_jumlah ($table,$data,$field_key) {

		return $this->db->update($table,$data,$field_key);
		
	}

	public function seacrh ($tgl,$bln,$thn) {

		return $this->db->query("select a.*,DATE_FORMAT(a.tanggal_keluar,'%d %b %Y') as tanggal,DAY(tanggal_keluar) as tgl2,MONTH(tanggal_keluar) as bulan2,YEAR(tanggal_keluar) as thn2,b.nama_unit_kerja, (select nama_unit_kerja from unit_kerja where id_unit_kerja = tujuan ) as tujuan from gudang_pengeluaran_header a join
unit_kerja b on a.unit_kerja_id = b.id_unit_kerja
where DAY(tanggal_keluar) ='$tgl' and MONTH(tanggal_keluar) ='$bln' and YEAR(tanggal_keluar) ='$thn'order by a.id desc");

	}

	public function cekdoubleobat ($obat_id,$keluar_id) {
		return $this->db->query("select * from gudang_pengeluaran_item where obat_id='$obat_id' and keluar_id='$keluar_id' ");
	}


}