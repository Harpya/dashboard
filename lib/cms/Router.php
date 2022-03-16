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
        try {
            $match = $this->match();
        } catch (\Exception $e) {
            die($e->getMessage());
        }



        if (!$match && $this->defaultRoute) {
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

            call_user_func_array($match['target'], $match['params']);
        } else {
            header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
            exit;
        }
    }
}
