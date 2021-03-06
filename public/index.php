<?php

// Front controller
// PHP version 7.0.28
// echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';

// Twig
require_once '../vendor/autoload.php';


// Autoloader

spl_autoload_register(function($class)
   {
    $root = dirname(__DIR__); //get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

// Routing
// require '../Core/Router.php';

$router = new Core\Router();

//Add the routes
$router -> add('', ['controller' => 'Home', 'action' => 'index']);
$router -> add('{controller}/{action}');
$router -> add('{controller}/{id:\d+}/{action}');
$router -> add('admin/{controller}/{action}', ['namespace' => 'Admin']);


//Display the routing table
// echo '<pre>';
// var_dump($router -> getRoutes());
// echo '</pre>';

// Match the requested route
// $url = $_SERVER['QUERY_STRING'];

// if ($router -> match($url)){
//     echo '<pre>';
//     var_dump($router -> getParams());
//     echo '</pre>'; 
// }else {
//     echo "No route found for URL '$url'";


$router -> dispatch($_SERVER['QUERY_STRING']);



?>