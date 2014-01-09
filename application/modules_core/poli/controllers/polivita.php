<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polivita extends CI_Controller {

function __construct(){
  parent::__construct();
  $this->load->model('m_gizi');
  $this->load->model('m_kelurahan');
}

/*id_vitamin,kelurahan,tgl,sasaran_by,sasaran_blt,sasaran_bufas,sasaran_bumil,sasaran_wus,vit_by,vit_blt,vit_bufas,fe1_bumil,fe3_bumil,ukur_lila_bumil,kurang_lila_bumil*/
  
  public function index($id='')
  { 
    $this->template->load('templatePoli','poliklinik/v_polivita');

  }
  public function hapus(){
    $success=$this->m_gizi->deleteVitamin($this->input->post('id_vitamin'));
    echo '{"success":"'.$success.'","error":""}';
  }

  public function simpan(){
    if ($this->input->post('id_vitamin')==''){
      $success=$this->m_gizi->simpanVitamin();
    }else{
    $success=$this->m_gizi->updateVitamin();
    }
    echo '{"success":"'.$success.'","error":""}';
  }

  public function ajaxVitamin(){
    echo $this->m_gizi->list_data_vitamin();
  }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */