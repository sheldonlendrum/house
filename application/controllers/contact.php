<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

    function __construct() {
    parent::__construct();

    }

    function index() {
		 #Set The Validation Rules
                $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
                $this->form_validation->set_rules('email', 'email', 'trim|numeric|required|xss_clean');
                $this->form_validation->set_rules('phone', 'phone', 'trim|numeric|required|xss_clean');
                $this->form_validation->set_rules('message', 'message', 'trim|required|xss_clean');

				if($this->form_validation->run())
				{
				if(!$this->email->send()){
					
					$data['message'] = array('emailError' => $this->email->print_debugger());
				}
				
				$this->load->library('email');
				
				$this->email->from('email','name');
				$this->email->to('jessmckenzie@ihug.co.nz');
				$this->email->subject('Message From Website');
				$this->email->message('blah');
			} # End Form Validation
              
             }# Index Function 

        $data['content'] = $this->load->view('contact', $data, TRUE); #Loads the "content"
        $this->load->view('template', $data); #Loads the given template and passes the $data['content'] into it   
} # End Controller