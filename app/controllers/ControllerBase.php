<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

    private static $_links = null;

    protected function _set_active($name){
        foreach($this->navlinks as $k=>$v){
            if($k == $name){
                $v['active'] = true;
            }else{
                $v['active'] = false;
            }
        }
    }

    private static function getLinks(){
        return is_null(self::$_links) ? array() : self::$_links;
    }

    public static function addLink($link){
        static::getLinks()[] = $link;
    }

    public function initalize(){
            $this->view->navlinks = array(
                'home'=>
                array(
                    'url'=>'/',
                    'text'=>'home',
                    'active'=>true
                ),
                'message'=>
                array(
                    'url'=>'/message',
                    'text'=>'message',
                    'active'=>false
                ),
                'message_list'=>
                array(
                    'url'=>'/message/list',
                    'text'=>'list',
                    'active'=>false
                )
            );
    }
}
