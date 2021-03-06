<?php
/**
*This controller holds the login checks and processing information
*function index = Checks that there is a session if not redirects back to login & calls the data for the view
*function login = loads the login page style checks for validation & runs the querys if the content is valid
*function logout = unsets the session
	 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navigation extends CI_Controller {

    function __construct() {
		parent::__construct();

    }
	
    function index() {
        if(!$this->session->userdata('logged_in')) {
            redirect('admin/home');
        }
		// set data
		$data['sales_pages'] = $data->navigation_model->getSalesPages();
		$data['cms_pages'] = $data->navigation_model->getCMSPages();
		
		// load partial view - EAMPLE
		// view path,  data to pass in ( NULL, array or object ), TRUE returns as a varialble, else echo's.
		$data['content'] = $this->load->view('admin/content', NULL, TRUE);
		// THEN load view.
		$this->load->view('admintemplate', $data);
      
    }


}