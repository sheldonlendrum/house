<?php
/**
* This model handles the sql for the checking of the username in the database
*/
class Image_model extends CI_Model
{

	function __construct() {
			parent::__construct();
	}

	function getImages($path = NULL) {
	foreach($this->db->get('images')->result_array() as $r) {

		$rows[] = $r;
	}

	return $rows;
	}

	function addImage($imgdata) {
		$this->db->insert('images',$imgdata);
		return;
	}

	function deleteImage($id){
		$this->db->where('id', $id);
		$q = $this->db->get('images');
		$row = $q->row_array();
		if ($q->num_rows() > 0){
			#delete from the database
			$this->db->delete('images'); 

			#lets delete the image
			unlink("/includes/uploads/gallery/".$q['imagename']);
			#lets delete the thumb.
			unlink("/includes/uploads/gallery/thumbs/".$q['thumbname']);
		}//END if num_rows
	}//END function deleteImage($id)
}//END class Image_model