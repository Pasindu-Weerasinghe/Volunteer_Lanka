<?php
class Admin extends User{
    function __construct()
    {
        parent::__construct();
        $this->role='admin';
    }
    function index()
    {
        $this->render('Admin/Home');
    }
    function advertiesment_requests()
    {
        $this->render('Admin/advertiesment_requests');
    }
    function complaints()
    {
        $this->render('Admin/complaints');
    }
    function create_new_admin_acc()
    {
        $this->render('Admin/create_new_admin_acc');
    }
    function view_payments()
    {
        $this->render('Admin/view_payments');
    }
    function delete_user_acc()
    {
        $this->render('Admin/delete_user_acc');
    }
    
}