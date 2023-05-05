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

                    session_start();
                    $pname = $_POST['project-name'];
                    $date = $_POST['date'];
                    $time = $_POST['time'];
                    $venue = $_POST['venue'];
                    $description = $_POST['description'];
                    $no_of_volunteers = $_POST['no-of-members'];
                    $partnership = $_POST['partnership'] == 'collaborate' ? 1 : 0;
                    $sponsorship = $_POST['sponsorship'] == 'publish-sn' ? 1 : 0;
                    $category = $_POST['category'];
                    $uid = $_SESSION['uid'];

                    $this->loadModel('Project');
                    $this->model->startTransaction();
                    // creating the project
                    if ($pid = $this->model->setProject($pname, $date, $time, $venue, $description, $no_of_volunteers, $category, $sponsorship, $partnership, $uid)) {
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
                            $totalAmount = $_POST['total-amount'];
                            $silverAmount = $_POST['silver-amount'];
                            $goldAmount = $_POST['gold-amount'];
                            $platinumAmount = $_POST['platinum-amount'];

                            $this->model->setSponsorNotice($pid, $uid, $totalAmount);
                            $this->model->setSNPackage($pid, 'silver', $silverAmount);
                            $this->model->setSNPackage($pid, 'gold', $goldAmount);
                            $this->model->setSNPackage($pid, 'platinum', $platinumAmount);
                        }

                        // if there are images to upload
                        $targetDir = "public/images/pi_images/";
                        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', '');

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
                        $this->model->commitTransaction();
                        header("Content-Type: application/json");
                        $response['message'] = "Project created successfully";
                        echo json_encode($response);
                    } else {
                        //! project didn't get created
                        $this->model->rollbackTransaction();
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

    function check_cancel_limit($uid)
    {
        $this->loadModel('Organizer');
        $canceledProjectCount = $this->model->canceledProjectCount($uid);
        // TODO: relevent limit

        $message = null;
        if ($canceledProjectCount >= 5) {
            $message['limit'] = 'reached';
            echo json_encode($message);
        } else {
            $message['limit'] = 'not-reached';
            echo json_encode($message);
        }
    }

    function cancel_project($pid)
    {
        if (session_status() == PHP_SESSION_NONE) {
            // if session is not started, start the session
            session_start();
        }

        if (isset($_POST['cancel-project'])) {
            $uid = $_SESSION['uid'];
            $cancelReason = $_POST['cancel-reason'];
            $this->loadModel('Project');
            if ($this->model->cancelProject($pid, $uid, $cancelReason)) {
                $message['status'] = 'success';
                // TODO: sponsor notice cancel
                // TODO: send notifications to volunteers
                echo json_encode($message);
            } else {
                $message['status'] = 'failed';
                echo json_encode($message);
            }
        } else {
            $message['status'] = 'error';
            echo json_encode($message);
        }
    }

    function postpone_project($pid)
    {
        if (session_status() == PHP_SESSION_NONE) {
            // if session is not started, start the session
            session_start();
        }

        if (isset($_POST['postpone-project'])) {
            $uid = $_SESSION['uid'];
            $postponeReason = $_POST['postpone-reason'];
            $postponeDate = $_POST['postpone-date'];
            $postponeTime = $_POST['postpone-time'];
            $this->loadModel('Project');
            if ($this->model->postponeProject($pid, $uid, $postponeReason, $postponeDate, $postponeTime)) {
                $message['status'] = 'success';
            } else {
                $message['status'] = 'failed';
            }
            echo json_encode($message);
        } else {
            $message['status'] = 'error';
            echo json_encode($message);
        }
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

    function view_upcoming_project($pid)
    {
        $this->loadModel('Project');
        $this->project = $this->model->getProject($pid);
        $this->images = $this->model->getProjectImage($pid);
        for ($i = 0; $i < count($this->images); $i++) {
            $this->images[$i] = $this->images[$i]['Image'];
        }

        $this->loadModel('Volunteer');
        $this->volunteers = $this->model->getJoinedVolunteersOfProject($pid);

        //if project is a collaboration project
        if ($this->project['Collab'] == 1) {
            $this->loadModel('Organizer');
            $this->collaborators = $this->model->getCollaboratorsOfProject($pid);
        }

        // if project is a sponsored project
        if ($this->project['Sponsor'] == 1) {
            $this->loadModel('SponsorNotice');
            // TODO: get sn amount
            $this->sn_amount = 100000;
            // TODO: get package ranges
            $this->package_range = ["silver" => 10000, "gold" => 20000, "platinum" => 30000];

            $this->loadModel('Sponsor');
            $sponsors = $this->model->getSponsorsOfProject($pid);

            // get sponsoered amount
            $this->sponsored_amount = $this->_getSponsoredAmount($sponsors);

            $this->silver_sponsors = $this->_filterSponsorsBYPackage($sponsors, "silver");
            $this->gold_sponsors = $this->_filterSponsorsBYPackage($sponsors, "gold");
            $this->platinum_sponsors = $this->_filterSponsorsBYPackage($sponsors, "platinum");
            $this->other_sponsors = $this->_filterSponsorsBYPackage($sponsors, "other");
        }
        $this->render('Organizer/ViewUpcomingProject');
    }

    function edit_project($pid){
        if(isset($_POST['edit-project'])) {
            $pname = $_POST['pr-name'];
            $venue = $_POST['pr-venue'];
            $volunteers = $_POST['pr-volunteers'];
            $description = $_POST['pr-description'];
            $this->loadModel('Project');
            $status = $this->project = $this->model->updateProject($pid, $pname, $venue, $volunteers, $description);

            if($status) {
                header('Location:' . BASE_URL . 'organizer/view_upcoming_project/' . $pid);
            } else {
                echo "Error";
            }
        }
    }

    function view_completed_project($pid)
    {
        $this->loadModel('Project');
        $this->project = $this->model->getProject($pid);
        $this->images = $this->model->getProjectImage($pid);
        for ($i = 0; $i < count($this->images); $i++) {
            $this->images[$i] = $this->images[$i]['Image'];
        }
        $this->render('Organizer/ViewCompletedProject');
    }

    function add_to_blog($pid) {
        $this->loadModel('Blog');
        $this->model->addProjectToBlog($pid, $_SESSION['uid'], );

        $targetDir = "public/images/post_images/";
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', '');

        if (!empty($_FILES["files"]["name"])) {
            $total = count($_FILES['files']['name']);
            for ($i = 0; $i < $total; $i++) {
                $newFileName = uniqid() . '-' . $_FILES['files']['name'][$i];
                $targetFilePath = $targetDir . $newFileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                if (in_array($fileType, $allowTypes)) {
                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $targetFilePath)) {

                        if ($this->model->setPostImage($pid, $newFileName)) {
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
    }


    private function _getSponsoredAmount($sponsors)
    {
        $amount = 0;
        foreach ($sponsors as $sponsor) {
            $amount += $sponsor["Amount"];
        }
        return $amount;
    }
    private function _filterSponsorsBYPackage($sponsors, $package)
    {
        return array_filter($sponsors, function($sponsor) use ($package) {
            return $sponsor["Package"] == $package;
        });
    }
}
