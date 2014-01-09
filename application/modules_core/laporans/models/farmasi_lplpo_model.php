<?php
class Farmasi_lplpo_model extends CI_Model {

	public function getlplpoBydate ($tanggal) {
            $this->db->select('*');
            $this->db->from('farmasi_lplpo');
            $this->db->like('tanggal_lplpo',$tanggal);
            $this->db->where('unit_kerja_id',$this->session->userdata("id_unit_kerja"));
            $sql=$this->db->get();
            return $sql;
	}

	public function getPengeluaranBydate($tanggal1,$tanggal2) {
            
            $this->db->select("sum(jumlah) as jumlah,obat_id");
            $this->db->from('farmasi_pengeluaran_item a');
            $this->db->join('farmasi_pengeluaran_header b','b.id=a.keluar_id');
            $this->db->where('b.tanggal_keluar >=',$tanggal1);
            $this->db->where('b.tanggal_keluar <=',$tanggal2);
            $sql=$this->db->get();
            return $sql;
	}

        public function getPenerimaanBydate($tanggal1,$tanggal2) {
            
            $this->db->select("sum(a.jumlah) as jumlah,a.obat_id");
            $this->db->from('farmasi_penerimaan_header b');
            $this->db->join('farmasi_penerimaan_item a','b.id=a.terima_id');
            $this->db->where('b.tanggal_terima >=',$tanggal1);
            $this->db->where('b.tanggal_terima <=',$tanggal2);
            $this->db->where('unit_kerja_id',$this->session->userdata("id_unit_kerja"));
            $this->db->group_by(array("a.obat_id"));
            $sql=$this->db->get();
            return $sql;
	}

        public function getStokawalBydate($tanggal) {
            
            $this->db->select("obat_id,stok_real");
            $this->db->from('farmasi_lplpo');
            $this->db->like('tanggal_lplpo',$tanggal);
            $this->db->where('unit_kerja_id',$this->session->userdata("id_unit_kerja"));
            $sql=$this->db->get();
            return $sql;
	}
        
        public function generateLplpo($data){
            return $this->db->insert('farmasi_lplpo',$data);
        }


        
}