<?php
use Phalcon\Forms\Form;

class BaseForm extends Form{
    public function add_field($field_class,$name,$id=null,$label=null){
        $id = is_null($id) ? $name : $id;
        $label = is_null($label) ? $name : $label;
        $field = new $field_class($name,array('id'=>$id));
        $field->setLabel($label);
        $this->add($field);
    }
}
