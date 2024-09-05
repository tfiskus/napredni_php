<?php

use Core\Router;

session_start();

require_once '../Core/functions.php';
require_once base_path('Core/bootstrap.php');


$uri = parse_url($_SERVER['REQUEST_URI'])["path"];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router = new Router();

require base_path('routes.php');

$router->route($uri, $method);