<?php 
class Gudang_penerimaan extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('gudang_penerimaan_model');
		$this->load->model('unit_kerja_model');
		$this->load->model('apt_sumber_model');
		$this->load->model('apt_supplier_model');
		$this->load->model('farmasi_obats_model');
	}

	public function index() {

		$data['id_gudang_header']=$this->gudang_penerimaan_model->getgudangid();
		$data['unit_kerja']=$this->unit_kerja_model->Get_Unit_Kerja();
		$data['apt_sumber']=$this->apt_sumber_model->Get_Apt_Sumber();
		$data['apt_supplier']=$this->apt_supplier_model->Get_Apt_Supplier();
		$this->template->load('template','gudang_penerimaan/index',$data);
	}

	function lookup(){
        // process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->gudang_penerimaan_model->lookup($keyword); //Search DB
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

    function falidasiobatbatal () {
        $nama_obat=$this->input->post('obat');
        $this->farmasi_obats_model->Update_Batal($nama_obat);  
    }

     function falidasiobat () {
        $nama_obat=$this->input->post('obat');
        $this->farmasi_obats_model->Update_Obats($nama_obat); 
    }

	public function save () {
		$in['id']=$this->input->post('id');
        $in['no_nota']=$this->input->post('no_nota');
        $in['unit_kerja_id']=$this->input->post('unit_kerja_id');
        $in['tanggal_terima']=$this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
        $in['sumber_id']=$this->input->post('sumber_id');
        $in['supplier_id']=$this->input->post('supplier_id');
        $header=$this->gudang_penerimaan_model->insert("gudang_penerimaan_header",$in);


        foreach ($_POST['rows'] as $key => $count ){


            $obat_id = $_POST['obat_id_'.$count];
            $obat_id2= $this->farmasi_obats_model->Ambil_ID_Obats($obat_id);
            foreach ($obat_id2->result_array() as $d) {
                $in = $d['id'];
                $jumlah = $d['qtt'];
            }
            $this->farmasi_obats_model->Updates_Obats($obat_id);
            $jumlah2 = $_POST['jumlah_'.$count];
            $jumlahbaru = $jumlah2 + $jumlah;
           // $jumlah2 = $_POST['jumlah_'.$count];
            $keterangan = $_POST['keterangan_'.$count];
            //$nama_unit_kerja = $_POST['unit_kerja_id_'.$count];
            //$nama_apt_sumber = $_POST['sumber_id_'.$count];
            //$nama_apt_supplier = $_POST['supplier_id_'.$count];
            //$tanggal_penerimaan = $_POST['hari_'.$count];
            $terima_id_insert = $_POST['terima_id_'.$count];

        if (empty($jumlah2)) {

        }
        else {
            $queryobat = $this->db->query ("update farmasi_obats set qtt  = '$jumlahbaru' WHERE id='$in' ");
            $query=$this->db->query("insert into gudang_penerimaan_item (obat_id,jumlah,terima_id,keterangan) VALUES ('$in','$jumlah2','$terima_id_insert','$keterangan')");
            
        }

        

            }

            //echo "<script>alert('Data Berhasil Disimpan')</script>";


        $id=$this->input->post('id');
        $data['gudang_penerimaan_header']=$this->gudang_penerimaan_model->Get_Penerimaan_header($id);
        $data['detail_gudang_penerimaan']=$this->gudang_penerimaan_model->Get_Penerimaan_Id($id);
        $data['id']= $id;
        $this->template->load('template', 'gudang_penerimaan/detail',$data);

                    /* ?>
                        <script>window.location ="<?php echo base_url();?>farmasi_obats"; </script>
                    <?php
//redirect('farmasi_penerimaan/tampil'); */

    
	}

    public function add () {

    $id = $this->uri->segment(4,TRUE);
    $data['gudang_penerimaan_header2']=$this->gudang_penerimaan_model->Get_Penerimaan_header2($id);

    $this->template->load('template','gudang_penerimaan/add',$data);
}

public function save_add () {

        foreach ($_POST['rows'] as $key => $count ){


            $obat_id = $_POST['obat_id_'.$count];
            $obat_id2= $this->farmasi_obats_model->Ambil_ID_Obats($obat_id);
            foreach ($obat_id2->result_array() as $d) {
                $in = $d['id'];
                $jumlah = $d['qtt'];
            }
            $cekdouble= $this->gudang_penerimaan_model->cekdoubleobat($in,$_POST['keluar_id']);
            foreach ($cekdouble->result_array() as $tampil ) {
                $keluar = $tampil['keluar_id'];
            }
            $this->farmasi_obats_model->Updates_Obats($obat_id);
            $jumlah2 = $_POST['jumlah_'.$count];
            $jumlahbaru = $jumlah2 + $jumlah;
           // $jumlah2 = $_POST['jumlah_'.$count];
            $keterangan = $_POST['keterangan_'.$count];
            //$nama_unit_kerja = $_POST['unit_kerja_id_'.$count];
            //$nama_apt_sumber = $_POST['sumber_id_'.$count];
            //$nama_apt_supplier = $_POST['supplier_id_'.$count];
            //$tanggal_penerimaan = $_POST['hari_'.$count];
            $keluar_id_insert = $_POST['keluar_id_'.$count];

        if (empty($jumlah2)) {

        }
        else {
            if($cekdouble->num_rows()>0){
                    $this->session->set_flashdata('message','Data Sudah Ada!');
                    redirect('farmasi/gudang_penerimaan/detail2/'.$keluar);

            }
            else {
            $queryobat = $this->db->query ("update farmasi_obats set qtt  = '$jumlahbaru' WHERE id='$in' ");
            $query=$this->db->query("insert into gudang_penerimaan_item2 (obat_id,jumlah,keluar_id,keterangan) VALUES ('$in','$jumlah2','$keluar_id_insert','$keterangan')");
            
            }
        }

        

    }

    $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
    redirect('farmasi/gudang_penerimaan/detail2/'.$keluar_id_insert);

}

    public function view(){
        $data['gudang_penerimaan_header']=$this->gudang_penerimaan_model->Get_Penerimaan(date('Y-m-d'));
        $this->template->load('template', 'gudang_penerimaan/view',$data);

    }

    public function view_penerimaan(){
        
        $data['gudang_penerimaan_header2']=$this->gudang_penerimaan_model->Get_Penerimaan2(date('Y-m-d'),$this->session->userdata("id_unit_kerja"));
        $this->template->load('template', 'gudang_penerimaan/view_gudang',$data);

    }



    public function detail(){
        $data['gudang_penerimaan_header']=$this->gudang_penerimaan_model->Get_Penerimaan_header($this->uri->segment(4));
        $data['detail_gudang_penerimaan']=$this->gudang_penerimaan_model->Get_Penerimaan_Id($this->uri->segment(4));
        $data['id']= $this->uri->segment(4);
        $this->template->load('template', 'gudang_penerimaan/detail',$data);

    }

    public function detail2(){
        $data['gudang_penerimaan_header2']=$this->gudang_penerimaan_model->Get_Penerimaan_header2($this->uri->segment(4));
        $data['detail_gudang_penerimaan2']=$this->gudang_penerimaan_model->Get_Penerimaan_Id2($this->uri->segment(4));
        $data['id']= $this->uri->segment(4);
        $this->template->load('template', 'gudang_penerimaan/detail_gudang',$data);

    }

    public function search () {

    $tgl=$this->input->post('tgl');
    $bln=$this->input->post('bln');
    $thn=$this->input->post('thn');

    $data['cari']=$this->gudang_penerimaan_model->seacrh($tgl,$bln,$thn,$this->session->userdata("id_unit_kerja"));

    $this->template->load('template','gudang_penerimaan/view_search',$data);
}

public function delete_item() {

    $id['id']=$this->uri->segment(5);
    $query = $this->gudang_penerimaan_model->deleteitem("gudang_penerimaan_item2",$id);
    $this->session->set_flashdata('message','Data Berhasil Dihapus');
    redirect('farmasi/gudang_penerimaan/detail2/'.$this->uri->segment(4),'refresh');

           

}

public function updateid () {

    $id['id']=$this->input->post('id');
    $up['jumlah']=$this->input->post('jumlah');
    $up['keterangan']= $this->input->post('keterangan');

    $this->gudang_penerimaan_model->update_jumlah("gudang_penerimaan_item2",$up,$id);
    $this->session->set_flashdata('message','Data Berhasil Diupdate');


}

function cetak () {

    $id = $this->uri->segment(4,TRUE);
    $data['gudang_penerimaan_header2']=$this->gudang_penerimaan_model->Get_Penerimaan_header2($this->uri->segment(4));
    $data['detail_gudang_penerimaan2']=$this->gudang_penerimaan_model->Get_Penerimaan_Id2($this->uri->segment(4));
                
    $this->load->view('gudang_penerimaan/cetak_penerimaan',$data);
}

public function cek_list() {

    $id = $this->input->post("idpenerimaan");
    

    $ambildata = $this->gudang_penerimaan_model->updateceklist($id);
    //echo $this->db->last_query();
    //die;
    $this->session->set_flashdata('message','Data Berhasil Di Ceklist');
    redirect('farmasi/gudang_penerimaan/view_penerimaan');


}




	
}