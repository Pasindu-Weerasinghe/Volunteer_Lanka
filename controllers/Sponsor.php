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
            $this->packages = $this->model->getAmounts($pid);

            $silverPrice = 0;
            $goldPrice = 0;
            $platinumPrice = 0;

            foreach ($this->packages as $package) {
                if ($package['Package'] == "Silver") {
                    $silverPrice = $package['Amount'];
                } elseif ($package['Package'] == "Gold") {
                    $goldPrice = $package['Amount'];
                } elseif ($package['Package'] == "Platinum") {
                    $platinumPrice = $package['Amount'];
                }
            }

            $this->silverPrice = $silverPrice;
            $this->goldPrice = $goldPrice;
            $this->platinumPrice = $platinumPrice;

            $this->render('Sponsor/view_sponsor_notices');
        } else if ($action == 'confirm') {

            if(isset($_POST['confirm']))
            {
                session_start();
                $uid=$_SESSION['uid'];
                $package=$_POST['package'];
                $amount=0;
                $this->loadModel('SponsorProject');
                switch($package)
                {
                    case 'silver':
                        $amount=$_POST['silverPrice'];
                        break;

                    case 'gold':
                        $amount=$_POST['goldPrice'];
                        break;
                    
                    case 'platinum':
                        $amount=$_POST['platinumPrice'];
                        break;

                    case 'other':
                        $amount=$_POST['otherAmount'];
                        break;
                }
                $this->model->saveSponsorPackage($uid, $pid, $amount, $package);
            }

            header('Location: ' . BASE_URL . 'Sponsor/view_sponsor_notice/'.$pid);
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

    public function changeProfilePic()
    {
        session_start();
        $uid = $_SESSION['uid'];
        $this->loadModel('Sponsor');
        $this->profile = $this->model->getUserData($uid);
        $this->user = $this->model->getSponsorData($uid);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $target_dir = "public/images/";
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
                header('Location: ' . BASE_URL . 'Sponsor/Profile');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            $this->render('Sponsor/profile_sponsor');
        }
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
