<?php

class UsersController extends ControllerBase {
    public function IndexAction(){

    }

    public function listAction(){
        $users = Users::find();
        ECHO '<pre>';
        print_r(get_class_methods($users));
        print_r($users->toArray());
        echo '</pre>';
    }
}
