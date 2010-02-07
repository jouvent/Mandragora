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
        $h2o = new h2o('templates/test.html', array(
        	'i18n' => array('locale' => 'en', 'extract_messages'=> true)
        ));
        return $h2o->render(array('name'=>$name));
    }
}
