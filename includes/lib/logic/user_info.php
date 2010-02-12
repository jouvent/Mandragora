<?php

class UserInfo {
	
	private $conn;
	private $userDao;
	private $userVo;
	
	function __construct($conn) {
		$this->conn = $conn;
		$this->userDao = new UserDao();
	}
	
	
	function getEmail($username) {
		
		$this->userVo = $this->userDao->createValueObject();
		$this->userVo->setUsername($username);
		$db_search = current($this->userDao->searchMatching($this->conn, $this->userVo));
		
		return ($db_search ? $db_search->getEmail() : "");
				
	}
	
}