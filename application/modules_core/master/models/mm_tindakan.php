<?

class MM_Tindakan extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }

    function list_data_master_kelompok($start='', $limit='') {
        $this->db->select('SQL_CALC_FOUND_ROWS atk.id as id_kelompok,ak.id as id_klinik,tindakan_kelompok,nama_klinik',false);
        $this->db->from('admission_tindakan_kelompok atk');
        $this->db->join('admission_klinik ak','atk.admission_klinik_id=ak.id');
         if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('10','0');
    }
     if ( isset($_GET['sSortDir_0'])) {
            $this->db->order_by('tindakan_kelompok', $_GET['sSortDir_0']);
        }
        $query= $this->db->get();
       $data['sEcho']=(isset($_GET['sEcho'])?intval($_GET['sEcho']):'0');

       $data['aaData']= $query->result();
       $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
       $data['iTotalDisplayRecords']=$query->row()->Count;
       $data['iTotalRecords']= $query->row()->Count;
       return $data;
    }


    function list_data_master_tindakan($key=null,$dir=null,$sort=null) {
        $this->db->select('SQL_CALC_FOUND_ROWS at.id as id_tindakan,atk.id as id_kelompok,ak.id as id_klinik,namatindakan,tindakan_kelompok,nama_klinik',false);
        $this->db->from('admission_tindakan at');
        $this->db->join('admission_tindakan_kelompok atk','at.tindakan_kelompok_id = atk.id');
        $this->db->join('admission_klinik ak','ak.id = atk.admission_klinik_id');
       if($this->input->post('sSearch')){
            $this->db->or_like('namatindakan',$key);
            $this->db->or_like('tindakan_kelompok',$key);
        }
        
      if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('10','0');
    }
    //isset($_GET['sSortDir_0'])
    if ( isset($_GET['sSortDir_0'])) {
            $this->db->order_by('namatindakan', $_GET['sSortDir_0']);
        }
       $query= $this->db->get();
       $data['sEcho']=(isset($_GET['sEcho'])?intval($_GET['sEcho']):'0');

       $data['aaData']= $query->result();
       $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
       $data['iTotalDisplayRecords']=$query->row()->Count;
       $data['iTotalRecords']= $query->row()->Count;
       return $data;
    }

    

    function create_master_kelompok() {
        $this->db->set('tindakan_kelompok', $this->input->post('tindakan_kelompok'));
        $this->db->set('admission_klinik_id', $this->input->post('id_klinik'));
        return $this->db->insert('admission_tindakan_kelompok');
    }

    function update_master_kelompok() {
        $this->db->set('tindakan_kelompok', $this->input->post('tindakan_kelompok'));
        $this->db->set('admission_klinik_id', $this->input->post('id_klinik'));
        $this->db->where('id', $this->input->post('id_kelompok'));
        return $this->db->update('admission_tindakan_kelompok');
    }

    function delete_master_kelompok() {
        $this->db->where('id', $this->input->post('id_kelompok'));
        return $this->db->delete('admission_tindakan_kelompok');
    }

    function getKelompok(){
        $this->db->select('id,tindakan_kelompok');
        $this->db->from('admission_tindakan_kelompok');
        $query =$this->db->get();
        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return false;   
        }
    }

    function getKlinikKelompok($id){
     $this->db->select('ak.id');
        $this->db->from('admission_klinik ak');
        $this->db->join('admission_tindakan_kelompok atk','ak.id=atk.admission_klinik_id');
        $this->db->where('ak.id',$id);
        $query =$this->db->get();
        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return false;   
        }
    }


   function create_master_tindakan() {
        $this->db->set('namatindakan', $this->input->post('namatindakan'));
        $this->db->set('tindakan_kelompok_id', $this->input->post('id_kelompok'));
        return $this->db->insert('admission_tindakan');
    }

    function update_master_tindakan() {
        $this->db->set('namatindakan', $this->input->post('namatindakan'));
        $this->db->set('tindakan_kelompok_id', $this->input->post('id_kelompok'));
        $this->db->where('id', $this->input->post('id_tindakan'));
        return $this->db->update('admission_tindakan');
    }

    function delete_master_tindakan() {
        $this->db->where('id', $this->input->post('id_tindakan'));
        return $this->db->delete('admission_tindakan');
    }


}

?>