<?php

class M_Poliimun extends CI_Model {

    function __construct() {

        // Call the Model constructor

        parent::__construct();

    }
   

	function list_data_kir($start='', $limit='') {
        $this->db->select('*,k.register,
            concat(if((((month(now()) - month(tgl_lahir)) < 1) and((year(now()) - year(tgl_lahir)) < 1)), 0, if(((month(now()) - month(tgl_lahir)) < 0),((year(now()) - year(tgl_lahir)) -1),(year(now()) - year(tgl_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tgl_lahir)) < 0), if(((month(now()) - month(tgl_lahir)) = 0), 0,((month(now()) - month(tgl_lahir)) + 12)),(month(now()) - month(tgl_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tgl_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tgl_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tgl_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur', false);
        $this->db->from('sik_t_kunjungan k');
        $this->db->join('sik_t_kir kir', 'kir.register = k.register');
        $this->db->join('m_pasien p', 'k.no_rm=p.no_rm');
        $this->db->join('pegawai peg', 'peg.id_pegawai=kir.dokter');
        $this->db->join('admission_bayar b', 'b.id_bayar=p.bayar');
        $this->db->join('m_kepala_keluarga kk', 'kk.id_kk = p.kk');
        $this->db->join('m_kelurahan kl', 'kl.id_kelurahan = kk.kelurahan');
        $this->db->join('m_kecamatan kec', 'kec.id_kecamatan = kl.id_kecamatan');
        if (!empty($_POST['key'])) {
            $where = "(no_kk '%" . $this->input->post('key') . "%'
               OR no_rm LIKE '%" . $this->input->post('key') . "%'
               OR nama_pasien LIKE '%" . $this->input->post('key') . "%')";
            $this->db->where($where);
        }

        if (isset($_POST['tgl'])) {
            $this->db->where('DATE(time_kunjungan)', $this->input->post('tgl'));
        }

        if (isset($_POST['dir']) && isset($_POST['sort'])) {
            $this->db->order_by($_POST['sort'], $_POST['dir']);
        }
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    function record_kir($id='') {
        $this->db->select('*,k.register,
            concat(if((((month(now()) - month(tgl_lahir)) < 1) and((year(now()) - year(tgl_lahir)) < 1)), 0, if(((month(now()) - month(tgl_lahir)) < 0),((year(now()) - year(tgl_lahir)) -1),(year(now()) - year(tgl_lahir)))), repeat(" ", 2),"Tahun" ,repeat(" ", 2),if(((month(now()) - month(tgl_lahir)) < 0), if(((month(now()) - month(tgl_lahir)) = 0), 0,((month(now()) - month(tgl_lahir)) + 12)),(month(now()) - month(tgl_lahir))), repeat(" ", 2), "Bulan", repeat(" ", 2), if(((dayofmonth(now()) - dayofmonth(tgl_lahir)) < 0),((dayofmonth(now()) - dayofmonth(tgl_lahir)) + dayofmonth(last_day(now()))),(dayofmonth(now()) - dayofmonth(tgl_lahir))), repeat(" ", 2), "Hari", repeat(" ", 2)) AS umur', false);
        $this->db->from('sik_t_kunjungan k');
        $this->db->join('sik_t_kir kir', 'kir.register = k.register');
        $this->db->join('m_pasien p', 'k.no_rm=p.no_rm');
        $this->db->join('pegawai peg', 'peg.id_pegawai=kir.dokter');
        $this->db->join('m_bayar b', 'b.id_bayar=p.bayar');
        $this->db->join('m_kepala_keluarga kk', 'kk.id_kk = p.kk');
        $this->db->join('m_kelurahan kl', 'kl.id_kelurahan = kk.kelurahan');
        $this->db->join('m_kecamatan kec', 'kec.id_kecamatan = kl.id_kecamatan');
        $this->db->where('k.register', $id);
        return $this->db->get();
    }

    function create_kir($register,$no_kir,$hasil,$guna,$dokter,$tgl_kir) {
        $this->db->set('register', $register);
        $this->db->set('no_kir', $no_kir);
        $this->db->set('hasil', $hasil);
        $this->db->set('guna', $guna);
        $this->db->set('dokter', $dokter);
        $this->db->set('tgl_kir', date('Y-m-d', strtotime($tgl_kir)));
        $this->db->insert('sik_t_kir');
    }

    function update_kir() {
        $this->db->set('register', $this->input->post('register'));
        $this->db->set('no_kir', $this->input->post('no_kir'));
        $this->db->set('hasil', $this->input->post('hasil'));
        $this->db->set('guna', $this->input->post('guna'));
        $this->db->set('dokter', $this->input->post('dokter'));
        $this->db->set('tgl_kir', date('Y-m-d', strtotime($this->input->post('tgl_kir'))));
        $this->db->where('id_kir', $this->input->post('id_kir'));
        $this->db->update('sik_t_kir');
    }

    function delete_kir() {
        $this->db->where('id_kir', $this->input->post('id_kir'));
        $this->db->delete('sik_t_kir');
    }
}
?>