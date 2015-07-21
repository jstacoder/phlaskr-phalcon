<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function __construct(){
        parent::__construct();
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
