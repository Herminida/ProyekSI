<?php
class mtb_kip extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_data($count=false) {
        $this->db->select('i.id_kip_header,i.no_rm_tb,i.catatan,i.time,sak.nik,p.unker
                        ,sak.nama_anggota,concat(skk.alamat," RT",skk.rt,"/RW",skk.rw) as alamat
                        ,sak.sex,if(sak.sex="l" or sak.sex="Laki-laki","Laki-laki","Perempuan") as jenis_kelamin
                        ,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), " Tahun ", if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), " Bulan ", if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), " Hari") AS umur
                        ,kel.nama_kelurahan,kec.nama_kecamatan,uk.nama_unit_kerja',false);
        $this->db->from('tb_kip_header i');
        $this->db->join('tb_kpp p','i.no_rm_tb=p.no_rm_tb');
        $this->db->join('sosial_anggota_keluarga sak', 'p.no_rm = sak.no_rm');
        $this->db->join('sosial_kepala_keluarga skk', 'sak.kk_id = skk.id');
        $this->db->join('sosial_kelurahan kel', 'skk.kelurahan_id = kel.id_kelurahan','left');
        $this->db->join('sosial_kecamatan kec','kel.id_kecamatan = kec.id_kecamatan','left');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = p.unker','left');

        if($key=$this->input->post('sSearch')){
            $this->db->like('i.no_rm_tb',$key);
            $this->db->or_like('sak.nik', $key);
            $this->db->or_like('sak.nama_anggota', $key);
            $this->db->or_like('skk.alamat',$key);
            $this->db->or_like('i.catatan',$key);
            $this->db->or_like('uk.nama_unit_kerja',$key);
        }

        $dir=($this->input->post('sSortDir_0')=='desc')?'desc':'asc';
        switch ($this->input->post('iSortCol_0')) {
            case '1': $this->db->order_by('sak.nik',$dir); break;
            case '2': $this->db->order_by('sak.nama_anggota',$dir); break;
            case '3': $this->db->order_by('alamat',$dir); break;
            case '4': $this->db->order_by('umur',$dir); break;
            case '5': $this->db->order_by('i.catatan',$dir); break;
            case '6': $this->db->order_by('uk.nama_unit_kerja',$dir); break;
            default: $this->db->order_by('i.no_rm_tb',$dir); break;
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

    function get_data_by_rm_tb($no_rm_tb='') {
        $this->db->select('i.id_kip_header,i.no_rm_tb,i.catatan,i.time,sak.nik,p.unker
                        ,sak.nama_anggota,concat(skk.alamat," RT",skk.rt,"/RW",skk.rw) as alamat
                        ,sak.sex,if(sak.sex="l" or sak.sex="Laki-laki","Laki-laki","Perempuan") as jenis_kelamin
                        ,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), " Tahun ", if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), " Bulan ", if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), " Hari") AS umur
                        ,kel.nama_kelurahan,kec.nama_kecamatan,uk.nama_unit_kerja',false);
        $this->db->from('tb_kip_header i');
        $this->db->join('tb_kpp p','i.no_rm_tb=p.no_rm_tb');
        $this->db->join('sosial_anggota_keluarga sak', 'p.no_rm = sak.no_rm');
        $this->db->join('sosial_kepala_keluarga skk', 'sak.kk_id = skk.id');
        $this->db->join('sosial_kelurahan kel', 'skk.kelurahan_id = kel.id_kelurahan','left');
        $this->db->join('sosial_kecamatan kec','kel.id_kecamatan = kec.id_kecamatan','left');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = p.unker','left');
        $this->db->where('i.no_rm_tb',$no_rm_tb);
        if($result=$this->db->get()){
            return $result->row_array();
        }
    }

    function get_konsul($header){
        $this->db->select('id_konsul,DATE_FORMAT(tgl_konsul,"%d-%m-%Y") as tgl_konsul,tahap
                        ,jml_obat,DATE_FORMAT(tgl_kembali,"%d-%m-%Y") as tgl_kembali',false);
        $this->db->where('header',$header);
        $this->db->order_by('id_konsul');
        return $this->db->get('tb_kip_konsul_dokter');
    }

    function get_periksa($header){
        $this->db->select('id_dahak,DATE_FORMAT(tgl_pengambilan,"%d-%m-%Y") as tgl_pengambilan,bulan',false);
        $this->db->where('header',$header);
        $this->db->order_by('id_dahak');
        return $this->db->get('tb_kip_periksa_dahak');
    }

    function save_data() {
        $this->db->set('no_rm_tb', $this->input->post('no_rm_tb'));
        $this->db->set('catatan', $this->input->post('catatan'));
        $this->db->set('fk_user', $this->session->userdata('user_id'));
        $this->db->set('time', time());
        $return=false;
        if($this->input->post('id_kip_header')){
            $this->db->where('id_kip_header',$this->input->post('id_kip_header'));
            if($return=$this->db->update('tb_kip_header')){
                $id_kip_header=$this->input->post('id_kip_header');
            }
        }else{
            if($return=$this->db->insert('tb_kip_header')){
                $id_kip_header=$this->db->insert_id();
            }
        }
        if($return){
            $this->db->where('header',$id_kip_header);
            $this->db->delete('tb_kip_konsul_dokter');
            if($konsul['tgl_konsul']=$this->input->post('tgl_konsul')){
                $konsul['tahap']=$this->input->post('tahap');
                $konsul['jml_obat']=$this->input->post('jml_obat');
                $konsul['tgl_kembali']=$this->input->post('tgl_kembali');
                foreach ($konsul['tgl_konsul'] as $key => $value) {
                    $this->db->set('header', $id_kip_header);
                    $this->db->set('tgl_konsul', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$konsul['tgl_konsul'][$key]));
                    $this->db->set('tahap', $konsul['tahap'][$key]);
                    $this->db->set('jml_obat', $konsul['jml_obat'][$key]);
                    $this->db->set('tgl_kembali', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$konsul['tgl_kembali'][$key]));
                    $this->db->insert('tb_kip_konsul_dokter');
                }
            }
            $this->db->where('header',$id_kip_header);
            $this->db->delete('tb_kip_periksa_dahak');
            if($periksa['tgl_pengambilan']=$this->input->post('tgl_pengambilan')){
                $periksa['bulan']=$this->input->post('bulan');
                foreach ($periksa['tgl_pengambilan'] as $key => $value) {
                    $this->db->set('header', $id_kip_header);
                    $this->db->set('tgl_pengambilan', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$periksa['tgl_pengambilan'][$key]));
                    $this->db->set('bulan', $periksa['bulan'][$key]);
                    $this->db->insert('tb_kip_periksa_dahak');
                }
            }
        }
        return $return;
    }

    function delete_data($id_kip_header=0) {
        $this->db->where('header',$id_kip_header);
        $this->db->delete('tb_kip_konsul_dokter');
        $this->db->where('header',$id_kip_header);
        $this->db->delete('tb_kip_periksa_dahak');
        $this->db->where('id_kip_header', $id_kip_header);
        return $this->db->delete('tb_kip_header');
    }

}
