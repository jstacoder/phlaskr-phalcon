<?php

define('VENDOR_DIR',__DIR__ . '/../../public/vendor');
define('APP_ROOT',dirname(dirname(__FILE__)));

$add_root = function($name){
    return APP_ROOT.'/'.$name;
};

if(isset($_SERVER['CLEARDB_DATABASE_URL'])){
    require_once __DIR__ . '/parser.php';
    $dbcfg = $get_uri_args($_SERVER['CLEARDB_DATABASE_URL']);
}else{
    require __DIR__ . '/local_db_cfg.php';
}

return new \Phalcon\Config(array(
    'database' => $dbcfg,
    'application' => array(
        'controllersDir' => dirname(dirname(__FILE__)).'/controllers/',
        'modelsDir'      => $add_root('models/'),
        'viewsDir'       => $add_root('views/'),
        'pluginsDir'     => $add_root('plugins/'),
        'libraryDir'     => $add_root('library/'),
        'cacheDir'       => $add_root('cache/volt'),
        'formsDir'       => $add_root('forms/'),
        'assetsDir'     => __DIR__ ,
        'baseUri'        => ''
    ),
    'vendorAssets' => array(
            'js'=> array(
                'angular' =>'/angular/angular.min.js',
                'angular-route'=>'/angular-route/angular-route.min.js'
            ),
            'css'=> array(
                'bootstrap'=>'/bootstrap/dist/css/bootstrap.min.css'
            )

    )  
));
