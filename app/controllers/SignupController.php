<?php

class SignupController extends ControllerBase{
    public function indexAction(){
        echo $this->view->render('signup/index');
    }
    public function registerAction(){
        echo '<link rel=stylesheet href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />';
        $user = new Users();

        $success = $user->save($this->request->getPost(),array('name','email'));

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
