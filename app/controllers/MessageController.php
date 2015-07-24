<?php

class MessageController extends ControllerBase {

    private $_msgs = array();
    private $_msg_cache = array();

    private function _set_active_link($url){
        foreach($this->view->navlinks as $link){
            if($link['url'] == $url){
                $link['active'] = true;
            }else{
                $link['active'] = false;
            }
        }
    }
    private function _check_uri($uri){
        return $this->request->getUri() == $uri;
    }

    public function initalize(){
        parent::initalize();
        $this->view->navlinks = array(
            'message'=>array(
                'url'=>'/message',
                'text'=>'messages',
                'active'=>$this->_check_uri('/messages')
            ),
            'list'=>array(
                'url'=>'/message/list',
                'text'=>'list',
                'active'=>$this->_check_uri('/messages')
            ),
            'home'=>array(
                'url'=>'/',
                'text'=>'home',
                'active'=>$this->_check_uri('/messages')
            )
        );
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
        $link = array(
            'url'=>'/messages',
            'text'=>'messages',
            'active'=>false
        );
        parent::addLink($link);
        $this->_set_active_link('/message');
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
        $this->_set_active_link('/message/add');
    }
    public function listAction(){
        $this->initalize();
        $this->view
             ->messages = Messages::find()->toArray();
        $this->view
             ->form_file = 'layouts/message.volt';
        $this->view
             ->form = new MessageForm;
        $this->view->form->initalize();
        $this->_set_active_link('/message/list');
        echo $this->view
                  ->render('message/list');
    }
    public function debugAction(){
        $this->initalize();
        $messages = Messages::find();
        echo (new \Phalcon\Debug\Dump())->variable($messages,'messages');
    }
    public function removeAction(){
        $this->initalize();
        $this->_set_active_link('/message/remove');
        $msg_id = $this->request
                       ->getPost()['msg_id'];
            $msg  = Messages::findFirst($msg_id);
            if($success = $msg ? $msg->delete() : null){

            #if($success){
                $this->flash
                     ->warning('you deleted a message');
            }else{
                $this->flash
                     ->error('error');
            }
                $this->dispatcher
                     ->forward(
                         array(
                             "controller"=>"message",
                             "action"=>"list"
                         )
                     );
            }
}

