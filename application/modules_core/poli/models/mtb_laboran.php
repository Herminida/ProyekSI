<?php
class mtb_laboran extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_data($count=false) {
        $this->db->select('id_pegawai,nama_pegawai,nip_pegawai,pangkat
                        ,nama_jabatan,nama_unit_kerja',false);
        $this->db->from('pegawai p');
        $this->db->join('jabatan j','p.fk_jabatan=j.id_jabatan','left');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = p.fk_unit_kerja','left');

        if($key=$this->input->post('sSearch')){
            $this->db->like('nip_pegawai',$key);
            $this->db->or_like('nama_pegawai',$key);
            $this->db->or_like('nama_jabatan',$key);
            $this->db->or_like('nama_unit_kerja',$key);
        }

        $dir=($this->input->post('sSortDir_0')=='desc')?'desc':'asc';
        switch ($this->input->post('iSortCol_0')) {
            case '1': $this->db->order_by('nama_pegawai',$dir); break;
            case '2': $this->db->order_by('nama_jabatan',$dir); break;
            case '3': $this->db->order_by('nama_unit_kerja',$dir); break;
            default: $this->db->order_by('nip_pegawai',$dir); break;
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
