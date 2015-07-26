<?php
use Phalcon\Mvc\Model;

class Users extends Model {
    public $id;

    public $name;

    public $email;

    public $test;

    private $_password;

    public function setPassword($pw){
        $this->_password = $this->getDI()->get('security')->hash($pw);
    }

    public function getPassword(){
        return $this->_password;
    }

    public function check_pw($password){
        return $this->getDI()->get('security')->checkHash($this->_password,$password);
    }
    public function login($password){
        if($this->security->checkHash($this->password,$password)){
            $this->session->user = json_encode($this->toArray());
        }
    }
    public function logout(){
        unset($this->session->user);
    }
}
