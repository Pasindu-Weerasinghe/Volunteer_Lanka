<?php

class Volunteer extends User
{

    function __construct()
    {
        parent::__construct();
        $this->role = 'volunteer';
    }

    function index()
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Project');
        $date_now = date('Y-m-d');
        $this->uprojects = $this->model->getUpcomingProjects($date_now);

        foreach ($this->uprojects as $uproject) {
            $pid = $uproject['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }

        $this->loadModel('Volunteer');
        $this->interests = $this->model->getVolunteerInterests($uid);

        $this->loadModel('Project');
        $this->projects = [];
        foreach ($this->interests as $interest) {
            $key = trim($interest['Interest']);
            $this->result = $this->model->getSuggestedProjects($key);
            $this->projects = array_merge($this->projects, $this->result);
        }
        foreach ($this->projects as $project) {
            $pid = $project['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }

        $this->loadModel('Ad');
        $this->ads = $this->model->getAds();

        foreach ($this->ads as $ad) {
            $adid = $ad['AD_ID'];
            $this->adImage[$adid] = $this->model->getAdImage($adid);
        }

        $this->loadModel('Sponsor');
        foreach ($this->ads as $ad) {
            $uid = $ad['Sponsor'];
            $this->sponsor[$ad['AD_ID']] = $this->model->getSponsorName($uid);
        }
        $this->render('Volunteer/Home');
    }

    function my_upcoming_projects()
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Project');
        $date_now = date('Y-m-d');
        $jprojects = $this->model->getJoinedProjects($uid);

        foreach ($jprojects as $jproject) {
            $pid = $jproject['P_ID'];
            $this->uprojects = $this->model->getMyUpcomingProjects($pid, $date_now);
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }
        $this->render('Volunteer/Upcoming_projects');
    }

    function my_completed_projects()
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Project');
        $jprojects = $this->model->getJoinedProjects($uid);

        foreach ($jprojects as $jproject) {
            $pid = $jproject['P_ID'];
            $this->cprojects = $this->model->getMyCompletedProjects($pid);
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }
        $this->render('Volunteer/Completed_projects');
    }

    function view_projects($pid)
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Project');
        $this->project = $this->model->getProject($pid);
        $this->images = $this->model->getProjectImage($pid);
        $this->isJoined = $this->model->isJoined($pid, $uid);
        $this->render('Volunteer/View_project_volunteer');
    }

    function join_leave_project($pid, $isJoined)
    {
        $this->pid = $pid;
        if(!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Project');
        if($isJoined) {
            $this->model->leaveProject($pid, $uid);
            header("Location: " . BASE_URL . "volunteer/view_projects/$pid");
        }
        else {
            $this->render('Volunteer/Join_form');
        }
    }

    function join_project($pid) {

        if(!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $contact = $_POST['contact'];
        $meal = $_POST['radio-meal'];
        $prior = $_POST['radio-prior'];

        if ($prior == 'yes') {
            $prior = 1;
        } else if ($prior == 'no') {
            $prior = 0;
        }

        if ($meal == 'veg') {
            $meal = "Veg";
        } else if ($meal == 'nonveg') {
           $meal = "NonVeg";
        }

        $this->loadmodel('Project');
        $this->model->joinProject($uid, $pid, $contact, $meal, $prior);
        header("Location: " . BASE_URL . "volunteer/view_projects/$pid");
    }

    function feedback($pid) 
    {
        $this->pid = $pid;
        $this->render('Volunteer/Feedback_form');
    }

    function add_feedback($pid) 
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $des = $_POST['des'];
        $this->loadModel('Feedback');
        $this->model->setFeedback($uid, $des, $pid);
        header("Location: " . BASE_URL . "volunteer/feedback/$pid");
    }

    function new_ideas()
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('ProjectIdea');
        $this->pr_ideas = $this->model->getProjectIdea($uid);

        foreach ($this->pr_ideas as $idea) {
            $pi_id = $idea['PI_ID'];
            $this->pr_idea_images[$pi_id] = $this->model->getPI_Image($pi_id);
        }
        $this->render('Volunteer/New_ideas');
    }

    function insert_Ideas()
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        $location = $_POST['location'];
        $description = $_POST['des'];
        $uid = $_SESSION['uid'];

        $this->loadModel('ProjectIdea');
        $this->model->setProjectIdea($description, $location, $uid);

        $pi_id = $this->model->getPiId($uid);

        $targetDir = "public/images/pi_images/";
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (!empty($_FILES["file"]["name"])) {

            $total = count($_FILES['file']['name']);
            for ($i = 0; $i < $total; $i++) {
                $fileName = $_FILES['file']['name'][$i];
                $targetFilePath = $targetDir . $fileName;
                $fileType =  strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

                if (in_array($fileType, $allowTypes)) {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $targetFilePath)) {
                        $this->model->setPiImage($pi_id, $fileName);
                    }
                } else {
                    $this->statusMsg = 'Only JPG, JPEG, PNG & GIF files are allowed to upload.';
                }
            }
        }
        header('Location: ' . BASE_URL . 'volunteer/new_ideas');
    }

    function delete_ideas($piId)
    {
        $this->loadModel('ProjectIdea');
        $this->model->deleteProjectIdea($piId);
        header('Location: ' . BASE_URL . 'volunteer/new_ideas');
    }

    function profile()
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Volunteer');
        $this->profile = $this->model->getUserData($uid);
        $this->user = $this->model->getVolunteerData($uid);

        $this->render('Volunteer/Profile');
    }

    function request_projects()
    {
        $this->render('Volunteer/Request_projects');
    }

    function calendar()
    {
        $this->render('Calendar');
    }

    function get_events($date)
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Calendar');
        $events = $this->model->getEvents($uid, $date);

        echo json_encode($events);
    }

    function search_organizer()
    {
        if (isset($_POST['search'])) {

            $key = trim($_POST['key']);
            $this->loadModel('Organizer');
            $this->organizers = $this->model->searchOrganizers($key);
        } else {
            $this->loadModel('Organizer');
            $this->organizers = $this->model->getOrganizerData();
        }

        $this->render('Volunteer/Search_organizer');
    }

    function search_project()
    {
        $filter = $_POST['filter'];
        $key = trim($_POST['key']);
        $this->loadModel('Project');
        if ($filter == 'name') {
            $this->projects = $this->model->getProjectsByName($key);
        }
        else if ($filter == 'area') {
            $this->projects = $this->model->getProjectsByArea($key);
        }
        else if ($filter == 'date') {
            $this->projects = $this->model->getProjectsByDate($key);
        }
        else if ($filter == 'location') {
            $this->projects = $this->model->getProjectsByLocation($key);
        }
        else if ($filter == 'organizer') {
            $this->loadModel('Organizer');
            $organizers = $this->model->getOrganizers($key);

            $this->loadModel('Project');
            foreach ($organizers as $organizer) {
                $this->projects = $this->model->getProjectsByOrganizer($organizer);
            }
        }
        else if ($filter == 'completed') {
            $this->projects = $this->model->getCompletedProjects($key);
        }
        else if ($filter == 'volunteers') {
            $this->projects = $this->model->getProjectsByVolunteers($key);
        }

        foreach ($this->projects as $project) {
            $pid = $project['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }
        $this->render('Volunteer/Search_results');
    }

    function view_organizer($uid)
    {
        $this->render('Organizer/Blog');
    }

}
