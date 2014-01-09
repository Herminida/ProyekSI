<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gaji_pegawai_model extends CI_Model {

	function get_listGaji($key=null,$dir=null,$sort=null) {
        $this->db->select('SQL_CALC_FOUND_ROWS p.id_gaji,nama_gaji',false);
        $this->db->from('gaji p');
        

        if(!empty($_GET['sSearch'])) {
            $key= $_GET['sSearch'];
            $where = "(nama_gaji LIKE '%".$key."%'
                OR id_gaji LIKE '%".$key."%'
                OR nama_gaji LIKE '%".$key."%')";
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

     function insertGajiPegawai($gaji_id,$nilai_gaji,$pegawai_id){
   		$this->db->set('gaji_id', $gaji_id);
        $this->db->set('nilai_gaji', $nilai_gaji);
        $this->db->set('pegawai_id', $pegawai_id);
        return $this->db->insert('gaji_pegawai');
   }

    function updateGajiPegawai($id_gaji_pegawai,$gaji_id,$nilai_gaji){
        $this->db->set('gaji_id', $gaji_id);
        $this->db->set('nilai_gaji', $nilai_gaji);
        $this->db->where('id_gaji_pegawai', $id_gaji_pegawai);
        return $this->db->update('gaji_pegawai');
   }

    function deleteGajiPegawai($table,$data)
    {
        return $this->db->delete($table,$data);
    }

   function dataregsama($pegawai_id,$gaji_id) {

        return $this->db->query("select a.* from gaji_pegawai a  where a.pegawai_id='$pegawai_id' and a.gaji_id='$gaji_id'   ");
    }

    function getGajiPegawai($pegawai_id,$dir=null,$sort=null,$start=null,$limit=null){

        $this->db->select('SQL_CALC_FOUND_ROWS d.id_gaji_pegawai,d.nilai_gaji,p.nama_gaji,d.gaji_id',false) ;
        $this->db->from('gaji_pegawai d');
        $this->db->join('gaji p', 'd.gaji_id = p.id_gaji');
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

   function Ambil_Data_Gaji_Pegawai($id_gaji_pegawai) {

    return $this->db->query("select a.nilai_gaji as nilai_gaji,b.nama_gaji as nama_gaji,c.nip_pegawai,c.nama_pegawai,d.nama_jabatan as nama_jabatan
from gaji_pegawai a left join gaji b on a.gaji_id = b.id_gaji
left join pegawai c on a.pegawai_id =c.id_gaji_pegawai join jabatan d on c.fk_jabatan=d.id_gaji_jabatan
where a.pegawai_id='id_gaji_pegawai' ");


   }

	
	
}