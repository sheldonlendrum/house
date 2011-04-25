<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editsale extends CI_Controller {

    function __construct() {
    parent::__construct();

    }

    function index() {
	$id = $this->uri->segment(4);
	# Set Main Page Data
		$data['title'] = 'Edit Sale:';
		$data['sales_pages'] = $this->sales_model->getSalesPages();
		$data['cms_pages'] = $this->navigation_model->getCMSPages();
		$data['sale']= $this->sales_model->getSalesContent($id);
	
		 #Set The Validation Rules
                $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
                $this->form_validation->set_rules('location', 'Location', 'trim|numeric|required|xss_clean');
                $this->form_validation->set_rules('bedrooms', 'Bedrooms', 'trim|numeric|required|xss_clean');
                $this->form_validation->set_rules('bathrooms', 'Bathrooms', 'trim|required|xss_clean');
                $this->form_validation->set_rules('condition', 'Condition', 'trim|required|xss_clean');
                $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
                $this->form_validation->set_rules('price', 'Price', 'trim|required|xss_clean');

				if($this->form_validation->run())
				{
				//Set File Settings 
				$config['upload_path'] = './includes/uploads/sales/'; 
				$config['allowed_types'] = 'jpg|png'; 
				$config['remove_spaces'] = TRUE;
				$config['overwrite'] = TRUE;
				$config['max_size'] = '100';
				$config['max_width'] = '1024'; 
				$config['max_height'] = '768'; 

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload())
				{
					$data['message'] = array('imageError' => $this->upload->display_errors());
				}
				else{
						$data = array('upload_data' => $this->upload->data());
	                    $data['success'] = TRUE;
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

					$file_info = $this->upload->data();

            		#Lets Set What We Are Sending To The DB
                $content = array(
                    'name' => $this->input->post('name', TRUE),
                    'location' => $this->input->post('location', TRUE),
                    'bedrooms' => $this->input->post('bedrooms', TRUE),
                    'bathrooms' => $this->input->post('bathrooms', TRUE),
                    'condition' => $this->input->post('condition', TRUE),
                    'description' => $this->input->post('description', TRUE),
                    'price' => $this->input->post('price', TRUE)
                );

                   $this->sales_model->updateSale($id, $content);

             } # End Form Validation

        $data['content'] = $this->load->view('admin/editsale', $data, TRUE); #Loads the "content"
        $this->load->view('admintemplate', $data); #Loads the given template and passes the $data['content'] into it   
    } # End Index Function
} # End Controller