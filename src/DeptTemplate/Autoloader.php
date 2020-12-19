<?php

namespace DeptTemplate;

class Autoloader
{    
    /**
     * load
     *
     * @param  mixed $className
     * @return void
     */
    public function load($className)
    {
        $file = __DIR__ . "/../" . str_replace("\\", "/", $className) . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            return false;
        }
    }    
    /**
     * register
     *
     * @return void
     */
    public function register()
    {
        spl_autoload_register([$this, 'load']);
    }
}
$loader = new Autoloader();
$loader->register();
