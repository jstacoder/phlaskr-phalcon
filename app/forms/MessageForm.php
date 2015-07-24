<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;


class MessageForm extends Form {
    public function initalize($entity=null,$options=array()){
        if(!isset($options['edit'])){
            $element = new Text("id");

            $this->add($element->setLabel("id"));
        }else{
            $this->add(new Hidden("id"));
        }
        $dte = new Hidden("date_added",array('id'=>'date_added','value'=>date("Y-m-d H:i:s")));
        $this->add($dte);
        $title = new Text("title",array('id'=>'title','class'=>'form-control'));
        $title->setLabel("title");
        $this->add($title);

        $msg = new TextArea("text",array('id'=>'text','class'=>'form-control'));
        $msg->setLabel("Message");
        $this->add($msg);
    }
    public function afterValidation(){
    }
}
