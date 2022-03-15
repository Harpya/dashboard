<?php

namespace harpya\cms;

class Router extends \AltoRouter
{
    protected $defaultRoute;


    public function setDefaultRoute($route)
    {
        $this->defaultRoute = $route;
    }

    public function loadRoutesOnFolder($folder, $fileFormat = '/*.php')
    {
        $lsFiles = glob($folder.$fileFormat);
        foreach ($lsFiles as $file) {
            if (is_readable($file)) {
                include_once $file;
            }
        }
    }


    public function handle()
    {

// include_once __DIR__ .'/../';
        // $defaultRoute = [IndexController::class, 'index'];

        // $router->map('GET', '/', $defaultRoute);
        // $router->map('GET', '/about', [IndexController::class, 'about']);

        try {
            $match = $this->match();
        } catch (\Exception $e) {
            die($e->getMessage());
        }


        // echo "<pre style='color:red'>";
        // var_dump($match);

        if (!$match && $this->defaultRoute) {
            // if (!$this->defaultRoute) {
            //     header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
            //     exit;
            // }

            $match = [
                'target' => $this->defaultRoute,
                'params' => [],
                'name' => ''
            ];
        }


        // call closure or throw 404 status
        if (is_array($match) && is_callable($match['target'])) {
            if (is_array($match['target'])  && count($match['target']) >= 2) {
                if (is_string($match['target'][0]) && class_exists($match['target'][0])) {
                    $obj = new $match['target'][0]();
                    $match['target'][0] = $obj;
                }
            }
            //  else {
            call_user_func_array($match['target'], $match['params']);
        // }
        } else {
            header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
            exit;
        }
    }
}
