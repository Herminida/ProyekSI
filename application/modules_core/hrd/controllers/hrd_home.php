<?php

class hrd_home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        
        
    }

    public function index() {
       
           
            
            $this->template->load('template','home');

       
    }

    


}