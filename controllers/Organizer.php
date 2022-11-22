<?php

class Organizer extends Controller
{
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->loadModel('Organizer');
        $this->render('Organizer/Home');
    }
}