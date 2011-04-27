<?php

	class Page_model extends CI_Model {
	
		function __construct() {
			parent::__construct();
		
		}
	
		function getPages() {
		
			$this->db->order_by('display_order', 'ASC');
			$query = $this->db->get('pages');
			return ($query->num_rows() > 0) ? $query->result() : FALSE;
		
		}
		
		
	
		function getPageByPermalink($permalink = NULL) {
		
			if(!$permalink) $permalink = 'home';
			
			$this->db->where('permalink', $permalink);
			$query = $this->db->get('pages', 1);
			return ($query->num_rows() == 1) ? $query->row() : FALSE;
		
		}
		
	
		function getPageById($id = NULL) {
		
			if(!$id) return;
			
			$this->db->where('id', $id);
			$query = $this->db->get('pages', 1);
			return ($query->num_rows() == 1) ? $query->row() : FALSE;
		
		}
		
	
		function updatePage($id = NULL, $data = NULL){
			#set the $data passed to the function into an array, content being the column name.
			$data = array ('content' => $data);
		
			$this ->db->where('id',$id);
			$this->db->update('pages', $data);
		
			return TRUE;
		}
	}