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
	
    function login($un = '', $pw = '') {
    	if (!empty($un) && !empty($pw)) {
    		echo ($this->authentication->isValidUser($un, $pw) ? "VALID" : "INVALID");
			
		} else {
			$h2o = new h2o('templates/layouts/login.html');
			$salut = "Hello $name!";
       		return $h2o->render(array('salut'=>$salut));
			
		}
		
    }
	
}

?>