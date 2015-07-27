<?php
use Phalcon\Mvc\Model;

class Users extends Model {
    public $id;

    public $name;

    public $email;

    public $test;

    private $_password;

    public function setPassword($pw){
        $this->_password = $this->getDI()->getShared('security')->hash($pw);
    }

    public function getPassword(){
        return $this->_password;
    }

    public function check_pw($password){
        return $this->getDI()->getShared('security')->checkHash($password,$this->_password);
    }
    public function login($password){
        if($this->check_pw($password)){
            $this->session->user = json_encode($this->toArray());
        }
    }
    public function logout(){
        unset($this->session->user);
    }
}
