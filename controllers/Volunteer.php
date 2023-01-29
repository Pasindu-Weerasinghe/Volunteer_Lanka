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

    function newIdeas()
    {
        $this->render('Volunteer/Request_projects');
    }

    function insertIdeas()
    {
        session_start();
        $location = $_POST['location'];
        $description = $_POST['des'];
        $uid = $_SESSION['uid'];

        $this->loadModel('Volunteer');
        $this->model->setProjectIdea($description, $location, $uid);
 
        // $targetDir = "images/";
        // $allowTypes = array('jpg','png','jpeg','gif');
        
    }


}