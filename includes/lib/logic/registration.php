<?php

class Registration {
	
	private $conn;
	private $userDao;
	
	function __construct($conn) {
		$this->conn = $conn;
		$this->userDao = new UserDao();
	}
	
	function usernameAlreadyExists($username) {
		$exists = false;
		
		$temp_user = $this->userDao->createValueObject();
		$temp_user->setUsername($username);
		$temp_user = current($this->userDao->searchMatching($this->conn, $temp_user));
		if (!empty($temp_user)) {
			$exists = true;
		}
		return $exists;
	}

	function emailAlreadyExists($email) {
		$exists = false;
		
		$temp_user = $this->userDao->createValueObject();
		$temp_user->setEmail($email);
		$temp_user = current($this->userDao->searchMatching($this->conn, $temp_user));
		if (!empty($temp_user)) {
			$exists = true;
		}
		return $exists;
	}

	function register($username, $password, $realname, $email) {
		$userVo = $this->userDao->createValueObject();
		$userVo->setUsername($username);
		$userVo->setPassword(generateHash($password));
		$userVo->setName($realname);
		$userVo->setEmail($email);
		$userVo->setUserTypeId(4);
		$this->userDao->create($this->conn, $userVo);
	} 
	
}

?>