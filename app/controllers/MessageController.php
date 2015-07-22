<?php

class MessageController extends ControllerBase {

    private $_msgs = array();
    private $_msg_cache = array();

    public function initalize(){
        parent::initalize();
    }

    public function indexAction(){
        $this->view->form = new MessageForm;
        $this->view->messages = array_reverse(Messages::find()->toArray());
        $this->view->afterMsg = $this->_msgs ? 
                                $this->_msgs['success'] ? 
                                $this->_msgs['success'] : 
                                $this->_msgs['error'] ? 
                                $this->_msgs['error'] : 
                                '' : 
                                '';
        $this->view->form_file = 'layouts/message.volt';
        $this->view->assetData = (array)$this->assets;
        $this->view->assets = $this->assets;
        $link = array(
            'url'=>'/messages',
            'text'=>'messages',
            'active'=>false
        );
        parent::addLink($link);
        $this->view->navlinks = array(
            array(
                'url'=>'/message',
                'text'=>'messages',
                'active'=>true                
            ),
            array(
                'url'=>'/message/list',
                'text'=>'list',
                'active'=>false                
            ),
            array(
                'url'=>'/',
                'text'=>'home',
                'active'=>false
            )
        );
        //print_r((array)$this->assets);
        echo $this->view->render('message/index');
    }
    public function addAction(){
        $msg = new Messages();
        $success = $msg->save($this->request->getPost(),array('title','text'));
        if(!$success){
            $this->_msgs['error'] = array();
            foreach($msg->getMessages() as $msgs){
                $this->_msgs['error'] = $msgs;
            }
            $this->flash->error($this->_msgs['error']);
        }else{
            $this->flash->success('success adding message');
            $this->_msgs['success'] = "Success adding Message";
        }
        $this->view->form = new MessageForm;
        if($this->getRequest()->isPost()){
            $this->view->form->clear();
            $this->dispatcher->forward(
                array(
                    "controller"=>"message",
                    "action"=>"list"
                )
            );
        }
    }
    public function listAction(){
        $this->view->messages = Messages::find()->toArray();
        $this->view->form_file = 'layouts/message.volt';
        echo $this->view->render('message/list');
    }
    public function removeAction(){
            $msg_id = $this->request->getPost()['msg_id'];
            $msg  = Messages::findFirst($msg_id);
            if($success = $msg ? $msg->delete() : null){

            #if($success){
                $this->flash->success('you deleted a message');
            }else{
                $this->flash->error('error');
            }
                $this->dispatcher->forward(
                                        array(
                                            "controller"=>"message",
                                            "action"=>"list"
                    )
                );
    }
}
