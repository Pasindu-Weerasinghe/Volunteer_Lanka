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
                        header('Location: ' . BASE_URL . 'organizer/create_project/form_for_volunteers');
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
            case 'create':
                if (isset($_POST['create'])) {
                    $this->loadModel('Project');
                    session_start();
                    $pname = $_SESSION['project-name'];
                    $date = $_SESSION['date'];
                    $time = $_SESSION['time'];
                    $venue = $_SESSION['venue'];
                    $description = $_SESSION['description'];
                    $no_of_volunteers = $_SESSION['no-of-members'];
                    $sponsorship = $_SESSION['sponsorship'] == 'publish-sn' ? 1 : 0;
                    $uid = $_SESSION['uid'];

                    if ($this->model->setProject($pname, $date, $time, $venue, $description, $no_of_volunteers, $sponsorship, $uid)) {
                        if (($pid = $this->model->getProjectId($pname, $uid)) != 'query failed') {
                        }
                    }

                    $email = $_POST['email'] ? 1 : 0;
                    $contact = $_POST['contact-no'] ? 1 : 0;
                    $meal_pref = $_POST['meal-pref'] ? 1 : 0;
                    $prior_part = $_POST['prior-participations'] ? 1 : 0;
                    $this->model->setVolunteerForm($pid, $email, $contact, $meal_pref, $prior_part);
                    unset($_SESSION['project-name'], $_SESSION['date'], $_SESSION['time'], $_SESSION['venue'], $_SESSION['description'], $_SESSION['no-of-members'], $_SESSION['sponsorship']);
                    header('Location: ' . BASE_URL);
                }
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
