<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Loading SLIM
require 'slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new Slim\Slim();

require_once("src/AppInfo.php");
require_once("src/Utils.php");


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
  $user_id = $facebook->getUser();
  //$app_info = $facebook->api('/'. AppInfo::appID());
  //$app_name = Utils::idx($app_info, 'name', '');

  $app->render('main.php', array('user_id' => $user_id, "title"=>"DEMO APP FB OG"));
  
});

$app->get("/maps/streetview", function() use ($app, $facebook)   {
  $user_id = $facebook->getUser();
  $app->render('map_streetview.php', array('user_id' => $user_id, "title"=>"Street View"));
});

$app->get('/info', function () {
    phpinfo();;
});
$app->run();