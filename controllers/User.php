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
}
