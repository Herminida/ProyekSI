<?php

class M_Pasien extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
   
    function list_data($count=false) {
        $this->db->select('sak.*,no_kk,nama_kk,concat(skk.alamat," RT",skk.rt,"/RW",skk.rw) as alamat
                    ,if(sak.sex="l","Laki-laki","Perempuan") as jenis_kelamin
                    ,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), " Tahun ", if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), " Bulan ", if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), " Hari") AS umur, (year(now())-year(tanggal_lahir))as umurtahun
                    ,nama_kelurahan,nama_kecamatan', false);
        $this->db->from('sosial_anggota_keluarga sak');
        $this->db->join('sosial_kepala_keluarga skk', 'sak.kk_id = skk.id');
        $this->db->join('sosial_kelurahan sk', 'skk.kelurahan_id = sk.id_kelurahan','left');
        $this->db->join('sosial_kecamatan skec','sk.id_kecamatan = skec.id_kecamatan','left');
//        $this->db->where('ar.unit_kerja_id',$this->session->userdata('id_unit_kerja'));
        if($key=$this->input->post('sSearch')){
            $this->db->like('sak.no_rm',$key);
            $this->db->or_like('nik', $key);
            $this->db->or_like('nama_anggota',$key);
            $this->db->or_like('no_kk',$key);
            $this->db->or_like('nama_kk',$key);
        }

        $dir=($this->input->post('sSortDir_0')=='desc')?'desc':'asc';
        switch ($this->input->post('iSortCol_0')) {
            case '1': $this->db->order_by('nik',$dir); break;
            case '2': $this->db->order_by('nama_anggota',$dir); break;
            case '3': $this->db->order_by('no_kk',$dir); break;
            case '4': $this->db->order_by('nama_kk',$dir); break;
            default: $this->db->order_by('sak.no_rm',$dir); break;
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

    function get_sisaAntrian($poli=null){
        $this->db->select('count(idpemeriksaan) as antrian');
        $this->db->from('admission_registrasi ar');
        $this->db->join('admission_bayar ab','ar.bayar_id=ab.id','left');
        $this->db->join('pegawai pgw','ar.petugas_id=pgw.id_pegawai','left');
        $this->db->join('sosial_anggota_keluarga sak', 'ar.anggota_keluarga_id = sak.id');
        $this->db->join('sosial_kepala_keluarga skk', 'sak.kk_id = skk.id');
        $this->db->join('sosial_kelurahan sk', 'skk.kelurahan_id = sk.id_kelurahan','left');
        $this->db->join('sosial_kecamatan skec','sk.id_kecamatan = skec.id_kecamatan','left');
        $this->db->join('admission_klinik akli', 'ar.klinik_id = akli.id');
        if ($this->session->userdata('username')!='admin'){
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = ar.unit_kerja_id');
        $this->db->where('ar.unit_kerja_id',$this->session->userdata('id_unit_kerja'));
        }else{
            $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = ar.unit_kerja_id','left');
        }
        $this->db->where('DATE(tanggal_registrasi)', 'date(CURRENT_TIMESTAMP)',false);
        if (isset($poli) && !empty($poli)) {
            $this->db->where('akli.id', $poli);
        }
            $this->db->where('ar.validasi_reg !=','1');
         $query = $this->db->get();
         return $query->result_array();
    }

    function get_antrianPasien($start=null,$limit=null,$key=null,$poli=null,$tgl=null,$status_kunjungan=null,$dir=null,$sort=null) {
        $this->db->select('ar.id,anggota_keluarga_id,no_kk,klinik_id,bayar_id,petugas_id,tanggal_registrasi,nomor_antrian,ar.unit_kerja_id,validasi_reg,validasi_billing,kunjungan_jenis,sak.no_rm,nik,nama_anggota,tanggal_lahir,puskesmas_id,kk_id,nama_kk,nama_klinik,skk.alamat,nama_kelurahan,nama_kecamatan,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur , (year(now())-year(tanggal_lahir))as umurtahun,idpemeriksaan,nama_unit_kerja,nama_unit_kerja as wilayah,cara_bayar as status,nama_pegawai,if((kunjungan_jenis=1) ,"Lama","Baru" ) as kunjungan', false);
        $this->db->from('admission_registrasi ar');
        $this->db->join('admission_bayar ab','ar.bayar_id=ab.id','left');
        $this->db->join('pegawai pgw','ar.petugas_id=pgw.id_pegawai','left');
        $this->db->join('sosial_anggota_keluarga sak', 'ar.anggota_keluarga_id = sak.id');
        $this->db->join('sosial_kepala_keluarga skk', 'sak.kk_id = skk.id');
        $this->db->join('sosial_kelurahan sk', 'skk.kelurahan_id = sk.id_kelurahan','left');
        $this->db->join('sosial_kecamatan skec','sk.id_kecamatan = skec.id_kecamatan','left');
        $this->db->join('admission_klinik akli', 'ar.klinik_id = akli.id');
        if ($this->session->userdata('username')!='admin'){
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = ar.unit_kerja_id');
        $this->db->where('ar.unit_kerja_id',$this->session->userdata('id_unit_kerja'));
        }else{
            $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = ar.unit_kerja_id','left');
        }
//        $this->db->where('ar.unit_kerja_id',$this->session->userdata('id_unit_kerja'));
      /*  if ($this->session->userdata('fk_unit_kerja') != '') {
            $this->db->where('id_unit_kerja', $this->session->userdata('fk_unit_kerja'));
        }*/
        if (!empty($key)) {
            $where = "(no_kk LIKE '%" . $this->input->post('key') . "%'
               OR sak.no_rm LIKE '%" . $this->input->post('key') . "%'
               OR nama_anggota LIKE '%" . $this->input->post('key') . "%')";
            $this->db->where($where);
        }

        if (isset($poli) && !empty($poli)) {
            $this->db->where('akli.id', $poli);
        }
        

        if (isset($tgl)) {
            $this->db->where('DATE(tanggal_registrasi)', $tgl);
        }else{
            $this->db->where('DATE(tanggal_registrasi)', 'date(CURRENT_TIMESTAMP)',false);
        }
        //pencarian berdasar kolom validasi_reg di kolom 8 pada datatable
        if (isset($_GET['sSearch_8'])) {
            if (($_GET['sSearch_8'] == '0')||($_GET['sSearch_8'] == '')) {
                $this->db->where('validasi_reg', '0');
            } else if ($_GET['sSearch_8'] == '1') {
                $this->db->where('validasi_reg', '1');
            }
        }



        if (isset($dir) && isset($sort)) {
            $this->db->order_by($sort, $dir);
        }
     if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('0','10');
    }
     

         $query = $this->db->get();
          $data['iTotalRecords']= $query->num_rows();
        $data['iTotalDisplayRecords']= $query->num_rows();
        $data['sEcho']=intval($_GET['sEcho']);
        $data['aaData'] = $query->result_array();      
      /*      foreach($query->result_array() as $row_key => $row_val)
      {
         $data['aaData'][$row_key]=array_values($row_val);
         return json_encode($data);
         
    }*/
    return json_encode($data);
}
function get_allpasien($start=null,$limit=null,$key=null,$poli=null,$tgl=null,$status_kunjungan=null,$dir=null,$sort=null) {
        $this->db->select('sak.id,no_kk,sak.no_rm,nik,nama_anggota,tanggal_lahir,kk_id,nama_kk,skk.alamat,nama_kelurahan,nama_kecamatan,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur , (year(now())-year(tanggal_lahir))as umurtahun,', false);
        $this->db->from('sosial_anggota_keluarga sak');
        $this->db->join('sosial_kepala_keluarga skk', 'sak.kk_id = skk.id','left');
        $this->db->join('sosial_kelurahan sk', 'skk.kelurahan_id = sk.id_kelurahan','left');
        $this->db->join('sosial_kecamatan skec','sk.id_kecamatan = skec.id_kecamatan','left');
//        $this->db->where('ar.unit_kerja_id',$this->session->userdata('id_unit_kerja'));
        if (!empty($key)) {
            $where = "(no_kk LIKE '%" . $this->input->post('key') . "%'
               OR sak.no_rm LIKE '%" . $this->input->post('key') . "%'
               OR nama_anggota LIKE '%" . $this->input->post('key') . "%')";
            $this->db->where($where);
        }

        if (isset($dir) && isset($sort)) {
            $this->db->order_by($sort, $dir);
        }
     if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('10','0');
    }
     

         $query = $this->db->get();
        $data['iTotalRecords']= $query->num_rows();
        $data['iTotalDisplayRecords']= $query->num_rows();
        $data['sEcho']=intval($_GET['sEcho']);
        $data['aaData'] = $query->result_array();   
              /*      foreach($query->result_array() as $row_key => $row_val)
      {
         $data['aaData'][$row_key]=array_values($row_val);
         return json_encode($data);
         
    }*/
    return json_encode($data);
}

    // nomor antrian rujuk = nomor antrian poli + 2
    function get_NoAntrianRujuk($id_poli){
        $this->db->select_max('nomor_antrian','nomor_antrian');
        $this->db->from('admission_registrasi ar');
//        $this->db->where('ar.unit_kerja_id',$this->session->userdata('id_unit_kerja'));
        $this->db->where('klinik_id',$id_poli);
        $query = $this->db->get();
        if ($query->num_rows()>0){
            $result=$query->result();
            $no_rujuk = $result[0]->nomor_antrian + 2;
            return  $no_rujuk;
        }else{
            return false;   
        }

    }

    function updateRujukLab(){
      $this->db->set('ket_rujuk','LAB');  
      $this->db->where('idpemeriksaan',$this->input->post('idpemeriksaan'));
      return $this->db->update('admission_registrasi');
    }

    function createRujukAntrian($id,$anggota_keluarga_id,$klinik_id,$bayar_id,$petugas_id,$nomor_antrian,$unit_kerja_id,$kunjungan_jenis,$klinik_perujuk_id,$ket_rujuk=''){
      
        $this->db->set('id',$id);
         $this->db->set('anggota_keluarga_id',$anggota_keluarga_id);
        $this->db->set('klinik_id',$klinik_id);
        $this->db->set('bayar_id',$bayar_id);
        $this->db->set('petugas_id',$petugas_id);
        $this->db->set('tanggal_registrasi','CURRENT_TIMESTAMP',false);
        $this->db->set('nomor_antrian',$nomor_antrian);
        $this->db->set('unit_kerja_id',$unit_kerja_id);
        $this->db->set('validasi_reg','0');
        $this->db->set('validasi_billing','0');
        $this->db->set('kunjungan_jenis',$kunjungan_jenis);
        $this->db->set('klinik_perujuk_id',$klinik_perujuk_id);
        $this->db->set('ket_rujuk',$ket_rujuk);
       
        if ($this->db->insert('admission_registrasi')){
            return true;
        }else{
            return false;
        }
    }

    function get_ListRujukPoli($register){
        $this->db->select('ar.id,klinik_id,nama_klinik,tanggal_registrasi, nomor_antrian, unit_kerja_id,kunjungan_jenis, idpemeriksaan,klinik_perujuk_id,ket_rujuk');
        $this->db->join('admission_klinik ak','ar.klinik_id=ak.id');
        $this->db->where('ar.id',$register);
        $this->db->where('klinik_perujuk_id !=','0');
        $this->db->from('admission_registrasi ar');

        $query = $this->db->get();
        if ($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;   
        }
    }

       function get_NoRMByRegister($register){
        $this->db->select('no_rm');
        $this->db->from('sosial_anggota_keluarga sak');
        $this->db->join('admission_registrasi ar','ar.anggota_keluarga_id=sak.id');
//        $this->db->where('ar.unit_kerja_id',$this->session->userdata('id_unit_kerja'));
        $this->db->where('ar.id',$register);
        $query = $this->db->get();
        if ($query->num_rows()>0){
            $result=$query->result();
            return $result[0]->no_rm;
        }else{
            return false;   
        }
       }

    function get_AlergiPasienByRM($no_rm,$start=null,$limit=null,$sort=null,$dir=null) {
        $this->db->select('id_alergi,no_rm,alergi_obat,tgl , date_format( time_alergi, "%e/%b/%Y %H:%i:%s" ) AS time_alergi, kronis_sebelumnya,kronis_keluarga',false);
        $this->db->from('pasien_alergi s');
        $this->db->where('no_rm', $no_rm);
        if (isset($dir) && isset($sort)) {
            $this->db->order_by($sort, $dir);
        }
        if (!empty($start) && !empty($limit)) {
            $this->db->limit($limit, $start);
        }
         return $this->db->get();
    }


    function createAlergi($no_rm=null,$nama=null,$alergi_obat=null,$kronis_sebelumnya=null,$kronis_keluarga=null) {
        $this->db->set('no_rm', $no_rm);
        $this->db->set('nama', $nama);
        $this->db->set('alergi_obat', $alergi_obat);
        $this->db->set('kronis_sebelumnya', $kronis_sebelumnya);
        $this->db->set('kronis_keluarga', $kronis_keluarga);
        $this->db->set('tgl', date('Y-m-d'));
        return $this->db->insert('pasien_alergi');
    }

    function updateAlergi($id_alergi,$no_rm=null,$nama=null,$alergi_obat=null,$kronis_sebelumnya=null,$kronis_keluarga=null) {
        $this->db->set('no_rm', $no_rm);
        $this->db->set('nama', $nama);
        $this->db->set('alergi_obat', $alergi_obat);
        $this->db->set('kronis_sebelumnya', $kronis_sebelumnya);
        $this->db->set('kronis_keluarga', $kronis_keluarga);
        $this->db->set('tgl', date('Y-m-d'));
        $this->db->where('id_alergi', $id_alergi);
        return $this->db->update('pasien_alergi');
    }

    function deleteAlergi($id_alergi) {
        $this->db->where('id_alergi', $id_alergi);
        return $this->db->delete('pasien_alergi');
    }

    function getCetakDataRujuk($idpemeriksaan){

        $this->db->select('
            ar.id,id_pemeriksaan,no_rm,nama_anggota_keluarga,alamat,cara_bayar,keluhan_utama,keluhan_sekunder,bayar,kelamin,pendidikan,status,time,puskesmas,kk,telp,id_kunjungan,register,no_rm,time_kunjungan,poli,status_kunjungan,antrian,register_rujuk,ket_rujuk,fk_user,unker,f_periksa,f_payment,id_pemeriksaan,keluhan_utama,keluhan_sekunder,respirasi,suhu_badan,denyut_nadi,bb,tb,fisik,register,id_pegawai,nama_pegawai,nip_pegawai,fk_jabatan,pangkat,fk_unit_kerja,id_unit_kerja,kode_unit_kerja,nama_unit_kerja,alamat,telp,fax,kode_jabatan,kepala,nip,id_bidang,kategori,id_kk,no_kk,nama_kk,tempat_lahir_kk,tgl_lahir_kk,pendidikan_kk,pekerjaan_kk,alamat,kelurahan,time,id_kelurahan,nama_kelurahan,id_kecamatan,id_kecamatan,nama_kecamatan,id_diagnosa,register,icd,time_diagnosa,kasus,kode_penyakit,nama_penyakit,subkelompok,id_bayar,nama_bayar,register,umur,
            ,rj.register,
             concat(if((((month(now()) - month(tgl_lahir)) < 1) and((year(now()) - year(tgl_lahir)) < 1)), 0, if(((month(now()) - month(tgl_lahir)) < 0),((year(now()) - year(tgl_lahir)) -1),(year(now()) - year(tgl_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tgl_lahir)) < 0), if(((month(now()) - month(tgl_lahir)) = 0), 0,((month(now()) - month(tgl_lahir)) + 12)),(month(now()) - month(tgl_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tgl_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tgl_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tgl_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur', false);
        $this->db->from('sosial_anggota_keluarga p');
        $this->db->join('sik_t_kunjungan rj', 'rj.no_rm = p.no_rm');
        $this->db->join('sik_pemeriksaan pm', 'pm.register = rj.register', 'left');
        $this->db->join('pegawai peg', 'peg.nip_pegawai = rj.fk_user', 'left');
        $this->db->join('unit_kerja uk', 'uk.id_unit_kerja = rj.unker','left');
        $this->db->join('sosial_kepala_keluarga kk', 'kk.id_kk = p.kk');
        $this->db->join('sosial_kelurahan kl', 'kl.id_kelurahan = kk.kelurahan');
        $this->db->join('sosial_kecamatan kc', 'kc.id_kecamatan = kl.id_kecamatan');
//        $this->db->join('dokter dk', 'dk.nik_dokter = rj.nik_dokter', 'left');
        $this->db->join('sik_diagnosa d', 'rj.register = d.register', 'left');
        $this->db->join('icd_penyakit ic', 'ic.kode_penyakit = d.icd', 'left');
        $this->db->join('admission_bayar b', 'b.id_bayar=p.bayar');
        return $this->db->get();
    }

    //kurang insert update allergi

    function get_pemeriksaanByRegister($idpemeriksaan){
        $this->db->select('id_pemeriksaan,keluhan_utama,keluhan_sekunder,respirasi,suhu_badan,denyut_nadi,bb,tb,fisik,register');
        $this->db->from('sik_pemeriksaan');
        $this->db->join('admission_registrasi ar','ar.idpemeriksaan = sik_pemeriksaan.register');
//        $this->db->where('ar.unit_kerja_id',$this->session->userdata('id_unit_kerja'));
        $this->db->where('register',$idpemeriksaan);
        $this->db->limit('1');
        $query = $this->db->get();
        if ($query->num_rows()>0){
            return $query->result();
        }else{
            return null;   
        }
    }

     //pengambilan bb & tb dari pemeriksaan terakhir
    function get_bbTbTerakhir($anggota_keluarga_id,$idpemeriksaan){
        $this->db->select('bb,tb');
        $this->db->from('sik_pemeriksaan');
        $this->db->join('admission_registrasi ar','ar.idpemeriksaan = sik_pemeriksaan.register');
//        $this->db->where('ar.unit_kerja_id',$this->session->userdata('id_unit_kerja'));
        $this->db->order_by('idpemeriksaan', 'DESC');
        $this->db->where('anggota_keluarga_id', $anggota_keluarga_id);
        $this->db->limit('1');
        $this->db->where('bb !=""');
        $this->db->where('tb !=""');
        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows()>0){
            $query = $query->result();
            return $query[0];
        }else{
            return null;   
        }   

    }

    function simpanPemeriksaan($keluhan_utama=null,$keluhan_sekunder=null,$respirasi=null,$suhu_badan=null,$denyut_nadi=null,$bb=null,$tb=null,$fisik=null,$register=null) {
        $this->db->set('keluhan_utama', $keluhan_utama);
        $this->db->set('keluhan_sekunder', $keluhan_sekunder);
        $this->db->set('respirasi', $respirasi);
        $this->db->set('suhu_badan', $suhu_badan);
        $this->db->set('denyut_nadi', $denyut_nadi);
        $this->db->set('bb', $bb);
        $this->db->set('tb', $tb);
        $this->db->set('fisik', $fisik);
        $this->db->set('register',$register);

        if ($this->db->insert('sik_pemeriksaan')){
            return true;
        }else{
            return false;
        }
    }

    function updatePemeriksaan($keluhan_utama=null,$keluhan_sekunder=null,$respirasi=null,$suhu_badan=null,$denyut_nadi=null,$bb=null,$tb=null,$fisik=null,$id_pemeriksaan) {
        $this->db->set('keluhan_utama', $keluhan_utama);
        $this->db->set('keluhan_sekunder', $keluhan_sekunder);
        $this->db->set('respirasi', $respirasi);
        $this->db->set('suhu_badan', $suhu_badan);
        $this->db->set('denyut_nadi', $denyut_nadi);
        $this->db->set('bb', $bb);
        $this->db->set('tb', $tb);
        $this->db->set('fisik', $fisik);
        $this->db->where('register',$id_pemeriksaan);
        return $this->db->update('sik_pemeriksaan');
    }

    function validasiReg($stat,$register)
    {
        $this->db->set('validasi_reg',$stat);
        $this->db->where('idpemeriksaan', $register);
        return $this->db->update('admission_registrasi');

    }

    function get_historiPasienByRm($no_rm){
        $this->db->select('poli,no_rm,count(register) as jml');
        $this->db->from('admission_registrasi');
        $this->db->where('validasi_reg', 1);
        $this->db->where('no_rm', $no_rm);
        $this->db->group_by('poli');
        return $this->db->get();

    }

    function get_historiDetailPasienByRmnPoli($no_rm,$poli=''){
        //ganti pm.register jadi k.id 
        
        $this->db->select('k.id,k.klinik_id,k.id as register,sak.no_rm,tanggal_registrasi,nama_klinik as poli,ket_rujuk,keluhan_utama,keluhan_sekunder,respirasi,suhu_badan,denyut_nadi,bb,tb,fisik,idpemeriksaan,urine_bj,urine_ph,urine_reduksi,urine_protein,sedimen_eri,sedimen_leuko,sedimen_epitel,sedimen_kristal,sedimen_silinder,sedimen_bakteri,hematologi_hb,hematologi_led,hematologi_lekosit,hematologi_eritrosit,hematologi_trombosit,hematologi_hematrokit,faeces_makroskopis,faeces_mikroskopis,faeces_eri,faeces_leuko,faeces_amuba,faeces_cyste,faeces_ova,mikro_malaria,mikro_pep_gram,mikro_bta,mikro_koh,mikro_a,mikro_b,mikro_c,glukosa_puasa,glukosa_2jam,lth.tes_hamil,lain_pemeriksaan,lain_hasil');
        $this->db->from('admission_registrasi k');
        $this->db->join('sik_pemeriksaan pm', 'pm.register = k.idpemeriksaan','left');
        $this->db->join('sosial_anggota_keluarga sak', 'sak.id = k.anggota_keluarga_id');
        $this->db->join('admission_klinik ak', 'ak.id = k.klinik_id');
        $this->db->join('labkesda_t_hasil lth', 'k.idpemeriksaan = lth.register','left');
        $this->db->join('labkesda_t_kunjungan ltk', 'ltk.register = k.idpemeriksaan','left');
        $this->db->where('sak.no_rm', $no_rm);
        if(!empty($poli)){
            if($poli==9){
               $this->db->where('ltk.register !=','');
            }else{
            $this->db->where('k.klinik_id', $poli);
            }
        }
        $this->db->where('k.validasi_reg','1');
        $this->db->order_by('poli', 'ASC');
        $this->db->order_by('tanggal_registrasi', 'DESC');
        return $this->db->get();

    }

    function get_diagnosaPasienByRm($idpemeriksaan,$dir=null,$sort=null,$start=null,$limit=null){

        $this->db->select('id_diagnosa,p.id,register,icd,time_diagnosa,kasus,kode_penyakit,nama_penyakit,nama_subkelompok,subkelompok,nama_kelompok,kelompok,kasus,IF(kasus=1,"Baru","Lama") as jeniskasus',FALSE) ;
        $this->db->from('sik_diagnosa d');
        $this->db->join('icd_penyakit p', 'd.icd = p.id');
        $this->db->join('icd_subkelompok s', 's.kode_subkelompok = p.subkelompok');
        $this->db->join('icd_kelompok k', 'k.kode_kelompok = s.kelompok');
        $this->db->where('register', $idpemeriksaan);
          if (isset($dir) && isset($sort)) {
            $this->db->order_by($sort, $dir);
        }
        if (!empty($start) && !empty($limit)) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        if ($query->num_rows()>0){
            return $query->result_array();
        }else{
            return '';   
        }
            
   }
   

    function createDiagnosa($idpemeriksaan,$kasus,$kodePenyakit) {
        $this->db->set('register', $idpemeriksaan);
        $this->db->set('kasus', $kasus);
        $this->db->set('icd', $kodePenyakit);
        return $this->db->insert('sik_diagnosa');
    }

    function updateDiagnosa($id_diagnosa,$kasus,$kodePenyakit) {
        $this->db->set('kasus', $kasus);
        $this->db->set('icd', $kodePenyakit);
        $this->db->where('id_diagnosa', $id_diagnosa);
        return $this->db->update('sik_diagnosa');
    }

    function deleteDiagnosa($id_diagnosa) {
        $this->db->where('id_diagnosa', $id_diagnosa);
        return $this->db->delete('sik_diagnosa');
    }

    
    
    function get_tindakanPasienByRegister($register){

        $this->db->select('id_tindakan,register,produk,harga_sp,qtt_produk,time_tindakan,fk_user,id_produk,nama_produk,type,fk_subkategori_produk,js,jp,jm,ja,bhp,adm');
        $this->db->from('sik_t_tindakan t');
        $this->db->join('m_produk p', 'p.id_produk = t.produk');
        $this->db->where('register', $register);
        $this->db->group_by('p.id_produk');

        $query = $this->db->get();
        return $query->result();
    }

    function createTindakan($register,$produk,$harga_sp,$qtt_produk) {
        $this->db->set('register', $register);
        $this->db->set('produk', $produk);
        $this->db->set('harga_sp', $harga_sp);
        $this->db->set('qtt_produk', $qtt_produk);
        $this->db->insert('sik_t_tindakan');
    }

     function updateTindakan($id_tindakan,$produk,$harga_sp,$qtt_produk,$id_tindakan) {
        $this->db->set('register', $register);
        $this->db->set('produk', $produk);
        $this->db->set('harga_sp', $harga_sp);
        $this->db->set('qtt_produk', $qtt_produk);
        $this->db->where('id_tindakan', $id_tindakan);
        $this->db->update('sik_t_tindakan');
    }
    
    function deleteTindakan($id_tindakan) {
        $this->db->where('id_tindakan', $id_tindakan);
        $this->db->delete('sik_t_tindakan');
    }

    

    function get_obatPasienByRegister($register){

        $this->db->select('*,sum(qtt_order) as qtt_order');
        $this->db->from('apt_penjualan_header h');
        $this->db->join('apt_penjualan_item ai', 'ai.id_penjualan = h.id_penjualan');
        $this->db->join('apt_item i', 'i.id_item = ai.id_item');
        $this->db->where('register', $register);
        $this->db->group_by('i.id_item');
        $query = $this->db->get();
        return $query->result();
    }
    //kurang insert update resep

    function get_rujukPoliPasienByRegister($register){

        $this->db->select('id_kunjungan,register,no_rm,time_kunjungan,poli,status_kunjungan,antrian,register_rujuk,ket_rujuk,fk_user,unker,f_periksa,f_payment');
        $this->db->from('sik_t_kunjungan');
        $this->db->where('register_rujuk', $register);
        $query = $this->db->get();
        return $query->result();

    }

    //kurang insert update rujukan

    
    function get_labPasienByRegister($register){

        $this->db->from('labkesda_t_kunjungan');
        $this->db->where('register', $register);
        $query = $this->db->get();
    //    print_r($data->row());
        $res = '';
        if ($query->num_rows() > 0) {
            $query = $query->row();
            if ($query->sedimen == 'on') {
                $res.='Sedimen';
            }

            if ($query->urine == 'on') {
                $res.=', Urine';
            }

            if ($query->hematologi == 'on') {
                $res.=', Hematologi';
            }

            if ($query->bakteriologi == 'on') {
                $res.=', Bakteriologi';
            }
            if ($query->tes_hamil == 'on') {
                $res.=', Tes Hamil';
            }
        }
        //echo $res;
        return $res;
    }

    //kurang insert update laborat


}

?>