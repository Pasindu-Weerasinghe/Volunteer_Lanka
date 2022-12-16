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
                    $_SESSION['files'] = ($_FILES["file"]["name"]);
                    $_SESSION['files_tmpname'] = ($_FILES["file"]["tmp_name"]);
                    
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

                    // 8888888888888888888888888888888888888888888888888888888888888888888888
                    $host = 'localhost';
                    $user = 'root';
                    $pass = '';
                    $db = 'volunteer_lanka';
                    $conn = mysqli_connect($host, $user, $pass, $db);

                    $targetDir = BASE_URL."public/images/pr_images/";
                    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

                    $files = $_SESSION['files'];
                    $files_tmpname = $_SESSION['files_tmpname'];

                    if (!empty($files)) {

                        $total = count($files);
                        for (
                            $i = 0;
                            $i < $total;
                            $i++
                        ) {
                            $fileName = $files[$i];
                            $targetFilePath = $targetDir . $fileName;
                            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                            if (in_array($fileType, $allowTypes)) {
                                if (move_uploaded_file($files_tmpname[$i], $targetFilePath)) {

                                    $query = "INSERT into pr_image (P_ID, Image) VALUES ('" . $pid . "','" . $fileName . "')";
                                    $result = mysqli_query($conn, $query);
                                    if ($result) {
                                        $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                                    } else {
                                        $statusMsg = "File upload failed, please try again.";
                                    }
                                }
                            } else {
                                $statusMsg = 'Only JPG, JPEG, PNG & GIF files are allowed to upload.';
                            }
                        }
                    }
                    echo $statusMsg;
                    // 8888888888888888888888888888888888888888888888888888888888888888888888

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
        $this->loadModel('Project');
        session_start();
        $this->projects = $this->model->getProjects($_SESSION['uid']);
        $this->render('Organizer/UpcomingProjects');
    }

    function completed_projects()
    {
        $this->render('Organizer/CompletedProjects');
    }

    function requests()
    {
        $this->loadModel('ProjectIdea');
        $this->pr_ideas = $this->model->getProjectIdeas();

        foreach ($this->pr_ideas as $idea) {
            $pi_id = $idea['PI_ID'];
            $this->pr_idea_images[$pi_id] = $this->model->getPI_Image($pi_id);
        }

        $this->loadModel('Volunteer');
        foreach ($this->pr_ideas as $idea) {
            $pi_id = $idea['PI_ID'];
            $vol_id = $idea['U_ID'];
            $volunteer = $this->model->getVolunteerById($vol_id);
            $this->pi_vol_name[$pi_id] = $volunteer['Name'];
        }

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
