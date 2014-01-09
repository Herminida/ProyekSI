<?php
class Laporan_farmasi_penerimaan_model extends CI_Model {

	public function searching ($tanggal1,$tanggal2,$sumber,$dari) {

		return $this->db->query("select a.*,jumlah as jumlah2, b.*,DATE_FORMAT(b.tanggal_terima,'%d %b %Y') as tanggal_terima,c.nama_sumber,d.nama_obat,e.nama_supplier, f.nama_sales 
					from farmasi_penerimaan_item a join farmasi_penerimaan_header b on
					a.terima_id = b.id
					join apt_sumber c on b.sumber_id = c.id_sumber
					join farmasi_obats d on a.obat_id=d.id
					join apt_supplier e on b.supplier_id=e.id_supplier
					join apt_sales f on b.sales_id=f.id_sales
			where b.tanggal_terima >='$tanggal1' and b.tanggal_terima <='$tanggal2' and b.sumber_id='$sumber' and b.unit_kerja_id='$dari'
			");
	}
}