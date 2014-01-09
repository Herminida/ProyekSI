<?php

class List_registrasi_model extends CI_Model {

	public function getregistrasi ($tanggal,$id){
       return $this->db->query("select *,a.id as id_reg from admission_registrasi a join sosial_anggota_keluarga b
        on a.anggota_keluarga_id = b.id join admission_klinik c on a.klinik_id = c.id 
        join admission_bayar d on a.bayar_id = d.id 
                                where a.tanggal_registrasi='$tanggal'  order by a.idpemeriksaan DESC");
       
    }

    public function cetak ($tanggal,$id2,$id){
     return $this->db->query("select *,a.id as id_reg from admission_registrasi a join sosial_anggota_keluarga b
        on a.anggota_keluarga_id = b.id join admission_klinik c on a.klinik_id = c.id 
        join admission_bayar d on a.bayar_id = d.id 
                                where a.tanggal_registrasi='$tanggal'  and a.idpemeriksaan='$id' order by a.idpemeriksaan DESC LIMIT 1 ");
       
    }

    function getRegistrasiByid($id){
        $this->db->select("*,reg.id as reg_id");
        $this->db->from("admission_registrasi reg");
        $this->db->join("sosial_anggota_keluarga anggota","anggota.id=reg.anggota_keluarga_id","inner");
     /*   $this->db->join("sosial_kepala_keluarga kk","kk.id=anggota.kk_id","inner");*/
        $this->db->join("admission_bayar bayar","bayar.id=reg.bayar_id","inner");
        $this->db->join("admission_klinik klinik","klinik.id=reg.klinik_id","inner");
        /*$this->db->join("sosial_kelurahan lurah","lurah.id_kelurahan=kk.kelurahan_id","inner");
        $this->db->join("sosial_kecamatan camat","camat.id_kecamatan=lurah.id_kecamatan","inner");*/
        $this->db->where("reg.idpemeriksaan","$id");
        $sql=$this->db->get();
        
        return $sql;
    }

    function ambilidpemeriksaan ($cekidpemeriksaan) {
        $q = $this->db->query("select idpemeriksaan from admission_registrasi where id='$cekidpemeriksaan' ORDER BY idpemeriksaan DESC LIMIT 0,1");
        return $q;
    }

     function edit ($table,$up,$id){
        return $this->db->update($table,$up,$id);
    }

    function insertdatalab ($lab) {
        $lab['register_labkesda']='LAB-' . $this->genRegister();
        $this->db->insert('labkesda_t_kunjungan',$lab);
       
    }

    /*public function search($tanggal,$id,$kata) {

    	return $this->db->query("select *,a.id as id_reg from admission_registrasi a join sosial_anggota_keluarga b
        on a.anggota_keluarga_id = b.id join admission_klinik c on a.klinik_id = c.id 
        join admission_bayar d on a.bayar_id = d.id join sosial_kepala_keluarga e on b.kk_id=e.id
        where a.tanggal_registrasi='$tanggal' and a.unit_kerja_id='$id' or b.nama_anggota like '%".$kata."%' 
        or e.alamat like '%".$kata."%' or c.nama_klinik like '%".$kata."%' order by a.idpemeriksaan DESC");

    }*/
}