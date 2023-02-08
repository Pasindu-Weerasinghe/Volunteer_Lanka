<?php

class User extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->role = null;
    }

    function calendar()
    {
        switch ($this->role) {
            case 'organizer':
                $this->render('Calendar');
                break;
            case 'sponsor':
                $this->render('Calendar');
                break;
            default:
                break;
        }
    }

    function search_user()
    {
        switch ($this->role) {
            case 'organizer':
                $this->render('SearchUser');
                break;

            default:
                break;
        }
    }

    function complain()
    {
        switch ($this->role) {
            case 'organizer':
                $this->render('Complain');
                break;
            case 'sponsor':
                $this->render('Complain');
                break;

            default:
                break;
        }
    }

    function view_project($pid)
    {
        switch ($this->role) {
            case 'organizer':
                $this->render('Organizer/ViewUpcomingProject');
                break;

            default:
                break;
        }
    }

    function ChangeProfilePsw() 
    {
        if(isset($_POST['submit']))
        {
            session_start();
            $uid=$_SESSION['uid'];
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
                    $this->error = "password did not match";
                }
            } else {
                $this->error = "OLD PW is not match";
            }
        }
        $this->render('Sponsor/changePasswordProfile');
    }
}
