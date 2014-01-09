<?php

class laporan_lb1_model extends CI_Model{
    public function getDtd(){
        $this->db->select("*");
        $this->db->from('dtds');
        $sql=$this->db->get();
        return $sql;
    }
    
    public function getUmur(){
        $this->db->select("*");
        $this->db->from('umurs');
        $sql=$this->db->get();
        return $sql;
    }
    
    public function getLb1Bydate($tanggal1,$tanggal2){
        $this->db->select("icd.dtd_id,diag.kasus,umur.id,count(diag.icd) as jumlah");
        $this->db->from('admission_registrasi reg');
        $this->db->join('sik_diagnosa diag','reg.idpemeriksaan=diag.register');
        $this->db->join('icd_penyakit icd','icd.id=diag.icd');
        $this->db->join('umurs umur','umur.id=reg.umur_id');
        $this->db->where('reg.tanggal_registrasi >=',$tanggal1);
        $this->db->where('reg.tanggal_registrasi <=',$tanggal2);
        $this->db->where('unit_kerja_id',$this->session->userdata("id_unit_kerja"));
        $this->db->group_by('icd.id');
        $sql=$this->db->get();
        return $sql;
    }
    
    
}

?>
