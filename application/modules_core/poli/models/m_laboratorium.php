<?php

class M_Laboratorium extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
   

	 function get_listDataTabRujuk($no_rm) {
        $this->db->select('SQL_CALC_FOUND_ROWS id_lab, no_rm, register_labkesda, register, pemeriksaan,lain, hasil, biaya, dari_poli, sedimen, urine, hematologi, bakteriologi, tes_hamil, date_format(time_lab,"%d-%m-%Y") as time_lab',false);
        $this->db->from('labkesda_t_kunjungan k');
        $this->db->where('no_rm', $no_rm);
    

        if (isset($_POST['dir']) && isset($_POST['sort'])) {
            $this->db->order_by($_POST['sort'], $_POST['dir']);
        }else{
            $this->db->order_by('time_lab','desc');
        }
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
      {
       $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
      }else{
          $this->db->limit(10,0);
      }

    $query = $this->db->get();
    $data['sEcho']=(isset($_GET['sEcho'])?intval($_GET['sEcho']):'0');
    $data['aaData']= $query->result();
    $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
    $data['iTotalDisplayRecords']=$query->row()->Count;;
    $data['iTotalRecords']= $query->row()->Count;;
        return json_encode($data);
    }

        /*$query = $this->db->query('
        SELECT ar.id,id_lab,idpemeriksaan,validasi_reg,unit_kerja_id,nik,nomor_antrian,kunjungan_jenis, if((kunjungan_jenis=1),"Lama","Baru" ) as kunjungan
            ,skk.alamat,nama_kecamatan,nama_kelurahan,nama_kk,no_kk,cara_bayar,f_sampling,nama_unit_kerja,date_format("%d-%m-%Y",tanggal_registrasi) as tanggal_registrasi,nama_anggota,sak.no_rm,ltk.register_labkesda,ltk.register,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur
        FROM labkesda_t_kunjungan ltk
        JOIN admission_registrasi ar ON ar.idpemeriksaan = ltk.register
        JOIN unit_kerja uk ON ltk.unker = uk.id_unit_kerja
        LEFT JOIN labkesda_t_hasil lth ON lth.register = ltk.register
        JOIN sosial_anggota_keluarga sak ON ltk.no_rm = sak.no_rm
        JOIN admission_bayar ab ON ab.id = ar.bayar_id
        JOIN sosial_kepala_keluarga skk ON skk.id = sak.kk_id
        JOIN sosial_kelurahan skl ON skl.id_kelurahan = skk.kelurahan_id
        JOIN sosial_kecamatan skec ON skec.id_kecamatan = skl.id_kecamatan',false);*/
    function getRujukanLab($stat){
        $this->db->select('ar.id
            ,id_lab
            ,idpemeriksaan
            ,validasi_reg
            ,unit_kerja_id
            ,nik
            ,nomor_antrian
            ,tanggal_registrasi
            ,time_lab
            ,kunjungan_jenis
            , if((kunjungan_jenis=1) ,"Lama","Baru" ) as kunjungan
            ,skk.alamat
            ,nama_kecamatan
            ,nama_kelurahan
            ,nama_kk
            ,if((sex="l"),"Laki-Laki","Perempuan") as sex
            ,nama_unit_kerja
            ,nama_unit_kerja as wilayah
            ,no_kk
            ,cara_bayar
            ,cara_bayar as status
            ,f_sampling
            ,f_lab
            ,nama_unit_kerja 
            ,date_format("%d-%m-%Y",tanggal_registrasi) as tanggal_registrasi
            ,nama_anggota
            ,sak.no_rm
            ,ltk.register_labkesda
            ,ltk.register
            ,id_hasil
            ,lth.fk_user,urine_bj,urine_ph,urine_reduksi,
            urine_protein,sedimen_eri,sedimen_leuko,sedimen_epitel
            ,sedimen_kristal,sedimen_silinder,sedimen_bakteri,hematologi_hb
            ,hematologi_led,hematologi_lekosit,hematologi_eritrosit,hematologi_trombosit
            ,hematologi_hematrokit,faeces_makroskopis,faeces_mikroskopis,faeces_eri,faeces_leuko,faeces_amuba,faeces_cyste,faeces_ova,mikro_malaria,mikro_pep_gram,mikro_bta
            ,mikro_koh,mikro_a,mikro_b,mikro_c,glukosa_puasa,glukosa_2jam,lth.tes_hamil,lain_pemeriksaan,lain_hasil     
            ,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur',false);
        $this->db->from('labkesda_t_kunjungan ltk');
        $this->db->join('admission_registrasi ar','ar.idpemeriksaan = ltk.register');
        $this->db->join('unit_kerja uk','ltk.unker = uk.id_unit_kerja');
        $this->db->join('labkesda_t_hasil lth','lth.register = ltk.register','left');
        $this->db->join('sosial_anggota_keluarga sak','ltk.no_rm = sak.no_rm');
        $this->db->join('admission_bayar ab','ab.id = ar.bayar_id');
        $this->db->join('sosial_kepala_keluarga skk','skk.id = sak.kk_id');
        $this->db->join('sosial_kelurahan skl','skl.id_kelurahan = skk.kelurahan_id');
        $this->db->join('sosial_kecamatan skec','skec.id_kecamatan = skl.id_kecamatan');
        //kalo sampling
        
       switch ($stat) {
           case 0:
                    if (isset($_GET['sSearch_7'])) {
                        if (($_GET['sSearch_7'] == '0')||($_GET['sSearch_7'] == '')) {
                            $this->db->where('f_sampling not like 1');
                           // $this->db->where('ltk.register!=',''); //mengatasi daftar langsung labkesda tidak punya reg
                        } else if ($_GET['sSearch_7'] == '1') {
                            $this->db->where('f_sampling', '1');
                            //$this->db->where('ltk.register!=',''); 
                        }
                    }
              
               break;
           case 1:
                    //jika periksa lab, cari yang sudah sampling
                    if (isset($_GET['sSearch_7'])) {
                        if (($_GET['sSearch_7'] == '0')||($_GET['sSearch_7'] == '')) {
                            $this->db->where('f_lab not like 1');
                            $this->db->where('f_sampling', '1');
                            //$this->db->where('ltk.register!=',''); 
                        } else if ($_GET['sSearch_7'] == '1') {
                            $this->db->where('f_lab', '1');
                            $this->db->where('f_sampling', '1');
                            //$this->db->where('ltk.register!=',''); 
                        }
                    }
           break;

           case 3:
                  //jika cetak hasil lab, cari yang sudah periksa lab
                   $this->db->where('f_lab','1');     
                   $this->db->where('f_sampling','1');

           break;

           case 4:
                  //jika tampil di loket labkesda
                   $this->db->where('f_sampling','0');
           break;
       }
     $this->db->where('DATE(tanggal_registrasi)', 'date(CURRENT_TIMESTAMP)',false);
     $this->db->order_by('id_lab','asc');
     if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('10','0');
    }
        
        $query =$this->db->get();
        
       // $query =  $this->db->get();
        //hitung total data kembalian
        $data['iTotalRecords']= $query->num_rows();
        $data['iTotalDisplayRecords']= $query->num_rows();
        $data['sEcho']=intval($_GET['sEcho']);
        $data['aaData']= $query->result();
        return json_encode($data);
    }
        function getRujukanLabkesda($stat){
        $this->db->select('ar.id
            ,id_lab
            ,idpemeriksaan
            ,validasi_reg
            ,unker as id_unit_kerja
            ,nik
            ,nomor_antrian
            ,status_kunjungan as id_kunjungan
            , if((status_kunjungan=1) ,"Lama","Baru" ) as kunjungan
            ,skk.alamat
            ,nama_kecamatan
            ,nama_kelurahan
            ,nama_kk
            ,if((sex="l"),"Laki-Laki","Perempuan") as sex
            ,nama_unit_kerja
            ,nama_unit_kerja as wilayah
            ,no_kk
            ,f_sampling
            ,f_lab
            ,nama_unit_kerja 
            ,date_format(time_lab,"%d-%m-%Y") as time_lab
            ,nama_anggota
            ,sak.no_rm
            ,ltk.register_labkesda
            ,ltk.register
            ,id_hasil
            ,sedimen,urine,hematologi,bakteriologi,ltk.tes_hamil,lain
            ,lth.fk_user,urine_bj,urine_ph,urine_reduksi,
            urine_protein,sedimen_eri,sedimen_leuko,sedimen_epitel
            ,sedimen_kristal,sedimen_silinder,sedimen_bakteri,hematologi_hb
            ,hematologi_led,hematologi_lekosit,hematologi_eritrosit,hematologi_trombosit
            ,hematologi_hematrokit,faeces_makroskopis,faeces_mikroskopis,faeces_eri,faeces_leuko,faeces_amuba,faeces_cyste,faeces_ova,mikro_malaria,mikro_pep_gram,mikro_bta
            ,mikro_koh,mikro_a,mikro_b,mikro_c,glukosa_puasa,glukosa_2jam,lth.tes_hamil,lain_pemeriksaan,lain_hasil     
            ,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur',false);
        $this->db->from('labkesda_t_kunjungan ltk');
        $this->db->join('admission_registrasi ar','ar.idpemeriksaan = ltk.register','left');
        $this->db->join('unit_kerja uk','ltk.unker = uk.id_unit_kerja');
        $this->db->join('labkesda_t_hasil lth','lth.register = ltk.register','left');
        $this->db->join('sosial_anggota_keluarga sak','ltk.no_rm = sak.no_rm');
        $this->db->join('admission_bayar ab','ab.id = ar.bayar_id','left');
        $this->db->join('sosial_kepala_keluarga skk','skk.id = sak.kk_id');
        $this->db->join('sosial_kelurahan skl','skl.id_kelurahan = skk.kelurahan_id');
        $this->db->join('sosial_kecamatan skec','skec.id_kecamatan = skl.id_kecamatan');
        //kalo sampling labkesda
        
       switch ($stat) {
           case 0:
                    if (isset($_GET['sSearch_7'])) {
                        if (($_GET['sSearch_7'] == '0')||($_GET['sSearch_7'] == '')) {
                            $this->db->where('f_sampling not like 1');
                            $this->db->where('ltk.register',''); //mengatasi daftar langsung labkesda tidak punya reg
                        } else if ($_GET['sSearch_7'] == '1') {
                            $this->db->where('f_sampling', '1');
                            $this->db->where('ltk.register',''); 
                        }
                    }
              
               break;
           case 1:
                    //jika periksa lab, cari yang sudah sampling
                    if (isset($_GET['sSearch_7'])) {
                        if (($_GET['sSearch_7'] == '0')||($_GET['sSearch_7'] == '')) {
                            $this->db->where('f_lab not like 1');
                            $this->db->where('f_sampling', '1');
                            $this->db->where('ltk.register',''); 
                        } else if ($_GET['sSearch_7'] == '1') {
                            $this->db->where('f_lab', '1');
                            $this->db->where('f_sampling', '1');
                            $this->db->where('ltk.register',''); 
                        }
                    }
           break;

           case 3:
                  //jika cetak hasil lab, cari yang sudah periksa lab
                   $this->db->where('f_lab','1');     
                   $this->db->where('f_sampling','1');
                   $this->db->where('ltk.register','');

           break;

           case 4:
                  //jika tampil di loket labkesda
                   $this->db->where('f_sampling not like 1');
                   $this->db->where('ltk.register','');
           break;
       }

     $this->db->where('DATE(time_lab)', 'date(CURRENT_TIMESTAMP)',false);
     $this->db->order_by('id_lab','asc');
     if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
           $this->db->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
    }else{
           $this->db->limit('10','0');
    }
     
        $query =$this->db->get();

       // $query =  $this->db->get();
      // echo $this->db->last_query();
        //hitung total data kembalian
        $data['aaData']= $query->result();
        return json_encode($data);
    }


    function updateSampling(){
        $this->db->set('sampling_jenis', $_POST['sampling_jenis']);
        $this->db->set('sampling_waktu', date('Y-m-d h:i:s'));
        $this->db->set('f_sampling', '1');
        $this->db->where('id_lab', $this->input->post('id_lab'));
        return $this->db->update('labkesda_t_kunjungan');
    }


    function create_reg($unker,$no_rm,$register,$dari_poli,$sedimen=null,$urine=null,$hematologi=null,$bakteriologi=null,$tes_hamil=null,$lainlain=null,$status_kunjungan=null) {
        $this->db->set('register_labkesda', 'LAB-' . $this->genRegister());
        $this->db->set('time_lab','CURRENT_TIMESTAMP',false);
        $this->db->set('unker', $unker);
        $this->db->set('no_rm', $no_rm);
        $this->db->set('status_kunjungan', $status_kunjungan);
        $this->db->set('register', $register);
        $this->db->set('dari_poli', $dari_poli);
        $this->db->set('sedimen', $sedimen);
        $this->db->set('urine', $urine);
        $this->db->set('hematologi', $hematologi);
        $this->db->set('bakteriologi', $bakteriologi);
        $this->db->set('tes_hamil', $tes_hamil);
        $this->db->set('lain', $lainlain);

        if ($this->db->insert('labkesda_t_kunjungan')){
            return true;
        }else{
            return false;
        }
    }

    function update_reg($id_lab,$unker,$no_rm,$register,$dari_poli,$sedimen=null,$urine=null,$hematologi=null,$bakteriologi=null,$tes_hamil=null,$lainlain=null,$status_kunjungan=null,$id_unit_kerja=null) {
        $this->db->set('sedimen', $sedimen);
        $this->db->set('urine', $urine);
        $this->db->set('hematologi', $hematologi);
        $this->db->set('bakteriologi', $bakteriologi);
        $this->db->set('tes_hamil', $tes_hamil);
        $this->db->set('lain', $lainlain);
        if (!empty($status_kunjungan)){
         $this->db->set('status_kunjungan', $status_kunjungan);   
        }
        if (!empty($id_unit_kerja)){
         $this->db->set('unker', $id_unit_kerja);
        }
        $this->db->where('id_lab', $id_lab);
        if ($this->db->update('labkesda_t_kunjungan')){
            return true;
        }else{
            return false;
        }
    }

    function delete($id_lab) {
        $this->db->where('id_lab', $id_lab);
        if ($this->db->delete('labkesda_t_kunjungan')){
            return true;
        }else{
            return false;
        }
    }

    function genRegister() {
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

    function update_status_sampling() {
        $this->db->set('f_sampling', '1');
        $this->db->where('id_lab', $this->input - post('id_lab'));
        $this->db->update('labkesda_t_kunjungan');
    }

    function update_status_periksa() {
        $this->db->set('f_lab', '1');
        $this->db->where('id_lab', $this->input - post('id_lab'));
        $this->db->update('labkesda_t_kunjungan');
    }

     function simpanPeriksa() {
        $this->db->set('register', $this->input->post('idpemeriksaan'));
        //$this->db->set('fk_user', $this->session->userdata('id'));
        $this->db->set('urine_bj', $_POST['urine_bj']);
        $this->db->set('urine_ph', $_POST['urine_ph']);
        $this->db->set('urine_reduksi', $_POST['urine_reduksi']);
        $this->db->set('urine_protein', $_POST['urine_protein']);
        $this->db->set('sedimen_eri', $_POST['sedimen_eri']);
        $this->db->set('sedimen_leuko', $_POST['sedimen_leuko']);
        $this->db->set('sedimen_epitel', $_POST['sedimen_epitel']);
        $this->db->set('sedimen_kristal', $_POST['sedimen_kristal']);
        $this->db->set('sedimen_silinder', $_POST['sedimen_silinder']);
        $this->db->set('sedimen_bakteri', $_POST['sedimen_bakteri']);
        $this->db->set('hematologi_hb', $_POST['hematologi_hb']);
        $this->db->set('hematologi_led', $_POST['hematologi_led']);
        $this->db->set('hematologi_eritrosit', $_POST['hematologi_eritrosit']);
        $this->db->set('hematologi_trombosit', $_POST['hematologi_trombosit']);
        $this->db->set('hematologi_lekosit', $_POST['hematologi_lekosit']);
        $this->db->set('hematologi_hematrokit', $_POST['hematologi_hematrokit']);
        $this->db->set('faeces_makroskopis', $_POST['faeces_makroskopis']);
        $this->db->set('faeces_mikroskopis', $_POST['faeces_mikroskopis']);
        $this->db->set('faeces_eri', $_POST['faeces_eri']);
        $this->db->set('faeces_leuko', $_POST['faeces_leuko']);
        $this->db->set('faeces_amuba', $_POST['faeces_amuba']);
        $this->db->set('faeces_cyste', $_POST['faeces_cyste']);
        $this->db->set('faeces_ova', $_POST['faeces_ova']);
        $this->db->set('mikro_malaria', $_POST['mikro_malaria']);
        $this->db->set('mikro_pep_gram', $_POST['mikro_pep_gram']);
        $this->db->set('mikro_bta', $_POST['mikro_bta']);
        $this->db->set('mikro_koh', $_POST['mikro_koh']);
        $this->db->set('mikro_a', $_POST['mikro_a']);
        $this->db->set('mikro_b', $_POST['mikro_b']);
        $this->db->set('mikro_c', $_POST['mikro_c']);
        $this->db->set('glukosa_puasa', $_POST['glukosa_puasa']);
        $this->db->set('glukosa_2jam', $_POST['glukosa_2jam']);
        $this->db->set('tes_hamil', $_POST['tes_hamil']);
        $this->db->set('lain_pemeriksaan', $_POST['lain_pemeriksaan']);
        $this->db->set('lain_hasil', $_POST['lain_hasil']);
        $this->db->insert('labkesda_t_hasil');

        $this->db->set('f_lab', '1');
        $this->db->where('id_lab', $this->input->post('id_lab'));
        return $this->db->update('labkesda_t_kunjungan');
    }

    function updatePeriksa() {
        $this->db->set('register', $this->input->post('idpemeriksaan'));
        //$this->db->set('fk_user', $this->session->userdata('id'));
        $this->db->set('urine_bj', $_POST['urine_bj']);
        $this->db->set('urine_ph', $_POST['urine_ph']);
        $this->db->set('urine_reduksi', $_POST['urine_reduksi']);
        $this->db->set('urine_protein', $_POST['urine_protein']);
        $this->db->set('sedimen_eri', $_POST['sedimen_eri']);
        $this->db->set('sedimen_epitel', $_POST['sedimen_epitel']);
        $this->db->set('sedimen_leuko', $_POST['sedimen_leuko']);
        $this->db->set('sedimen_kristal', $_POST['sedimen_kristal']);
        $this->db->set('sedimen_silinder', $_POST['sedimen_silinder']);
        $this->db->set('sedimen_bakteri', $_POST['sedimen_bakteri']);
        $this->db->set('hematologi_hb', $_POST['hematologi_hb']);
        $this->db->set('hematologi_led', $_POST['hematologi_led']);
        $this->db->set('hematologi_eritrosit', $_POST['hematologi_eritrosit']);
        $this->db->set('hematologi_trombosit', $_POST['hematologi_trombosit']);
        $this->db->set('hematologi_lekosit', $_POST['hematologi_lekosit']);
        $this->db->set('hematologi_hematrokit', $_POST['hematologi_hematrokit']);
        $this->db->set('faeces_makroskopis', $_POST['faeces_makroskopis']);
        $this->db->set('faeces_mikroskopis', $_POST['faeces_mikroskopis']);
        $this->db->set('faeces_eri', $_POST['faeces_eri']);
        $this->db->set('faeces_leuko', $_POST['faeces_leuko']);
        $this->db->set('faeces_ova', $_POST['faeces_ova']);
        $this->db->set('mikro_malaria', $_POST['mikro_malaria']);
        $this->db->set('mikro_pep_gram', $_POST['mikro_pep_gram']);
        $this->db->set('mikro_bta', $_POST['mikro_bta']);
        $this->db->set('mikro_koh', $_POST['mikro_koh']);
        $this->db->set('mikro_a', $_POST['mikro_a']);
        $this->db->set('mikro_b', $_POST['mikro_b']);
        $this->db->set('mikro_c', $_POST['mikro_c']);
        $this->db->set('glukosa_puasa', $_POST['glukosa_puasa']);
        $this->db->set('glukosa_2jam', $_POST['glukosa_2jam']);
        $this->db->set('tes_hamil', $_POST['tes_hamil']);
        $this->db->set('lain_pemeriksaan', $_POST['lain_pemeriksaan']);
        $this->db->set('lain_hasil', $_POST['lain_hasil']);
        $this->db->where('id_hasil', $this->input->post('id_hasil'));
        return $this->db->update('labkesda_t_hasil');
    }

}
/*end of file */