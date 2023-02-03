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

            case 'volunteer':
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

            case 'volunteer':
                $this->render('SearchUser');
                break;

            default:
                break;
        }
    }

    function complain()
    {
        $this->render('Complain');
    }

    function setComplain()
    {
        session_start();
        $about = $_POST['about'];
        $des = $_POST['des'];
        $uid = $_SESSION['uid'];

        $this->loadModel('User');
        if($this->model->setComplain($about, $des, $uid)) {
            // header('Location: ' .BASE_URL. 'volunteer/complain');
            echo '<script>alert("Complaint sent to admin")</script>';
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
}
