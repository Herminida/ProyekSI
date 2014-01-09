<?php
class mtb_rujukan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_data($count=false) {
        $this->db->select('r.id_rujukan,r.kpp,r.nama_instansi,r.telp_instansi,r.user
                        ,DATE_FORMAT(r.tgl_rujukan,"%d-%m-%Y") as tgl_rujukan
                        ,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), " Tahun ", if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), " Bulan ", if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), " Hari") AS umur
                        ,kp.no_rm_tb,kp.unker,sak.nama_anggota,uk.nama_unit_kerja',false);
        $this->db->from('tb_rujukan r');
        $this->db->join('tb_kpp kp','r.kpp=kp.id');
        $this->db->join('sosial_anggota_keluarga sak', 'kp.no_rm = sak.no_rm');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = kp.unker','left');

        if($key=$this->input->post('sSearch')){
            $this->db->like('kp.no_rm_tb',$key);
            $this->db->or_like('sak.nama_anggota', $key);
            $this->db->or_like('r.nama_instansi',$key);
            $this->db->or_like('r.telp_instansi',$key);
            $this->db->or_like('r.tgl_rujukan',$key);
            $this->db->or_like('uk.nama_unit_kerja',$key);
        }

        $dir=($this->input->post('sSortDir_0')=='desc')?'desc':'asc';
        switch ($this->input->post('iSortCol_0')) {
            case '1': $this->db->order_by('sak.nama_anggota',$dir); break;
            case '2': $this->db->order_by('tanggal_lahir',$dir); break;
            case '3': $this->db->order_by('r.nama_instansi',$dir); break;
            case '4': $this->db->order_by('r.telp_instansi',$dir); break;
            case '5': $this->db->order_by('r.tgl_rujukan',$dir); break;
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

    function detail_by_kpp($id){
        $this->db->select('r.id_rujukan,r.kpp,r.nama_instansi,r.telp_instansi,r.user
                        ,DATE_FORMAT(r.tgl_rujukan,"%d-%m-%Y") as tgl_rujukan
                        ,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), " Tahun ", if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), " Bulan ", if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), " Hari") AS umur
                        ,kp.no_rm_tb,kp.unker,sak.nama_anggota,uk.nama_unit_kerja',false);
        $this->db->from('tb_rujukan r');
        $this->db->join('tb_kpp kp','r.kpp=kp.id');
        $this->db->join('sosial_anggota_keluarga sak', 'kp.no_rm = sak.no_rm');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = kp.unker','left');
        $this->db->where('r.kpp',$id);
        if($result=$this->db->get()){
            return $result->row_array();
        }
    }

    function save_data() {
        $this->db->set('kpp', $this->input->post('kpp'));
        $this->db->set('tgl_rujukan', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$this->input->post('tgl_rujukan')));
        $this->db->set('nama_instansi', $this->input->post('nama_instansi'));
        $this->db->set('telp_instansi', $this->input->post('telp_instansi'));
        $this->db->set('user', $this->session->userdata('user'));
        $this->db->set('unker', $this->input->post('unker'));
        if($this->input->post('id_rujukan')){
            $this->db->where('id_rujukan',$this->input->post('id_rujukan'));
            return $this->db->update('tb_rujukan');
        }else{
            return $this->db->insert('tb_rujukan');
        }
    }

    function delete_data($id=0) {
        $this->db->where('id_rujukan',$id);
        return $this->db->delete('tb_rujukan');
    }

}
