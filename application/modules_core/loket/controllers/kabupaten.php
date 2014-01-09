<?php
class kabupaten extends Ci_Controller {
		public function __construct () {
			parent::__construct();
			$this->load->model('model_sales');
		}
	function index(){
		$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("sosial_kabupaten");
			$config['base_url'] = base_url() . 'kabupaten/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_get'] = $this->db->get("sosial_kabupaten",$limit,$offset);
		    $this->template->load('template','kabupaten/view_kabupaten',$d);
	}

	function delete(){
		$id['id_kabupaten']= $this->uri->segment(3);
		$this->db->delete("sosial_kabupaten",$id);

		?>
			<script> window.location = "<?php echo base_url(); ?>kabupaten"; </script>
		<?php
	}
}
?>