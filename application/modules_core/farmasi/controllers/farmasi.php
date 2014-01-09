<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class farmasi extends CI_Controller {
	public function __construct () {
		parent::__construct();

	}
	
 
   public function index()
   {
		
			
			
			$this->template->load('template','bg_home');
			//$this->load->view('bg_home');
			
		
   }
}
 

