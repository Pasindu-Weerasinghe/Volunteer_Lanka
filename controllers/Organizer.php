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
                $response = array("message" => "");
                if (isset($_POST['create'])) {

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

                    // creating the project
                    if ($pid = $this->model->setProject($pname, $date, $time, $venue, $description, $no_of_volunteers, $sponsorship, $partnership, $uid)) {
                        $email = isset($_POST['email']) ? 1 : 0;
                        $contact = isset($_POST['contact-no']) ? 1 : 0;
                        $meal_pref = isset($_POST['meal-pref']) ? 1 : 0;
                        $prior_part = isset($_POST['prior-participations']) ? 1 : 0;

                        // setting volunteer form
                        $this->model->setVolunteerForm($pid, $email, $contact, $meal_pref, $prior_part);

                        if ($partnership) {
                            //? if project is a collaboration
                            $this->model->setCollaborateProject($pid);
                            $collaborators = json_decode($_POST['collaborators'], true);
                            foreach ($collaborators as $collaborator) {
                                $this->model->setCollaborator(intval($pid), intval($collaborator));
                            }

                        }

                        if ($sponsorship) {
                            //? if project is sponsored
                            $silverAmount = $_POST['silver-amount'];
                            $goldAmount = $_POST['gold-amount'];
                            $platinumAmount = $_POST['platinum-amount'];
                            $silverQty = $_POST['silver-quantity'];
                            $goldQty = $_POST['gold-quantity'];
                            $platinumQty = $_POST['platinum-quantity'];
                            $totalAmount = $_POST['total-amount'];

                            $this->model->setSponsorNotice($silverAmount, 'Silver', $totalAmount, $silverQty, $pid, $uid);
                            $this->model->setSponsorNotice($goldAmount, 'Gold', $totalAmount, $goldQty, $pid, $uid);
                            $this->model->setSponsorNotice($platinumAmount, 'Platinum', $totalAmount, $platinumQty, $pid, $uid);
                        }

                        //todo: if there are images to upload
                        $targetDir = "public/images/pi_images/";
                        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', '');

                        // if there are images to upload
                        if (!empty($_FILES["files"]["name"])) {

                            $total = count($_FILES['files']['name']);
                            for ($i = 0; $i < $total; $i++) {
                                $newFileName = uniqid() . '-' . $_FILES['files']['name'][$i];
                                $targetFilePath = $targetDir . $newFileName;
                                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                                if (in_array($fileType, $allowTypes)) {
                                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $targetFilePath)) {

                                        if ($this->model->setProjectImage($pid, $newFileName)) {
                                            $response['images'][] = "The file " . $newFileName . " has been uploaded successfully.";
                                        } else {
                                            $response['error'][] = "File upload failed, please try again.";
                                        }
                                    }
                                } else {
                                    $response['error'][] = 'Only JPG, JPEG, PNG & GIF files are allowed to upload.';
                                }
                            }
                        }
                        header("Content-Type: application/json");
                        $response['message'] = "Project created successfully";
                        echo json_encode($response);
                    } else {
                        //! project didn't get created
                        $response['message'] = "Project creation failed";
                        echo json_encode($response);
                    }
                }
                break;
        }
    }

    function search_organizers($key = '')
    {
        $this->loadModel('Organizer');
        $organizers = $this->model->searchOrganizersWithPhoto($key);
        header("Content-Type: application/json");
        echo json_encode($organizers);
    }

    function upcoming_projects()
    {
        session_start();
        $this->loadModel('Project');
        $this->projects = $this->model->getUpcomingProjects($_SESSION['uid']);
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
        $this->projects = $this->model->getCompletedProjects($_SESSION['uid']);
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
        $uid = $_SESSION['uid'];
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
