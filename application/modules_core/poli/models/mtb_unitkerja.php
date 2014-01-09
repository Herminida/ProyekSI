<?php
class mtb_unitkerja extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_data($count=false) {
        $this->db->select('id_unit_kerja,kode_unit_kerja,nama_unit_kerja,alamat,telp,fax
                        ,kode_jabatan,kepala,nip,id_bidang,kategori',false);
        $this->db->from('unit_kerja');

        if($key=$this->input->post('sSearch')){
            $this->db->like('kode_unit_kerja',$key);
            $this->db->or_like('nama_unit_kerja',$key);
            $this->db->or_like('alamat',$key);
            $this->db->or_like('telp',$key);
            $this->db->or_like('fax',$key);
            $this->db->or_like('kepala',$key);
            $this->db->or_like('kode_jabatan',$key);
            $this->db->or_like('nip',$key);
        }

        $dir=($this->input->post('sSortDir_0')=='desc')?'desc':'asc';
        switch ($this->input->post('iSortCol_0')) {
            case '1': $this->db->order_by('nama_unit_kerja',$dir); break;
            case '2': $this->db->order_by('alamat',$dir); break;
            case '3': $this->db->order_by('telp',$dir); break;
            case '4': $this->db->order_by('fax',$dir); break;
            case '4': $this->db->order_by('kepala',$dir); break;
            case '4': $this->db->order_by('kode_jabatan',$dir); break;
            case '4': $this->db->order_by('nip',$dir); break;
            default: $this->db->order_by('kode_unit_kerja',$dir); break;
        }

        if($count){
            return $this->db->count_all_results();
        }else{
            if($limit=$this->input->post('iDisplayLength')){
                $this->db->limit($limit,$this->input->post('iDisplayStart'));
            }else{
                $this->db->limit(10);
            }
            return $this->db->get();
        }
    }

}
