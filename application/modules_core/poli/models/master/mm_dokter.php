<?

class MM_Dokter extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }


    function list_data_master_dokter($key=null,$dir=null,$sort=null) {
        $this->db->select('SQL_CALC_FOUND_ROWS *',false);
        $this->db->from('dokter');
       if($this->input->post('sSearch')){
            $this->db->or_like('nik_dokter',$key);
            $this->db->or_like('nama_dokter',$key);
        }
        
      if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('10','0');
    }
    //isset($_GET['sSortDir_0'])
    if ( isset($_GET['sSortDir_0'])) {
            $this->db->order_by('nama_dokter', $_GET['sSortDir_0']);
        }
       $query= $this->db->get();
       $data['sEcho']=(isset($_GET['sEcho'])?intval($_GET['sEcho']):'0');

       $data['aaData']= $query->result();
       $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
       $data['iTotalDisplayRecords']=$query->row()->Count;
       $data['iTotalRecords']= $query->row()->Count;
       return $data;
    }


    function create_dokter() {
        $this->db->set('nama_dokter', $this->input->post('nama_dokter'));
        $this->db->set('nik_dokter', $this->input->post('nik_dokter'));
        $this->db->set('telp_dokter', $this->input->post('telp_dokter'));
        $this->db->set('status_dokter', $this->input->post('status_dokter'));
        return $this->db->insert('dokter');
    }

    function update_dokter() {
        $this->db->set('nama_dokter', $this->input->post('nama_dokter'));
        $this->db->set('nik_dokter', $this->input->post('nik_dokter'));
        $this->db->set('telp_dokter', $this->input->post('telp_dokter'));
        $this->db->set('status_dokter', $this->input->post('status_dokter'));
        $this->db->where('nik_dokter', $this->input->post('id_dokter'));
        return $this->db->update('dokter');
    }

    function delete_dokter() {
        $this->db->where('nik_dokter', $this->input->post('id_dokter'));
        return $this->db->delete('dokter');
    }


}

?>