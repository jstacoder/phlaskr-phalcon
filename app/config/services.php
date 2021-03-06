<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\View\Simple as View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as flash;
use Phalcon\Assets\Manager;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

$di->set('router',function(){
    $router = new Router();
    $router->setUriSource(Router::URI_SOURCE_SERVER_REQUEST_URI);
    return $router;
});



$di->set('flash',function() {
    $flash = new flash();
    $flash->setCssclasses(array(
        'success'=>'alert alert-success',
        'warning'=>'alert alert-warning',
        'error'=>'alert alert-danger'
    ));
    return $flash;
});

$di->set('assets',function() use ($config){
    $manager = new Manager();
    foreach($config->vendorAssets as $k=>$v){
            if($k == 'css'){
                foreach($v as $alias=>$file){                                
                    $manager->collection('css')
                         ->addCss($file);
                }
            }else{
                foreach($v as $alias=>$file){
                    $manager->collection('js')
                         ->addJs($file);
                }
            }
    }
    $manager->collection('js')->setPrefix('/public/vendor')->setLocal(true);   
    $manager->collection('css')->setPrefix('/public/vendor')->setLocal(true);   
    return $manager;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
}, true);

/**
 * Setting up the view component
 */
$di->set('view', function () use ($config) {
    $view = new View();
    $view->setViewsDir($config->application->viewsDir);
    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {
            $volt = new VoltEngine($view, $di);
            if(!isset($_SERVER['CLEARDB_DATABASE_URL'])){
                $volt->setOptions(array(
                    'compiledPath' => $config->application->cacheDir,
                    'compiledSeparator' => '_'
                ));
            }
            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));
    return $view;
}, true);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    return new DbAdapter(array(
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname
    ));
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});
