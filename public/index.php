<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use harpya\cms\Router;
use harpya\cms\Config;

use harpya\dashboard\controller\IndexController;

define('TEMPLATE_DIR', __DIR__.'/../templates');
// Config::getInstance()->set('TEMPLATE_DIR', __DIR__.'/../templates');

$router = new Router();

$router->setDefaultRoute([IndexController::class, 'index']);

$router->loadRoutesOnFolder(__DIR__ . '/../routes');

$router->handle();
