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
        $this->loadModel('Project');
        $this->projects = $this->model->getSponsorProjects();

        foreach ($this->projects as $project) {
            $pid = $project['P_ID'];
            $this->prImages[$pid] = $this->model->getProjectImage($pid);
            $this->prices[$pid] = $this->model->getPrice($pid);
        }
        $this->render('Sponsor/Home');
    }

    function view_sponsor_notice($pid, $action = null)
    {
        $this->pid = $pid;

        if ($action == null) {
            $this->loadModel('Project');
            $this->projects = $this->model->getProject($pid);
            $uid = $this->projects['U_ID'];
            $this->organizer = $this->model->getOrganizer($uid);
            $this->packages = $this->model->getAmounts($pid,$uid);


            $this->render('Sponsor/view_sponsor_notices');
        } else if ($action == 'confirm') {

            session_start();
            $uid = $_SESSION['uid'];

            // Check if the user has already sponsored the project
            $this->loadModel('SponsorProject');
            $sponsorPackage = $this->model->getSponsorPackage($uid, $pid);

            // if (empty($sponsorPackage)) {
            //     echo "<script>alert('Please select your sponsor package.'); window.location.href='" . BASE_URL . "Sponsor/view_sponsor_notice/$pid';</script>";
            // }
            if (!empty($sponsorPackage)) {
                // User has already sponsored the project
                echo "<script>alert('You cannot add another sponsor package because you have already selected a package.'); window.location.href='" . BASE_URL . "Sponsor/index';</script>";
            }  else {
                // User has not sponsored the project before
                if (isset($_POST['confirm'])) {
                    $amount = $_POST['selectAmount'];
                        if ($amount>=10000){
                            $package="Platinum";
                        }
                        else if($amount>=7500){
                            $package="Gold";
                        }
                        else if ($amount>=5000){
                            #package="Silver";
                        }
                        else{
                            $package="Other";
                        }
                    }
                    $this->model->saveSponsorPackage($uid, $pid, $amount, $package);
                }

                echo "<script>alert('Succesfully added your sponsor package.');window.location.href='" . BASE_URL . "Sponsor/index';</script>";
            }
        }
    
    
    function sponsored_projects()
    {
        $this->loadModel('project');
        $this->projects = $this->model->getSponsorProjects();

        foreach ($this->projects as $project) {
            $pid = $project['P_ID'];
            $this->prImages[$pid] = $this->model->getProjectImage($pid);
            $this->amounts[$pid] = $this->model->getSPAmount($pid)['Amount'];
        }



        $this->render('Sponsor/sponsored_projects');
    }

    function publish_advertisement()
    {
        $this->render('Sponsor/publish_advertisement');
    }

    function profile()
    {
        session_start();
        $uid = $_SESSION['uid'];
        $this->loadModel('Sponsor');
        $this->profile = $this->model->getUserData($uid);
        $this->user = $this->model->getSponsorData($uid);
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
        $this->loadModel('project');
        $this->project = $this->model->getProject($pid);
        $this->images = $this->model->getProjectImage($pid);
        $this->render('Sponsor/view_projects_sponsor');
    }

    function uploadAdvertisement()
    {
        session_start();
        $description = $_POST['des'];
        $uid = $_SESSION['uid'];

        $this->loadModel('Ad');
        $this->model->setAd($description, $uid);

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
                    }
                } else {
                    echo "<script>alert('Sorry! This file cannot be uploded');location.href='http://localhost/Volunteer_Lanka/sponsor/publish_advertisement';</script>";
                }
            }
        }
    }
}
