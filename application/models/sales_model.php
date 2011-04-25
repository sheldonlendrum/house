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
	
	} # End getSalesPages
	
	function getSalesContent($id = NULL) {
		$this->db->where('id', $id);
		$query = $this->db->get('sales', 1);
		
		if($query->num_rows() > 0) {
			$row = $query->result_array();
			return $row;
		}else{
			return FALSE;
		} # End IF
	} # End getSalesContent

		
	function addSale($data = NULL) {
		$this->db->insert('sales', $data);
		return TRUE;
	} # End Add Sale	
	
	function updateSale($id, $content) {
		$this ->db->where('id', $id);
		$update -> $this->db->get('sales');
		$row = $update->row_array();
		
		if($update->num_rows() > 0) {
			#lets delete the image
			unlink("/includes/uploads/gallery/".$update['imagename']);
			#lets delete the thumb.
			unlink("/includes/uploads/gallery/thumbs/".$update['thumbname']);
			
			$this->db->update('sales', $content);
		} # End IF
	} # End Update
} # End Model