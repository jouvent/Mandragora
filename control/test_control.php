<?php

class TestControl
{
	private $db;
    public function TestControl($db)
    {
    	$this->db = $db;
    }
    public function index($name = '')
    {
        if(empty($name)){
            $name = 'World';
        }
        $h2o = new h2o('templates/layouts/test.html');
        $salut = "Hello $name!";
        return $h2o->render(array('salut'=>$salut));
    }
}
