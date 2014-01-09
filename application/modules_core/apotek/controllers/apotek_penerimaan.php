<?php 
class Apotek_penerimaan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('apotek_penerimaan_model');
		$this->load->model('farmasi_obats_model');
		
		$this->load->model('apt_sumber_model');
		$this->load->model('apt_supplier_model');

	}

	public function index () {

        $data['apotek_penerimaan_header2']=$this->apotek_penerimaan_model->Get_Penerimaan2(date('Y-m-d'),$this->session->userdata("id_unit_kerja"));
		$this->template->load('template','apotek_penerimaan/index',$data);
	}

	public function lookup(){
        // process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->apotek_penerimaan_model->lookup($keyword); //Search DB
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

    public function falidasiobat () {
        $nama_obat=$this->input->post('obat');
        $this->farmasi_obats_model->Update_Obats($nama_obat); 
    }

    public function falidasiobatbatal () {
        $nama_obat=$this->input->post('obat');
        $this->farmasi_obats_model->Update_Batal($nama_obat);  
    }

    

    public function detail2(){
        $data['apotek_penerimaan_header2']=$this->apotek_penerimaan_model->Get_Penerimaan_header2($this->uri->segment(4));
        $data['detail_apotek_penerimaan2']=$this->apotek_penerimaan_model->Get_Penerimaan_Id2($this->uri->segment(4));
        $data['id']= $this->uri->segment(4);
        $this->template->load('template', 'apotek_penerimaan/detail',$data);

    }
    
    public function view(){
        $data['apotek_penerimaan_header']=$this->apotek_penerimaan_model->Get_Penerimaan(date('Y-m-d'));
        $this->template->load('template', 'apotek_penerimaan/view',$data);

    }
    public function save () {

        $in['id']=$this->input->post('id');
        $in['no_nota']=$this->input->post('no_nota');
        $in['unit_kerja_id']=$this->input->post('unit_kerja_id');
        $in['tanggal_terima']=$this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
        $in['sumber_id']=$this->input->post('sumber_id');
        $in['supplier_id']=$this->input->post('supplier_id');
        $in['sales_id']=$this->input->post('sales_id');
        $header=$this->apotek_penerimaan_model->insert("apotek_penerimaan_header",$in);


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
            $query=$this->db->query("insert into apotek_penerimaan_item (obat_id,jumlah,terima_id,keterangan) VALUES ('$in','$jumlah2','$terima_id_insert','$keterangan')");
            
        }

        

            }

            $this->session->set_flashdata('message','Data Berhasil Disimpan');
            redirect('apotek/apotek_penerimaan/detail/'.$terima_id_insert);

    
}

public function add () {

    $id = $this->uri->segment(4,TRUE);
    $data['apotek_penerimaan_header']=$this->apotek_penerimaan_model->Get_Penerimaan_header($id);

    $this->template->load('template','apotek_penerimaan/add',$data);
}

public function save_add () {

        foreach ($_POST['rows'] as $key => $count ){


            $obat_id = $_POST['obat_id_'.$count];
            $obat_id2= $this->farmasi_obats_model->Ambil_ID_Obats($obat_id);
            foreach ($obat_id2->result_array() as $d) {
                $in = $d['id'];
                $jumlah = $d['qtt'];
            }
            $cekdouble= $this->apotek_penerimaan_model->cekdoubleobat($in,$_POST['terima_id']);
            foreach ($cekdouble->result_array() as $tampil ) {
                $terima = $tampil['terima_id'];
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
            if($cekdouble->num_rows()>0){
                    $this->session->set_flashdata('message','Data Sudah Ada!');
                    redirect('apotek/apotek_penerimaan/detail/'.$terima);

            }else{

            $queryobat = $this->db->query ("update farmasi_obats set qtt  = '$jumlahbaru' WHERE id='$in' ");
            $query=$this->db->query("insert into apotek_penerimaan_item (obat_id,jumlah,terima_id,keterangan) VALUES ('$in','$jumlah2','$terima_id_insert','$keterangan')");
            
            }
        }

        

            }

            $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
            redirect('apotek/apotek_penerimaan/detail/'.$terima_id_insert);

}

public function edit () {

    $id['id'] = $this->uri->segment(4);
    
    $query = $this->apotek_penerimaan_model->edit("apotek_penerimaan_header",$id);
    foreach ($query->result_array() as $tampil) {
        $data['id']=$tampil['id'];
        $data['no_nota']=$tampil['no_nota'];
       
        $data['sumber_id']=$tampil['sumber_id'];
        $data['supplier_id']=$tampil['supplier_id'];
    }

     $query= $this->apotek_penerimaan_model->gettanggalterima($data['id']);
        $query=($query->result());
        $data['tgl'] =$query[0]->tgl;
        $data['bln'] =$query[0]->bln;
        $data['thn'] =$query[0]->thn;

    $data['detail_apotek_penerimaan']=$this->apotek_penerimaan_model->Get_Penerimaan_Id($this->uri->segment(4));
    
    $data['apt_sumber']=$this->apt_sumber_model->Get_Apt_Sumber();
    $data['apt_supplier']=$this->apt_supplier_model->Get_Apt_Supplier();
    $this->template->load('template','apotek_penerimaan/edit',$data);

}

public function delete_item() {

    $id['id']=$this->uri->segment(5);
    $query = $this->apotek_penerimaan_model->deleteitem("apotek_penerimaan_item",$id);
    $this->session->set_flashdata('message','Data Berhasil Dihapus');
    redirect('apotek/apotek_penerimaan/detail/'.$this->uri->segment(4),'refresh');

           

}

public function updateid () {

    $id['id']=$this->input->post('id');
    $up['jumlah_gudang']=$this->input->post('jumlah');
    $up['keterangan']= $this->input->post('keterangan');

    $this->apotek_penerimaan_model->update_jumlah("apotek_penerimaan_item2",$up,$id);
    $this->session->set_flashdata('message','Data Berhasil Diupdate');


}

public function search () {

    $tgl=$this->input->post('tgl');
    $bln=$this->input->post('bln');
    $thn=$this->input->post('thn');

    $data['cari']=$this->apotek_penerimaan_model->seacrh($tgl,$bln,$thn,$this->session->userdata("id_unit_kerja"));

    $this->template->load('template','apotek_penerimaan/view_search',$data);
}


function Get_Sales () {

        $supplier_id = $this->input->post('supplier_id');
        $supplier = $this->apotek_penerimaan_model->Get_Sales_Supplier($supplier_id);
        $data .= "<option value=''>--Pilih Sales--</option>";
        foreach ($supplier->result_array() as $mp){
        $data .= "<option value='$mp[id_sales]'> $mp[nama_sales]</option>\n";   
    } 
    echo $data;

    }

    function cetak () {

    $id = $this->uri->segment(4,TRUE);
    $data['apotek_penerimaan_header']=$this->apotek_penerimaan_model->Get_Penerimaan_header($this->uri->segment(4));
    $data['detail_apotek_penerimaan']=$this->apotek_penerimaan_model->Get_Penerimaan_Id($this->uri->segment(4));
                
    $this->load->view('apotek_penerimaan/cetak_penerimaan',$data);
}

public function cek_list() {

    $id = $this->input->post("idpenerimaan");
    

    $ambildata = $this->apotek_penerimaan_model->updateceklist($id);
    //echo $this->db->last_query();
    //die;
    $this->session->set_flashdata('message','Data Berhasil Di Ceklist');
    redirect('apotek/apotek_penerimaan');


}


}