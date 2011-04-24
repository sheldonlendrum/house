<?php
/**
*This controller holds the login checks and processing information
*function index = When someone goes to /admin they get sent to the login page
*function login = loads the login page style checks for validation & runs the querys if the content is valid
*function logout = unsets the session
	 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	
	function index(){

        if($this->session->userdata('logged_in')) redirect('admin/dashboard');
		// set data
		$data['title'] = 'Login';
		$data['sales_pages'] = NULL
		$data['get_images'] = NULL;
		$data['cms_pages'] = $this->navigation_model->getCMSPages();

		// load partial view - EAMPLE
		// view path,  data to pass in ( NULL, array or object ), TRUE returns as a varialble, else echo's.
		$data['content'] = $this->load->view('admin/admin_login', NULL, TRUE);
		// THEN load view.
		$this->load->view('template', $data);

	}
	public function login() {
		
	    $this->form_validation->set_rules('username','Username', 'required|valid_email|trim|max_length[99]|xss_clean');
	    $this->form_validation->set_rules('password','Password', 'required|trim|max_length[200]|xss_clean|callback__checkUsernamePassword');

	    if($this->form_validation->run() === TRUE) {
		// set CLEAN data in the session.
	        redirect('admin/dashboard');
	    }
	
		$this->index();
	}
	
	function logout() {
		
		$this->session->sess_destroy();
		$this->index();
		
	}


	 function _checkUsernamePassword() {
		// adding the _ makes the function 'private' so it can't be called from the URI.
		
	        extract($_POST); // Gets data from form and creates vars
			// this function might want to return ALL user data for this user, so you can set more info in the session, like, your name :)
			// but you cant get the data from out side of the callback, so maybe your right, and set the session inside of teh call back.
			
	        $user = $this->login_model->check_login($username,$password);

	        if(! $user){ // != If username or password are not correct
	            $this->session->set_flashdata('login_error',TRUE); //does not add the non valid login to the session
	            $this->form_validation->set_message('_checkUsernamePassword', 'Sorry %s is not correct.');
	            return FALSE;

	        } else {
				// you are setting the session in the next step, + the next step will have 'prep'd data after the form validation has run.				
		        $this->session->set_userdata('logged_in',TRUE);
		        $this->session->set_userdata('user_id',$user->id);
		        $this->session->set_userdata('user_name',$user->first_name); // do these feilds exists in the datasbe >?
		        $this->session->set_userdata('user_email',$user->email);
				return TRUE;
			
			}

	}
}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */