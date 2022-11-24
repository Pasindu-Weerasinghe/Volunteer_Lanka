<?php

class Organizer extends User
{
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->loadModel('Organizer');
        $this->render('Organizer/Home');
    }

    function create_project() {
        $this->render('Organizer/CreateProject');
    }
}