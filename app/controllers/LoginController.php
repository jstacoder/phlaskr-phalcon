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
        $this->view->form_file = 'layouts/message.volt';
        echo $this->view->render('index');
    }
}
