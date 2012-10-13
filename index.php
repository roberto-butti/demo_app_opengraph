<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Loading SLIM
require 'slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new Slim\Slim();

require_once("src/AppInfo.php");


// LOADING FACEBOOK
require_once('sdk/src/facebook.php');
$facebook = new Facebook(array(
  'appId'  => AppInfo::appID(),
  'secret' => AppInfo::appSecret(),
  'sharedSession' => true,
  'trustForwarded' => true,
));



$app->get('/hello/:name', function ( $name) use ($app)  {
  $app->render('show.php', array('title' => 'Sahara'));
    echo "Hello, $name";
});
$app->get('/', function ($name = "Demo app Open graph") use ($app, $facebook)  {
  $user = $facebook->getUser();
  $app->render('main.php', array('user' => $user));
});
$app->get('/info', function () {
    phpinfo();;
});
$app->run();