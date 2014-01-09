<?php
class mtb_lab extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_data($count=false) {
        $this->db->select('hl.id_hasil_lab,hl.permohonan_lab
                        ,DATE_FORMAT(hl.tgl_pemeriksaan,"%d-%m-%Y") as tgl_pemeriksaan
                        ,hl.hasil_s1,hl.hasil_p,hl.hasil_s2,hl.laboran,hl.ket_hasil_lab
                        ,id_permohonan_lab,a.no_rm_tb,yankes,diagnosa
                        ,register,tipe_diagnosa,p.nip_pegawai,p.nama_pegawai
                        ,CONCAT(reg_upk,"/",reg_kab,"/",register," ",diagnosa) as no_identitas_sedian
                        ,sak.nama_anggota,uk.nama_unit_kerja',false);
        $this->db->from('tb_hasil_pemeriksaan_lab hl');
        $this->db->join('tb_permohonan_lab a','hl.permohonan_lab=a.id_permohonan_lab');
        $this->db->join('tb_kpp kp','a.no_rm_tb=kp.no_rm_tb');
        $this->db->join('sosial_anggota_keluarga sak', 'kp.no_rm = sak.no_rm');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = a.yankes','left');
        $this->db->join('pegawai p', 'hl.laboran = p.id_pegawai','left');

        if($key=$this->input->post('sSearch')){
            $this->db->like('a.register',$key);
            $this->db->or_like('a.no_rm_tb', $key);
            $this->db->or_like('sak.nama_anggota', $key);
            $this->db->or_like('uk.nama_unit_kerja',$key);
            $this->db->or_like('p.nama_pegawai',$key);
            $this->db->or_like('diagnosa',$key);
            $this->db->or_like('hl.tgl_pemeriksaan',$key);
            $this->db->or_like('hl.hasil_s1',$key);
            $this->db->or_like('hl.hasil_p',$key);
            $this->db->or_like('hl.hasil_s2',$key);
        }

        $dir=($this->input->post('sSortDir_0')=='desc')?'desc':'asc';
        switch ($this->input->post('iSortCol_0')) {
            case '1': $this->db->order_by('a.no_rm_tb',$dir); break;
            case '2': $this->db->order_by('sak.nama_anggota',$dir); break;
            case '3': $this->db->order_by('uk.nama_unit_kerja',$dir); break;
            case '4': $this->db->order_by('p.nama_pegawai',$dir); break;
            case '5': $this->db->order_by('diagnosa',$dir); break;
            case '6': $this->db->order_by('hl.tgl_pemeriksaan',$dir); break;
            case '7': $this->db->order_by('hl.hasil_s1',$dir); break;
            case '8': $this->db->order_by('hl.hasil_p',$dir); break;
            case '9': $this->db->order_by('hl.hasil_s2',$dir); break;
            default: $this->db->order_by('register',$dir); break;
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

    function list_laporan() {
        $this->db->select('hl.id_hasil_lab,hl.permohonan_lab
                        ,DATE_FORMAT(hl.tgl_pemeriksaan,"%d-%m-%Y") as tgl_pemeriksaan
                        ,hl.hasil_s1,hl.hasil_p,hl.hasil_s2,hl.laboran,hl.ket_hasil_lab
                        ,id_permohonan_lab,a.no_rm_tb,yankes,diagnosa
                        ,register,tipe_diagnosa,p.nip_pegawai,p.nama_pegawai
                        ,CONCAT(reg_upk,"/",reg_kab,"/",register," ",diagnosa) as no_identitas_sedian
                        ,sak.nama_anggota,concat(skk.alamat," RT",skk.rt,"/RW",skk.rw) as alamat,sak.sex
                        ,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), " Tahun ", if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), " Bulan ", if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), " Hari") AS umur
                        ,uk.nama_unit_kerja',false);
        $this->db->from('tb_hasil_pemeriksaan_lab hl');
        $this->db->join('tb_permohonan_lab a','hl.permohonan_lab=a.id_permohonan_lab');
        $this->db->join('tb_kpp kp','a.no_rm_tb=kp.no_rm_tb');
        $this->db->join('sosial_anggota_keluarga sak', 'kp.no_rm = sak.no_rm');
        $this->db->join('sosial_kepala_keluarga skk', 'sak.kk_id = skk.id');
        $this->db->join('sosial_kelurahan kel', 'skk.kelurahan_id = kel.id_kelurahan','left');
        $this->db->join('sosial_kecamatan kec','kel.id_kecamatan = kec.id_kecamatan','left');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = a.yankes','left');
        $this->db->join('pegawai p', 'hl.laboran = p.id_pegawai','left');
        return $this->db->get();
    }

    function detail_by_permohonan($permohonan){
        $this->db->select('hl.id_hasil_lab,hl.permohonan_lab
                        ,DATE_FORMAT(hl.tgl_pemeriksaan,"%d-%m-%Y") as tgl_pemeriksaan
                        ,hl.hasil_s1,hl.hasil_p,hl.hasil_s2,hl.laboran,hl.ket_hasil_lab
                        ,id_permohonan_lab,a.no_rm_tb,yankes,diagnosa
                        ,register,tipe_diagnosa,p.nip_pegawai,p.nama_pegawai
                        ,CONCAT(reg_upk,"/",reg_kab,"/",register," ",diagnosa) as no_identitas_sedian
                        ,sak.nama_anggota,uk.nama_unit_kerja',false);
        $this->db->from('tb_hasil_pemeriksaan_lab hl');
        $this->db->join('tb_permohonan_lab a','hl.permohonan_lab=a.id_permohonan_lab');
        $this->db->join('tb_kpp kp','a.no_rm_tb=kp.no_rm_tb');
        $this->db->join('sosial_anggota_keluarga sak', 'kp.no_rm = sak.no_rm');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = a.yankes','left');
        $this->db->join('pegawai p', 'hl.laboran = p.id_pegawai','left');
        $this->db->where('hl.permohonan_lab',$permohonan);
        if($result=$this->db->get()){
            return $result->row_array();
        }
    }

    function save_data() {
        $this->db->set('permohonan_lab', $this->input->post('permohonan_lab'));
        $this->db->set('tgl_pemeriksaan', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_pemeriksaan')));
        $this->db->set('hasil_s1', $this->input->post('hasil_s1'));
        $this->db->set('hasil_p', $this->input->post('hasil_p'));
        $this->db->set('hasil_s2', $this->input->post('hasil_s2'));
        $this->db->set('laboran', $this->input->post('laboran'));
        $this->db->set('ket_hasil_lab', $this->input->post('ket_hasil_lab'));
        if($this->input->post('id_hasil_lab')){
            $this->db->where('id_hasil_lab',$this->input->post('id_hasil_lab'));
            return $this->db->update('tb_hasil_pemeriksaan_lab');
        }else{
            return $this->db->insert('tb_hasil_pemeriksaan_lab');
        }
    }

    function delete_data($id=0) {
        $this->db->where('id_hasil_lab',$id);
        return $this->db->delete('tb_hasil_pemeriksaan_lab');
    }

}
