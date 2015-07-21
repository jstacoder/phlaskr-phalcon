<?php

use Phalcon\Assets\Manager;

class AssetManager extends Manager {

    public function __construct($config){
        $this->config = $config;
        $this->_add_assets();
    }

    private function _add_assets(){
        foreach($this->config->vendorAssets as $k=>$v){
            if($k == 'css'){
                foreach($v as $alias=>$file){                                
                    $this->addCss($file);
                }
            }else{
                foreach($v as $alias=>$file){
                    $this->->addJs($file);
                }
            }
        }   
    }
}
