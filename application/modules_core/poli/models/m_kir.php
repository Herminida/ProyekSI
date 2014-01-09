<?php

class M_Kir extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
   

	 function get_listDataKir() {
        $this->db->select(' SQL_CALC_FOUND_ROWS id_kir,register,idpemeriksaan,no_rm,nama_anggota,hasil,guna,date_format(tgl_kir,"%d-%b-%Y") as tgl_kir,no_kir,alamat,tempat_lahir,date_format(tanggal_lahir,"%d-%b-%Y") as tanggal_lahir',false); //nama_pegawai,dokter,
        $this->db->from('sik_t_kir kir');
        $this->db->join('admission_registrasi ar','ar.idpemeriksaan = kir.register');
        $this->db->join('sosial_anggota_keluarga sak','ar.anggota_keluarga_id = sak.id');
        $this->db->join('sosial_kepala_keluarga skk','skk.id = sak.kk_id');
        $this->db->where('klinik_id', '3');
        //$this->db->join('pegawai p','kir.dokter = p.id_pegawai');

        if (isset($_POST['dir']) && isset($_POST['sort'])) {
            $this->db->order_by($_POST['sort'], $_POST['dir']);
        }else{
            $this->db->order_by('tgl_kir','desc');
        }
         if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }
        $query=$this->db->get();
        $data['iTotalRecords']= $query->num_rows();
        $data['iTotalDisplayRecords']= $query->num_rows();
        $data['sEcho']=intval($_GET['sEcho']);
        $data['aaData'] = $query->result_array();      
        return json_encode($data);
    }


    function simpanKir($no_kir,$dokter,$guna,$hasil,$idpemeriksaan) {
        $this->db->set('no_kir',$no_kir);
        $this->db->set('dokter', $dokter);
        $this->db->set('guna', $guna);
        $this->db->set('hasil', $hasil);
        $this->db->set('register', $idpemeriksaan);
        $this->db->set('tgl_kir','CURRENT_TIMESTAMP',false);
        return $this->db->insert('sik_t_kir');
    }

    function updateKir($id_kir,$dokter,$guna,$hasil) {
        $this->db->set('dokter', $dokter);
        $this->db->set('guna', $guna);
        $this->db->set('hasil', $hasil);
        $this->db->where('id_kir', $id_kir);
        return $this->db->update('sik_t_kir');
    }

    function deleteKir($id_kir) {
        $this->db->where('id_kir', $id_kir);
        return $this->db->delete('sik_t_kir');
    }

    function genSurat() {
        $this->db->from('increment_register_labkesda');
        $query = $this->db->get();
        $data = $query->row_array();
        $this->db->query("UPDATE `increment_register_labkesda` SET val=val+1");
        switch (strlen($data['val'])) {
            case 1:
                $reg = '0000000' . $data['val'];
                return $reg;
            case 2:
                $reg = '000000' . $data['val'];
                return $reg;
            case 3:
                $reg = '00000' . $data['val'];
                return $reg;
            case 4:
                $reg = '0000' . $data['val'];
                return $reg;
            case 5:
                $reg = '000' . $data['val'];
                return $reg;
            case 6:
                $reg = '00' . $data['val'];
                return $reg;
            case 7:
                $reg = '0' . $data['val'];
                return $reg;
            case 8:
                $reg = $data['val'];
                return $reg;
        }
    }

}
/*end of file */