<?php

error_reporting(E_ALL);

$debug = new \Phalcon\Debug();
$debug->listen();

try {

    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../app/config/config.php";

    /**
     * Read auto-loader
     */
    include __DIR__ . "/../app/config/loader.php";

    /**
     * Read services
     */
    include __DIR__ . "/../app/config/services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);
    $application->useImplicitView(false);

    echo $application->handle()->getContent();

} catch (Exception $e) {
    echo "PhalconException:" . $e->getMessage().'<br/>';
    echo "File: " . $e->getFile().'<br/>';
    echo "Line: " . $e->getLine().'<br/>';
    print_r(get_class_methods($e));
    print_r($_SERVER);
}
