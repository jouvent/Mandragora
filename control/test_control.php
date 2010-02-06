<?php

class TestControl
{
    public function TestControl()
    {
    }
    public function index($name = '')
    {
        if(empty($name)){
            $name = 'World';
        }
        return "<br />hello $name!";
    }
}
