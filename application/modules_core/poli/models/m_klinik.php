<?php
class M_Klinik extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
   function get_ListTindakanKlinik($id_poli){
   	$this->db->select('SQL_CALC_FOUND_ROWS at.id, namatindakan, tindakan_kelompok_id, harga,tindakan_kelompok, admission_klinik_id, at.keterangan',false);
   	$this->db->from('admission_tindakan at');
   	$this->db->join('admission_tindakan_kelompok atk','at.tindakan_kelompok_id=atk.id');
   	$this->db->where('atk.admission_klinik_id',$id_poli);

    if(!empty($_GET['sSearch'])) {
      $key= $_GET['sSearch'];
      $where = "(namatindakan LIKE '%".$key."%'
              OR tindakan_kelompok LIKE '%".$key."%')";
      $this->db->where($where);
      }
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
      {
       $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
      }else{
          $this->db->limit(10,0);
      }

   	$query = $this->db->get();
    $data['sEcho']=(isset($_GET['sEcho'])?intval($_GET['sEcho']):'0');
    $data['aaData']= $query->result();
    $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
    $data['iTotalDisplayRecords']=$query->row()->Count;;
    $data['iTotalRecords']= $query->row()->Count;;
 		return $data;
   }

   function get_ListTindakanPasien($id_pemeriksaan){
   	$this->db->select('stt.id_tindakan as id, namatindakan, tindakan_kelompok_id, harga,tindakan_kelompok, admission_klinik_id, at.keterangan,qtt_produk,time_tindakan,produk');
   	$this->db->from('sik_t_tindakan stt'); 
   	$this->db->join('admission_tindakan at','stt.produk=at.id');
   	$this->db->join('admission_tindakan_kelompok atk','at.tindakan_kelompok_id=atk.id');
   	$this->db->where('stt.register',$id_pemeriksaan);
   	$query = $this->db->get();
   	if ($query->num_rows()>0){
   		return $query->result_array();
   	}else{
   		return false;   
   	}
   }

    function insertTindakanPasien(){
   	$this->db->set('produk',$this->input->post('produk'));
   	$this->db->set('qtt_produk',$this->input->post('qtt_produk'));
      $this->db->set('register',$this->input->post('register'));
   	$this->db->set('time_tindakan','CURRENT_TIMESTAMP',false);
   	return $this->db->insert('sik_t_tindakan');
   }

   function updateTindakanPasien(){
    $this->db->set('produk',$this->input->post('produk'));
    $this->db->set('qtt_produk',$this->input->post('qtt_produk'));
    $this->db->set('register',$this->input->post('register'));
    $this->db->set('time_tindakan','CURRENT_TIMESTAMP',false);
    $this->db->where('id_tindakan',$this->input->post('id'));
    return $this->db->update('sik_t_tindakan');
   }

   function deleteTindakanPasien($id_tindakan){
   	$this->db->where('id_tindakan',$id_tindakan);
   	return $this->db->delete('sik_t_tindakan');
   }
}
/*End Of File*/