<?php
/**
*This controller holds the login checks and processing information
*function index = Checks that there is a session if not redirects back to login & calls the data for the view
*function login = loads the login page style checks for validation & runs the querys if the content is valid
*function logout = unsets the session
	 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addimage extends CI_Controller { 

    function __construct(){ 
    parent::__construct(); 
    } 
    function index() { 
    	if(!$this->session->userdata('logged_in')) redirect('admin/home');
  
    // Main Page Data 
    $data['cms_pages'] = $this->navigation_model->getCMSPages(); 
    $data['title'] = 'Add Gallery Image'; 
    


    //Set Validation 
    $this->form_validation->set_rules('userfile', 'userfile', 'trim'); 
    $this->form_validation->set_rules('description', 'Description', 'trim|required'); 

    if($this->form_validation->run()) { 
    //Set File Settings 
    $config['upload_path'] = 'includes/uploads/gallery/'; 
    $config['allowed_types'] = 'jpg|png'; 
	$config['remove_spaces'] = TRUE;
	$config['overwrite'] = TRUE;
    $config['max_size'] = '100'; 
    $config['max_width'] = '1024'; 
    $config['max_height'] = '768'; 

    $this->load->library('upload', $config); 
    if(!$this->upload->do_upload()) {
	
	$data['message'] = array('imageError' => $this->upload->display_errors());
	
    }
    else{
	$data['upload_data'] = $this->upload->data(); // Array of image data
	$data['success'] = TRUE;
	$config['image_library'] = 'GD2';
	$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
	$config['new_image'] = 'includes/uploads/gallery/thumbs/';
	$config['create_thumb'] = 'TRUE';
	$config['thumb_marker'] ='_thumb';
	$config['maintain_ratio'] = 'FALSE';
	$config['width'] = '200';
	$config['height'] = '150';
	
	$this->load->library('image_lib', $config);
	$this->image_lib->resize();
    }
    
    $file_info = $this->upload->data();
    
// IMG Data array for db insert
    $imgdata = array(   
        'description' => $this->input->post('description', TRUE), 
        'imagename' => $file_info['file_name'],
	'thumbname' =>$file_info['raw_name'].'_thumb'.$file_info['file_ext'] 
        ); 
    $this->image_model->addImage($imgdata);
    
} // end form validation
$data['content'] = $this->load->view('admin/addimage',$data,TRUE); 
$this->load->view('admintemplate', $data); 

 }
}