<?php
/**
* This model handles the sql for the checking of the username in the database
*/
class Navigation_model extends CI_Model {
	// the __construct() is the same as running Navigation_model();
	function __construct() {
		parent::__construct();
	}
	
	// nget ALL pages
	
	function getCMSPages($id = NULL) {
		//$this ->db->where('id',$id);
		$query = $this->db->get('pages');
		if($query->num_rows() > 0) return $query->result();
	
	}
	
	function getCMSPage($id) {
		
		if(!$permalink) $permalink = 'home'; //Default Page
		$this->db->where('permalink', $permalink);
		$query = $this->db->get('pages', 1);
		if($query->num_rows() == 1) return $query->row();
		
	}

	function getCMSPageByPermalink($permalink) {
		
		if(!$permalink) $permalink = 'home'; //Default Page
		$this->db->where('permalink', $permalink);
		$query = $this->db->get('pages', 1);
		if($query->num_rows() == 1) return $query->row();
		
	}
	
}


?>