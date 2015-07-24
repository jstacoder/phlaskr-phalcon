<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        echo (new \Phalcon\Debug\Dump())->variable($this,'this');
    }
    public function signupAction(){
        echo 'hi';
    }

}

