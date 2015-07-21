<?php

define('VENDOR_DIR',__DIR__ . '/../../public/vendor');

if(isset($_SERVER['CLEARDB_DATABASE_URL'])){
    require_once __DIR__ . '/parser.php';
    $dbcfg = $get_uri_args($_SERVER['CLEARDB_DATABASE_URL']);
}else{
    require __DIR__ . 'local_db_cfg.php';
}

return new \Phalcon\Config(array(
    'database' => $dbcfg,
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'viewsDir'       => __DIR__ . '/../../app/views/',
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'libraryDir'     => __DIR__ . '/../../app/library/',
        'cacheDir'       => __DIR__ . '/../../app/cache/volt',
        'formsDir'       => __DIR__ . '/../../app/forms/',
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
    $dbcfg = array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '14wp88',
        'dbname'      => 'testing55'
    );    
