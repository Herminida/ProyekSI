<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		//$this->template->load('template','home');
		$this->load->view('sik_tarakan');
	}
}

