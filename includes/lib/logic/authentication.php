<?php

class Authentication {
	
	private $conn;
	private $userVo;
	private $userDao;
	
	function Authentication($conn) {
		$this->conn = $conn;
		$this->userDao = new UserDao();
	}
	
	function isValidUser($username, $pw) {
		$valid = false;
		
		$this->userVo = $this->userDao->createValueObject();
		$this->userVo->setUsername($username);
		$db_search = current($this->userDao->searchMatching($this->conn, $this->userVo));
		if (!empty($db_search)) {
			if (generateHash($pw, $db_search->getPassword()) == $db_search->getPassword()) {
				$valid = true;
			}
		}
		return $valid;
	}
	
}

?>