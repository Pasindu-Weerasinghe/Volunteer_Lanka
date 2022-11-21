<?php
class Test extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->loadModel('Test');
        $this->render('Test');
    }
    
    function display($n) {
        $this->n = $n;
        $this->render('Test');
    }
}
