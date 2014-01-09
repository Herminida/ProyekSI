<?php
class apt_sales_model extends Ci_Model{

	function insert($data){
		$this->db->insert('apt_sales',$data);
	}

	function get_nama($nama){
		$this->db->where('nama_sales',$nama);
		return $this->db->get('apt_sales');
	}
	function getdatasales($idsales){
		return $this->db->query("select a.*,c.nama_supplier from apt_sales a join apt_supplier c on a.supplier_id=c.id_supplier
			where a.id_sales='$idsales'
			");
	}

	function getdatasalesedit($idsales){
		return $this->db->query("select a.*,c.nama_supplier
								from apt_sales a join apt_supplier c on 
								a.supplier_id = c.id_supplier
								where a.id_sales = '$idsales'");
	}

	function updatedata($id_sales,$data){
		$this->db->where('id_sales',$id_sales);
		$this->db->update('apt_sales',$data);
		$this->session->set_flashdata('item', 'value');
	}

	function get_sales(){
		return $this->db->get('apt_sales');
	}
}
?>