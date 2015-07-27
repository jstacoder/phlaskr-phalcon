<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

    private static $_links = null;
    protected static $navlinks = array(
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

    protected static function _set_active($name){
        foreach(static::$navlinks as $k=>$v){
            if($k == $name){
                $v['active'] = true;
            }else{
                $v['active'] = false;
            }
        }
        $this->set_links();
    }

    private static function getLinks(){
        return is_null(self::$_links) ? array() : self::$_links;
    }

    public static function addLink($link){
        static::getLinks()[] = $link;
    }

    public function initalize(){
        $this->set_links();
    }
    public function set_links(){
            $this->view->navlinks = static::$navlinks;
    }
}
