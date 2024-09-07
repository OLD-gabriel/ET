<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

date_default_timezone_set('America/Sao_Paulo');

session_start();

if(!isset($_SESSION["LOGIN"])){
    $_SESSION["LOGIN"] = FALSE;
    $_SESSION["GESTOR"] = FALSE;
}

require_once 'vendor/autoload.php';
require_once 'app/Config/routes.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// $uri = rtrim($uri, '/');
// $uri = str_replace("/ELETIVA","",$uri);

$action = isset($_GET["action"]) ? $_GET["action"] : "login";

foreach ($router['routes'] as $route => $controller) {
    if ($action === $route) {
        $controller = new $controller();
        $controller->index($_REQUEST);
        exit;
    }
}

$notFoundController = new $router['default']();
$notFoundController->index($_REQUEST);
exit;
