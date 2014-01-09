<?php
class Admission_registrasi_model extends CI_Model {
    
    function search ($nik,$nama) {
        $this->db->select('a.id,nik,nama_anggota,sex,tanggal_lahir,DATE_FORMAT(a.tanggal_lahir,"%d %b %Y") as tanggal,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur,b.alamat',false);
        $this->db->from("sosial_anggota_keluarga a");
        $this->db->join("sosial_kepala_keluarga b","a.kk_id=b.id");
        $this->db->like("a.nik",$nik);
        $this->db->or_like("a.nama_anggota",$nik);
        $result = $this->db->get();
        if ($result->num_rows() > 0 ){
            return $result->result_array(); 
        }
        else{
            return array(); 
        }
    }

   /* function search2($nik,$nama) {
        return $this->db->query('select a.id,nik,nama_anggota,sex,tanggal_lahir,DATE_FORMAT(a.tanggal_lahir,"%d %b %Y") as tanggal,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur,b.alamat
from sosial_anggota_keluarga a
join sosial_kepala_keluarga b on a.kk_id=b.id
where a.nik like "%1%" or a.nama_anggota like "" ');
    }*/
    function cari_pasien($kata_kunci){
        return $this->db->query("select a.*,a.id as id_pasien,concat(if((((month(now()) - month(a.tanggal_lahir)) < 1) and((year(now()) - year(a.tanggal_lahir)) < 1)), 0, if(((month(now()) - month(a.tanggal_lahir)) < 0),((year(now()) - year(a.tanggal_lahir)) -1),(year(now()) - year(a.tanggal_lahir)))), repeat(' ', 2),'Tahun' ,repeat(' ', 2),if(((month(now()) - month(a.tanggal_lahir)) < 0), if(((month(now()) - month(a.tanggal_lahir)) = 0), 0,((month(now()) - month(a.tanggal_lahir)) + 12)),(month(now()) - month(a.tanggal_lahir))), repeat(' ', 2), 'Bulan', repeat(' ', 2), if(((dayofmonth(now()) - dayofmonth(a.tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(a.tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(a.tanggal_lahir))), repeat(' ', 2), 'Hari', repeat(' ', 2)) AS umur,b.*,b.id as id_agama,c.*,c.id as id_pendidikan,d.*,d.id as id_pekerjaan from sosial_anggota_keluarga a join sosial_agama b on a.agama_id=b.id join sosial_pendidikan c on a.pendidikan_id=c.id join sosial_pekerjaan d on a.pekerjaan_id=d.id where a.nik like '%".$kata_kunci."%' or a.nama_anggota like '%".$kata_kunci."%' ");
    }
    
    function search1 ($nik,$nama) {
        $this->db->select('*,sosial_anggota_keluarga.id as anggota_id ,DATE_FORMAT(sosial_anggota_keluarga.tanggal_lahir,"%d %b %Y") as tanggal,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur',FALSE);
        $this->db->from("sosial_anggota_keluarga");
        $this->db->join('sosial_kepala_keluarga','sosial_kepala_keluarga.id=sosial_anggota_keluarga.kk_id');
        $this->db->join('sosial_kelurahan','sosial_kepala_keluarga.kelurahan_id=sosial_kelurahan.id_kelurahan');
        $this->db->join('sosial_kecamatan','sosial_kelurahan.id_kecamatan=sosial_kecamatan.id_kecamatan');
        $this->db->join('sosial_status_anggota','sosial_anggota_keluarga.status_anggota_id=sosial_status_anggota.id');
        $this->db->join('sosial_pendidikan','sosial_anggota_keluarga.pendidikan_id=sosial_pendidikan.id');
        $this->db->join('sosial_pekerjaan','sosial_anggota_keluarga.pekerjaan_id=sosial_pekerjaan.id');
        $this->db->join('sosial_agama','sosial_anggota_keluarga.agama_id=sosial_agama.id');
        $this->db->like('sosial_anggota_keluarga.nik',$nik);
        $this->db->or_like('sosial_anggota_keluarga.nam',$nama);
        $result=$this->db->get();
        
        if ($result->num_rows() > 0 ){
            return $result->result_array(); 
        }
        else{
            return array(); 
        }
    }
    
    function Get_Klinik () {
        $data=$this->db->query('select * from admission_klinik order by id desc');
        return $data->result_array();   
    }
    
    function Get_Admission_Bayar () {
        $data=$this->db->query('select * from admission_bayar order by id desc');
        return $data->result_array();
    }
    
    function insertdataadmission ($in) {
        $this->db->insert('admission_registrasi',$in);
    }

    function insertdatalab ($lab) {
        $lab['register_labkesda']='LAB-' . $this->genRegister();
        $this->db->insert('labkesda_t_kunjungan',$lab);
       
    }
   
    function getanggota_keluarga_id ($id){
       $data= $this->db->query("select *,a.id as id_reg from admission_registrasi a join sosial_anggota_keluarga b
        on a.anggota_keluarga_id = b.id join admission_klinik c on a.klinik_id = c.id 
        join admission_bayar d on a.bayar_id = d.id join sosial_kepala_keluarga e on b.kk_id=e.id
                                where a.anggota_keluarga_id='$id' order by a.idpemeriksaan DESC LIMIT 1 ");
       return $data->result_array();
    }

    function Get_Data ($table,$data) {

       return $this->db->get_where($table,$data);
    }

    function double ($data) {
    
    return $this->db->query("select * from admission_registrasi where klinik_id='$data' ");

    }

    function Get_Admission_Id($id) {

        return $this->db->query("select * from sosial_anggota_keluarga where id= '$id' ");


    }

    function getRegistrasiByid($id){
        $this->db->select("*,reg.id as reg_id");
        $this->db->from("admission_registrasi reg");
        $this->db->join("sosial_anggota_keluarga anggota","anggota.id=reg.anggota_keluarga_id","inner");
        $this->db->join("sosial_kepala_keluarga kk","kk.id=anggota.kk_id","inner");
        $this->db->join("admission_bayar bayar","bayar.id=reg.bayar_id","inner");
        $this->db->join("admission_klinik klinik","klinik.id=reg.klinik_id","inner");
        $this->db->join("sosial_kelurahan lurah","lurah.id_kelurahan=kk.kelurahan_id","inner");
        $this->db->join("sosial_kecamatan camat","camat.id_kecamatan=lurah.id_kecamatan","inner");
        $this->db->where("reg.idpemeriksaan","$id");
        $sql=$this->db->get();
        
        return $sql;
    }
    
    function getRegistrasiBydate(){
        $this->db->select("*,reg.id as id_reg");
        $this->db->from("admission_registrasi reg");
        $this->db->join("sosial_anggota_keluarga anggota","anggota.id=reg.anggota_keluarga_id","inner");
        $this->db->join("sosial_kepala_keluarga kk","kk.id=anggota.kk_id","inner");
        $this->db->join("admission_bayar bayar","bayar.id=reg.bayar_id","inner");
        $this->db->join("admission_klinik klinik","klinik.id=reg.klinik_id","inner");
        $this->db->join("sosial_kelurahan lurah","lurah.id_kelurahan=kk.kelurahan_id","inner");
        $this->db->join("sosial_kecamatan camat","camat.id_kecamatan=lurah.id_kecamatan","inner");
        $this->db->where("reg.tanggal_registrasi",date('Y-m-d'));
        $sql=$this->db->get();
        
        return $sql;
    }    
    
    function edit ($table,$up,$id){
        return $this->db->update($table,$up,$id);
    }

    

    function ambilidpemeriksaan ($cekidpemeriksaan) {
        $q = $this->db->query("select idpemeriksaan from admission_registrasi where id='$cekidpemeriksaan' ORDER BY idpemeriksaan DESC LIMIT 0,1");
        return $q;
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

    function idsama() {

        return $this->db->query("select id from admission_registrasi");

    }

    function cetak ($id){
     return $this->db->query("select *,a.id as id_reg from admission_registrasi a join sosial_anggota_keluarga b
        on a.anggota_keluarga_id = b.id join admission_klinik c on a.klinik_id = c.id 
        join admission_bayar d on a.bayar_id = d.id join sosial_kepala_keluarga e on b.kk_id=e.id
                                where a.idpemeriksaan='$id' order by a.idpemeriksaan DESC LIMIT 1 ");
       
    }

    function cekumurs() {

        return $this->db->query("select * from umurs");
    }

    function dataregsama($anggota,$klinik,$tahun) {

        return $this->db->query("select a.*,b.nama_anggota as nama_anggota from admission_registrasi a join sosial_anggota_keluarga b on a.anggota_keluarga_id=b.id

            where anggota_keluarga_id='$anggota' and klinik_id='$klinik' and a.tanggal_registrasi='$tahun' ");
    }

    




   
}