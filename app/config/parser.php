<?php

$get_uri_args = function($url){
    $parts = parse_url($url);

    $host = $parts['host'];
    $dbname = explode('/',$parts['path'])[1];
    $user = $parts['user'];
    $pass = $parts['pass'];
    $adapter = $parts['scheme'];
    $adapter[0] = ucwords($adapter[0]);
    return array(
        'username'=>$user,
        'password'=>$pass,
        'host'=>$host,
        'dbname'=>$dbname,
        'adapter'=>$adapter
    );
};
