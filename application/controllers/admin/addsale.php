<?php
/**
*This controller holds the login checks and processing information
*function index = Checks that there is a session if not redirects back to login & calls the data for the view
*function login = loads the login page style checks for validation & runs the querys if the content is valid
*function logout = unsets the session
	 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addsale extends CI_Controller { 

    function __construct(){ 
    parent::__construct(); 
    } 
    function index() { 
    	if(!$this->session->userdata('logged_in'))redirect('admin/home');

		if($this->input->post('submit')) {
			//Set Validation 
		    $this->form_validation->set_rules('name', 'Name', 'trim|required'); 
		    $this->form_validation->set_rules('location', 'Location', 'trim|required'); 
		    $this->form_validation->set_rules('bedrooms', 'Bedrooms', 'trim|is_natural|required'); 
		    $this->form_validation->set_rules('bathrooms', 'Bathrooms', 'trim|is_natural|required'); 
		    $this->form_validation->set_rules('condition', 'Condition', 'trim|required'); 
		    $this->form_validation->set_rules('description', 'Description', 'trim|required'); 
		    $this->form_validation->set_rules('price', 'Price', 'trim|required');

				if($this->form_validation->run() == FALSE) {

					#Set the $data for the view if FALSE
					$data['title'] = 'Add Sale'; 
					$data['cms_pages'] = $this->navigation_model->getCMSPages($id);
					$data['sales_pages'] = $this->sales_model->getSalesPages($id);
					$data['content'] = $this->load->view('admin/addsale', NULL, TRUE); #Loads the "content"

					$this->load->view('admintemplate', $data); #Loads the given template and passes the $data['content'] into it
				}else{		
					//Set File Settings 
				    $config['upload_path'] = './includes/uploads/sales/'; 
				    $config['allowed_types'] = 'jpg|png'; 
				    $config['remove_spaces'] = TRUE;
					$config['overwrite'] = TRUE;
				    $config['max_size'] = '100';
				    $config['max_width'] = '1024'; 
				    $config['max_height'] = '768'; 

				    $this->load->library('upload', $config); 

				    if(!$this->upload->do_upload()) {
					$error = array('imageError' => $this->upload->display_errors());
				}else{
					$data = array('upload_data' => $this->upload->data());
					$config['image_library'] = 'GD2';
					$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
					$config['new_image'] = 'includes/uploads/sales/thumbs/';
					$config['create_thumb'] = 'TRUE';
					$config['thumb_marker'] ='_thumb';
					$config['maintain_ratio'] = 'FALSE';
					$config['width'] = '200';
					$config['height'] = '150';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
				    }
				}
					$file_info = $this->upload->data();	
					
					$content = array(   
				        'name' => $this->input->post('name', TRUE), 
				        'location' => $this->input->post('location', TRUE), 
				        'bedrooms' => $this->input->post('bedrooms', TRUE), 
				        'bathrooms' => $this->input->post('bathrooms', TRUE), 
				        'condition' => $this->input->post('condition', TRUE), 
				        'description' => $this->input->post('description', TRUE), 
				        'price' => $this->input->post('price', TRUE), 
				        'imagename' => $file_info['file_name'],
				 		'thumbname' => $file_info['raw_name'].'_thumb'.$file_info['file_ext']
				        );			
					if($this->sales_model->addSale($content)) {
							$data['cms_pages'] = $this->navigation_model->getCMSPages($id);
							#connect to getCMSContent and set the page info equal to the $data['page'] where the row is equal to the passed $id from the URL.
							$data['page'] = $this->page_model->getCMSContent($id);
							$data['success'] = TRUE;
							$data['content'] = $this->load->view('admin/addsale', $data, TRUE);
							$this->load->view('admintemplate', $data);
					} //END if($this->sales_model->addSale($id, $content)) {				
				} //END if($this->form_validation->run() == FALSE) {
	    }else{
				$data['title'] = 'Add Sale'; 
				$data['cms_pages'] = $this->navigation_model->getCMSPages($id);
				$data['sales_pages'] = $this->sales_model->getSalesPages($id);
				$data['content'] = $this->load->view('admin/addsale', NULL, TRUE); #Loads the "content"

				$this->load->view('admintemplate', $data); #Loads the given template and passes the $data['content'] into it

		}//END if($this->input->post('submit')) {
	}//END index function
}//END addsale class