<?php
/**
* This model handles the sql for the checking of the username in the database
*/
class Sales_model extends CI_Model
{
	
	function __construct() {
			parent::__construct();
	}
	
	function getSalesPages($id = NULL) {
		$query = $this->db->get('sales');
		if($query->num_rows() > 0) return $query->result();
	
	}
	
	function getSalesContent($id = NULL) {
		$this->db->where('id', $id);
		$query = $this->db->get('sales', 1);
		
		if($query->num_rows() > 0) {
			$row = $query->result_array();
			return $row;
		}else{
			return FALSE;
		}
	}

		
	function addSale($data = NULL) {
	
	$this->db->insert('sales', $data);
	return TRUE;
	}	
	
	function updateSale($id, $data) {
		
		$this ->db->where('id', $id);
		$this->db->update('sales', $data);
	}
}