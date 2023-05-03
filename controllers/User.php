<?php

class User extends Controller
{
    private $role;

    function __construct()
    {
        parent::__construct();
        $this->role = null;
    }

    function calendar()
    {
        $this->render('Calendar');
        //        switch ($this->role) {
        //            case 'organizer':
        //                $this->render('Calendar');
        //                break;
        //            case 'sponsor':
        //                $this->render('Calendar');
        //                break;
        //            case 'volunteer':
        //                $this->render('Calendar');
        //                break;
        //            default:
        //                break;
        //        }
    }

    function search_user()
    {
        $this->render('Search_user');
    }

    function complain()
    {
        if ($this->role != 'admin') {
            $this->render('Complain');
        }
    }

    function setComplain()
    {
        session_start();
        $about = $_POST['about'];
        $des = $_POST['des'];
        $uid = $_SESSION['uid'];

        $this->loadModel('User');
        if ($this->model->setComplain($about, $des, $uid)) {
            echo "<script>
                    alert('Complaint sent to admin');
                    location.href='" . BASE_URL . $this->role . "/complain';
                  </script>";
        }
    }

    function ChangeProfilePsw()
    {
        if (isset($_POST['submit'])) {
            session_start();
            $uid = $_SESSION['uid'];
            $this->loadModel('User');
            $cu_pw = $this->model->getCurrentPsw($uid)['Password'];
            $password = $_POST['current'];
            $new = $_POST['new'];
            $confirm = $_POST['confirm'];
            $verify = password_verify($password, $cu_pw);

            if ($verify) {
                if ($new == $confirm) {
                    $new1 = password_hash($new, PASSWORD_BCRYPT);
                    $this->model->changeUserPsw($uid, $new1);
                    $this->error = "Password Updated Successfully";
                } else {
                    $this->error = "Passwords did not match";
                }
            } else {
                $this->error = "Existing password is incorrect";
            }
        }
        $this->render('Sponsor/changePasswordProfile');
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
                header('Location: ' . BASE_URL . 'Sponsor/profile');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            //$this->render('Sponsor/profile_sponsor');
            $this->render('Sponsor/changeProfile');
        }
    }

    public function updateProfile()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            $name = $_POST['uname'];
            $contact = $_POST['cNumber'];
            $address = $_POST['address'];
            $uid= $_POST['uid'];

            $this->loadModel('User');
            $this->model->updateUserProfile($name, $contact, $address, $uid);

            // Redirect to profile page
            //$this->view->render('sponsor/profile_sponsor');
            header('Location: ' . BASE_URL . 'Sponsor/profile');
        } else {
            // Render the view page
            $this->view->render('sponsor/profile_sponsor');
        }
    }
}
