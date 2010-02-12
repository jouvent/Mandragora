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
	
	/**
	 * Manages authentication using a login form.
	 * @return void
	 */
    function byForm() {
    	$h2o = new h2o('templates/login_form.html');
	    if(isset($_POST['submit'])) {
    		if ($this->authentication->isValidUser($_POST['username'], $_POST['password'])) {
    			$_SESSION['username'] = $_POST['username'];
    			$_SESSION['authentication_type'] = "form";
    			header('Location: ' . SITE_URL . '/');
    		} else {
    			return $h2o->render(array("err_msg"=>"Username or password invalid."));
    			// error message
    		}
		}
		else {
			
			return $h2o->render();
			
		}
		
    }
    
    function byOpenId() {
    	/**
    	 * TODO Implement authentication by Open ID
    	 */
    }
    
    function revoke() {
    	switch ($_SESSION['authentication_type']) {
    		default:
    		case 'form':
    			unset($_SESSION['username']);
    			unset($_SESSION['authentication_type']);
    			header('Location: ' . SITE_URL . '/login');
    			
    			break;
    		case 'openid':
    			/*
    			 * TODO Revoke openId authentication
    			 */
    			break;
    	}
    }
	
}

?>