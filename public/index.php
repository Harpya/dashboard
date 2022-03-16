<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use harpya\cms\Router;
use harpya\cms\Config;

use harpya\dashboard\controller\IndexController;

define('ROOT_DIR', __DIR__.'/..');
define('TEMPLATE_DIR', ROOT_DIR.'/templates');
define('DOC_TOOLS_DIR', ROOT_DIR.'/doc-tools');
define('DATA_DIR', ROOT_DIR.'/data');



$router = new Router();

$router->setDefaultRoute([IndexController::class, 'index']);

$router->loadRoutesOnFolder(__DIR__ . '/../routes');

$router->handle();
