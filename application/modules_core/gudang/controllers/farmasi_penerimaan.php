<?php 
class Farmasi_penerimaan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('farmasi_penerimaan_model');
		$this->load->model('farmasi_obats_model');
		
		$this->load->model('apt_sumber_model');
		$this->load->model('apt_supplier_model');

	}

	public function index () {

        $data['id_penerimaan_header']=$this->farmasi_penerimaan_model->getpenerimaanid();
        $data['id2_penerimaan_header']=$this->farmasi_penerimaan_model->getpenerimaanid2();

		//$data['unit_kerja']=$this->unit_kerja_model->Get_Unit_Kerja();
		$data['apt_sumber']=$this->apt_sumber_model->Get_Apt_Sumber();
		$data['apt_supplier']=$this->apt_supplier_model->Get_Apt_Supplier();

		$this->template->load('template','farmasi_penerimaan/index',$data);
	}

	public function lookup(){
        // process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->farmasi_penerimaan_model->lookup($keyword); //Search DB
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

    public function detail(){
        $data['farmasi_penerimaan_header']=$this->farmasi_penerimaan_model->Get_Penerimaan_header($this->uri->segment(4));
        $data['detail_farmasi_penerimaan']=$this->farmasi_penerimaan_model->Get_Penerimaan_Id($this->uri->segment(4));
        $data['id']= $this->uri->segment(5);
        $this->template->load('template', 'farmasi_penerimaan/detail',$data);

    }
    
    public function view(){
        
        $data['farmasi_penerimaan_header']=$this->farmasi_penerimaan_model->Get_Penerimaan(date('Y-m-d'),$this->session->userdata("id_unit_kerja"));
        $this->template->load('template', 'farmasi_penerimaan/view',$data);

    }


    public function save () {

        $in['id']=$this->input->post('id');
        $in['no_nota']=$this->input->post('no_nota');
        $in['unit_kerja_id']=$this->input->post('unit_kerja_id');
        $in['tanggal_terima']=$this->input->post('thn').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
        $in['sumber_id']=$this->input->post('sumber_id');
        $in['supplier_id']=$this->input->post('supplier_id');
        $in['sales_id']=$this->input->post('sales_id');
        $header=$this->farmasi_penerimaan_model->insert("farmasi_penerimaan_header",$in);


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
            $query=$this->db->query("insert into farmasi_penerimaan_item (obat_id,jumlah,terima_id,keterangan) VALUES ('$in','$jumlah2','$terima_id_insert','$keterangan')");
            
        }

        

            }

            //echo "<script>alert('Data Berhasil Disimpan')</script>";
           
            $this->session->set_flashdata('message','Data Berhasil Disimpan');
            redirect('farmasi/farmasi_penerimaan/detail/'.$terima_id_insert);
        
       

                   /* ?>
                        <script>window.location ="<?php echo base_url();?>farmasi_obats"; </script>
                    <?php */
//redirect('farmasi_penerimaan/tampil');

    
}

public function add () {

    $id = $this->uri->segment(4,TRUE);
    $data['farmasi_penerimaan_header']=$this->farmasi_penerimaan_model->Get_Penerimaan_header($id);

    $this->template->load('template','farmasi_penerimaan/add',$data);
}

public function save_add () {

        foreach ($_POST['rows'] as $key => $count ){


            $obat_id = $_POST['obat_id_'.$count];

            $obat_id2= $this->farmasi_obats_model->Ambil_ID_Obats($obat_id);
            foreach ($obat_id2->result_array() as $d) {
                $in = $d['id'];
                $jumlah = $d['qtt'];
            }
            $cekdouble= $this->farmasi_penerimaan_model->cekdoubleobat($in,$_POST['terima_id']);
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
                    redirect('farmasi_penerimaan/detail/'.$terima);

                }else{
                    
                    $queryobat = $this->db->query ("update farmasi_obats set qtt  = '$jumlahbaru' WHERE id='$in' ");
                    $query=$this->db->query("insert into farmasi_penerimaan_item (obat_id,jumlah,terima_id,keterangan) VALUES ('$in','$jumlah2','$terima_id_insert','$keterangan')");                    
                    
                }
                
            }

        

        }

            $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
            redirect('farmasi/farmasi_penerimaan/detail/'.$terima_id_insert);

}

public function edit () {

    $id['id'] = $this->uri->segment(5);
    
    $query = $this->farmasi_penerimaan_model->edit("farmasi_penerimaan_header",$id);
    foreach ($query->result_array() as $tampil) {
        $data['id']=$tampil['id'];
        $data['no_nota']=$tampil['no_nota'];
        //$data['unit_kerja_id']=$tampil['unit_kerja_id'];
        $data['sumber_id']=$tampil['sumber_id'];
        $data['supplier_id']=$tampil['supplier_id'];
    }

     $query= $this->farmasi_penerimaan_model->gettanggalterima($data['id']);
        $query=($query->result());
        $data['tgl'] =$query[0]->tgl;
        $data['bln'] =$query[0]->bln;
        $data['thn'] =$query[0]->thn;

    $data['detail_farmasi_penerimaan']=$this->farmasi_penerimaan_model->Get_Penerimaan_Id($this->uri->segment(3));
    //$data['unit_kerja']=$this->unit_kerja_model->Get_Unit_Kerja();
    $data['apt_sumber']=$this->apt_sumber_model->Get_Apt_Sumber();
    $data['apt_supplier']=$this->apt_supplier_model->Get_Apt_Supplier();
    $this->template->load('template','farmasi_penerimaan/edit',$data);

}

public function delete_item() {

    $id['id']=$this->uri->segment(5);
    $query = $this->farmasi_penerimaan_model->deleteitem("farmasi_penerimaan_item",$id);
    $this->session->set_flashdata('message','Data Berhasil Dihapus');
    redirect('farmasi/farmasi_penerimaan/detail/'.$this->uri->segment(4),'refresh');


           

}

public function updateid () {

    $id['id']=$this->input->post('id');
    $up['jumlah']=$this->input->post('jumlah');
    $up['keterangan']= $this->input->post('keterangan');

    $this->farmasi_penerimaan_model->update_jumlah("farmasi_penerimaan_item",$up,$id);
    $this->session->set_flashdata('message','Data Berhasil Diupdate');


}

public function search () {

    $tgl=$this->input->post('tgl');
    $bln=$this->input->post('bln');
    $thn=$this->input->post('thn');

    $data['cari']=$this->farmasi_penerimaan_model->seacrh($tgl,$bln,$thn,$this->session->userdata("id_unit_kerja"));

    $this->template->load('template','farmasi_penerimaan/view_search',$data);
}

function Get_Sales () {

        $supplier_id = $this->input->post('supplier_id');
        $supplier = $this->farmasi_penerimaan_model->Get_Sales_Supplier($supplier_id);
        $data .= "<option value=''>--Pilih Sales--</option>";
        foreach ($supplier->result_array() as $mp){
        $data .= "<option value='$mp[id_sales]'> $mp[nama_sales]</option>\n";   
    } 
    echo $data;

    }

function cetak () {

    $id = $this->uri->segment(4,TRUE);
    $data['farmasi_penerimaan_header']=$this->farmasi_penerimaan_model->Get_Penerimaan_header($id);
    $data['detail_farmasi_penerimaan']=$this->farmasi_penerimaan_model->Get_Penerimaan_Id($id);
        
    $this->load->view('farmasi_penerimaan/cetak_penerimaan',$data);
}

}