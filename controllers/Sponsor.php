<?php
class Sponsor extends User
{
    function index()
    {
        $this->loadModel('Project');
        $this->projects = $this->model->getSponsorProjects();

        foreach ($this->projects as $project){
            $pid = $project['P_ID'];
            $this->loadModel('SponsorNotice');
            $this->amounts[$pid] = $this->model->getAmount($pid)['Amount'];
        }
        $this->render('Sponsor/Home');
    }

    function sponsored_projects()
    {
        $this->loadModel('project');
        $this->projects = $this->model->getSponsorProjects();

        foreach ($this->projects as $project){
            $pid = $project['P_ID'];
            $this->loadModel('SponsorNotice');
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

    function view_sponsor_notice($pid)
    {
        
        $this->render('Sponsor/view_sponsor_notices');
    }
}
