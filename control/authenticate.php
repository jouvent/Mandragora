<?php

class Authenticate {
	
	private $db;
	private $authentication;
	
	function Authenticate($db) {
		$this->db = $db;
		$this->authentication = new Authentication($db);
	}
	
    public function index()
    {
        $h2o = new h2o('templates/login.html');

        return $h2o->render();
    }
	
}

?>