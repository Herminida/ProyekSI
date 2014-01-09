<?php
class Laporan_farmasi_pengeluaran_model extends CI_Model {

	public function searching ($tanggal1,$tanggal2,$dari,$ke) {

		return $this->db->query("select a.*,jumlah as jumlah2, b.*,c.nama_obat,d.nama_unit_kerja , (select nama_unit_kerja from unit_kerja where id_unit_kerja = tujuan ) as tujuan 
					from farmasi_pengeluaran_item a join farmasi_pengeluaran_header b on
					a.keluar_id = b.id
					join farmasi_obats c on a.obat_id=c.id
					join unit_kerja d on b.unit_kerja_id = d.id_unit_kerja
			where b.tanggal_keluar >='$tanggal1' and b.tanggal_keluar <='$tanggal2' and b.unit_kerja_id='$dari' and b.tujuan='$ke'
			");
	}
}