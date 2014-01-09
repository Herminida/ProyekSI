<?php
class mtb_dahak extends CI_Model {

    function __construct() {
        parent::__construct();
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
        $this->db->distinct();
        $this->db->from('tb_pemeriksaan_dahak d');
        $this->db->join('tb_kpp tk','d.kpp = tk.id');
        $this->db->join('sosial_anggota_keluarga sak', 'tk.no_rm = sak.no_rm');
        $this->db->join('sosial_kepala_keluarga skk', 'sak.kk_id = skk.id');
        $this->db->join('sosial_kelurahan kel', 'skk.kelurahan_id = kel.id_kelurahan','left');
        $this->db->join('sosial_kecamatan kec','kel.id_kecamatan = kec.id_kecamatan','left');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = tk.unker','left');

        if($key=$this->input->post('sSearch')){
            $this->db->like('tk.no_rm_tb',$key);
            $this->db->or_like('sak.nama_anggota', $key);
            $this->db->or_like('tk.nama_pmo',$key);
            $this->db->or_like('tk.status_pmo',$key);
            $this->db->or_like('uk.nama_unit_kerja',$key);
        }

        $dir=($this->input->post('sSortDir_0')=='desc')?'desc':'asc';
        switch ($this->input->post('iSortCol_0')) {
            case '1': $this->db->order_by('sak.nama_anggota',$dir); break;
            case '2': $this->db->order_by('tk.nama_pmo',$dir); break;
            case '3': $this->db->order_by('tk.status_pmo',$dir); break;
            case '4': $this->db->order_by('uk.nama_unit_kerja',$dir); break;
            default: $this->db->order_by('tk.no_rm_tb',$dir); break;
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

    function get_hasil($kpp){
        $this->db->select('id_pemeriksaan,bulan,no_reg,bb,hasil_s1,hasil_p,hasil_s2
                        ,DATE_FORMAT(tgl_pemeriksaan,"%d-%m-%Y") as tgl_pemeriksaan',false);
        $this->db->from('tb_pemeriksaan_dahak d');
        $this->db->join('tb_permohonan_lab l','d.no_reg=l.register','left');
        $this->db->join('tb_hasil_pemeriksaan_lab h','l.id_permohonan_lab=h.permohonan_lab','left');
        $this->db->where('kpp',$kpp);
        $this->db->order_by('id_pemeriksaan');
        return $this->db->get();
    }

    function save_data($kpp) {
        $return=false;
        $this->db->where('kpp',$kpp);
        $this->db->delete('tb_pemeriksaan_dahak');
        if($hasil['bulan']=$this->input->post('bulan')){
            $hasil['no_reg']=$this->input->post('no_reg');
            $hasil['bb']=$this->input->post('bb');
            $hasil['id_pemeriksaan']=$this->input->post('id_pemeriksaan');
            foreach ($hasil['bulan'] as $key => $value) {
                $this->db->set('id_pemeriksaan', $hasil['id_pemeriksaan'][$key]);
                $this->db->set('kpp', $kpp);
                $this->db->set('bulan', $hasil['bulan'][$key]);
                $this->db->set('no_reg', $hasil['no_reg'][$key]);
                $this->db->set('bb', $hasil['bb'][$key]);
                $return=$this->db->insert('tb_pemeriksaan_dahak');
            }
        }
        return $return;
    }

    function delete_data($kpp=0) {
        $this->db->where('kpp',$kpp);
        return $this->db->delete('tb_pemeriksaan_dahak');
    }

}
