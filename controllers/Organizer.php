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
        $this->loadModel('Project');
        $this->projects = $this->model->cardsVolunteer();
        foreach ($this->projects as $project) {
            $pid = $project['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }
        $this->render('Organizer/Home');
    }

    function create_project($param = null)
    {
        switch ($param) {
            case null:
                $this->render('Organizer/CreateProject');
                break;
            case 'create':
                if (isset($_POST['create'])) {
                    $response = array("message" => "");

                    $this->loadModel('Project');
                    session_start();
                    $pname = $_POST['project-name'];
                    $date = $_POST['date'];
                    $time = $_POST['time'];
                    $venue = $_POST['venue'];
                    $description = $_POST['description'];
                    $no_of_volunteers = $_POST['no-of-members'];
                    $partnership = $_POST['partnership'] == 'collaborate' ? 1 : 0;
                    $sponsorship = $_POST['sponsorship'] == 'publish-sn' ? 1 : 0;
                    $uid = $_SESSION['uid'];

                    //todo: creating the project
                    if ($this->model->setProject($pname, $date, $time, $venue, $description, $no_of_volunteers, $sponsorship, $partnership, $uid)) {
                        if (($pid = $this->model->getProjectId($pname, $uid)) != 'query failed') {
                            $_SESSION['proj_id'] = $pid;

                            $email = $_POST['email'] ? 1 : 0;
                            $contact = $_POST['contact-no'] ? 1 : 0;
                            $meal_pref = $_POST['meal-pref'] ? 1 : 0;
                            $prior_part = $_POST['prior-participations'] ? 1 : 0;

                            // setting volunteer form
                            $this->model->setVolunteerForm($pid, $email, $contact, $meal_pref, $prior_part);
                        }

                        if ($partnership) {
                            //? if project is a collaboration
                        }

                        if ($sponsorship) {
                            //? if project is sponsored
                        }

                        //todo: if there are images to upload
                        $targetDir = "public/images/pi_images/";
                        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

                        if (!empty($_FILES["file"]["name"])) {

                            $total = count($_FILES['file']['name']);
                            for ($i = 0; $i < $total; $i++) {
                                $newFileName = uniqid() . '-' . $_FILES['file']['name'][$i];
                                $targetFilePath = $targetDir . $newFileName;
                                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                                if (in_array($fileType, $allowTypes)) {
                                    if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $targetFilePath)) {

                                        if ($this->model->setProjectImage($pid, $newFileName)) {
                                            $statusMsg = "The file " . $newFileName . " has been uploaded successfully.";
                                        } else {
                                            $statusMsg = "File upload failed, please try again.";
                                        }
                                    }
                                } else {
                                    $statusMsg = 'Only JPG, JPEG, PNG & GIF files are allowed to upload.';
                                }
                            }
                            echo $statusMsg;
                        }
                        header('Location: '. BASE_URL);
                    } else {
                        //! project didn't get created
                    }
                }
                break;
        }
    }

    function create_project2()
    {
        session_start();
        if (true) {
            $pname = $_POST['project-name'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $venue = $_POST['venue'];
            $description = $_POST['description'];
            $no_of_members = $_POST['no-of-members'];
            $partnership = $_POST['partnership'] == 'collaborate' ? 1 : 0;
            $sponsorship = $_POST['sponsorship'] == 'publish-sn' ? 1 : 0;
            $uid = $_SESSION['uid'];
            $this->loadModel('Project');


            if ($this->model->setProject($pname, $date, $time, $venue, $description, $no_of_members, $sponsorship, $uid)) {
                $pid = $this->model->getLastId();
                $_SESSION['proj_id'] = $pid;

                $email = $_POST['email'] ? 1 : 0;
                $contact = $_POST['contact-no'] ? 1 : 0;
                $meal_pref = $_POST['meal-pref'] ? 1 : 0;
                $prior_part = $_POST['prior-participations'] ? 1 : 0;
                $this->model->setVolunteerForm($pid, $email, $contact, $meal_pref, $prior_part);
            } else {
                echo "Failed";
            }
        } else {
        }
    }

    function upcoming_projects()
    {
        session_start();
        $this->loadModel('Project');
        $this->projects = $this->model->getProjects($_SESSION['uid']);
        foreach ($this->projects as $project) {
            $pid = $project['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }

        $this->render('Organizer/UpcomingProjects');
    }
    

    function completed_projects()
    {
        session_start();
        $this->loadModel('Project');
        $this->projects = $this->model->getProjects($_SESSION['uid']);
        foreach ($this->projects as $project) {
            $pid = $project['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }
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
        session_start();
        $uid  = $_SESSION['uid'];
        $this->loadModel('Organizer');
        $this->organizer = $this->model->getOrganizerById($uid);

        $this->loadModel('Project');
        $this->no_of_projects = count($this->model->getProjects($uid));
        $this->no_of_completed_projects = 0;

        $this->render('Organizer/Blog');
    }

    function view_projects($pid)
    {
        $this->loadModel('Project');
        $this->project = $this->model->getProject($pid);
        $this->images = $this->model->getProjectImage($pid);
        $this->render('Organizer/ViewUpcomingProject');
    }

}
