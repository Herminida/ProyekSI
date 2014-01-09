<?php
class mtb_permohonan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_data($tab='',$count=false) {
        $this->db->select('id_permohonan_lab,a.no_rm_tb,yankes,diagnosa
                        ,DATE_FORMAT(tgl_ambil_s1,"%d-%m-%Y") as tgl_ambil_s1
                        ,DATE_FORMAT(tgl_ambil_p,"%d-%m-%Y") as tgl_ambil_p
                        ,DATE_FORMAT(tgl_ambil_s2,"%d-%m-%Y") as tgl_ambil_s2
                        ,DATE_FORMAT(tgl_ambil_terakhir,"%d-%m-%Y") as tgl_ambil_terakhir
                        ,DATE_FORMAT(tgl_kirim_sediaan,"%d-%m-%Y") as tgl_kirim_sediaan
                        ,nanah_lendir_s1,nanah_lendir_p,nanah_lendir_s2,bercak_darah_s1
                        ,bercak_darah_p,bercak_darah_s2,air_liur_s1,air_liur_p,air_liur_s2
                        ,register,tipe_diagnosa
                        ,sak.nama_anggota,uk.nama_unit_kerja',false);
        $this->db->from('tb_permohonan_lab a');
        $this->db->join('tb_kpp p','a.no_rm_tb=p.no_rm_tb');
        $this->db->join('sosial_anggota_keluarga sak', 'p.no_rm = sak.no_rm');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = a.yankes','left');

        if(!empty($tab)){
            $this->db->where('tipe_diagnosa',$tab);
        }

        if($key=$this->input->post('sSearch')){
            $where = "(a.no_rm_tb LIKE '%".$key."%'
                   OR sak.nama_anggota LIKE '%".$key."%'
                   OR diagnosa LIKE '%".$key."%'
                   OR register LIKE '%".$key."%'
                   OR uk.nama_unit_kerja LIKE '%".$key."%')";
            $this->db->where($where);
        }

        $dir=($this->input->post('sSortDir_0')=='desc')?'desc':'asc';
        switch ($this->input->post('iSortCol_0')) {
            case '1': $this->db->order_by('sak.nama_anggota',$dir); break;
            case '2': $this->db->order_by('uk.nama_unit_kerja',$dir); break;
            case '3': $this->db->order_by('diagnosa',$dir); break;
            case '4': $this->db->order_by('register',$dir); break;
            default: $this->db->order_by('a.no_rm_tb',$dir); break;
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

    function get_data_by_rm_tb($tab='',$no_rm_tb='') {
        $this->db->select('id_permohonan_lab,a.no_rm_tb,yankes,diagnosa
                        ,DATE_FORMAT(tgl_ambil_s1,"%d-%m-%Y") as tgl_ambil_s1
                        ,DATE_FORMAT(tgl_ambil_p,"%d-%m-%Y") as tgl_ambil_p
                        ,DATE_FORMAT(tgl_ambil_s2,"%d-%m-%Y") as tgl_ambil_s2
                        ,DATE_FORMAT(tgl_ambil_terakhir,"%d-%m-%Y") as tgl_ambil_terakhir
                        ,DATE_FORMAT(tgl_kirim_sediaan,"%d-%m-%Y") as tgl_kirim_sediaan
                        ,nanah_lendir_s1,nanah_lendir_p,nanah_lendir_s2,bercak_darah_s1
                        ,bercak_darah_p,bercak_darah_s2,air_liur_s1,air_liur_p,air_liur_s2
                        ,register,tipe_diagnosa
                        ,sak.nama_anggota,uk.nama_unit_kerja',false);
        $this->db->from('tb_permohonan_lab a');
        $this->db->join('tb_kpp p','a.no_rm_tb=p.no_rm_tb');
        $this->db->join('sosial_anggota_keluarga sak', 'p.no_rm = sak.no_rm');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = a.yankes','left');
        if(!empty($tab)){
            $this->db->where('tipe_diagnosa',$tab);
        }
        $this->db->where('a.no_rm_tb',$no_rm_tb);
        if($result=$this->db->get()){
            return $result->row_array();
        }
    }

    function save_data() {
        $this->db->set('no_rm_tb', $this->input->post('no_rm_tb'));
        $this->db->set('yankes', $this->input->post('yankes'));
        $this->db->set('diagnosa', $this->input->post('diagnosa'));
        $this->db->set('tgl_ambil_s1', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_ambil_s1')));
        $this->db->set('tgl_ambil_p', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_ambil_p')));
        $this->db->set('tgl_ambil_s2', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_ambil_s2')));
        $this->db->set('tgl_ambil_terakhir', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_ambil_terakhir')));
        $this->db->set('tgl_kirim_sediaan', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_kirim_sediaan')));
        $this->db->set('nanah_lendir_s1', $this->input->post('nanah_lendir_s1'));
        $this->db->set('nanah_lendir_p', $this->input->post('nanah_lendir_p'));
        $this->db->set('nanah_lendir_s2', $this->input->post('nanah_lendir_s2'));
        $this->db->set('bercak_darah_s1', $this->input->post('bercak_darah_s1'));
        $this->db->set('bercak_darah_p', $this->input->post('bercak_darah_p'));
        $this->db->set('bercak_darah_s2', $this->input->post('bercak_darah_s2'));
        $this->db->set('air_liur_s1', $this->input->post('air_liur_s1'));
        $this->db->set('air_liur_p', $this->input->post('air_liur_p'));
        $this->db->set('air_liur_s2', $this->input->post('air_liur_s2'));
        $this->db->set('register', $this->input->post('register'));
        $this->db->set('tipe_diagnosa', $this->input->post('tipe_diagnosa'));
        if($this->input->post('id_permohonan_lab')){
            $this->db->where('id_permohonan_lab',$this->input->post('id_permohonan_lab'));
            return $this->db->update('tb_permohonan_lab');
        }else{
            if($return=$this->db->insert('tb_permohonan_lab')){
                $id=$this->db->insert_id();
                $register='';
                for ($i=strlen(''.$id); $i<5; $i++) {
                    $register.='0';
                }
                $this->db->set('register', $register.$id);
                $this->db->where('id_permohonan_lab',$id);
                $this->db->update('tb_permohonan_lab');
                return $return;
            }
        }
    }

    function delete_data($id_permohonan_lab=0) {
        $this->db->where('id_permohonan_lab', $id_permohonan_lab);
        return $this->db->delete('tb_permohonan_lab');
    }

}
