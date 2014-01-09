<?

class ms_jabatan extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();


    }

function list_data($count=false) {
        if($count){
            return $this->db->count_all_results('jabatan');
        }else{
            if($limit=$this->input->post('iDisplayLength')){
                $this->db->limit($limit,$this->input->post('iDisplayStart'));
            }else{
                $this->db->limit(10);
            }
            return $this->db->get('jabatan');
        }
    }

    function create() {
        $this->db->set('nama_jabatan', $this->input->post('nama'));
        return $this->db->insert('jabatan'); 
    }

    function update() {
        $this->db->set('nama_jabatan', $this->input->post('nama'));
        $this->db->where('id_jabatan', $this->input->post('id'));
        return $this->db->update('jabatan');
    }

    function delete($id) {
        $this->db->where('id_jabatan', $id);
        return $this->db->delete('jabatan');
    }
}
/*****/