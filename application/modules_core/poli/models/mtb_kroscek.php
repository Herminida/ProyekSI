<?php
class mtb_kroscek extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_data($count=false) {
        $this->db->select('i.id_kroscek_item,i.kroscek,i.permohonan_lab,DATE_FORMAT(i.tgl_kroscek,"%d-%m-%Y") as tgl_kroscek
                        ,i.kroscek_hasil_s1,i.kroscek_hasil_p,i.kroscek_hasil_s2,i.kualitas_sediaan
                        ,i.kualitas_pewarnaan,k.id_kroscek,DATE_FORMAT(k.tgl_terima,"%d-%m-%Y") as tgl_terima
                        ,DATE_FORMAT(k.tgl_kirim,"%d-%m-%Y") as tgl_kirim,k.yankes,k.petugas_kab,k.petugas_kroscek
                        ,hl.id_hasil_lab,hl.permohonan_lab,DATE_FORMAT(hl.tgl_pemeriksaan,"%d-%m-%Y") as tgl_pemeriksaan
                        ,hl.hasil_s1,hl.hasil_p,hl.hasil_s2,id_permohonan_lab,a.no_rm_tb,diagnosa
                        ,register,tipe_diagnosa,p.nip_pegawai as petugas_kab_nip,p.nama_pegawai petugas_kab_nama
                        ,p2.nip_pegawai as petugas_kroscek_nip,p2.nama_pegawai petugas_kroscek_nama
                        ,CONCAT(reg_upk,"/",reg_kab,"/",register," ",diagnosa) as no_identitas_sedian
                        ,sak.nama_anggota,uk.nama_unit_kerja,uk.nama_unit_kerja as yankes_nama',false);
        $this->db->from('tb_kroscek_item i');
        $this->db->join('tb_kroscek k','k.id_kroscek=i.kroscek');
        $this->db->join('tb_hasil_pemeriksaan_lab hl','i.permohonan_lab=hl.permohonan_lab');
        $this->db->join('tb_permohonan_lab a','hl.permohonan_lab=a.id_permohonan_lab');
        $this->db->join('tb_kpp kp','a.no_rm_tb=kp.no_rm_tb');
        $this->db->join('sosial_anggota_keluarga sak', 'kp.no_rm = sak.no_rm');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = k.yankes','left');
        $this->db->join('pegawai p', 'k.petugas_kab = p.id_pegawai','left');
        $this->db->join('pegawai p2', 'k.petugas_kroscek = p2.id_pegawai','left');

        if($key=$this->input->post('sSearch')){
            $this->db->like('kp.no_rm_tb',$key);
            $this->db->or_like('sak.nama_anggota', $key);
            $this->db->or_like('i.tgl_kroscek',$key);
            $this->db->or_like('i.kroscek_hasil_s1',$key);
            $this->db->or_like('i.kroscek_hasil_p',$key);
            $this->db->or_like('i.kroscek_hasil_s2',$key);
            $this->db->or_like('uk.nama_unit_kerja',$key);
        }

        $dir=($this->input->post('sSortDir_0')=='desc')?'desc':'asc';
        switch ($this->input->post('iSortCol_0')) {
            case '1': $this->db->order_by('sak.nama_anggota',$dir); break;
            case '2': $this->db->order_by('i.tgl_kroscek',$dir); break;
            case '3': $this->db->order_by('i.kroscek_hasil_s1',$dir); break;
            case '4': $this->db->order_by('i.kroscek_hasil_p',$dir); break;
            case '5': $this->db->order_by('i.kroscek_hasil_s2',$dir); break;
            case '6': $this->db->order_by('uk.nama_unit_kerja',$dir); break;
            default: $this->db->order_by('kp.no_rm_tb',$dir); break;
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

    function detail_by_field($field,$value){
        $this->db->select('i.id_kroscek_item,i.kroscek,i.permohonan_lab,DATE_FORMAT(i.tgl_kroscek,"%d-%m-%Y") as tgl_kroscek
                        ,i.kroscek_hasil_s1,i.kroscek_hasil_p,i.kroscek_hasil_s2,i.kualitas_sediaan
                        ,i.kualitas_pewarnaan,k.id_kroscek,DATE_FORMAT(k.tgl_terima,"%d-%m-%Y") as tgl_terima
                        ,DATE_FORMAT(k.tgl_kirim,"%d-%m-%Y") as tgl_kirim,k.yankes,k.petugas_kab,k.petugas_kroscek
                        ,hl.id_hasil_lab,hl.permohonan_lab,DATE_FORMAT(hl.tgl_pemeriksaan,"%d-%m-%Y") as tgl_pemeriksaan
                        ,hl.hasil_s1,hl.hasil_p,hl.hasil_s2,id_permohonan_lab,a.no_rm_tb,diagnosa,kp.reg_upk
                        ,register,tipe_diagnosa,p.nip_pegawai as petugas_kab_nip,p.nama_pegawai petugas_kab_nama
                        ,p2.nip_pegawai as petugas_kroscek_nip,p2.nama_pegawai petugas_kroscek_nama
                        ,sak.nama_anggota,uk.nama_unit_kerja,uk.nama_unit_kerja as yankes_nama',false);
        $this->db->from('tb_kroscek_item i');
        $this->db->join('tb_kroscek k','k.id_kroscek=i.kroscek');
        $this->db->join('tb_hasil_pemeriksaan_lab hl','i.permohonan_lab=hl.permohonan_lab');
        $this->db->join('tb_permohonan_lab a','hl.permohonan_lab=a.id_permohonan_lab');
        $this->db->join('tb_kpp kp','a.no_rm_tb=kp.no_rm_tb');
        $this->db->join('sosial_anggota_keluarga sak', 'kp.no_rm = sak.no_rm');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = k.yankes','left');
        $this->db->join('pegawai p', 'k.petugas_kab = p.id_pegawai','left');
        $this->db->join('pegawai p2', 'k.petugas_kroscek = p2.id_pegawai','left');
        $this->db->where($field,$value);
        return $this->db->get();
    }
    function detail_by_permohonan($permohonan_lab){
        if($result=$this->detail_by_field('i.permohonan_lab',$permohonan_lab)){
            return $result->row_array();
        }
    }
    function detail_by_yankes($yankes){
        if($result=$this->detail_by_field('k.yankes',$yankes)){
            return $result->result_array();
        }
    }

    function save_data() {
        $set['tgl_terima']=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_terima'));
        $set['tgl_kirim']=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_kirim'));
        $set['yankes']=$this->input->post('yankes');
        $set['petugas_kab']=$this->input->post('petugas_kab');
        $set['petugas_kroscek']=$this->input->post('petugas_kroscek');
        $id_kroscek=$this->getidkroscek($set);
        if($id_kroscek>0){
            $set_item['kroscek']=$id_kroscek;
            $set_item['permohonan_lab']=$this->input->post('permohonan_lab');
            $set_item['tgl_kroscek']=preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_kroscek'));
            $set_item['kroscek_hasil_s1']=$this->input->post('kroscek_hasil_s1');
            $set_item['kroscek_hasil_p']=$this->input->post('kroscek_hasil_p');
            $set_item['kroscek_hasil_s2']=$this->input->post('kroscek_hasil_s2');
            $set_item['kualitas_sediaan']=$this->input->post('kualitas_sediaan');
            $set_item['kualitas_pewarnaan']=$this->input->post('kualitas_pewarnaan');
            if($this->input->post('id_kroscek_item')){
                $this->db->set($set_item);
                $this->db->where('id_kroscek_item', $this->input->post('id_kroscek_item'));
                return $this->db->update('tb_kroscek_item');
            }else{
                $this->db->set($set_item);
                return $this->db->insert('tb_kroscek_item');
            }
        }
    }

    function getidkroscek($set){
        $id_kroscek=0;
        $query=$this->db->get_where('tb_kroscek',$set);
        if($data=$query->row_array()){
            $id_kroscek=$data['id_kroscek'];
        }else{
            $this->db->set($set);
            if($this->db->insert('tb_kroscek')){
                $id_kroscek=$this->db->insert_id();
            }
        }
        return $id_kroscek;
    }

    function delete_data($id=0) {
        $this->db->where('id_kroscek_item',$id);
        return $this->db->delete('tb_kroscek_item');
    }

}
