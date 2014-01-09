<?php 

class sosial_anggota_keluarga_model extends CI_Model {
    function getAllAnggota($id){
        $this->db->select("* ");
        $this->db->from("sosial_anggota_keluarga");
        $this->db->join('sosial_kepala_keluarga','sosial_kepala_keluarga.id=sosial_anggota_keluarga.kk_id');
        $this->db->join('sosial_kelurahan','sosial_kepala_keluarga.kelurahan_id=sosial_kelurahan.id');
        $this->db->join('sosial_kecamatan','sosial_kelurahan.kecamatan_id=sosial_kecamatan.id');
        $this->db->join('sosial_status_anggota','sosial_anggota_keluarga.status_anggota_id=sosial_status_anggota.id');
        $this->db->join('sosial_pendidikan','sosial_anggota_keluarga.pendidikan_id=sosial_pendidikan.id');
        $this->db->join('sosial_pekerjaan','sosial_anggota_keluarga.pekerjaan_id=sosial_pekerjaan.id');
        $this->db->join('sosial_agama','sosial_anggota_keluarga.agama_id=sosial_agama.id');
        $this->db->where('sosial_anggota_keluarga.kk_id',$id);
        $sql=$this->db->get();
        return $sql;
    }
    
    function getAllAnggotaReg(){
        $this->db->select("* ");
        $this->db->from("sosial_anggota_keluarga");
        $this->db->join('sosial_kepala_keluarga','sosial_kepala_keluarga.id=sosial_anggota_keluarga.kk_id');
        $this->db->join('sosial_kelurahan','sosial_kepala_keluarga.kelurahan_id=sosial_kelurahan.id');
        $this->db->join('sosial_kecamatan','sosial_kelurahan.kecamatan_id=sosial_kecamatan.id');
        $this->db->join('sosial_status_anggota','sosial_anggota_keluarga.status_anggota_id=sosial_status_anggota.id');
        $this->db->join('sosial_pendidikan','sosial_anggota_keluarga.pendidikan_id=sosial_pendidikan.id');
        $this->db->join('sosial_pekerjaan','sosial_anggota_keluarga.pekerjaan_id=sosial_pekerjaan.id');
        $this->db->join('sosial_agama','sosial_anggota_keluarga.agama_id=sosial_agama.id');
        $sql=$this->db->get();
        
        return $sql;
        
    }
    function getAnggotaByid($id){
        $this->db->select('*,sosial_anggota_keluarga.id as anggota_id ,DATE_FORMAT(sosial_anggota_keluarga.tanggal_lahir,"%d %b %Y") as tanggal,concat(if((((month(now()) - month(tanggal_lahir)) < 1) and((year(now()) - year(tanggal_lahir)) < 1)), 0, if(((month(now()) - month(tanggal_lahir)) < 0),((year(now()) - year(tanggal_lahir)) -1),(year(now()) - year(tanggal_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tanggal_lahir)) < 0), if(((month(now()) - month(tanggal_lahir)) = 0), 0,((month(now()) - month(tanggal_lahir)) + 12)),(month(now()) - month(tanggal_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tanggal_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tanggal_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tanggal_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur',FALSE);
        $this->db->from("sosial_anggota_keluarga");
        $this->db->join('sosial_kepala_keluarga','sosial_kepala_keluarga.id=sosial_anggota_keluarga.kk_id');
        $this->db->join('sosial_kelurahan','sosial_kepala_keluarga.kelurahan_id=sosial_kelurahan.id_kelurahan');
        $this->db->join('sosial_kecamatan','sosial_kelurahan.id_kecamatan=sosial_kecamatan.id_kecamatan');
        $this->db->join('sosial_status_anggota','sosial_anggota_keluarga.status_anggota_id=sosial_status_anggota.id');
        $this->db->join('sosial_pendidikan','sosial_anggota_keluarga.pendidikan_id=sosial_pendidikan.id');
        $this->db->join('sosial_pekerjaan','sosial_anggota_keluarga.pekerjaan_id=sosial_pekerjaan.id');
        $this->db->join('sosial_agama','sosial_anggota_keluarga.agama_id=sosial_agama.id');
        $this->db->where('sosial_anggota_keluarga.id',$id);
        $sql=$this->db->get();
        
        return $sql;
        
    }

    function getreg() {

        $this->db->select('*');
        $this->db->from("admission_registrasi");
        $this->db->where('tanggal_registrasi',date ('Y-m-d'));
        //$this->db->where('id',$id);
        $this->db->order_by('idpemeriksaan','DESC');
        $sql=$this->db->get();
 //echo $this->db->last_query();
 //die;
        return $sql;

    }

    


    
    function add($fields){
        $sql=$this->db->insert('sosial_anggota_keluarga',$fields);
        return $sql;
    }

    function insert($table,$in) {
        return $this->db->insert($table,$in);
    }

    function addanggotakk($in) {
            $this->db->insert('sosial_anggota_keluarga',$in);
        }

    function getidkk($no_kk){
        $this->db->where('no_kk',$no_kk);
        return  $this->db->get('sosial_kepala_keluarga');
    }

    function Get_Anggota_KK ($id) {

        return $this->db->query ("select 
            a.id,nik,nama_anggota,tempat_lahir, DATE_FORMAT(a.tanggal_lahir,'%d %b %Y') as tanggal,sex,nama_ayah,nama_ibu,b.no_kk,nama_kk
            from sosial_anggota_keluarga a join sosial_kepala_keluarga b on a.kk_id = b.id
            where b.id='$id' ");
    }

    function delete ($id){

        $sql=$this->db->delete('sosial_anggota_keluarga',array('id'=>$id));
        return $sql;
    }

    function edit ($table,$data) {
    return $this->db->get_where($table,$data);

    }

    

    function gettanggal ($id) {
      return  $this->db->query("select year (tanggal_lahir) as thn, month (tanggal_lahir) as bln,day(tanggal_lahir) as tgl from sosial_anggota_keluarga where id='$id' ");
    }

    function update($table,$data,$field_key){

        return $this->db->update($table,$data,$field_key);
    }

    function getidanggota ($id) {

        return $this->db->query("select * from sosial_anggota_keluarga where id = '$id' ");
    }



}