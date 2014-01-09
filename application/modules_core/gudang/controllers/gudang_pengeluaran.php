<?php

class gudang_pengeluaran extends CI_Controller {
	
	public function __construct () {
		parent::__construct();
        $this->load->model('gudang_pengeluaran_model');
        $this->load->model('farmasi_obats_model');
		$this->load->model('unit_kerja_model');
	}

	function index () {

        $kecuali = "8";

        $d['id_pengeluaran_header']=$this->gudang_pengeluaran_model->getpengeluaranid();
        $d['id2_pengeluaran_header']=$this->gudang_pengeluaran_model->getpengeluaranid2();
		$d['nama_unit_kerja']=$this->unit_kerja_model->Get_Unit_Kerja($kecuali);
		$this->template->load('template','gudang_pengeluaran/index',$d);
	}


	function lookup(){
        // process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->gudang_pengeluaran_model->lookup($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->id,
                                        'value' => $row->nama_obat,
                                        ''
                                     );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        
    }

    function save () {

        $in['id']=$this->input->post('id');
        $in['no_nota']=$this->input->post('no_nota');
        $in['unit_kerja_id']=$this->input->post('unit_kerja_id');
        $in['tujuan']=$this->input->post('tujuan');
        $in['tanggal_keluar']=$this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
        $header=$this->gudang_pengeluaran_model->insert("gudang_pengeluaran_header",$in);
        $header2=$this->gudang_pengeluaran_model->insert2("apotek_penerimaan_header2",$in);

        foreach ($_POST['rows'] as $key => $count ){


            $obat_id = $_POST['obat_id_'.$count];
            $obat_id2= $this->farmasi_obats_model->Ambil_ID_Obats($obat_id);
            foreach ($obat_id2->result_array() as $d) {
                $in = $d['id'];
                $jumlah = $d['qtt'];
            }
            $this->farmasi_obats_model->Updates_Obats($obat_id);
            $jumlah2 = $_POST['jumlah_'.$count];
            $jumlahbaru = $jumlah - $jumlah2;
           // $jumlah2 = $_POST['jumlah_'.$count];
            $jeniskeluar = $_POST['jenis_keluar_'.$count];
            $keterangan = $_POST['keterangan_'.$count];
            //$nama_unit_kerja = $_POST['unit_kerja_id_'.$count];
            //$tanggal_keluar = $_POST['hari_'.$count];
            $keluar_id_insert = $_POST['keluar_id_'.$count]; 

        if (empty($jumlah2)) {

        }
        else {
            
            
            
            //$queryobat = $this->db->query ("update farmasi_obats set qtt  = '$jumlahbaru' WHERE id='$in' ");
            $query=$this->db->query("insert into gudang_pengeluaran_item (obat_id,jumlah,keluar_id,jenis_keluar,keterangan) VALUES ('$in','$jumlah2','$keluar_id_insert','$jeniskeluar','$keterangan')");
            $query=$this->db->query("insert into apotek_penerimaan_item2 (obat_id,jumlah,jumlah_gudang,keluar_id,jenis_keluar,keterangan) VALUES ('$in','$jumlah2','$jumlah2','$keluar_id_insert','$jeniskeluar','$keterangan')");
        }

        

    }

    $this->session->set_flashdata('message','Data Berhasil Disimpan');
    redirect('gudang/gudang_pengeluaran/detail/'.$keluar_id_insert);

    
}


    function falidasiobat () {
        $nama_obat=$this->input->post('obat');
        $this->farmasi_obats_model->Update_Obats($nama_obat); 
    }

    function falidasiobatbatal () {
        $nama_obat=$this->input->post('obat');
        $this->farmasi_obats_model->Update_Batal($nama_obat);  
    }

    public function falidasijumlahobat() {
        $nama_obat = $this->input->post('obat');
        $jumlah = $this->input->post('jumlah');
         $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        if($bulan == '1' || $bulan=='01'){
                $tanggalstok= ($tahun-1).'-'.($bulan+11);                
            }else{
                $bulanoke=$bulan-1;
                $tanggaloke = strlen($bulanoke);
                if ($tanggaloke==1) {

                $tanggalstok=$tahun.'-'.($bulan);                                
                }
                else {
                    $tanggalstok=$tahun.'-'.($bulan); 
                }
            }
        

        $up3='0';
        $query =$this->db->query("select * from farmasi_obats a,gudang_lplpo b where 
            a.nama_obat='$nama_obat' and a.id=b.obat_id and 
            b.unit_kerja_id='".$this->session->userdata('id_unit_kerja')."' and b.tanggal_lplpo LIKE '$tanggalstok%' ");
        foreach ($query->result_array() as $key) {
            if($key['stok_real'] !==''){
                $up3 = $key['stok_real'];
            }else{
                $up3='0';
            }
        }

        $up33 = '0';
        $query1 = $this->db->query("select sum(d.jumlah_farmasi) as terima_jumlah from farmasi_obats c,gudang_penerimaan_item2 d, gudang_penerimaan_header2 e 
            where c.nama_obat='$nama_obat' and c.id=d.obat_id and e.id=d.keluar_id and e.tanggal_keluar LIKE '$tanggalstok%' group by c.id");
        foreach ($query1->result_array() as $key1) {
            if($key1['terima_jumlah']){
                $up33 = $key1['terima_jumlah'];                
            }else{
                $up33 = '0';
            }

        }

        $up333='0';
        $query2 = $this->db->query("select sum(d.jumlah) as keluar_jumlah from farmasi_obats c,gudang_pengeluaran_item d, gudang_pengeluaran_header e 
            where c.nama_obat='$nama_obat' and c.id=d.obat_id and e.id=d.keluar_id and e.tanggal_keluar LIKE '$tanggalstok%' group by c.id");
        foreach ($query2->result_array() as $key2) {
            if($up333 = $key2['keluar_jumlah']){
                $up333 = $key2['keluar_jumlah'];                
            }else{
                $up333='0';
            }
        }

        $up3333=$up3+$up33-$up333;

            echo $up3333;
    }

    public function view(){
        $data['gudang_pengeluaran_header']=$this->gudang_pengeluaran_model->Get_Pengeluaran(date('Y-m-d'));
        $this->template->load('template', 'gudang_pengeluaran/view',$data);

    }

    public function detail(){
        $data['gudang_pengeluaran_header']=$this->gudang_pengeluaran_model->Get_Pengeluaran_header($this->uri->segment(4));
        $data['detail_gudang_pengeluaran']=$this->gudang_pengeluaran_model->Get_Pengeluaran_Id($this->uri->segment(4));
        $data['id']= $this->uri->segment(4);
        $this->template->load('template', 'gudang_pengeluaran/detail',$data);

    }

    public function add () {

    $id = $this->uri->segment(4,TRUE);
    $data['gudang_pengeluaran_header']=$this->gudang_pengeluaran_model->Get_Pengeluaran_header($id);

    $this->template->load('template','gudang_pengeluaran/add',$data);
}


function save_add () {

    
        foreach ($_POST['rows'] as $key => $count ){


            $obat_id = $_POST['obat_id_'.$count];
            $obat_id2= $this->farmasi_obats_model->Ambil_ID_Obats($obat_id);
            foreach ($obat_id2->result_array() as $d) {
                $in = $d['id'];
                $jumlah = $d['qtt'];
            }
            $cekdouble= $this->gudang_pengeluaran_model->cekdoubleobat($in,$_POST['keluar_id']);
            foreach ($cekdouble->result_array() as $tampil ) {
                $keluar = $tampil['keluar_id'];
            }
            $this->farmasi_obats_model->Updates_Obats($obat_id);
            $jumlah2 = $_POST['jumlah_'.$count];
            $jumlahbaru = $jumlah - $jumlah2;
           // $jumlah2 = $_POST['jumlah_'.$count];
            $jeniskeluar = $_POST['jenis_keluar_'.$count];
            $keterangan = $_POST['keterangan_'.$count];
            //$nama_unit_kerja = $_POST['unit_kerja_id_'.$count];
            //$tanggal_keluar = $_POST['hari_'.$count];
            $keluar_id_insert = $_POST['keluar_id_'.$count]; 

        if (empty($jumlah2)) {

        }
        else {
            
            if($cekdouble->num_rows()>0){
                $this->session->set_flashdata('message','Data Sudah Ada!');
                redirect('gudang/gudang_pengeluaran/detail/'.$keluar);

            }
            else {
            
            $queryobat = $this->db->query ("update farmasi_obats set qtt  = '$jumlahbaru' WHERE id='$in' ");
            $query=$this->db->query("insert into gudang_pengeluaran_item (obat_id,jumlah,keluar_id,jenis_keluar,keterangan) VALUES ('$in','$jumlah2','$keluar_id_insert','$jeniskeluar','$keterangan')");
            $query=$this->db->query("insert into apotek_penerimaan_item2 (obat_id,jumlah,jumlah_gudang,keluar_id,jenis_keluar,keterangan) VALUES ('$in','$jumlah2','$jumlah2','$keluar_id_insert','$jeniskeluar','$keterangan')");
            
            }
        }

        

    }

    $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
    redirect('gudang/gudang_pengeluaran/detail/'.$keluar_id_insert);

    
}

public function delete_item() {

    $id['id']=$this->uri->segment(5);
    $query = $this->gudang_pengeluaran_model->deleteitem("gudang_pengeluaran_item",$id);
    $this->session->set_flashdata('message','Data Berhasil Dihapus');
    redirect('gudang/gudang_pengeluaran/detail/'.$this->uri->segment(4),'refresh');

           

}

public function updateid () {

    $id['id']=$this->input->post('id');
    $up['jumlah']=$this->input->post('jumlah');
    $up['jenis_keluar']=$this->input->post('jeniskeluar');
    $up['keterangan']= $this->input->post('keterangan');

    $this->gudang_pengeluaran_model->update_jumlah("gudang_pengeluaran_item",$up,$id);
    $this->session->set_flashdata('message','Data Berhasil Diupdate');


}

public function search () {

    $tgl=$this->input->post('tgl');
    $bln=$this->input->post('bln');
    $thn=$this->input->post('thn');

    $data['cari']=$this->gudang_pengeluaran_model->seacrh($tgl,$bln,$thn);

    $this->template->load('template','gudang_pengeluaran/view_search',$data);
}

function cetak () {

    $id = $this->uri->segment(4,TRUE);
    $data['gudang_pengeluaran_header']=$this->gudang_pengeluaran_model->Get_Pengeluaran_header($this->uri->segment(4));
    $data['detail_gudang_pengeluaran']=$this->gudang_pengeluaran_model->Get_Pengeluaran_Id($this->uri->segment(4));
                
    $this->load->view('gudang_pengeluaran/cetak_pengeluaran',$data);
}


}


         
            
            