<?php

class mutasi_pengeluaran extends CI_Controller {
    
    public function __construct () {
        parent::__construct();
        $this->load->model('mutasi_pengeluaran_model');
        $this->load->model('farmasi_obats_model');
     
    }

    function index () {

        $d['id_pengeluaran_header']=$this->mutasi_pengeluaran_model->getpengeluaranid();
        $d['id2_pengeluaran_header']=$this->mutasi_pengeluaran_model->getpengeluaranid2();
        $this->template->load('template','mutasi_pengeluaran/index',$d);
    }


    function lookup(){
        // process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->mutasi_pengeluaran_model->lookup($keyword); //Search DB
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
        $in['tanggal_keluar']=$this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
        $in['jenis_mutasi']=$this->input->post('jenis_mutasi');
        $header=$this->mutasi_pengeluaran_model->insert("mutasi_pengeluaran_header",$in);

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
            //$jeniskeluar = $_POST['jenis_keluar_'.$count];
            $keterangan = $_POST['keterangan_'.$count];
            //$nama_unit_kerja = $_POST['unit_kerja_id_'.$count];
            //$tanggal_keluar = $_POST['hari_'.$count];
            $keluar_id_insert = $_POST['keluar_id_'.$count]; 

        if (empty($jumlah2)) {

        }
        else {
            
            
            
            $queryobat = $this->db->query ("update farmasi_obats set qtt  = '$jumlahbaru' WHERE id='$in' ");
            $query=$this->db->query("insert into mutasi_pengeluaran_item (obat_id,jumlah,keluar_id,keterangan) VALUES ('$in','$jumlah2','$keluar_id_insert','$keterangan')");
            
        }

        

    }

    $this->session->set_flashdata('message','Data Berhasil Disimpan');
    redirect('farmasi/mutasi_pengeluaran/detail/'.$keluar_id_insert);

    
}


    function falidasiobat () {
        $nama_obat=$this->input->post('obat');
        $this->farmasi_obats_model->Update_Obats($nama_obat); 
    }

    function falidasiobatbatal () {
        $nama_obat=$this->input->post('obat');
        $this->farmasi_obats_model->Update_Batal($nama_obat);  
    }

    public function view(){
        $data['mutasi_pengeluaran_header']=$this->mutasi_pengeluaran_model->Get_Pengeluaran(date('Y-m-d'),$this->session->userdata("id_unit_kerja"));
        $this->template->load('template', 'mutasi_pengeluaran/view',$data);

    }

    public function detail(){
        $data['mutasi_pengeluaran_header']=$this->mutasi_pengeluaran_model->Get_Pengeluaran_header($this->uri->segment(4));
        $data['detail_mutasi_pengeluaran']=$this->mutasi_pengeluaran_model->Get_Pengeluaran_Id($this->uri->segment(4));
        $data['id']= $this->uri->segment(4);
        $this->template->load('template', 'mutasi_pengeluaran/detail',$data);

    }

    public function add () {

    $id = $this->uri->segment(4,TRUE);
    $data['mutasi_pengeluaran_header']=$this->mutasi_pengeluaran_model->Get_Pengeluaran_header($id);

    $this->template->load('template','mutasi_pengeluaran/add',$data);
}


function save_add () {

    
        foreach ($_POST['rows'] as $key => $count ){


            $obat_id = $_POST['obat_id_'.$count];
            $obat_id2= $this->farmasi_obats_model->Ambil_ID_Obats($obat_id);
            foreach ($obat_id2->result_array() as $d) {
                $in = $d['id'];
                $jumlah = $d['qtt'];
            }
            $cekdouble= $this->mutasi_pengeluaran_model->cekdoubleobat($in,$_POST['keluar_id']);
            foreach ($cekdouble->result_array() as $tampil ) {
                $keluar = $tampil['keluar_id'];
            }
            $this->farmasi_obats_model->Updates_Obats($obat_id);
            $jumlah2 = $_POST['jumlah_'.$count];
            $jumlahbaru = $jumlah - $jumlah2;
           // $jumlah2 = $_POST['jumlah_'.$count];
            //$jeniskeluar = $_POST['jenis_keluar_'.$count];
            $keterangan = $_POST['keterangan_'.$count];
            //$nama_unit_kerja = $_POST['unit_kerja_id_'.$count];
            //$tanggal_keluar = $_POST['hari_'.$count];
            $keluar_id_insert = $_POST['keluar_id_'.$count]; 

        if (empty($jumlah2)) {

        }
        else {
            
            if($cekdouble->num_rows()>0){
                $this->session->set_flashdata('message','Data Sudah Ada!');
                redirect('farmasi/mutasi_pengeluaran/detail/'.$keluar);

            }
            else {
            
            $queryobat = $this->db->query ("update farmasi_obats set qtt  = '$jumlahbaru' WHERE id='$in' ");
            $query=$this->db->query("insert into mutasi_pengeluaran_item (obat_id,jumlah,keluar_id,keterangan) VALUES ('$in','$jumlah2','$keluar_id_insert','$keterangan')");
            
            }
        }

        

    }

    $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
    redirect('farmasi/mutasi_pengeluaran/detail/'.$keluar_id_insert);

    
}

public function delete_item() {

    $id['id']=$this->uri->segment(5);
    $query = $this->mutasi_pengeluaran_model->deleteitem("mutasi_pengeluaran_item",$id);
    $this->session->set_flashdata('message','Data Berhasil Dihapus');
    redirect('farmasi/mutasi_pengeluaran/detail/'.$this->uri->segment(4),'refresh');

           

}

public function updateid () {

    $id['id']=$this->input->post('id');
    $up['jumlah']=$this->input->post('jumlah');
    $up['keterangan']= $this->input->post('keterangan');

    $this->mutasi_pengeluaran_model->update_jumlah("mutasi_pengeluaran_item",$up,$id);
    $this->session->set_flashdata('message','Data Berhasil Diupdate');


}

public function search () {

    $tgl=$this->input->post('tgl');
    $bln=$this->input->post('bln');
    $thn=$this->input->post('thn');

    $data['cari']=$this->mutasi_pengeluaran_model->seacrh($tgl,$bln,$thn,$this->session->userdata("id_unit_kerja"));

    $this->template->load('template','mutasi_pengeluaran/view_search',$data);
}

function cetak () {

    $id = $this->uri->segment(4,TRUE);
    $data['mutasi_pengeluaran_header']=$this->mutasi_pengeluaran_model->Get_Pengeluaran_header($this->uri->segment(4));
    $data['detail_mutasi_pengeluaran']=$this->mutasi_pengeluaran_model->Get_Pengeluaran_Id($this->uri->segment(4));
                
    $this->load->view('mutasi_pengeluaran/cetak_pengeluaran',$data);
}


}


         
            
            