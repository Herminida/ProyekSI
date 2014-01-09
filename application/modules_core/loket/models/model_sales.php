<?php
class model_sales extends Ci_Model{

	function adddata($data){
		$this->db->insert('apt_sales',$data);
	}

	function getdatasales($idsales){
		$this->db->where('id_sales',$idsales);
		return $this->db->get('apt_sales');
	}

	function updatedata($id_sales,$data){
		$this->db->where('id_sales',$id_sales);
		$this->db->update('apt_sales',$data);
		$this->session->set_flashdata('item', 'value');
	}
}
?>