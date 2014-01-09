<?php

class apotek_pengeluaran extends CI_Controller {
    
    public function __construct () {
        parent::__construct();
        $this->load->model('apotek_pengeluaran_model');
        $this->load->model('farmasi_obats_model');
        $this->load->model('unit_kerja_model');
    }

    function index () {

        $d['id_pengeluaran_header']=$this->apotek_pengeluaran_model->getresep();
        $this->template->load('template','apotek_pengeluaran/index',$d);
    }


    function lookup(){
        // process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->apotek_pengeluaran_model->lookup($keyword); //Search DB
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
        $header=$this->farmasi_pengeluaran_model->insert("farmasi_pengeluaran_header",$in);

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
            
            
            
            $queryobat = $this->db->query ("update farmasi_obats set qtt  = '$jumlahbaru' WHERE id='$in' ");
            $query=$this->db->query("insert into farmasi_pengeluaran_item (obat_id,jumlah,keluar_id,jenis_keluar,keterangan) VALUES ('$in','$jumlah2','$keluar_id_insert','$jeniskeluar','$keterangan')");
            
        }

        

            }

            

            //echo "<script>alert('Data Berhasil Disimpan')</script>";

            ?>
                <script>window.location ="<?php echo base_url();?>apotek/apotek_pengeluaran/index"; </script>
                    <?php

        /*$id=$this->input->post('id');
        $data['farmasi_pengeluaran_header']=$this->farmasi_pengeluaran_model->Get_Pengeluaran_header($id);
        $data['detail_farmasi_pengeluaran']=$this->farmasi_pengeluaran_model->Get_Pengeluaran_Id($id);
        $data['id']= $id;
        $this->template->load('template', 'farmasi_pengeluaran/detail',$data); */

    
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
        $data['farmasi_pengeluaran_header']=$this->farmasi_pengeluaran_model->Get_Pengeluaran(date('Y-m-d'));
        $this->template->load('template', 'farmasi_pengeluaran/view',$data);

    }

    public function detail(){
        $data['apotek_pengeluaran_header']=$this->apotek_pengeluaran_model->getresepbyid($this->uri->segment(4));
        $data['detail_apotek_pengeluaran']=$this->apotek_pengeluaran_model->getresepitem($this->uri->segment(4));
        $data['pemeriksaan_id']= $this->uri->segment(4);
        $this->template->load('template', 'apotek_pengeluaran/detail',$data);

    }

    public function add () {

        $id = $this->uri->segment(4,TRUE);
        $data['apotek_pengeluaran_header']=$this->apotek_pengeluaran_model->getresepbyid($id);

        $this->template->load('template','apotek_pengeluaran/add',$data);
    }


function save_add () {

    
        foreach ($_POST['rows'] as $key => $count ){


            $obat_id = $_POST['obat_id_'.$count];
            $obat_id2= $this->farmasi_obats_model->Ambil_ID_Obats($obat_id);
            foreach ($obat_id2->result_array() as $d) {
                $in = $d['id'];
                $jumlah = $d['qtt'];
            }
            $cekdouble= $this->apotek_pengeluaran_model->cekdoubleobat($in,$_POST['pemeriksaan_id']);
            foreach ($cekdouble->result_array() as $tampil ) {
                $keluar = $tampil['pemeriksaan_id'];
            }
            $this->farmasi_obats_model->Updates_Obats($obat_id);
            $jumlah2 = $_POST['jumlah_'.$count];
            $jumlahbaru = $jumlah - $jumlah2;
           // $jumlah2 = $_POST['jumlah_'.$count];
            $jeniskeluar = $_POST['jenis_keluar_'.$count];
            $keterangan = $_POST['keterangan_'.$count];
            //$nama_unit_kerja = $_POST['unit_kerja_id_'.$count];
            //$tanggal_keluar = $_POST['hari_'.$count];
            $keluar_id_insert = $_POST['pemeriksaan_id_'.$count]; 

        if (empty($jumlah2)) {

        }
        else {

            if($cekdouble->num_rows()>0){
                $this->session->set_flashdata('message','Data Sudah Ada!');
                redirect('apotek/apotek_pengeluaran/detail/'.$keluar);

            }
            else {
            
            
            
            $queryobat = $this->db->query ("update farmasi_obats set qtt  = '$jumlahbaru' WHERE id='$in' ");
            $query=$this->db->query("insert into  x_resep_detail (item_id,jumlah,pemeriksaan_id,segma,ket_resep) VALUES ('$in','$jumlah2','$keluar_id_insert','$jeniskeluar','$keterangan')");
            
            }
        }

    }
    $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
    redirect('apotek/apotek_pengeluaran/detail/'.$keluar_id_insert);
    
}



public function delete_item() {

    $id['id_detail']=$this->uri->segment(5);
    $query = $this->apotek_pengeluaran_model->deleteitem("x_resep_detail",$id);
    redirect('apotek/apotek_pengeluaran/detail/'.$this->uri->segment(4),'refresh');

           

}

public function updateid () {

    $id['id_detail']=$this->input->post('id_detail');
    $up['jumlah']=$this->input->post('jumlah');
    $up['segma']=$this->input->post('jeniskeluar');
    $up['ket_resep']= $this->input->post('keterangan');
    $this->apotek_pengeluaran_model->update_jumlah("x_resep_detail",$up,$id);
    $this->session->set_flashdata('message','Data Berhasil Diupdate');


}

public function search () {

    $tgl=$this->input->post('tgl');
    $bln=$this->input->post('bln');
    $thn=$this->input->post('thn');

    $data['cari']=$this->apotek_pengeluaran_model->seacrh($tgl,$bln,$thn);

    $this->template->load('template','apotek_pengeluaran/view_search',$data);
}

public function validasi () {

    $datavalidasi = $this->input->post('pemeriksaan_id');
    $query = $this->apotek_pengeluaran_model->double($datavalidasi);
                
    if ($query->num_rows>0) {

    $this->session->set_flashdata('message','Data Sudah Divalidasi');
    redirect('apotek/apotek_pengeluaran/detail/'.$datavalidasi);
    }
    else {

    $data['tanggal_keluar']=$this->input->post('tanggal_keluar');
    $id=$this->input->post('pemeriksaan_id');
    $item_id = $this->apotek_pengeluaran_model->getresepitem($id);

    foreach ($item_id->result_array() as $tampil) {
        $data['obat_id']=$tampil['item_id'];
        $data['jumlah']=$tampil['jumlah'];
        $data['keluar_id']=$tampil['pemeriksaan_id'];
        $data['tanggal_keluar']=date('Y-m-d H:i:s');
        $this->apotek_pengeluaran_model->insertpengeluaran("apotek_pengeluaran",$data);
       
    }
    $this->session->set_flashdata('message','Data Berhasil Divalidasi');
    redirect('apotek/apotek_pengeluaran/detail/'.$id);


    
}
}

function cetak () {

    $id = $this->uri->segment(4,TRUE);
    $data['apotek_pengeluaran_header']=$this->apotek_pengeluaran_model->getresepbyid($this->uri->segment(4));
    $data['detail_apotek_pengeluaran']=$this->apotek_pengeluaran_model->getresepitem($this->uri->segment(4));
            
    $this->load->view('apotek_pengeluaran/cetak_pengeluaran',$data);
}



}


         
            
            