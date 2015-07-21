<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    function indexAction(){
        $this->view->navlinks = array(
            array(
                'url'=>'/messages',
                'text'=>'messages',
                'active'=>false
            ),
            array(
                'url'=>'/messages/add',
                'text'=>'add',
                'active'=>true
            )
        );
    }
}
