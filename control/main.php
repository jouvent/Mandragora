<?php

class Main {
	
	private $db;
	
	public function Main($db) {
		$this->db = $db;
	}
	
	public function index() {
		$username = $_SESSION['username'];
		if (empty($username)) {
			header('Location: ' . SITE_URL . '/login');
		} else {
			$h2o = new h2o('templates/main_page.html');
			return $h2o->render(array('username'=>$username));
		}
	}
	
}

?>