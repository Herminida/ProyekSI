<?php
class mtb_skoring extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_data($count=false) {
        $this->db->select('s.id_skoring,s.kpp,s.parut_bcg_skor,s.parut_bcg_desc,s.tuberklin_skor,s.tuberklin_desc
                        ,s.bb_skor,s.bb_desc,s.demam_tanpa_sebab_skor,s.demam_tanpa_sebab_desc
                        ,s.batuk_skor,s.batuk_desc,s.demam_tanpa_pembesaran_skor,s.demam_tanpa_pembesaran_desc
                        ,s.bengkak_tulang_skor,s.bengkak_tulang_desc,s.foto_toraks_skor,s.foto_toraks_desc
                        ,s.ket_hasil,kp.id,kp.no_rm,kp.no_rm_tb,kp.perujuk,kp.tipe_pasien,kp.reg_upk
                        ,kp.reg_kab,DATE_FORMAT(kp.tgl,"%d-%m-%Y") as tgl,sak.nama_anggota',false);
        $this->db->from('tb_skoring_gejala s');
        $this->db->join('tb_kpp kp','s.kpp=kp.id');
        $this->db->join('sosial_anggota_keluarga sak', 'kp.no_rm = sak.no_rm');

        if($key=$this->input->post('sSearch')){
            $this->db->like('kp.no_rm',$key);
            $this->db->or_like('sak.nama_anggota', $key);
            $this->db->or_like('kp.perujuk',$key);
            $this->db->or_like('kp.tipe_pasien',$key);
            $this->db->or_like('kp.reg_upk',$key);
            $this->db->or_like('kp.reg_kab',$key);
            $this->db->or_like('s.ket_hasil',$key);
            $this->db->or_like('kp.tgl',$key);
        }

        $dir=($this->input->post('sSortDir_0')=='desc')?'desc':'asc';
        switch ($this->input->post('iSortCol_0')) {
            case '1': $this->db->order_by('sak.nama_anggota',$dir); break;
            case '2': $this->db->order_by('kp.perujuk',$dir); break;
            case '3': $this->db->order_by('kp.tipe_pasien',$dir); break;
            case '4': $this->db->order_by('kp.reg_upk',$dir); break;
            case '5': $this->db->order_by('kp.reg_kab',$dir); break;
            case '6': $this->db->order_by('s.ket_hasil',$dir); break;
            case '7': $this->db->order_by('kp.tgl',$dir); break;
            default: $this->db->order_by('kp.no_rm',$dir); break;
        }

        if($count){
            return $this->db->count_all_results();
        }else{
            if($limit=$this->input->post('iDisplayLength')){
                $this->db->limit($limit,$this->input->post('iDisplayStart'));
            }else{
                $this->db->limit(10);
            }
            return $this->db->get();
        }
    }

    function detail_by_kpp($kpp){
        $this->db->select('s.id_skoring,s.kpp,s.parut_bcg_skor,s.parut_bcg_desc,s.tuberklin_skor,s.tuberklin_desc
                        ,s.bb_skor,s.bb_desc,s.demam_tanpa_sebab_skor,s.demam_tanpa_sebab_desc
                        ,s.batuk_skor,s.batuk_desc,s.demam_tanpa_pembesaran_skor,s.demam_tanpa_pembesaran_desc
                        ,s.bengkak_tulang_skor,s.bengkak_tulang_desc,s.foto_toraks_skor,s.foto_toraks_desc
                        ,s.ket_hasil,kp.id,kp.no_rm,kp.no_rm_tb,kp.perujuk,kp.tipe_pasien,kp.reg_upk
                        ,kp.reg_kab,DATE_FORMAT(kp.tgl,"%d-%m-%Y") as tgl,sak.nama_anggota',false);
        $this->db->from('tb_skoring_gejala s');
        $this->db->join('tb_kpp kp','s.kpp=kp.id');
        $this->db->join('sosial_anggota_keluarga sak', 'kp.no_rm = sak.no_rm');
        $this->db->where('s.kpp',$kpp);
        if($result=$this->db->get()){
            return $result->row_array();
        }
    }

    function save_data() {
        $this->db->set('parut_bcg_skor', $this->input->post('parut_bcg_skor'));
        $this->db->set('parut_bcg_desc', $this->input->post('parut_bcg_desc'));
        $this->db->set('tuberklin_skor', $this->input->post('tuberklin_skor'));
        $this->db->set('tuberklin_desc', $this->input->post('tuberklin_desc'));
        $this->db->set('bb_skor', $this->input->post('bb_skor'));
        $this->db->set('bb_desc', $this->input->post('bb_desc'));
        $this->db->set('demam_tanpa_sebab_skor', $this->input->post('demam_tanpa_sebab_skor'));
        $this->db->set('demam_tanpa_sebab_desc', $this->input->post('demam_tanpa_sebab_desc'));
        $this->db->set('batuk_skor', $this->input->post('batuk_skor'));
        $this->db->set('batuk_desc', $this->input->post('batuk_desc'));
        $this->db->set('demam_tanpa_pembesaran_skor', $this->input->post('demam_tanpa_pembesaran_skor'));
        $this->db->set('demam_tanpa_pembesaran_desc', $this->input->post('demam_tanpa_pembesaran_desc'));
        $this->db->set('bengkak_tulang_skor', $this->input->post('bengkak_tulang_skor'));
        $this->db->set('bengkak_tulang_desc', $this->input->post('bengkak_tulang_desc'));
        $this->db->set('foto_toraks_skor', $this->input->post('foto_toraks_skor'));
        $this->db->set('foto_toraks_desc', $this->input->post('foto_toraks_desc'));
        $this->db->set('ket_hasil', $this->input->post('ket_hasil'));
        if($this->input->post('id_skoring')){
            $this->db->where('id_skoring',$this->input->post('id_skoring'));
            return $this->db->update('tb_skoring_gejala');
        }else{
            $this->db->set('kpp', $this->input->post('kpp'));
            return $this->db->insert('tb_skoring_gejala');
        }
    }

    function delete_data($id=0) {
        $this->db->where('id_skoring',$id);
        return $this->db->delete('tb_skoring_gejala');
    }

}
