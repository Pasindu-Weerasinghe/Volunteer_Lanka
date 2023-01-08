<?php

class Volunteer extends User
{
    function index()
    {
        $this->render('Volunteer/Home');
    }

}