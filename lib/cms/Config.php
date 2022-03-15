<?php

namespace harpya\cms;

class Config
{
    public static $instance;

    protected $lsKeyValues = [];


    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function set($key, $value)
    {
        $this->lsKeyValues[$key] = $value;
        return $this;
    }

    public function get($key, $default=null)
    {
        return (isset($this->lsKeyValues[$key])) ? $this->lsKeyValues[$key] : $default;
    }
}
