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

    function create_project($param = null)
    {
        switch ($param) {
            case null:
                $this->render('Organizer/CP1_CreateProject');
                break;
            case 'publish_sponsor_notice':
                $this->render('Organizer/CP3_PublishSponsorNotice');
                break;
        }
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
