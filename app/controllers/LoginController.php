<?php

//include_once dirname(dirname(__FILE__)).'/models/Users'

class LoginController extends ControllerBase
{
    public function initalize(){
        parent::initalize();
    }
    public function indexAction(){
        //parent::initalize();
        $formClass = 'LoginForm';
        if($this->request->isPost()){
            $user = Users::findFirstByEmail($this->request->getPost(),array('email'));
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
            $user = Users::findFirstByEmail($this->request->getPost('email'));
            $password = $this->request->getPost('password');
            if($user->check_pw($password)){
                $this->flash->success('Thanks for coming back '.$user->name);
                return (new \Phalcon\Http\Response())->redirect('/index/index');
                //$this->dispatcher->forward(
                //    array(
                //        'controller'=>'index',
                //        'action'=>'index'
                //    )
                // );
            }else{
                $this->flash->error('Could not authenticate an account with those credentials');
                $this->dispatcher->forward(
                    array(
                        'controller'=>'login',
                        'action'=>'index'
                    )
                );
            }
            //echo (new \Phalcon\Debug\Dump())->variable($user,'user');
        }
    }
}
