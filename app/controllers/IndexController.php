<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        echo (new \Phalcon\Debug\Dump())->variable($this,'this');
        echo (new \Phalcon\Debug\Dump())->variable($this->request,'request');
        echo (new \Phalcon\Debug\Dump())->variable($this->view,'view');

    }
    public function signupAction(){
        echo 'hi';
    }

}

