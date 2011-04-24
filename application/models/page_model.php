<?php
/**
* This model handles the sql for the checking of the username in the database
*/
class Page_model extends CI_Model
{
	
	function __construct()
	{
	parent::__construct();
	}
	
	function Page_model(){
		parent::Model();
	}
	
	function getCMSContent($id = NULL) {
		$this->db->where('id', $id);
		$query = $this->db->get('pages', 1);
		
		if($query->num_rows() > 0) {
			$row = $query->result_array();
			return $row;
		}else{
			return FALSE;
		}
	}
	
	function updatePage($id = NULL, $data = NULL){
		#set the $data passed to the function into an array, content being the column name.
		$data = array ('content' => $data);
		
		$this ->db->where('id',$id);
		$this->db->update('pages', $data);
		
		return TRUE;
	}
}


?>