<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Password;


class LoginForm extends Form {
    public function initalize(){
        $email = new Email('email',array('id'=>'email'));
        $email->setLabel('email');
        $this->add($email);
        
        $password = new Password('password',array('id'=>'password'));
        $password->setLabel('password');
        $this->add($password);
        
        $confirm = new Password('confirm',array('id'=>'confirm'));
        $confirm->setLabel('confirm');
        $this->add($confirm);
    }
}