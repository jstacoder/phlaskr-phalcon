<?php
class LoginForm extends BaseForm {
    public function initalize(){
        $this->addField('\Phalcon\Forms\Element\Email','email');
        $this->addField('\Phalcon\Forms\Element\Password','password');
        $this->addField('\Phalcon\Forms\Element\Password','confirm');
    }
}
