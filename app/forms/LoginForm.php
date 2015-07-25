<?php
class LoginForm extends BaseForm {
    public function initalize(){
        $this->add_field('\Phalcon\Forms\Element\Email','email');
        $this->add_field('\Phalcon\Forms\Element\Password','password');
        $this->add_field('\Phalcon\Forms\Element\Password','confirm');
    }
}
