<?php

class Authentication {
	
	private $conn;
	private $userVo;
	
	function Authentication($conn) {
		$this->conn = $conn;
	}
	
	function isValidUser($user, $pw) {
		//$this->userVo = 
		return false;
	}
	
}

?>