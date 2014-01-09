<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->template->load('templateSanitasi','v_home');
	}

}

/* End of file */
/* Location: ./application/controllers/ */