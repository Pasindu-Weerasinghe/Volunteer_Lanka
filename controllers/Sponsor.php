<?php
class Sponsor extends User
{
    function index()
    {
        $this->render('Sponsor/home');
    }

    function sponsored_projects()
    {
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

    function view_sponsor_notices()
    {
        $this->render('Sponsor/view_sponsor_notices');
    }
}
