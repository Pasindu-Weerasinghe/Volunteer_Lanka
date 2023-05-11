<?php

class Controller
{
    function __construct()
    {
        $this->model = null;
    }

    public function render($view)
    {
        require 'views/' . $view . '.php';
    }

    public function loadModel($modelName)
    {
        $file = 'models/' . $modelName . 'Model.php';
        ob_start();
        
        if (file_exists($file)) {
            include_once $file;
            $modelClassName = $modelName . 'Model';
            $this->model = new $modelClassName();
        }
        return ob_get_clean();
    }
}
