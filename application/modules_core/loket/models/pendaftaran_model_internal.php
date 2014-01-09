<?php
 class pendaftaran_model_internal extends Ci_model{
 	function add($insert){
 		$this->db->insert('tbl_pasien',$insert);
 	}

 	function cek($nik){
 		$this->db->where('no_identitas',$nik);
 		return $this->db->get('tbl_pasien');
 	}

 	function get_data(){
 		return $this->db->query("select * from tbl_pasien where nama_jabatan !=''");
 	}

 	function get_data_detail($nik){
 		return $this->db->query("select * from tbl_pasien where no_identitas='$nik'");
 	}

 	function edit($insert,$id_pasien){
 		$this->db->where('id_pasien',$id_pasien);
 		$this->db->update('tbl_pasien',$insert);
 	}
 	function delete($id_pasien){
 		$this->db->where('id_pasien',$id_pasien);
 		$this->db->delete('tbl_pasien');
 	}
 	function Get_id(){
 		return $this->db->query("select max(no_rm) as no_rm from tbl_pasien");
 	}

 	function search($kata_kunci){
 		return $this->db->query("select * from tbl_pasien where (nama_lengkap like '%$kata_kunci%' or nama_panggilan like '%$kata_kunci%' or no_identitas like '%$kata_kunci%' or no_rm like '%$kata_kunci%') and nama_jabatan !=''");
 	}

 	function get_jabatan(){
 		return $this->db->get("jabatan");
 	}
 }
?>