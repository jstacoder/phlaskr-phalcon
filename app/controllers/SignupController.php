<?php

class SignupController extends ControllerBase{
    public function indexAction(){
        $this->view->form = new SignupForm();
        $this->view->form_file = 'signup/index.volt';

        echo $this->view->render('signup');
    }
    public function registerAction(){
        echo '<link rel=stylesheet href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />';
        $user = new Users();
        
        if($this->request->getPost('password') == $this->request->getPost('confirm')){                

            $success = $user->save($this->request->getPost(),array('name','email','password'));

            if($success){
                //echo '<pre>';
                echo $this->flash->success("Thanks for registering $user->email");
                //echo "</pre>";
                //echo "Thanks for registering<br/>$user->email<br/>";
            }else{  
                echo $this->flash->error("error");            
                //echo "error<br/>";
                foreach($user->getMessages() as $msg){
                    echo $this->flash->error($msg);
                    //echo $msg . '<br />';
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
