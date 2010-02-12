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
            $name = 'world';
        }
        $h2o = new H2o('templates/test.html');
                
        return $h2o->render(array('name'=>$name));
    }
}
