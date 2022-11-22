<?php

class Controller
{
    function __construct()
    {
    }

    public function render($view)
    {
        require 'views/' . $view . '.php';
    }

    public function loadModel($modelName)
    {
        $file = 'models/' . $modelName . 'Model.php';

        if (file_exists($file)) {
            require $file;
            $modelClassName = $modelName . 'Model';
            $this->model = new $modelClassName();
        }
    }
}
