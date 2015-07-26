<?php

class SignupForm extends BaseForm
{
    public function __construct($entity=null,$options=null)
    {
        $this->add_field('\Phalcon\Forms\Element\Text','name');
        $this->add_field('\Phalcon\Forms\Element\Email','email');
        $this->add_field('\Phalcon\Forms\Element\Password','password');
        $this->add_field('\Phalcon\Forms\Element\Confirm','confirm');
        parent::__construct($entity,$options);
    }
}
