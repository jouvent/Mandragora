<?php

class Register {
	
	private $db;
	private $registration;

	/**
	 * Constructor
	 * @param $db database connection
	 * @return void
	 */
	function Register($db) {
		$this->db = $db;
		$this->registration = new Registration($db);
	}
	
	/**
	 * Processes registration using a registration form.
	 * @return void
	 */
    function byForm() {
	    if(isset($_POST['submit'])) {
	    	$username = $_POST['username'];
	    	$password = $_POST['password'];
	    	$email = $_POST['email'];
	    	$realname = $_POST['realname'];
	    	$this->registration->register($username, $password, $realname, $email);
	    	header('Location: ' . SITE_URL . '/login');
	    }
		else if (isset($_POST['username'])) {
			$username = $_POST['username'];
	    	if ($this->registration->usernameAlreadyExists($username)) {
	    		echo json_encode("This username already exists.  Please pick another one.");
	    	} else {
	    		echo json_encode(true);
	    	}
		}
		else if (isset($_POST['email'])) {
			$email = $_POST['email'];
			if ($this->registration->emailAlreadyExists($email)) {
				echo json_encode("This email is already taken.  Please use another one.");
			} else {
				echo json_encode(true);
			}
		}		
		else {
			$h2o = new h2o('templates/registration_form.html');
			return $h2o->render();
			
		}
		
    }
	
}

?>
