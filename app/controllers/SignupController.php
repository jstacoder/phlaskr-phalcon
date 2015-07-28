<?php

class SignupController extends ControllerBase{
    public function indexAction(){
        $this->view->form = new SignupForm();
        $this->view->form->initalize();
        $this->view->form_file = 'signup/index.volt';
        echo $this->view->render('signup');
    }
    public function registerAction(){
        //echo '<link rel=stylesheet href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />';
        $user = new Users();    
        if($this->request0>isPost() && $this->request->getPost('password') == $this->request->getPost('confirm')){
            $user->name = $this->request->getPost('name');
            $user->email = $this->request->getPost('email');
            $user->setPassword($this->request->getPost('password'));
            $success = $user->save();
            if($success){                
                echo $this->flash->success("Thanks for registering $user->email");                                
            }else{  
                echo $this->flash->error("error");                            
                foreach($user->getMessages() as $msg){
                    echo $this->flash->error($msg);                    
                }
            }
            $this->dispatcher->forward(
              array(
                    "controller"=>"signup",
                    "action"=>"index"
                )  
            );
        }   
    }
}
