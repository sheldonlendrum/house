<?php
/**
*This controller holds the login checks and processing information
*function index = Checks that there is a session if not redirects back to login & calls the data for the view
*function login = loads the login page style checks for validation & runs the querys if the content is valid
*function logout = unsets the session
	 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deleteimage extends CI_Controller { 

    function __construct(){ 
    parent::__construct(); 
    } 
    function index() { 
    if(!$this->session->userdata('logged_in')) { 
        redirect('admin/home'); 
    } 
    // Main Page Data 
	$page['get_images'] = $this->image_model->getImages();
    $data['cms_pages'] = $this->navigation_model->getCMSPages();
    $data['title'] = 'Delete Gallery Image'; 
    $data['content'] = $this->load->view('admin/deleteimage',$page,TRUE); 

    $this->load->view('admintemplate', $data);

}

	function delete() {
		
	}

}