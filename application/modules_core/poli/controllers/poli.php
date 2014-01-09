<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class poli extends CI_Controller {
	public function __construct () {
		parent::__construct();

	}
	
 
   public function index()
   {
		
			$this->template->load('templatePoli','v_home');
			//$this->load->view('bg_home');
	
   }

   function showList() {
    $this->load->library('controllerlist'); // Load the library
    
    /*while ($fruit_name = current($this->controllerlist->getControllers())) {
        echo key($this->controllerlist->getControllers()).'<br />';
	    next($this->controllerlist->getControllers());
}*/
	
	foreach ($this->controllerlist->getControllers() as $key => $value) {
		print_r($key);
		echo ',';
	}
    //print_r(json);
}
}
 

