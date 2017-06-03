<?php
require_once "app/config/settings.php";
require_once "app/helpers/main.php";
require_once "vendor/autoload.php";

use App\Core\Router;

$router = new Router();
if(! $router->api) $router->dispatch();
