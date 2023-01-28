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
            $this->render('sponsor/publish_advertisement');
        }

        function profile()
        {
            $this->render('sponsor/profile');
        }
        
    }
?>