<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->view['error']=false;
		if($form=$this->input->post()){
			$this->db->where('username',$form['username']);
			if($query = $this->db->get('user')){
				$user=$query->row_array();
				if(isset($user['pwd']) and $user['pwd']==md5($form['password'])){
					unset($user['pwd']);
					$this->session->set_userdata($user);//set session
					redirect('','refresh');
				}
			}
			$this->view['error']=true;
		}
		$this->template->load('templatePoli','v_login',$this->view);
	}

	function auth(){
		echo $this->session->userdata('username')?1:0;
	}

}

/* End of file */
/* Location: ./application/controllers/ */