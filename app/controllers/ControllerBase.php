<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function _construct(){
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
