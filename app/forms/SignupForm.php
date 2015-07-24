<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Email;

class TextField extends Text {
    public function __construct($name,$attrs=array()){
        if(isset($attrs['class'])){
            unset($attrs['class']);
        }
        $attrs['class'] = 'form-control';
        parent::__construct($name,$attrs);
    }
}

class EmailField extends Email {
    public function __construct($name,$attrs=array()){
        if(isset($attrs['class'])){
            unset($attrs['class']);
        }
        $attrs['class'] = 'form-control';
        parent::__construct($name,$attrs);
    }
}


class SignupForm extends Form{
    public function __construct($entity=null){
        $name = new TextField('name',array('id'=>'name'));
        $name->setLabel('name');
        $this->add($name);

        $email = new EmailField('email',array('id'=>'email'));
        $email->setLabel('email');
        $this->add($email);
    }
}
