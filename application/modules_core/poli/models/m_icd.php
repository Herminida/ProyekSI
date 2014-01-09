<?php
class M_Icd extends CI_Model {
    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
#penyakit
    //
    function get_listDataPenyakit($key=null,$dir=null,$sort=null) {
        $this->db->select('SQL_CALC_FOUND_ROWS p.id,kode_kelompok,nama_kelompok,kode_penyakit,nama_penyakit,subkelompok,kode_subkelompok,nama_subkelompok,kelompok',false);
        $this->db->from('icd_penyakit p');
        $this->db->join('icd_subkelompok s','s.kode_subkelompok = p.subkelompok');
        $this->db->join('icd_kelompok k','k.kode_kelompok = s.kelompok');

        if(!empty($_GET['sSearch'])) {
            $key= $_GET['sSearch'];
            $where = "(nama_penyakit LIKE '%".$key."%'
                OR kode_penyakit LIKE '%".$key."%'
                OR nama_kelompok LIKE '%".$key."%')";
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
            /*$dataq = $this->db;
            print_r($dataq);
            foreach ($dataq as $key=>$values){
                if($key=="queries"){
                    echo json_encode($values);
                    //$query2=$values[0];
                }
            }
            print_r($query2);
            die;*/
            //die;
            /*$total = $this->db->query($query2);
            $total = $total->num_rows;*/
            //return $query->result_array();
            }

function record_data_penyakit($kode='') {
    if(empty ($kode)) {
        $kode= $this->input->post('kode_penyakit');
    }
    $this->db->from('icd_penyakit');
    $this->db->where('kode_penyakit',$kode);
    return $this->db->get();
}
//
function create_penyakit() {
    $this->db->set('kode_penyakit', $this->input->post('kode_penyakit'));
    $this->db->set('nama_penyakit', $this->input->post('nama_penyakit'));
    $this->db->set('subkelompok', $this->input->post('kodeSubkelompok'));
    $this->db->insert('icd_penyakit');
}
//

function update_penyakit() {
    $this->db->set('nama_penyakit', $this->input->post('nama_penyakit'));
    $this->db->set('subkelompok', $this->input->post('kodeSubkelompok'));
    $this->db->where('kode_penyakit', $this->input->post('kode_penyakit'));
    $this->db->update('icd_penyakit');
}
//

function delete_penyakit() {
    $this->db->where('kode_penyakit', $this->input->post('kode_penyakit'));
    $this->db->delete('icd_penyakit');
}



}

?>
