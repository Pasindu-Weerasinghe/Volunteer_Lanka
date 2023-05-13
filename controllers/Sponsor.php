<?php
class Sponsor extends User
{
    function __construct()
    {
        parent::__construct();
        $this->role = 'sponsor';
    }
    function index()
    {
        session_start();
        $uid = $_SESSION['uid'];
        $this->loadModel('SponsorNotice');
        $this->sponsor_notices = $this->model->getSponsorNotices();

        $this->sponsored_projects = $this->model->getSponsoredProjects($uid, 'active');

        foreach ($this->sponsored_projects as $item2) {
            foreach ($this->sponsor_notices as $key1 => $item1) {
                if ($item2['P_ID'] == $item1['P_ID']) {
                    unset($this->sponsor_notices[$key1]);
                    break;
                }
            }
        }

        $this->loadModel('Project');
        foreach ($this->sponsor_notices as $project) {
            $pid = $project['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }
        foreach ($this->sponsored_projects as $project) {
            $pid = $project['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }
        $this->render('Sponsor/Home');
    }



    function view_sponsor_notice($pid, $action = null)
    {
        $this->pid = $pid;

        if ($action == null) {
            $this->loadModel('Project');
            $this->projects = $this->model->getProject($pid);
            $this->prImage = $this->model->getProjectImage($pid);

            $uid = $this->projects['U_ID'];

            $this->loadModel('Organizer');
            $this->organizer = $this->model->getOrganizerByID($uid);
            $this->loadModel('SponsorNotice');
            $this->packages = $this->model->getSponsorPackage($pid, $uid);

            $this->budjet = $this->model->getSPAmount($pid);
            $this->totalAmount = $this->model->getTotalAmount($pid);

            $this->remainingAmount = $this->budjet['Amount'] - $this->totalAmount['totalAmount'];

            $this->packageAmount = $this->model->getPackageAmount($pid);


            $this->render('Sponsor/view_sponsor_notices');
        } else if ($action == 'confirm') {


            // User has not sponsored the project before
            if (isset($_POST['confirm'])) {
                session_start();
                $uid = $_SESSION['uid'];
                $this->loadModel('SponsorNotice');
                $package = $_POST['package-value'];
                $amount = $_POST['selectAmount'];
                $this->model->saveSponsorPackage($uid, $pid, $amount, $package);
                header('Location: '.BASE_URL.'sponsor');
            }

           
        }
    }


    function sponsored_projects()
    {
        session_start();
        $uid = $_SESSION['uid'];
        $this->loadModel('SponsorNotice');
        $this->sponsored_projects = $this->model->getSponsoredProjects($uid);

        $this->loadModel('Project');
        foreach ($this->sponsored_projects as $project) {
            $pid = $project['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }

        $this->render('Sponsor/sponsored_projects');
    }

    function publish_advertisement($pid)
    {
        $this->pid = $pid;
        $this->render('Sponsor/publish_advertisement');
    }

    function profile()
    {
        session_start();
        $uid = $_SESSION['uid'];
        $this->loadModel('Sponsor');
        $this->profile = $this->model->getUserData($uid);
        $this->user = $this->model->getSponsorData($uid);
        $this->sPackages = $this->model->getPackages($uid);
        $this->sAdvertisements = $this->model->getAdvertisements($uid);

        $this->loadModel('SponsorNotice');

        $this->cSponsored_projects = $this->model->getSponsoredProjects($uid, 'completed');

        $this->aSponsored_projects = $this->model->getSponsoredProjects($uid, 'active');


        $this->loadModel('Project');
        foreach ($this->cSponsored_projects as $project) {
            $pid = $project['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }
        foreach ($this->aSponsored_projects as $project) {
            $pid = $project['P_ID'];
            $this->prImage[$pid] = $this->model->getProjectImage($pid);
        }

        $this->loadModel('Sponsor');
        $this->sAmount = $this->model->getTotalAmount($uid);

        $this->render('Sponsor/profile_sponsor');
    }

    function profilepic()
    {
        session_start();
        $uid = $_SESSION['uid'];
        $this->loadModel('Sponsor');
        $this->profile = $this->model->getUserData($uid);
        $this->user = $this->model->getSponsorData($uid);
        $this->render('Sponsor/changeProfilepic');
    }

    function calendar()
    {
        $this->render('Calendar');
    }

    function view_sponsor_project($pid)
    {
        if (session_status() == PHP_SESSION_NONE) {
            // if session is not started, start the session
            session_start();
        }
        $uid = $_SESSION['uid'];
        $this->loadModel('Project');
        $this->project = $this->model->getProject($pid);
        $this->images = $this->model->getProjectImage($pid);
        $this->loadModel('Ad');
        $this->ad_published = !empty($this->model->getAdSponsor($pid, $uid));

        $this->loadModel('Sponsor');
        $this->user = $this->model->getSponsorData($uid);

        $this->loadModel('SponsorNotice');

        $this->sPackage = $this->model->getSponsorPackage($uid, $pid);

        $this->render('Sponsor/view_projects_sponsor');
    }

    function uploadAdvertisement($pid)
    {
        if (session_status() == PHP_SESSION_NONE) {
            // if session is not started, start the session
            session_start();
        }
        $description = $_POST['des'];
        $uid = $_SESSION['uid'];

        $this->loadModel('Ad');
        $this->model->beginTransaction();
        $this->model->setAd($description, $pid, $uid);

        $ad_id = $this->model->getAdId($uid, $description);

        $targetDir = "public/images/ad_images/";
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (!empty($_FILES["file"]["name"])) {

            $total = count($_FILES['file']['name']);
            for ($i = 0; $i < $total; $i++) {
                $fileName = $_FILES['file']['name'][$i];
                $targetFilePath = $targetDir . $fileName;
                $fileType =  strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

                if (in_array($fileType, $allowTypes)) {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $targetFilePath)) {
                        $this->model->setAdImage($ad_id, $fileName);
                        $this->model->commit();
                        $message['success'] = true;
                        echo json_encode($message);
                    }
                } else {
                    $this->model->rollBack();
                    $message['success'] = false;
                    echo json_encode($message);
                }
            }
        }
    }

    
}
