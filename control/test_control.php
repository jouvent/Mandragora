<?php

class TestControl
{
    public function TestControl()
    {
        echo 'dans le constructeur';
    }
    public function index()
    {
        echo 'dans le constroleur';
        return 'hello world!';
    }
}
