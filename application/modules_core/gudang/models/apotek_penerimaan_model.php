<?php
class Apotek_penerimaan_model extends CI_Model {
	
	public function lookup($keyword){
		$this->db->where('aksi','belum');
		$this->db->select('*')->from('farmasi_obats');
        $this->db->like('nama_obat',$keyword,'after');
        $query = $this->db->get();    
        
        return $query->result();
	}

	public function Ambil_Apotek_Penerimaan () {

		return $this->db->query("select * from apotek_penerimaan a 
			left join farmasi_obats b ON a.obat_id = b.id left join unit_kerja c ON a.unit_kerja_id = c.id_unit_kerja 
			left join apt_sumber d on a.sumber_id=d.id_sumber
			left join apt_supplier e on a.supplier_id=e.id_supplier

			");
	}

	public function Ambil_Semua ($offset,$limit) {

		/* return  $this->db->query("
                select farmasi_pengeluaran.tanggal_keluar, farmasi_pengeluaran.jumlah, farmasi_pengeluaran.keterangan,unit_kerja.nama_unit_kerja, farmasi_obats.nama_obat
                from farmasi_pengeluaran join farmasi_obats on
                farmasi_pengeluaran.obat_id = farmasi_obats.id
                join unit_kerja on
                farmasi_pengeluaran.unit_kerja_id = id_unit_kerja
                order by farmasi_pengeluaran.tanggal_keluar desc  LIMIT ".$offset.",".$limit.""); */
	}

	public function getpenerimaanid () {

		$this->db->select('*');
        $this->db->from("apotek_penerimaan_header");
        $this->db->like('tanggal_terima',date ('Y-m-d'));
        $sql=$this->db->get();

        return $sql;
	}

	public function insert ($table,$data) {

		return $this->db->insert($table,$data);
	}

	public function Get_Penerimaan_header ($id) {

		return $this->db->query("select a.*,DATE_FORMAT(a.tanggal_terima,'%d %b %Y') as tanggal,c.nama_sumber,d.nama_supplier from apotek_penerimaan_header a
join apt_sumber c on
a.sumber_id = c.id_sumber
join apt_supplier d on
a.supplier_id = d.id_supplier where id='$id' ");

	}

	public function Get_Penerimaan ($tgl) {

		return $this->db->query("select a.*,c.nama_sumber,d.nama_supplier from apotek_penerimaan_header a
join apt_sumber c on
a.sumber_id = c.id_sumber
join apt_supplier d on
a.supplier_id = d.id_supplier where a.tanggal_terima='$tgl' order by a.id desc");

	}

		public function Get_Penerimaan_Id ($id) {

		return $this->db->query("select a.*,b.id as id2,c.nama_obat
			from apotek_penerimaan_item a join apotek_penerimaan_header b on
			a.terima_id=b.id
			join farmasi_obats c on 
			a.obat_id = c.id
			where a.terima_id ='$id'
 ");

	}

	public function edit ($table,$data) {

		return $this->db->get_where($table,$data);
	}

	public function gettanggalterima ($id) {
      return  $this->db->query("select year (tanggal_terima) as thn, month (tanggal_terima) as bln,day(tanggal_terima) as tgl from apotek_penerimaan_header where id='$id' ");
    }

    

    public function deleteitem ($table,$data) {

		return $this->db->delete($table,$data);
	}

	

	public function update_jumlah ($table,$data,$field_key) {

		return $this->db->update($table,$data,$field_key);
		
	}

	public function seacrh ($tgl,$bln,$thn) {

		return $this->db->query("select a.*,DAY(tanggal_terima) as tgl2,MONTH(tanggal_terima) as bulan2,YEAR(tanggal_terima) as thn2,c.nama_sumber,d.nama_supplier from apotek_penerimaan_header a
join apt_sumber c on
a.sumber_id = c.id_sumber
join apt_supplier d on
a.supplier_id = d.id_supplier where DAY(tanggal_terima) ='$tgl' and MONTH(tanggal_terima) ='$bln' and YEAR(tanggal_terima) ='$thn'order by a.id desc");

	}


}