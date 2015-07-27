<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

    private static $_links = null;

    private static function getLinks(){
        return is_null(self::$_links) ? array() : self::$_links;   
    }

    public static function addLink($link){
        static::getLinks()[] = $link;
    }

    public function initalize(){
            $this->view->navlinks = array(
                array(
                    'url'=>'/',
                    'text'=>'home',
                    'active'=>false
                ),
                array(
                    'url'=>'/messages',
                    'text'=>'messages',
                    'active'=>false
                ),
                array(
                    'url'=>'/messages/list',
                    'text'=>'list',
                    'active'=>true
                )
            );
    }
}
