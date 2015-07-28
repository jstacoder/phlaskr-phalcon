<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

    private static $_links = null;
    private static $_view = null;
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
        foreach(self::$navlinks as $k=>$v){
            if($k == $name){
                $v['active'] = true;
            }else{
                $v['active'] = false;
            }
        }
        self::set_links();
    }

    public function initalize(){
        self::$_view = $this->view;
        self::set_links();
    }
    public function set_links(){
            self::$_view->navlinks = self::$navlinks;
    }
}
