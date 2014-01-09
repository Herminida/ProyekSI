<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_login extends CI_Controller {
	public function __construct () {
		
		parent::__construct();
		$this->load->model('app_user_login_model');
	}


 
   public function index()
   {
      if($this->session->userdata("logged_in")=="")
	  {
		  
		  $this->form_validation->set_rules('username', 'Username', 'trim|required');
		  $this->form_validation->set_rules('password', 'Password', 'trim|required');
		  
		  if ($this->form_validation->run() == FALSE)
		  {
			   $this->load->view('user_login/bg_home');
			  
		  }
		  else
		  {
				$data['username']	=	$this->input->post("username");
				$data['password']	=	$this->input->post("password");
				
				$this->app_user_login_model->cekUserLogin($data);
		  }
		}
		
   }
   
   public function logout()
   {
   		$this->session->sess_destroy();
		redirect("login/user_login");
   }
}
 

