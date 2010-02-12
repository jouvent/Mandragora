<?php

class Main {
	
	private $db;
	private $fields;
	
	public function Main($db) {
		$this->db = $db;
		$this->fields = array("version"=>VERSION);
	}
	
	public function index() {
		$username = $_SESSION['username'];
		if (empty($username)) {
			header('Location: ' . SITE_URL . '/login');
		} else {
			
			$userInfo = new UserInfo($this->db);
			
			$this->fields["username"] = $username;
			$this->fields["email"] = $userInfo->getEmail($username);
			
			$h2o = new h2o('templates/main_page.html');
			return $h2o->render($this->fields);
		}
	}
	
}

?>