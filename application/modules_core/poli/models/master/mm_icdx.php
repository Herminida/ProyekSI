<?

class MM_Icdx extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }

    function list_data_master_penyakit($start='', $limit='') {
        $this->db->select('SQL_CALC_FOUND_ROWS *',false);
        $this->db->from('icd_penyakit');
        $this->db->join('icd_subkelompok','icd_penyakit.subkelompok=icd_subkelompok.kode_subkelompok');
        $this->db->join('icd_kelompok','icd_subkelompok.kelompok = icd_kelompok.kode_kelompok');
         if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('10','0');
    }
     if ( isset($_GET['sSortDir_0'])) {
            $this->db->order_by('kode_penyakit', $_GET['sSortDir_0']);
        }
        $query= $this->db->get();
       $data['sEcho']=(isset($_GET['sEcho'])?intval($_GET['sEcho']):'0');

       $data['aaData']= $query->result();
       $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
       $data['iTotalDisplayRecords']=$query->row()->Count;
       $data['iTotalRecords']= $query->row()->Count;
       return $data;
    }

    function list_data_master_kelompok($key=null,$dir=null,$sort=null) {
        $this->db->select('SQL_CALC_FOUND_ROWS *',false);
        $this->db->from('icd_kelompok');
       if($this->input->post('sSearch')){
            $this->db->or_like('nama_kelompok',$key);
            $this->db->or_like('kode_kelompok',$key);
        }
        
      if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('10','0');
    }
    //isset($_GET['sSortDir_0'])
    if ( isset($_GET['sSortDir_0'])) {
            $this->db->order_by('nama_kelompok', $_GET['sSortDir_0']);
        }
       $query= $this->db->get();
       $data['sEcho']=(isset($_GET['sEcho'])?intval($_GET['sEcho']):'0');

       $data['aaData']= $query->result();
       $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
       $data['iTotalDisplayRecords']=$query->row()->Count;
       $data['iTotalRecords']= $query->row()->Count;
       return $data;
    }

    function list_data_master_subkelompok($key=null,$dir=null,$sort=null) {
        $this->db->select('SQL_CALC_FOUND_ROWS *',false);
        $this->db->from('icd_subkelompok');
        $this->db->join('icd_kelompok','icd_subkelompok.kelompok = icd_kelompok.kode_kelompok');
       if($this->input->post('sSearch')){
            $this->db->or_like('nama_subkelompok',$key);
            $this->db->or_like('kode_subkelompok',$key);
        }
        
      if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('10','0');
    }
    //isset($_GET['sSortDir_0'])
    if ( isset($_GET['sSortDir_0'])) {
            $this->db->order_by('nama_subkelompok', $_GET['sSortDir_0']);
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

    function create_master_kelompok() {
        $this->db->set('nama_kelompok', $this->input->post('nama_kelompok'));
        $this->db->set('kode_kelompok', $this->input->post('kode_kelompok'));
        return $this->db->insert('icd_kelompok');
    }

    function update_master_kelompok() {
        $this->db->set('nama_kelompok', $this->input->post('nama_kelompok'));
        $this->db->set('kode_kelompok', $this->input->post('kode_kelompok'));
        $this->db->where('kode_kelompok', $this->input->post('id_kelompok'));
        return $this->db->update('icd_kelompok');
    }

    function delete_master_kelompok() {
        $this->db->where('kode_kelompok', $this->input->post('id_kelompok'));
        return $this->db->delete('icd_kelompok');
    }

    function getKelompok(){
        $this->db->select('kode_kelompok,nama_kelompok');
        $this->db->from('icd_kelompok');
        $query =$this->db->get();
        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return false;   
        }
    }

    function getSubKelompok($id){
        $this->db->select('kode_subkelompok,nama_subkelompok');
        $this->db->from('icd_subkelompok');
        $this->db->where('kelompok',$id);
        $query =$this->db->get();
        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return false;   
        }
    }


   function create_master_subkelompok() {
        $this->db->set('nama_subkelompok', $this->input->post('nama_subkelompok'));
        $this->db->set('kode_subkelompok', $this->input->post('kode_subkelompok'));
        $this->db->set('kelompok', $this->input->post('kode_kelompok'));
        return $this->db->insert('icd_subkelompok');
    }

    function update_master_subkelompok() {
        $this->db->set('nama_subkelompok', $this->input->post('nama_subkelompok'));
        $this->db->set('kode_subkelompok', $this->input->post('kode_subkelompok'));
        $this->db->set('kelompok', $this->input->post('kode_kelompok'));
        $this->db->where('kode_subkelompok', $this->input->post('kode_subkelompok'));
        return $this->db->update('icd_subkelompok');
    }

    function delete_master_subkelompok() {
        $this->db->where('kode_subkelompok', $this->input->post('id_subkelompok'));
        return $this->db->delete('icd_subkelompok');
    }

    function create_master_penyakit() {
        $this->db->set('nama_penyakit', $this->input->post('nama_penyakit'));
        $this->db->set('kode_penyakit', $this->input->post('kode_penyakit'));
        $this->db->set('subkelompok', $this->input->post('kode_subkelompok'));
        return $this->db->insert('icd_penyakit');
    }

    function update_master_penyakit() {
        $this->db->set('nama_penyakit', $this->input->post('nama_penyakit'));
        $this->db->set('kode_penyakit', $this->input->post('kode_penyakit'));
        $this->db->set('subkelompok', $this->input->post('kode_subkelompok'));
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('icd_penyakit');
    }

    function delete_master_penyakit() {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->delete('icd_penyakit');
    }

}

?>