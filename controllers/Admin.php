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
        $this->loadModel('Advertisement');
        $this->ads=$this->model->getAdvertisementRequests();
        foreach($this->ads as $ad){
            $image=$this->model->getAdImage($ad['AD_ID']);
            $this->adimages[$ad['AD_ID']]=$image['Image'];
        }
        $this->loadModel('Sponsor');
        foreach($this->ads as $ad){
            $adid = $ad['AD_ID'];
            $sponsor_id = $ad['Sponsor'];
            $sponsor_name=$this->model->getSponsorbyAdId($adid);
            $this->ad_sponsor_name[$adid]=$sponsor_name['Name'];
        }

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