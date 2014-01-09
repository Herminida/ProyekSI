<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Labkesda_Home extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->template->load('templateLabkesda','v_home');
	}

}

/* End of file */
/* Location: ./application/controllers/ */