<?php

session_start();

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

//require './vendor/autoload.php';
require './vendor/autoload.php';
//require 'config.php';

//spl_autoload_register(function ($class) {

//    if (file_exists('Controllers/' . $class . '.php')) {
//        require_once 'Controllers/' . $class . '.php';
//    } elseif (file_exists('Models/' . $class . '.php')) {
//        require_once 'Models/' . $class . '.php';
//    } elseif (file_exists('Core/' . $class . '.php')) {
//        require_once 'Core/' . $class . '.php';
//        echo 'Core/' . $class . '.php';
//    }
//});

use App\Core\Core as Core;

$core = new Core();
$core->run();

//$home = new errorController();

//$controller= new Controller();
//$controller->LoadTemplate('home');

//$home = new homeController();
//$home ->index();

