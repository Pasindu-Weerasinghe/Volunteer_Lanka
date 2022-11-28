<?php

class App
{
    private $_url = null;
    private $_controller = null;

    function __construct()
    {
        $this->_url = $this->_getURL();

        if (empty($this->_url[0])) {
            // if didn't call any controller in the url load default controller
            $this->_loadDefaultController();
            return false;
        }
        if ($this->_loadController()) {
            // if controller loaded, then load controller method
            $this->_loadControllerMethod();
        }
    }

    // get url converted to indexed array
    private function _getURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        return explode('/', $url);
    }

    private function _loadDefaultController()
    {
        require 'controllers/Index.php';
        $this->_controller = new Index();
        $this->_controller->index();
    }

    private function _loadController()
    {
        $file = 'controllers/' . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0]();
            return true;
        } else {
            // page not found
            echo 'No such file or directory';
            return false;
        }
    }

    private function _loadControllerMethod()
    {
        $urlIndexCount = count($this->_url);
        if ($urlIndexCount > 1) {
            // if url length greater than 1
            if (method_exists($this->_controller, $this->_url[1])) {
                // if method exists calla a callback function of the controller method
                $params = array_slice($this->_url, 2);
                call_user_func_array([$this->_controller, $this->_url[1]], $params);
            } else {
                echo 'Requested method not found';
                exit;
            }
        } else {
            // if only controller called, call index method of the controller
            $this->_controller->index();
        }
    }
}

// switch ($urlIndexCount) {
//         // case 6:
//         //     $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5]);
//         //     break;
//         // case 5:
//         //     $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
//         //     break;
//         // case 4:
//         //     $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
//         //     break;
//         // case 3:
//         //     $this->_controller->{$this->_url[1]}($this->_url[2]);
//         //     break;
//         // case 2:
//         //     $this->_controller->{$this->_url[1]}();
//         //     break;
//     default:
//         $params = array_slice($this->_url, 2);
//         call_user_func_array([$this->_controller, $this->_url[1]], $params);
//         break;
// }