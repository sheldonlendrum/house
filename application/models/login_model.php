<?php
/**
* This model handles the sql for the checking of the username in the database
*/
class Login_model extends CI_Model {
	
	function __construct() {

	}
	
	
	function check_login($username,$password) {
		
		$query = $this->db->query("SELECT id, first_name, last_name, email, password FROM users WHERE email = ? and password = ?", array($username, md5($password))); // Result
		
		return ($query->num_rows() == 1) ? $query->row() : FALSE;
		
	}
}



?>