<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editsale extends CI_Controller {

    function __construct() {
    parent::__construct();

    }

    function index($id) {
        if(!$this->session->userdata('logged_in'))redirect('admin/home');

        if($this->input->post('submit')) {

            #Set The Validation Rules
                $this->form_validation->set_rules('name', 'Name', 'trim|required');
                $this->form_validation->set_rules('location', 'Location', 'trim|required');
                $this->form_validation->set_rules('bedrooms', 'Bedrooms', 'trim|is_natural');
                $this->form_validation->set_rules('bathrooms', 'Bathrooms', 'trim');
                $this->form_validation->set_rules('condition', 'Condition', 'trim');
                $this->form_validation->set_rules('description', 'Description', 'trim');
                $this->form_validation->set_rules('price', 'Price', 'trim');

            if($this->form_validation->run() == FALSE) {

                #Set the $data for the view if FALSE
                $data['cms_pages'] = $this->navigation_model->getCMSPages($id);
                $data['sales_pages'] = $this->sales_model->getSalesPages($id);
                $data['sale'] = $this->sales_model->getSalesContent($id);
                $data['content'] = $this->load->view('admin/editsale', $data, TRUE); #Loads the "content"

                $this->load->view('admintemplate', $data); #Loads the given template and passes the $data['content'] into it
            }

            #Form Validation Was Correct So Lets Continue 

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

                    if($this->sales_model->updateSale($id, $content)) {
                            $data['success'] = TRUE; #displays sale updated
                            $data['cms_pages'] = $this->navigation_model->getCMSPages($id);
                            $data['sales_pages'] = $this->sales_model->getSalesPages($id);
                            $data['sale'] = $this->sales_model->getSalesContent($id);
                            $data['content'] = $this->load->view('admin/editsale', $data, TRUE); #Loads the "content"
                } // Sale Update End
             } else{ 
            $data['cms_pages'] = $this->navigation_model->getCMSPages($id);
            $data['sales_pages'] = $this->sales_model->getSalesPages($id);
            $data['sale'] = $this->sales_model->getSalesContent($id);
            $data['content'] = $this->load->view('admin/editsale', $data, TRUE); #Loads the "content"
        }#Submit End   
        } #Index End

}