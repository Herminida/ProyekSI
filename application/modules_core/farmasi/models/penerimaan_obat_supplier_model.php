<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penerimaan_obat_supplier_model extends CI_Model {

	function get_listTunjangan($key=null,$dir=null,$sort=null) {
        $this->db->select('SQL_CALC_FOUND_ROWS p.id,nama_tunjangan',false);
        $this->db->from('tunjangan p');
        

        if(!empty($_GET['sSearch'])) {
            $key= $_GET['sSearch'];
            $where = "(nama_tunjangan LIKE '%".$key."%'
                OR id LIKE '%".$key."%'
                OR nama_tunjangan LIKE '%".$key."%')";
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
            $data['iTotalDisplayRecords']=$query->row()->Count;
            $data['iTotalRecords']= $query->row()->Count;
            return $data;
            
            }

            function insertTunjanganPegawai($tunjangan_id,$nilai_tunjangan,$pegawai_id){
   		$this->db->set('tunjangan_id', $tunjangan_id);
        $this->db->set('nilai_tunjangan', $nilai_tunjangan);
        $this->db->set('pegawai_id', $pegawai_id);
        return $this->db->insert('tunjangan_pegawai');
   }

   function updateTunjanganPegawai($id_tunjangan_pegawai,$nilai_tunjangan) {
        $this->db->set('nilai_tunjangan', $nilai_tunjangan);
        $this->db->where('id_tunjangan_pegawai', $id_tunjangan_pegawai);
        return $this->db->update('tunjangan_pegawai');
    }

   function dataregsama($pegawai_id,$tunjangan_id) {

        return $this->db->query("select a.* from tunjangan_pegawai a  where a.pegawai_id='$pegawai_id' and a.tunjangan_id='$tunjangan_id'   ");
    }

    function getTunjanganPegawai($pegawai_id,$dir=null,$sort=null,$start=null,$limit=null){

        $this->db->select('SQL_CALC_FOUND_ROWS d.id_tunjangan_pegawai,nilai_tunjangan,pegawai_id,tunjangan_id,p.nama_tunjangan',false) ;
        $this->db->from('tunjangan_pegawai d');
        $this->db->join('tunjangan p', 'd.tunjangan_id = p.id');
        $this->db->where('d.pegawai_id', $pegawai_id);
          if (isset($dir) && isset($sort)) {
            $this->db->order_by($sort, $dir);
        }
        if (!empty($start) && !empty($limit)) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        if ($query->num_rows()>0){
            return $query->result_array();
        }else{
            return '';   
        }
            
   }

   function Ambil_Data_Tunjangan_Pegawai($pegawai_id) {

    return $this->db->query("select DISTINCT c.nip_pegawai,c.nama_pegawai,d.nama_jabatan as nama_jabatan
from tunjangan_pegawai a join pegawai c on a.pegawai_id =c.id_pegawai join jabatan d on c.fk_jabatan=d.id_jabatan
where a.pegawai_id='$pegawai_id' ");


   }

   function Ambil_Tunjangan_Saja ($pegawai_id) {

    return $this->db->query("select   a.nilai_tunjangan as nilai_tunjangan,b.nama_tunjangan as nama_tunjangan from
        tunjangan_pegawai a join tunjangan b on a.tunjangan_id=b.id where a.pegawai_id='$pegawai_id'
        ");
   }

   function deleteTunjangan_Pegawai($id_tunjangan_pegawai) {
        $this->db->where('id_tunjangan_pegawai', $id_tunjangan_pegawai);
        return $this->db->delete('tunjangan_pegawai');
    }

	
	
}