<?php
class Gudang_penerimaan_model extends CI_Model {

	public function getgudangid () {

		$this->db->select('*');
        $this->db->from("gudang_penerimaan_header");
        $this->db->like('tanggal_terima',date ('Y-m-d'));
        $sql=$this->db->get();

        return $sql;
	}

	public function insert ($table,$data) {

		return $this->db->insert($table,$data);
	}

	public function lookup ($keyword) {

		$this->db->where('aksi','belum');
		$this->db->select('*')->from('farmasi_obats');
        $this->db->like('nama_obat',$keyword,'after');
        $query = $this->db->get();    
        
        return $query->result();
	}

	public function Get_Penerimaan_header ($id) {

		return $this->db->query("select a.*,DATE_FORMAT(a.tanggal_terima,'%d %b %Y') as tanggal,b.nama_unit_kerja,c.nama_sumber,d.nama_supplier from gudang_penerimaan_header a join
unit_kerja b on a.unit_kerja_id = b.id_unit_kerja
join apt_sumber c on
a.sumber_id = c.id_sumber
join apt_supplier d on
a.supplier_id = d.id_supplier where id='$id' ");

	}

	public function Get_Penerimaan_header2 ($id) {

		return $this->db->query("select a.*,DATE_FORMAT(a.tanggal_keluar,'%d %b %Y') as tanggal,b.nama_unit_kerja, (select nama_unit_kerja from unit_kerja where id_unit_kerja = tujuan ) as tujuan from gudang_penerimaan_header2 a join
unit_kerja b on a.unit_kerja_id = b.id_unit_kerja
where id='$id' ");

	}

	public function Get_Penerimaan_Id ($id) {

		return $this->db->query("select a.*,b.id as id2,c.nama_obat
			from gudang_penerimaan_item a join gudang_penerimaan_header b on
			a.terima_id=b.id
			join farmasi_obats c on 
			a.obat_id = c.id
			where a.terima_id ='$id'
 ");

	}

	public function Get_Penerimaan_Id2 ($id) {

		return $this->db->query("select a.*,b.id as id2,c.nama_obat
			from gudang_penerimaan_item2 a join gudang_penerimaan_header2 b on
			a.keluar_id=b.id
			join farmasi_obats c on 
			a.obat_id = c.id
			where a.keluar_id ='$id'
 ");

	}

	public function Get_Penerimaan_Id3 ($id) {

		return $this->db->query("select a.*,b.id as id2,c.id as idob,c.qtt,c.nama_obat
			from gudang_penerimaan_item2 a join gudang_penerimaan_header2 b on
			a.keluar_id=b.id
			join farmasi_obats c on 
			a.obat_id = c.id
			where a.keluar_id ='$id'
 ");

	}

	public function Get_Penerimaan ($tgl) {

		return $this->db->query("select a.*,b.nama_unit_kerja,c.nama_sumber,d.nama_supplier from gudang_penerimaan_header a join
unit_kerja b on a.unit_kerja_id = b.id_unit_kerja
join apt_sumber c on
a.sumber_id = c.id_sumber
join apt_supplier d on
a.supplier_id = d.id_supplier where a.tanggal_terima='$tgl'and a.unit_kerja_id='$unit' order by a.id desc");

	}

	public function Get_Penerimaan2 ($tgl,$unit) {

		return $this->db->query("select a.*,DATE_FORMAT(a.tanggal_keluar,'%d %b %Y') as tanggal,b.nama_unit_kerja, (select nama_unit_kerja from unit_kerja where id_unit_kerja = tujuan ) as tujuan from gudang_penerimaan_header2 a join
unit_kerja b on a.unit_kerja_id = b.id_unit_kerja
where a.tanggal_keluar='$tgl' and a.tujuan='$unit' order by a.id desc");

	}

	public function seacrh ($tgl,$bln,$thn,$dari) {

		return $this->db->query("select a.*,DATE_FORMAT(a.tanggal_keluar,'%d %b %Y') as tanggal,DAY(tanggal_keluar) as tgl2,MONTH(tanggal_keluar) as bulan2,YEAR(tanggal_keluar) as thn2,b.nama_unit_kerja, (select nama_unit_kerja from unit_kerja where id_unit_kerja = tujuan ) as tujuan from gudang_penerimaan_header2 a join
unit_kerja b on a.unit_kerja_id = b.id_unit_kerja
where DAY(tanggal_keluar) ='$tgl' and MONTH(tanggal_keluar) ='$bln' and YEAR(tanggal_keluar) ='$thn' and a.tujuan='$dari' order by a.id desc");

	}

	public function deleteitem ($table,$data) {

		return $this->db->delete($table,$data);
	}

	public function update_jumlah ($table,$data,$field_key) {

		return $this->db->update($table,$data,$field_key);
		
	}

	public function update_jumlah_stok($table,$data,$field_key) {

		return $this->db->update($table,$data,$field_key);
		
	}

	function double ($data) {
	
	return $this->db->query("select * from gudang_penerimaan_item2 where keluar_id='$data' ");

	}

	public function cekdoubleobat ($obat_id,$keluar_id) {
		return $this->db->query("select * from gudang_penerimaan_item2 where obat_id='$obat_id' and keluar_id='$keluar_id' ");
	}

	

	public function updateceklist($id) {
		return $this->db->query("update gudang_penerimaan_header2 set cek='sudah' where id='$id' ");
	}

	public function sudahada ($id,$cek) {
		return $this->db->query("select * from gudang_penerimaan_header2 where id='$id' and cek='$cek' ");
	}

	public function AmbilObats() {
		return $this->db->query("select * from farmasi_obats");
	}
}