<?php

class Register {
	
	private $db;

	/**
	 * Constructor
	 * @param $db database connection
	 * @return void
	 */
	function Register($db) {
		$this->db = $db;
	}
	
	/**
	 * Processes registration using a registration form.
	 * @return void
	 */
    function byForm() {
	    if(isset($_POST['submit'])) {
			/**
		 	* TODO Process registration
		 	*/
	    	echo "TODO => Process registration";
	    }
		else {
			$h2o = new h2o('templates/registration_form.html');
			return $h2o->render();
			
		}
		
    }
	
}

?>