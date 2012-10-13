<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
 
require 'slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new Slim\Slim();
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});
$app->get('/', function ($name = "Demo app Open graph") {
    echo "Hello, $name";
});
$app->get('/info', function () {
    phpinfo();;
});
$app->run();