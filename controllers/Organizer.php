<?php

class Organizer extends User
{
    function __construct()
    {
        parent::__construct();
        $this->role = 'organizer';
    }

    function test()
    {
        $this->loadModel('Project');
        $good = $this->model->setEvent(10, '2021-05-20 00:00:00');
        var_dump($good);
    }

    function index()
    {
        session_start();
        $uid = $_SESSION['uid'];
        $limit = 4;

        $this->loadModel('Project');

        // getting upcoming projects & images
        $this->upcoming_projects = $this->model->getUpcomingProjects($uid, $limit);
        foreach ($this->upcoming_projects as $project) {
            $pid = $project['P_ID'];
            $image = $this->model->getProjectImage($pid);
            $this->prImage[$pid] = $image ? $image[0]['Image'] : null;
        }

        // getting completed projects & images
        $this->completed_projects = $this->model->getCompletedProjects($uid, $limit);
        foreach ($this->completed_projects as $project) {
            $pid = $project['P_ID'];
            $image = $this->model->getProjectImage($pid);
            $this->prImage[$pid] = $image ? $image[0]['Image'] : null;
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
                    $this->model->beginTransaction();
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
                        // if project is a collaboration set notifications for collaborators
                        if ($partnership) {
                            $this->loadModel('Organizer');
                            $organizer_name = $this->model->getOrganizerByID($uid)['Name'];
                            $this->loadModel('Notification');
                            $message = "You have been invited to collaborate on a project named " . $pname . " by " . $organizer_name;
                            foreach ($collaborators as $collaborator) {
                                $this->model->setNotification($collaborator, $message, 'collab-req', $pid);
                            }
                        }
                        $this->model->commit();
                        header("Content-Type: application/json");
                        $response['message'] = "Project created successfully";
                        echo json_encode($response);
                    } else {
                        //! project didn't get created
                        $this->model->rollBack();
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

    function collab_req($action, $pid, $uid)
    {
        if ($action == 'accept') {
            // if collaborator request is accepted
            $this->loadModel('Project');
            $collab_action = $this->model->updateCollaborator($pid, $uid, 'accepted');
        } else if ($action == 'reject') {
            // if collaborator request is rejected
            $this->loadModel('Project');
            $collab_action = $this->model->deleteCollaborator($pid, $uid);
        }

        // send notification to the organizer
        $this->loadModel('Organizer');
        $collaborator = $this->model->getOrganizer($uid);
        $htis->loadModel('Project');
        $project = $this->model->getProject($pid);
        $organizer_id = $project['U_ID'];

        if ($action == 'accept') {
            $message = "Your collaboration request for the project " . $project['Name'] . " has been accepted by " . $collaborator['Name'];
        } else if ($action == 'reject') {
            $message = "Your collaboration request for the project " . $project['Name'] . " has been rejected by " . $collaborator['Name'];
        }

        $this->loadModel('Notification');
        $notification_set = $this->model->setNotification($organizer_id, $message);

        if ($collab_action && $notification_set) {
            header("Content-Type: application/json");
            echo json_encode(true);
        } else {
            header("Content-Type: application/json");
            echo json_encode(false);
        }
    }

    function upcoming_projects()
    {
        session_start();
        $this->loadModel('Project');
        $this->upcoming_projects = $this->model->getUpcomingProjects($_SESSION['uid']);
        foreach ($this->upcoming_projects as $project) {
            $pid = $project['P_ID'];
            $image = $this->model->getProjectImage($pid);
            $this->prImage[$pid] = $image ? $image[0]['Image'] : null;
        }

        $this->render('Organizer/UpcomingProjects');
    }


    function completed_projects()
    {
        session_start();
        $this->loadModel('Project');
        $this->completed_projects = $this->model->getCompletedProjects($_SESSION['uid']);
        foreach ($this->completed_projects as $project) {
            $pid = $project['P_ID'];
            $image = $this->model->getProjectImage($pid);
            $this->prImage[$pid] = $image ? $image[0]['Image'] : null;
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


                // send notifications to volunteers
                $this->loadModel('Volunteer');
                $volunteers = $this->model->getJoinedVolunteersOfProject($pid);
                $this->loadModel('Notification');
                foreach ($volunteers as $volunteer) {
                    $message = "The project " . $this->model->getProject($pid)['Name'] . " has been canceled by the organizer.\nReason:\n" . $cancelReason;
                    $this->model->setNotification($volunteer['U_ID'], $message);
                }
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
        session_start();
        $uid = $_SESSION['uid'];
        $this->loadModel('ProjectIdea');
        $this->pr_ideas = $this->model->getProjectIdeas();

        foreach ($this->pr_ideas as $idea) {
            $pi_id = $idea['PI_ID'];
            $this->pr_idea_images[$pi_id] = $this->model->getPI_Images($pi_id)[0]['Image'];
        }

        $this->replied_ideas = $this->model->getRepliedIdeas($uid);

        $this->loadModel('Volunteer');
        foreach ($this->pr_ideas as $idea) {
            $pi_id = $idea['PI_ID'];
            $vol_id = $idea['U_ID'];
            $volunteer = $this->model->getVolunteerById($vol_id);
            $this->volunteer[$pi_id] = $volunteer;
        }


        foreach ($this->replied_ideas as $replied_idea) {
            $replied_pi_id = $replied_idea['PI_ID'];
            foreach ($this->pr_ideas as $key => $idea) {
                $pr_pi_id = $idea['PI_ID'];
                if ($replied_pi_id == $pr_pi_id) {
                    unset($this->pr_ideas[$key]);
                    break;
                }
            }
        }

        $this->render('Organizer/Requests');
    }

    function view_pr_idea($pi_id, $reply = null)
    {
        session_start();
        $uid = $_SESSION['uid'];
        $this->loadModel('ProjectIdea');
        $this->pr_idea = $this->model->getPrIdeaByID($pi_id);
        $this->pr_idea_images = $this->model->getPI_Images($pi_id);

        for ($i = 0; $i < count($this->pr_idea_images); $i++) {
            $this->pr_idea_images[$i] = $this->pr_idea_images[$i]['Image'];
        }

        if ($reply == 'replied') {
            $this->pr_idea['reply'] = $this->model->getReply($pi_id, $uid)['Reply'];
        }

        $this->loadModel('Volunteer');
        $this->volunteer = $this->model->getVolunteerById($this->pr_idea['U_ID']);
        $this->render('Organizer/ViewProjectIdea');
    }

    function reply_to_pr_idea($piid, $vol_uid)
    {
        if (isset($_POST['reply-submit'])) {
            session_start();
            $uid = $_SESSION['uid'];
            $this->loadModel('Organizer');
            $uname = $this->model->getOrganizerById($uid)['Name'];
            $reply = $_POST['reply'];

            $this->loadModel('ProjectIdea');
            if ($this->model->replyToPrIdea($piid, $uid, $reply)) {
                // send notification to volunteer
                $this->loadModel('Notification');
                $message = "Your project idea has been replied by a organizer.\n" . $uname . ":\n" . $reply;
                $this->model->setNotification($vol_uid, $message);

                header('Location: ' . BASE_URL . 'organizer/requests');
            } else {
                echo 'Error occured';
            }
        }
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

        $this->volunteer_form = $this->model->getVolunteerForm($pid);

        $this->loadModel('Volunteer');
        $this->joined_volunteers = $this->model->getJoinedVolunteersOfProject($pid);

        //if project is a collaboration project
        if ($this->project['Collab'] == 1) {
            $this->loadModel('Organizer');
            $this->collaborators = $this->model->getCollaboratorsOfProject($pid);
            session_start();
            if ($this->project['U_ID'] != $_SESSION['uid']) {
                $this->pr_creator = $this->model->getOrganizerById($this->project['U_ID']);
            }
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

    function edit_project($pid)
    {
        if (isset($_POST['edit-project'])) {
            $pname = $_POST['pr-name'];
            $venue = $_POST['pr-venue'];
            $volunteers = $_POST['pr-volunteers'];
            $description = $_POST['pr-description'];
            $this->loadModel('Project');
            $status = $this->project = $this->model->updateProject($pid, $pname, $venue, $volunteers, $description);

            if ($status) {
                header('Location:' . BASE_URL . 'organizer/view_upcoming_project/' . $pid);
            } else {
                echo "Error";
            }
        }
    }

    function leave_project($pid, $uid)
    {
        session_start();
        $uid = $_SESSION['uid'];
        $this->loadModel('Project');
        $creator_id = $this->model->getProject($pid)['U_ID'];
        // deleting collaborator from project
        $collab_deleted = $this->model->deleteCollaborator($pid, $uid);

        $this->loadModel('Organizer');
        $collab_name = $this->model->getOrganizerById($uid)['Name'];

        // send notification to creator
        $this->loadModel('Notification');
        $message = $collab_name . " has left your project.";

        $set_notification = $this->model->setNotification($creator_id, $message, 'leave-project', $pid);

        if ($collab_deleted && $set_notification) {
            echo json_encode(['status' => 'success']);
        } else {
            echo "Error";
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

    function add_to_blog($pid)
    {
        if (isset($_POST['add-to-blog'])) {
            session_start();
            $uid = $_SESSION['uid'];
            $description = $_POST['description'];

            $this->loadModel('Project');
            $project = $this->model->getProject($pid);

            $blogs_of_organizers = [$uid];

            if ($project['Collab'] == 1) {
                $this->loadModel('Organizer');
                $collaborators = $this->model->getCollaboratorsOfProject($pid, 'accepted');
                foreach ($collaborators as $collaborator) {
                    array_push($blogs_of_organizers, $collaborator['U_ID']);
                }
            }

            $this->loadModel('Blog');
            $this->model->beginTransaction();
            try {
                $this->model->setPost($pid, $description);

                $targetDir = "public/images/post_images/";
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', '');

                if (!empty($_FILES["files"]["name"])) {
                    $total = count($_FILES['files']['name']);
                    for ($i = 0; $i < $total; $i++) {
                        $newFileName = uniqid() . '-' . $_FILES['files']['name'][$i];
                        $targetFilePath = $targetDir . $newFileName;
                        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                        if (in_array(strtolower($fileType), $allowTypes)) {
                            if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $targetFilePath)) {

                                if ($this->model->setPostImage($pid, $newFileName)) {
                                    $response['images'][] = "The file " . $newFileName . " has been uploaded successfully.";
                                } else {
                                    $response['error'][] = "File upload failed, please try again." . $newFileName;
                                }
                            }
                        } else {
                            $response['error'][] = 'Only JPG, JPEG, PNG & GIF files are allowed to upload.';
                        }
                    }
                }

                if (isset($response['error'])) {
                    throw new Exception(json_encode($response['error']));
                }

                foreach ($blogs_of_organizers as $organizer) {
                    $this->model->setPostToBlog($organizer, $pid);
                }

                // TODO: set project status to blogged

                // send notification to all collaborators
                $this->loadModel('Notification');
                $message = "Your collaborate project named ".$project['Name']." has been added to blog.";
                foreach ($collaborators as $collaborator) {
                    $this->model->setNotification($collaborator['U_ID'], $message, 'add-to-blog', $pid);
                }

                $this->model->commit();
            } catch (Exception $e) {
                $this->model->rollback();
                echo $e->getMessage();
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
        return array_filter($sponsors, function ($sponsor) use ($package) {
            return $sponsor["Package"] == $package;
        });
    }
}
