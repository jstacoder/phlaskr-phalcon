<?php

class LoginController extends ControllerBase
{
    public function indexAction(){
        $formClass = 'LoginForm';
        if($this->request->isPost()){
            $user = User::findFirstByEmail($this->request->getPost(),array('email'));
        }
        $this->view->form = new LoginForm();
        $this->view->form->initalize();
        echo $this->view->render('/login/index');
    }
}