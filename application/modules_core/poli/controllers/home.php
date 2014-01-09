<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->template->load('templatePoli','v_home');
	}

	function out(){
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

}

/* End of file */
/* Location: ./application/controllers/ */