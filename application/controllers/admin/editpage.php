<?php
/**
*This controller holds the login checks and processing information
*function index = Checks that there is a session if not redirects back to login & calls the data for the view
*function login = loads the login page style checks for validation & runs the querys if the content is valid
*function logout = unsets the session
	 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editpage extends CI_Controller {

    function __construct(){
	parent::__construct();
    }
    
  function index($id){
        if(!$this->session->userdata('logged_in'))redirect('admin/home');
		if ($this->input->post('submit')){

			#The User has submitted updates, lets begin!
			
			#Set The validation Rules	
			$this->form_validation->set_rules('content', 'Content', 'required');

			#if the form_validation rules fail then load the login page with the errors. Otherwise continue validating the user/pass
			if ($this->form_validation->run() == FALSE){

				$data['cms_pages'] = $this->navigation_model->getCMSPages($id);
				#connect to getCMSCotent and set the page info equal to the $data['page'] where the row is equal to the passed $id from the URL.
				$data['page'] = $this->page_model->getCMSContent($id);

				$data['content'] = $this->load->view('admin/editpage', $data, TRUE);
				$this->load->view('admintemplate', $data);
				
			}				
			#Form Validation passed, so lets continue updating.
				#lets set some variables.
				$content = $this->input->post('content', TRUE);
				
				#Now if updatePage fails to update hte database then show "there was a problem", you could echo the db error itself
				if($this->page_model->updatePage($id, $content)) {
					$data['cms_pages'] = $this->navigation_model->getCMSPages($id);
					#connect to getCMSContent and set the page info equal to the $data['page'] where the row is equal to the passed $id from the URL.
					$data['page'] = $this->page_model->getCMSContent($id);
					$data['success'] = TRUE;
					$data['content'] = $this->load->view('admin/editpage', $data, TRUE);
					$this->load->view('admintemplate', $data);
				}//END if updatePage
			}else{
			$data['cms_pages'] = $this->navigation_model->getCMSPages($id);

			#connect to getCMSCotent and set the page info equal to the $data['page'] where the row is equal to the passed $id from the URL.
			$data['page'] = $this->page_model->getCMSContent($id);

			$data['content'] = $this->load->view('admin/editpage', $data, TRUE);
			$this->load->view('admintemplate', $data);
		}//END if post submitted
    } //END function index()
		
}
/* End of file dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */