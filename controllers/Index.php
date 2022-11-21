<?php
class Index extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->render('Index');
    }
}
