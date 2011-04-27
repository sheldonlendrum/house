<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index() {
		
		$permalink = $this->uri->uri_string();
		
		$page = $this->page_model->getPageByPermalink($permalink);
		
		if(!$page) show_404();
		
		$page->content = $this->load->view('templates/'. $page->template, $page, TRUE);
		
		$this->load->view('template', $page);
		
	}
	
	public function contact() {
		
		$this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|numeric|required|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|numeric|required|xss_clean');
		$this->form_validation->set_rules('message', 'message', 'trim|required|xss_clean');

		if($this->form_validation->run()) {
			
			$message  = 'Form Submission from '. base_url() ."\n";
			$message .= 'The following information was submitted:'."\n\n";
			$message .= 'Name: '.  $_POST['name'] ."\n";
			$message .= 'Email: '. $_POST['email'] ."\n";
			$message .= 'Phone: '. $_POST['phone'] ."\n";
			$message .= 'Message: '. "\n". $_POST['message'] ."\n\n\n";
			$message .= str_repeat('-', 70) ."\n";
			$message .= base_url() .', '. date('d/m/Y h:i:a') ."\n";
			
			$this->load->library('email');
			
			$this->email->from($_POST['email'], $_POST['name']);
			$this->email->to('jessmckenzie@ihug.co.nz');
			$this->email->subject('Message From Website');
			$this->email->message($message);
			
			$this->email->send();
			
		} else {
			
			$page = $this->page_model->getPageByPermalink('contact-us');
		
			if(!$page) show_404();
		
			$page->content = $this->load->view('templates/'. $page->template, $page, TRUE);
		
			$this->load->view('template', $page);
			
		}
	}
	
}