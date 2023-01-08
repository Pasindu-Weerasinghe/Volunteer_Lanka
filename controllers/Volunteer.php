<?php

class Volunteer extends User
{
    function index()
    {
        $this->render('Volunteer/Home');
    }

    function upcoming_projects()
    {
        $this->render('Volunteer/Upcoming_projects');
    }

    function completed_projects()
    {
        $this->render('Volunteer/Completed_projects');
    }

    function request_projects()
    {
        $this->render('Volunteer/New_ideas');
    }

    function profile()
    {
        $this->render('Volunteer/Profile');
    }


}