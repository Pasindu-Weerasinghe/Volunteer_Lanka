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
        if (!isset($_SESSION)) {
            session_start();
        }

        $uid = $_SESSION['uid'];
        $this->loadModel('Project');
        $date_now = date('Y-m-d');

        $this->myprojects = $this->model->getMyUpcomingProjects($uid);
        foreach ($this->myprojects as $myproject) {
            $pid = $myproject['P_ID'];
            $this->myprImage[$pid] = $this->model->getProjectImage($pid);
        }

        $this->uprojects = $this->model->getUpcomingProjectsVolunteer($date_now);
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
        if (!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Project');
        $this->uprojects = $this->model->getMyUpcomingProjects($uid);

        foreach ($this->uprojects as $uproject) {
            $pid = $uproject['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }
        $this->render('Volunteer/Upcoming_projects');
    }

    function my_completed_projects()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Project');
        $this->projects = $this->model->getMyCompletedProjects($uid);
        foreach ($this->projects as $project) {
            $pid = $project['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }
        $this->loadModel('Feedback');
        foreach ($this->projects as $project) {
            $pid = $project['P_ID'];
            $this->feedbackGiven[$pid] = $this->model->isFeedbackGiven($pid, $uid);
        }
        $this->render('Volunteer/Completed_projects');
    }

    function view_projects($pid)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Project');
        $this->project = $this->model->getProject($pid);
        $this->images = $this->model->getProjectImage($pid);
        $this->isJoined = $this->model->isJoined($pid, $uid);
        $oid = $this->project['U_ID'];

        $this->loadModel('Organizer');
        $this->organizer = $this->model->getOrganizerByID($oid);
        $this->render('Volunteer/View_project_volunteer');
    }

    function view_ads($adid)
    {
        $this->loadModel('Ad');
        $this->ad = $this->model->getAd($adid);
        $this->adImage = $this->model->getAdImage($adid);
        $this->render('Volunteer/View_ads');
    }


    function join_leave_project($pid, $isJoined, $nuVolunteers, $date)
    {
        $this->pid = $pid;
        if (!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Project');
        if ($isJoined) {
            $date_now = date('Y-m-d');
            $weekbefore = date('Y-m-d', strtotime('-7 days', strtotime($date)));
            if ($date_now < $weekbefore) {
                $this->model->leaveProject($pid, $uid);
                header("Location: " . BASE_URL . "volunteer/view_projects/$pid");
            } else {
                echo '<script>alert("Sorry. Cannot leave project now!")</script>';
            }
        } else {
            $count = $this->model->getJoinedCount($pid)['Count'];
            if ($count < $nuVolunteers) {
                $this->render('Volunteer/Join_form');
            } else {
                echo '<script>alert("Sorry. Volunteer count reached!")</script>';
            }
        }
    }

    function join_project($pid)
    {

        if (!isset($_SESSION)) {
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

    function feedback($isGiven, $pid, $uid)
    {
        if ($isGiven == 1) {
            header("Location: " . BASE_URL . "Volunteer/viewOrganizerProfile/$uid");
        } else {
            $this->pid = $pid;
            $this->render('Volunteer/Feedback_form');
        }
    }

    function add_feedback($pid)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $des = $_POST['des'];
        $rating = $_POST['rating'];
        $this->loadModel('Feedback');
        $this->model->setFeedback($des, $rating, $uid, $pid);
        header("Location: " . BASE_URL . "volunteer/my_completed_projects");
    }

    function new_ideas()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('ProjectIdea');
        $this->pr_ideas = $this->model->getProjectIdea($uid);

        foreach ($this->pr_ideas as $idea) {
            $pi_id = $idea['PI_ID'];
            $this->pr_idea_images[$pi_id] = $this->model->getPI_Images($pi_id);
        }
        $this->render('Volunteer/New_ideas');
    }

    function insert_Ideas()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $location = $_POST['location'];
        $description = $_POST['des'];
        $uid = $_SESSION['uid'];


        $targetDir = "public/images/pi_images/";
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (!empty($_FILES["file"]["name"])) {

            $total = count($_FILES['file']['name']);
            for ($i = 0; $i < $total; $i++) {
                $fileName = $_FILES['file']['name'][$i];
                $targetFilePath = $targetDir . $fileName;
                $fileType =  strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

                if (in_array($fileType, $allowTypes)) {
                    $this->loadModel('ProjectIdea');
                    $this->model->setProjectIdea($description, $location, $uid);

                    $pi_id = $this->model->getPiId($uid);
                    if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $targetFilePath)) {
                        $this->model->setPiImage($pi_id, $fileName);
                    }
                    header('Location: ' . BASE_URL . 'volunteer/new_ideas');
                } else {
                    $this->statusMsg = 'Upload a JPG, JPEG, PNG or GIF file';
                    $this->render('Volunteer/Request_projects');
                }
            }
        }
        
    }

    function delete_ideas($piId)
    {
        $this->loadModel('ProjectIdea');
        if ($this->model->deleteProjectIdea($piId)) {
            header('Location: ' . BASE_URL . 'volunteer/new_ideas');
        } else {
            //! Error message
        }
    }

    function profile()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Volunteer');
        $this->profile = $this->model->getUserData($uid);
        $this->user = $this->model->getVolunteerData($uid);
        $this->interests = $this->model->getVolunteerInterests($uid);
        $this->orgs = $this->model->getOrganizations($uid);

        $this->loadModel('Project');
        $this->projects = $this->model->getMyCompletedProjects($uid);
        $this->projectCount = count($this->projects);

        $this->loadModel('ProjectIdea');
        $ideaCount = $this->model->getMyIdeas($uid)['Count'];

        $this->ideaBadgeCount = 0;
        for ($i = 1; $i <= $ideaCount; $i++) {
            if ($i % 3 == 0) {
                $this->ideaBadgeCount += 1;
            }
        }
        $this->totalCount = $this->projectCount + $this->ideaBadgeCount;

        if ($this->totalCount < 5) {
            $this->badge = "Beginner";
            $this->more = 5 - $this->totalCount;
            $this->next = "Bronze";
            $this->color = "white";
        } else if ($this->totalCount  < 10) {
            $this->badge = "Bronze Member";
            $this->more = 10 - $this->totalCount;
            $this->next = "Silver";
            $this->color = "bronze";
        } else if ($this->totalCount < 20) {
            $this->badge = "Silver Member";
            $this->more = 20 - $this->totalCount;
            $this->next = "Gold";
            $this->color = "silver";
        } else if ($this->totalCount < 50) {
            $this->badge = "Gold Member";
            $this->more = 50 - $this->totalCount;
            $this->next = "Platinum";
            $this->color = "gold";
        } else {
            $this->badge = "Platinum Member";
            $this->color = "platinum";
        }

        $this->render('Volunteer/Profile');
    }

    function change_profile()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Volunteer');
        $this->profile = $this->model->getUserData($uid);
        $this->user = $this->model->getVolunteerData($uid);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $target_dir = "public/images/profile_images/";
            $image_name = basename($_FILES["profilepic"]["name"]);
            $target_file = $target_dir . $image_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $extensions_arr = array("jpg", "jpeg", "png", "gif");

            // Check if file is a valid image
            if (!in_array($imageFileType, $extensions_arr)) {
                echo "Invalid image file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
                return;
            }

            // Move uploaded file to uploads directory
            if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file)) {
                $uid = $_SESSION['uid'];
                $profilepic = $target_file;
                // Update user's record in the database with new profile picture
                $this->model->updateProfilePic($uid, $profilepic);
                $_SESSION['photo'] = $image_name;
                header('Location: ' . BASE_URL . 'Volunteer/Change_profile');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            $this->render('Volunteer/Change_profile');
        }
    }

    function update_profile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            $name = $_POST['uname'];
            $contact = $_POST['cNumber'];
            $address = $_POST['address'];
            $uid = $_POST['uid'];

            $this->loadModel('Volunteer');
            $this->model->updateProfile($name, $contact, $address, $uid);

            header('Location: ' . BASE_URL . 'Volunteer/profile');
        }
    }

    function request_projects()
    {
        $this->statusMsg = NULL;
        $this->render('Volunteer/Request_projects');
        
    }

    function calendar()
    {
        $this->render('Calendar');
    }

    function get_events($date)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Calendar');
        $events = $this->model->getEventsVolunteer($uid, $date);

        echo json_encode($events);
    }

    function get_all_events($date)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Calendar');
        $events = $this->model->getAllEventsVolunteer($uid, $date);

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
        $key = trim($_POST['key']);
        $filter = $_POST['filter'];
        $this->loadModel('Project');
        $this->message = NULL;

        if ($key == NULL) {
            $this->message = 'Please enter a keyword to search';
            $this->projects = [];
        } else if ($filter == NULL) {
            $this->projects = $this->model->getProjectsByName($key);
        } else if ($filter == 'name') {
            $this->projects = $this->model->getProjectsByName($key);
        } else if ($filter == 'area') {
            $this->projects = $this->model->getProjectsByArea($key);
        } else if ($filter == 'date') {
            $this->projects = $this->model->getProjectsByDate($key);
        } else if ($filter == 'location') {
            $this->projects = $this->model->getProjectsByLocation($key);
        } else if ($filter == 'organizer') {
            $this->projects = $this->model->getProjectsByOrganizer($organizer);
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
