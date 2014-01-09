<?php

class Sosial_pasien extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
       
        
    }

    public function index () {

    	 $this->template->load('template','sosial_pasien/index');
    }


}