<?php

class LoginController extends ControllerBase
{
    public function initalize(){
        parent::initalize();
    }
    public function indexAction(){
        //parent::initalize();
        $formClass = 'LoginForm';
        if($this->request->isPost()){
            $user = User::findFirstByEmail($this->request->getPost(),array('email'));
        }
        $this->view->form = new LoginForm();
        $this->view->form->initalize();
        $this->view->form_file = 'layouts/login.volt';
        echo $this->view->render('login/index');
    }
    public function authAction(){
        //parent::initalize();
        if(!$this->request->isPost()){
            $this->dispatcher->forward(
                array(
                    'controller'=>'login',
                    'action'=>'index'
                )
            );
        }else{
            $user = User::findFirstByEmail($this->request->getPost(),array('email'));
            echo (new \Phalcon\Debug\Dump())->variable($user,'user');
        }
    }
}
