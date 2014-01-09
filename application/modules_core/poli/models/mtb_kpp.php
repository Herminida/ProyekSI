<?php
class mtb_kpp extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function list_master_data($count=false) {
        $dir=($this->input->post('sSortDir_0')=='desc')?'desc':'asc';
        switch ($this->input->post('iSortCol_0')) {
            case '1': $this->db->order_by('nama',$dir); break;
            case '2': $this->db->order_by('type',$dir); break;
            default: $this->db->order_by('id',$dir); break;
        }

        if($count){
            return $this->db->count_all_results('tb_m_kpp');
        }else{
            if($limit=$this->input->post('iDisplayLength')){
                $this->db->limit($limit,$this->input->post('iDisplayStart'));
            }else{
                $this->db->limit(10);
            }
            return $this->db->get('tb_m_kpp');
        }
    }

    function save_master_data() {
        $this->db->set('nama', $this->input->post('nama'));
        $this->db->set('type', $this->input->post('type'));
        if($this->input->post('id')){
            $this->db->where('id',$this->input->post('id'));
            return $this->db->update('tb_m_kpp');
        }else{
            return $this->db->insert('tb_m_kpp');
        }
    }

    function delete_master_data($id=0) {
        $this->db->where('id', $id);
        return $this->db->delete('tb_m_kpp');
    }

    function list_data($count=false) {
        $this->db->select('tk.id,tk.no_rm,tk.no_rm_tb,tk.reg_upk,tk.reg_kab,tk.nama_pmo
                        ,tk.status_pmo,tk.alamat_pmo,tk.parut_bcg,tk.riwayat_pengobatan
                        ,tk.catatan,tk.perujuk,tk.klasifikasi,tk.tipe_pasien,tk.pindahan_reg_kab
                        ,DATE_FORMAT(tk.pindahan_tgl_berobat,"%d-%m-%Y") as pindahan_tgl_berobat
                        ,tk.tahap_intensif,tk.jenis_obat,tk.hasil_akhir,tk.hasil_ket
                        ,DATE_FORMAT(tk.tgl,"%d-%m-%Y") as tgl,tk.user,tk.unker,sak.nik
                        ,sak.nama_anggota,concat(skk.alamat," RT",skk.rt,"/RW",skk.rw) as alamat
                        ,sak.sex,if(sak.sex="l" or sak.sex="Laki-laki","Laki-laki","Perempuan") as jenis_kelamin
                        ,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), " Tahun ", if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), " Bulan ", if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), " Hari") AS umur
                        ,kel.nama_kelurahan,kec.nama_kecamatan,uk.nama_unit_kerja',false);
        $this->db->from('tb_kpp tk');
        $this->db->join('sosial_anggota_keluarga sak', 'tk.no_rm = sak.no_rm');
        $this->db->join('sosial_kepala_keluarga skk', 'sak.kk_id = skk.id');
        $this->db->join('sosial_kelurahan kel', 'skk.kelurahan_id = kel.id_kelurahan','left');
        $this->db->join('sosial_kecamatan kec','kel.id_kecamatan = kec.id_kecamatan','left');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = tk.unker','left');

        if($key=$this->input->post('sSearch')){
            $this->db->like('tk.no_rm',$key);
            $this->db->or_like('sak.nama_anggota', $key);
            $this->db->or_like('tk.perujuk',$key);
            $this->db->or_like('tk.tipe_pasien',$key);
            $this->db->or_like('tk.reg_upk',$key);
            $this->db->or_like('tk.reg_kab',$key);
            $this->db->or_like('tk.tgl',$key);
            $this->db->or_like('uk.nama_unit_kerja',$key);
        }

        $dir=($this->input->post('sSortDir_0')=='desc')?'desc':'asc';
        switch ($this->input->post('iSortCol_0')) {
            case '1': $this->db->order_by('sak.nama_anggota',$dir); break;
            case '2': $this->db->order_by('tk.perujuk',$dir); break;
            case '3': $this->db->order_by('tk.tipe_pasien',$dir); break;
            case '4': $this->db->order_by('tk.reg_upk',$dir); break;
            case '5': $this->db->order_by('tk.reg_kab',$dir); break;
            case '6': $this->db->order_by('tk.tgl',$dir); break;
            case '7': $this->db->order_by('uk.nama_unit_kerja',$dir); break;
            default: $this->db->order_by('tk.no_rm',$dir); break;
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

    function get_data_by($field,$value=null) {
        $this->db->select('tk.id,tk.no_rm,tk.no_rm_tb,tk.reg_upk,tk.reg_kab,tk.nama_pmo
                        ,tk.status_pmo,tk.alamat_pmo,tk.parut_bcg,tk.riwayat_pengobatan
                        ,tk.catatan,tk.perujuk,tk.klasifikasi,tk.tipe_pasien,tk.pindahan_reg_kab
                        ,DATE_FORMAT(tk.pindahan_tgl_berobat,"%d-%m-%Y") as pindahan_tgl_berobat
                        ,tk.tahap_intensif,tk.jenis_obat,tk.hasil_akhir,tk.hasil_ket
                        ,DATE_FORMAT(tk.tgl,"%d-%m-%Y") as tgl,tk.user,tk.unker,sak.nik,sak.telepon
                        ,sak.nama_anggota,concat(skk.alamat," RT",skk.rt,"/RW",skk.rw) as alamat
                        ,sak.sex,if(sak.sex="l" or sak.sex="Laki-laki","Laki-laki","Perempuan") as jenis_kelamin
                        ,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), " Tahun ", if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), " Bulan ", if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), " Hari") AS umur
                        ,kel.nama_kelurahan,kec.nama_kecamatan,uk.nama_unit_kerja',false);
        $this->db->from('tb_kpp tk');
        $this->db->join('sosial_anggota_keluarga sak', 'tk.no_rm = sak.no_rm');
        $this->db->join('sosial_kepala_keluarga skk', 'sak.kk_id = skk.id');
        $this->db->join('sosial_kelurahan kel', 'skk.kelurahan_id = kel.id_kelurahan','left');
        $this->db->join('sosial_kecamatan kec','kel.id_kecamatan = kec.id_kecamatan','left');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = tk.unker','left');
        $this->db->where($field,$value);
        if($result=$this->db->get()){
            return $result->row_array();
        }
    }
    function get_data_by_id($id='') {
        return $this->get_data_by('tk.id',$id);
    }
    function get_data_by_rm($no_rm='') {
        return $this->get_data_by('tk.no_rm',$no_rm);
    }
    function get_data_by_rm_tb($no_rm_tb='') {
        return $this->get_data_by('tk.no_rm_tb',$no_rm_tb);
    }

    function get_kontak($kpp){
        $this->db->select('id,nama,kelamin,DATE_FORMAT(tgl_lahir,"%d-%m-%Y") as tgl_lahir
                        ,DATE_FORMAT(tgl_periksa,"%d-%m-%Y") as tgl_periksa,hasil',false);
        $this->db->where('kpp',$kpp);
        $this->db->order_by('id');
        return $this->db->get('tb_kpp_kontak');
    }

    function get_dosis($kpp){
        $this->db->select('id,kdt,streptomichin,katriokmosasol,arv,lainnya',false);
        $this->db->where('kpp',$kpp);
        $this->db->order_by('id');
        return $this->db->get('tb_kpp_dosis');
    }

    function get_jadwal($kpp){
        $this->db->select('id,DATE_FORMAT(tgl,"%d-%m-%Y") as tgl',false);
        $this->db->where('kpp',$kpp);
        $this->db->order_by('id');
        return $this->db->get('tb_kpp_jadwal');
    }

    function save_data() {
        $this->db->set('no_rm', $this->input->post('no_rm'));
        // $this->db->set('no_rm_tb', $this->input->post('no_rm_tb'));
        $this->db->set('reg_upk', $this->input->post('reg_upk'));
        $this->db->set('reg_kab', $this->input->post('reg_kab'));
        $this->db->set('nama_pmo', $this->input->post('nama_pmo'));
        $this->db->set('status_pmo', $this->input->post('status_pmo'));
        $this->db->set('alamat_pmo', $this->input->post('alamat_pmo'));
        $this->db->set('parut_bcg', $this->input->post('parut_bcg'));
        $this->db->set('riwayat_pengobatan', $this->input->post('riwayat_pengobatan'));
        $this->db->set('catatan', $this->input->post('catatan'));
        $this->db->set('perujuk', $this->input->post('perujuk'));
        $this->db->set('klasifikasi', $this->input->post('klasifikasi'));
        $this->db->set('tipe_pasien', $this->input->post('tipe_pasien'));
        $this->db->set('pindahan_reg_kab', $this->input->post('pindahan_reg_kab'));
        $this->db->set('pindahan_tgl_berobat', $this->input->post('pindahan_tgl_berobat'));
        $this->db->set('tahap_intensif', $this->input->post('tahap_intensif'));
        $this->db->set('jenis_obat', $this->input->post('jenis_obat'));
        $this->db->set('hasil_akhir', $this->input->post('hasil_akhir'));
        $this->db->set('hasil_ket', $this->input->post('hasil_ket'));
        $this->db->set('user', $this->session->userdata('user_id'));
        $this->db->set('unker', $this->input->post('unker'));
        $return=false;
        if($this->input->post('id')){
            $this->db->where('id',$this->input->post('id'));
            if($return=$this->db->update('tb_kpp')){
                $id=$this->input->post('id');
            }
        }else{
            $this->db->set('tgl', date('Y-m-d'));
            if($return=$this->db->insert('tb_kpp')){
                $id=$this->db->insert_id();
                $no_rm_tb='TB';
                for ($i=strlen(''.$id); $i<5; $i++) {
                    $no_rm_tb.='0';
                }
                $this->db->set('no_rm_tb', $no_rm_tb.$id);
                $this->db->where('id',$id);
                $this->db->update('tb_kpp');
            }
        }
        if($return){
            $this->db->where('kpp',$id);
            $this->db->delete('tb_kpp_dosis');
            if($dosis['arv']=$this->input->post('dosis_arv')){
                $dosis['katriokmosasol']=$this->input->post('dosis_katriokmosasol');
                $dosis['kdt']=$this->input->post('dosis_kdt');
                $dosis['lainnya']=$this->input->post('dosis_lainnya');
                $dosis['streptomichin']=$this->input->post('dosis_streptomichin');
                foreach ($dosis['arv'] as $key => $value) {
                    $this->db->set('kpp', $id);
                    $this->db->set('kdt', $dosis['kdt'][$key]);
                    $this->db->set('streptomichin', $dosis['streptomichin'][$key]);
                    $this->db->set('katriokmosasol', $dosis['katriokmosasol'][$key]);
                    $this->db->set('arv', $dosis['arv'][$key]);
                    $this->db->set('lainnya', $dosis['lainnya'][$key]);
                    $this->db->insert('tb_kpp_dosis');
                }
            }
            $this->db->where('kpp',$id);
            $this->db->delete('tb_kpp_kontak');
            if($kontak['hasil']=$this->input->post('kontak_hasil')){
                $kontak['kelamin']=$this->input->post('kontak_kelamin');
                $kontak['nama']=$this->input->post('kontak_nama');
                $kontak['tgl_lahir']=$this->input->post('kontak_tgl_lahir');
                $kontak['tgl_periksa']=$this->input->post('kontak_tgl_periksa');
                foreach ($kontak['nama'] as $key => $value) {
                    $this->db->set('kpp', $id);
                    $this->db->set('nama', $kontak['nama'][$key]);
                    $this->db->set('kelamin', $kontak['kelamin'][$key]);
                    $this->db->set('tgl_lahir', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$kontak['tgl_lahir'][$key]));
                    $this->db->set('tgl_periksa', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$kontak['tgl_periksa'][$key]));
                    $this->db->set('hasil', $kontak['hasil'][$key]);
                    $this->db->insert('tb_kpp_kontak');
                }
            }
            $this->db->where('kpp',$id);
            $this->db->delete('tb_kpp_jadwal');
            if($jadwal['tgl']=$this->input->post('jadwal_tgl')){
                foreach ($jadwal['tgl'] as $key => $value) {
                    $this->db->set('kpp', $id);
                    $this->db->set('tgl', preg_replace("/(\d{2})-(\d{2})-(\d{4})/","$3/$2/$1",$jadwal['tgl'][$key]));
                    $this->db->insert('tb_kpp_jadwal');
                }
            }
        }
        return $return;
    }

    function delete_data($id=0) {
        $this->db->where('kpp',$id);
        $this->db->delete('tb_kpp_dosis');
        $this->db->where('kpp',$id);
        $this->db->delete('tb_kpp_kontak');
        $this->db->where('kpp',$id);
        $this->db->delete('tb_kpp_jadwal');
        $this->db->where('id', $id);
        return $this->db->delete('tb_kpp');
    }

}
