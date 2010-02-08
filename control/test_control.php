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
        $h2o = new H2o('templates/test.html', array(
		    'i18n' => array(
		        'locale' => 'fr',
		        'charset' => 'UTF-8',
		        'gettext_path' => '/usr/bin/',
		        'extract_message' => true,
		        'compile_message' => true
		    )
        ));
                
        return $h2o->render(array('name'=>$name));
    }
}
