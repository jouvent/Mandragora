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
        $h2o = new H2o('templates/test.html', array(
        	'i18n' => array('locale' => 'en', 'extract_messages' => true)
        ));
        $salut = "Hello $name!";
        return $h2o->render(array('salut'=>$salut));
    }
}
