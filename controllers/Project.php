<?php

class Project extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function view_project($pid, $role) {
        switch ($role) {
            case 'organizer':

                $this->render('Organizer/ViewProject');
                break;
            
            default:
                break;
        }
    }
}
