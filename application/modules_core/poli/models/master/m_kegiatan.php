<?

class M_kegiatan extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }

    function list_data_master($start='', $limit='') {
        $this->db->select('SQL_CALC_FOUND_ROWS *',false);
        $this->db->from('m_kegiatan mk');
        $this->db->join('m_kegiatan_kategori mkk', 'mkk.id_kategori = mk.kategori');
         if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('10','0');
    }
    
        $query= $this->db->get();
       $data['sEcho']=(isset($_GET['sEcho'])?intval($_GET['sEcho']):'0');

       $data['aaData']= $query->result();
       $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
       $data['iTotalDisplayRecords']=$query->row()->Count;
       $data['iTotalRecords']= $query->row()->Count;
       return $data;
    }

    function list_data_master_kategori($key=null,$dir=null,$sort=null) {
        $this->db->select('SQL_CALC_FOUND_ROWS *',false);
        $this->db->from('m_kegiatan_kategori');
       if($this->input->post('sSearch')){
            $this->db->or_like('nama_kategori',$key);
        }
        
      if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('10','0');
    }
    //isset($_GET['sSortDir_0'])
    if ( isset($_GET['sSortDir_0'])) {
            $this->db->order_by('nama_kategori', $_GET['sSortDir_0']);
        }
       $query= $this->db->get();
       $data['sEcho']=(isset($_GET['sEcho'])?intval($_GET['sEcho']):'0');

       $data['aaData']= $query->result();
       $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
       $data['iTotalDisplayRecords']=$query->row()->Count;
       $data['iTotalRecords']= $query->row()->Count;
       return $data;
    }

    function list_data_input($start='', $limit='') {
        $this->db->select('SQL_CALC_FOUND_ROWS id,id_kegiatan,id_kategori,id_unit_kerja,poli,nama_unit_kerja,nama_kategori,nama_kegiatan,tgl as tgl_sql, date_format( tgl, "%d-%m-%Y" ) as tgl,jml',false);
        $this->db->from('sik_t_kegiatan k');
        $this->db->join('m_kegiatan m', 'm.id_kegiatan = k.kegiatan');
        $this->db->join('m_kegiatan_kategori mkk', 'm.kategori = mkk.id_kategori');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = k.unker');
          if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('10','0');
    }
    
        $query= $this->db->get();
       $data['sEcho']=(isset($_GET['sEcho'])?intval($_GET['sEcho']):'0');

       $data['aaData']= $query->result();
       $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
       $data['iTotalDisplayRecords']=$query->row()->Count;
       $data['iTotalRecords']= $query->row()->Count;
       return $data;
    }

    function create_master() {
        $this->db->set('kategori', $this->input->post('kategori'));
        $this->db->set('id_kegiatan', $this->input->post('id_kegiatan'));
        $this->db->set('nama_kegiatan', $this->input->post('nama_kegiatan'));
        return $this->db->insert('m_kegiatan');
    }

    function update_master() {
        $this->db->set('kategori', $this->input->post('kategori'));
        $this->db->set('nama_kegiatan', $this->input->post('nama_kegiatan'));
        $this->db->where('id_kegiatan', $this->input->post('id_kegiatan'));
        return $this->db->update('m_kegiatan');
    }

    function delete_master() {
        $this->db->where('id_kegiatan', $this->input->post('id_kegiatan'));
        return $this->db->delete('m_kegiatan');
    }

    function getKategori(){
        $this->db->select('id_kategori,nama_kategori');
        $this->db->from('m_kegiatan_kategori');
        $query =$this->db->get();
        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return false;   
        }
    }
    function getKegiatan($id){
        $this->db->select('id_kegiatan,nama_kegiatan');
        $this->db->from('m_kegiatan');

        $this->db->where('kategori',$id);
        $query =$this->db->get();
        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return false;   
        }
    }

    function create_master_kategori() {
        $this->db->set('nama_kategori', $this->input->post('nama_kategori'));
        return $this->db->insert('m_kegiatan_kategori');
    }

    function update_master_kategori() {
        $this->db->set('nama_kategori', $this->input->post('nama_kategori'));
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        return $this->db->update('m_kegiatan_kategori');
    }

    function delete_master_kategori() {
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $this->db->delete('m_kegiatan_kategori');

        $this->db->where('kategori', $this->input->post('id_kategori'));
        return $this->db->delete('m_kegiatan');
    }

    function create_input() {
        $this->db->set('poli', $this->input->post('poli'));
        $this->db->set('kegiatan', $this->input->post('kegiatan'));
        $this->db->set('jml', $this->input->post('jml'));
        $this->db->set('unker', $this->input->post('unker'));
        $this->db->set('tgl', $this->input->post('tgl'));
        return $this->db->insert('sik_t_kegiatan');
    }

    function update_input() {
        $this->db->set('poli', $this->input->post('poli'));
        $this->db->set('kegiatan', $this->input->post('kegiatan'));
        $this->db->set('jml', $this->input->post('jml'));
        $this->db->set('unker', $this->input->post('unker'));
        $this->db->set('tgl', date('Y-m-d', strtotime($this->input->post('tgl'))));
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('sik_t_kegiatan');
    }

    function delete_input() {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->delete('sik_t_kegiatan');
    }

}

?>