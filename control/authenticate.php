<?php

class Authenticate {
	
	private $db;
	private $authentication;

	/**
	 * Constructor
	 * @param $db database connection
	 * @return void
	 */
	function Authenticate($db) {
		$this->db = $db;
		$this->authentication = new Authentication($db);
	}
	
    function login() {
	    if(isset($_POST['submit'])) {
    		if ($this->authentication->isValidUser($_POST['username'], $_POST['password'])) {
    			$_SESSION['username'] = $_POST['username'];
    			header('Location: ' . SITE_URL . '/');
    		} else {
    			echo "ERROR MESSAGE";
    			// error message
    		}
		}
		else {
			$h2o = new h2o('templates/login.html');
			return $h2o->render();
			
		}
		
    }
	
}

?>