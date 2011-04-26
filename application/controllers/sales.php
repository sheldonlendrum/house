<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {

    function __construct() {
    parent::__construct();

    }

    function index() {
		 
		$data['sales_pages'] = $this->sales_model->getSalesPages(); 
		
        $data['content'] = $this->load->view('contact', $data, TRUE); #Loads the "content"
        $this->load->view('template', $data); #Loads the given template and passes the $data['content'] into it
              
             }# Index Function 
  
} # End Controller