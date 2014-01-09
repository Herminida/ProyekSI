<?php

class M_Resep extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }
    function get_listDataObat() {
        $this->db->select('SQL_CALC_FOUND_ROWS b.id as id_item,qtt
            ,b.id as kode_item,nama_obat as nama_item,s.id_satuan,nama_satuan,  
            b.qtt', FALSE);
        //ganti ke farmasi_obats => penyesuaian ifk
       // $this->db->from('apt_item b');
         $this->db->from('farmasi_obats b');
        $this->db->join('apt_satuan s', 's.id_satuan = b.satuan_obat_id', 'left');
        if(!empty($_GET['sSearch'])) {
            $key= $_GET['sSearch'];
            //$where = "(nama_item LIKE '%".$key."%'
            //    OR kode_item LIKE '%".$key."%')";
            $where = "(nama_obat LIKE '%".$key."%'
                OR b.id LIKE '%".$key."%')";
            $this->db->where($where);
            }

            if(isset($dir) && isset($sort)) {
                $this->db->order_by($sort, $dir);
            }
            if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
            {
             $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
            }else{
                $this->db->limit(10,0);
            }

            $query=$this->db->get();
            $data['sEcho']=(isset($_GET['sEcho'])?intval($_GET['sEcho']):'0');
            $data['aaData']= $query->result();
            $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
            $data['iTotalDisplayRecords']=$query->row()->Count;;
            $data['iTotalRecords']= $query->row()->Count;;
            return $data;

    }

    function simpanResep($idpemeriksaan) {
            $this->db->set('no_resep', $idpemeriksaan);
            $this->db->set('pemeriksaan_id', $idpemeriksaan);
            $this->db->set('tanggal_resep','current_timestamp',false);
            return $this->db->insert('x_resep');
    }

    function simpanDetailResep(){
        $this->db->set('pemeriksaan_id', $this->input->post('idpemeriksaan'));
        $this->db->set('item_id', $this->input->post('kode_item'));
        $this->db->set('jumlah', $this->input->post('jumlah'));
        $this->db->set('segma', $this->input->post('segma'));
        $this->db->set('total', $this->input->post(''));
        $this->db->set('ket_resep', $this->input->post('ket'));
        return $this->db->insert('x_resep_detail');
        

    }

    function updateDetailResep() {
        $this->db->set('item_id', $this->input->post('kode_item'));
        $this->db->set('jumlah', $this->input->post('jumlah'));
        $this->db->set('segma', $this->input->post('segma'));
        $this->db->set('total', $this->input->post('total'));
        $this->db->set('ket_resep', $this->input->post('ket'));
        $this->db->where('id_detail', $this->input->post('id_detail'));
        return $this->db->update('x_resep_detail');
        //updateTotalResep($this->input->post('idpemeriksaan'));
    }

    function deleteDetailResep(){
        $this->db->where('id_detail', $this->input->post('id_detail'));
        return $this->db->delete('x_resep_detail');
    }

    function updateTotalResep($idpemeriksaan){
    $this->db->set('nett_total', '(select sum(total) from x_resep_detail where x_resep_detail.pemeriksaan_id='.$idpemeriksaan.')',false);
    $this->db->where('x_resep.pemeriksaan_id', $idpemeriksaan);
     return $this->db->update('x_resep');   
    }

    function updateDokterResep(){
    $this->db->set('dokter_id',$this->input->post('dokter_id') );
    $this->db->where('x_resep.pemeriksaan_id', $this->input->post('idpemeriksaan'));
    return $this->db->update('x_resep');   
    }

    function getDokterResep($idpemeriksaan){
        $this->db->select('dokter_id');
        $this->db->where('pemeriksaan_id',$idpemeriksaan);
        $query = $this->db->get('x_resep');
        $query = $query->result_array();
        $query = $query[0];
        return $query;
    }


    function cekResep($idpemeriksaan){
        $this->db->select('id_resep');
        $this->db->where('pemeriksaan_id',$idpemeriksaan);
        $query = $this->db->get('x_resep');
        return $query->num_rows();
    }

    function cekDetailResep($idpemeriksaan){
        $this->db->select('id_detail');
        $this->db->where('pemeriksaan_id',$idpemeriksaan);
        $query = $this->db->get('x_resep_detail');
        return $query->num_rows();
    }

    function cekObatSama($iditem,$idpemeriksaan){
        $this->db->select('item_id');
        $this->db->where('pemeriksaan_id',$idpemeriksaan);
        $this->db->where('item_id',$iditem);
        $query = $this->db->get('x_resep_detail');
        return $query->num_rows();
    }

    function get_listDataResep($idpemeriksaan){
        $this->db->select('SQL_CALC_FOUND_ROWS id_resep,u.id as kode_item,u.id as id_item,no_resep,id_detail,tanggal_resep,u.nama_obat as nama_item, jumlah,segma,ket_resep',false);
        $this->db->from('x_resep');
        $this->db->join('x_resep_detail','x_resep.pemeriksaan_id = x_resep_detail.pemeriksaan_id');
        //ganti apt_item ke farmasi_obats  => penyesuaian ifk 
        //$this->db->join('apt_item u', 'u.id_item = x_resep_detail.item_id');
        $this->db->join('farmasi_obats u', 'u.id = x_resep_detail.item_id');
        $this->db->where('x_resep_detail.pemeriksaan_id',$idpemeriksaan);
        if(!empty($_GET['sSearch'])) {
            $key= $_GET['sSearch'];
            //$where = "(nama_item LIKE '%".$key."%'
            $where = "(nama_obat LIKE '%".$key."%'
                OR ket LIKE '%".$key."%')";
            $this->db->where($where);
            }

            if(isset($dir) && isset($sort)) {
                $this->db->order_by($sort, $dir);
            }
            if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
            {
             $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
            }else{
                $this->db->limit(10,0);
            }

            $query = $this->db->get();
            if (!$this->cekResep($idpemeriksaan)>0){
                $this->simpanResep($idpemeriksaan);
            }
            $data['sEcho']=(isset($_GET['sEcho'])?intval($_GET['sEcho']):'0');
            $data['aaData']= $query->result();
            $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
            $data['iTotalDisplayRecords']=$query->row()->Count;;
            $data['iTotalRecords']= $query->row()->Count;
            return $data;
    }

    function get_listCetakResep($idpemeriksaan){
        $this->db->select('SQL_CALC_FOUND_ROWS ar.id as register,nama_unit_kerja,nama_klinik,nama_anggota,id_resep,u.id as kode_item,u.id as id_item,no_resep,id_detail,date_format(tanggal_resep,"%d-%m-%Y") as tanggal_resep,u.nama_obat as nama_item, jumlah,segma,ket_resep,nama_dokter',false);
        $this->db->from('x_resep');
        $this->db->join('admission_registrasi ar','ar.idpemeriksaan = x_resep.pemeriksaan_id');
        $this->db->join('admission_klinik ak','ak.id = ar.klinik_id');
        $this->db->join('dokter dk','dk.nik_dokter = x_resep.dokter_id');
        $this->db->join('unit_kerja uk','ar.unit_kerja_id = uk.id_unit_kerja');
        $this->db->join('sosial_anggota_keluarga sak','sak.id = ar.anggota_keluarga_id');
        $this->db->join('x_resep_detail','x_resep.pemeriksaan_id = x_resep_detail.pemeriksaan_id');
        $this->db->join('farmasi_obats u', 'u.id = x_resep_detail.item_id');
        $this->db->where('x_resep_detail.pemeriksaan_id',$idpemeriksaan);
        $query = $this->db->get();
        return  $query->result();

    }

}

?>
