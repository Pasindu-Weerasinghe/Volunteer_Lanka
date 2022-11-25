<?php

class Organizer extends User
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->loadModel('Organizer');
        $this->render('Organizer/Home');
    }

    function create_project()
    {
        $this->render('Organizer/CreateProject');
    }

    function upcoming_projects()
    {
        $this->render('Organizer/UpcomingProjects');
    }

    function completed_projects()
    {
        $this->render('Organizer/CompletedProjects');
    }

    function requests()
    {
        $this->render('Organizer/Requests');
    }

    function payments()
    {
        $this->render('Organizer/Payments');
    }

    function blog()
    {
        $this->render('Organizer/Blog');
    }
}
