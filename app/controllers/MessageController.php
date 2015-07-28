<?php

class MessageController extends ControllerBase {

    private $_msgs = array();
    private $_msg_cache = array();

    public function initalize(){
        parent::initalize();
        //print_r((array)$this->assets);
    }

    public function indexAction(){
        $this->initalize();
        $this->view->form = new MessageForm;
        $this->view->form->initalize();
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
        static::_set_active('message');
        echo $this->view->render('message/list');
    }
    public function addAction(){
        $this->initalize();
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
        $this->view->form->initalize();
        if($this->request->isPost()){
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
        $this->initalize();
        $this->view->messages = Messages::find()->toArray();
        $this->view->form = new MessageForm;
        $this->view->form_file = 'layouts/message.volt';
        $this->view->form->initalize();
        static::_set_active('message_list');
        echo $this->view->render('message/list');
    }
    public function debugAction(){
        $this->initalize();
        $messages = Messages::find();
        echo (new \Phalcon\Debug\Dump())->variable($messages,'messages');
    }
    public function removeAction(){
        $this->initalize();
        $msg_id = $this->request->getPost('msg_id');
        $msg  = Messages::findFirst($msg_id);
        if($success = $msg ? $msg->delete() : null){
                $this->flash->warning('you deleted a message');
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
