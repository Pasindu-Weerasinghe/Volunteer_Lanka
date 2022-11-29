<?php

class Organizer extends User
{
    function __construct()
    {
        parent::__construct();
        $this->role = 'organizer';
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
                if (isset($_POST['next'])) {
                    session_start();
                    $_SESSION['project-name'] = $_POST['project-name'];
                    $_SESSION['date'] = $_POST['date'];
                    $_SESSION['time'] = $_POST['time'];
                    $_SESSION['venue'] = $_POST['venue'];
                    $_SESSION['description'] = $_POST['description'];
                    $_SESSION['no-of-members'] = $_POST['no-of-members'];
                    $_SESSION['partnership'] = $_POST['partnership'];
                    $_SESSION['sponsorship'] = $_POST['sponsorship'];

                    if ($_POST['partnership'] == 'single') {
                        header('Location: '. BASE_URL. 'organizer/create_project/form_for_volunteers');
                    }
                } else {
                    $this->render('Organizer/CP1_CreateProject');
                }
                break;
            case 'collaborate_project':
                $this->render('Organizer/CP2_AddOrgToCollabProject');
                break;
            case 'publish_sponsor_notice':
                $this->render('Organizer/CP3_PublishSponsorNotice');
                break;
            case 'form_for_volunteers':
                $this->render('Organizer/CP4_FormForVolunteers');
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
