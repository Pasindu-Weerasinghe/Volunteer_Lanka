<?php
class Admin extends User
{
    function __construct()
    {
        parent::__construct();
        $this->role = 'admin';
    }
    function index()
    {
        //view advertisement req in home page
        $this->loadModel('Advertisement');
        $this->ads = $this->model->getAdvertisementRequests();
        foreach ($this->ads as $ad) {
            $image = $this->model->getAdImage($ad['AD_ID']);
            $this->adimages[$ad['AD_ID']] = $image['Image'];
        }
        $this->loadModel('Sponsor');
        foreach ($this->ads as $ad) {
            $adid = $ad['AD_ID'];
            $sponsor_id = $ad['Sponsor'];
            $sponsor_name = $this->model->getSponsorbyAdId($sponsor_id);
            $this->ad_sponsor_name[$adid] = $sponsor_name['Name'];
        }
        //view compliants in home pagd
        $this->loadModel('Complaints');
        $this->complaints  = $this->model->getComplaints();
        foreach($this->complaints as $complaint){
            $complain_id = $complaint['C_ID'];
            $complain_about = $complaint['About'];
            $complain = $complaint['Complain'];
            $c_uid = $complaint['U_ID'];
        }
        $this->render('Admin/Home');
    }
    function advertiesment_requests()
    {
        $this->loadModel('Advertisement');
        $this->ads = $this->model->getAdvertisementRequests();
        foreach ($this->ads as $ad) {
            $image = $this->model->getAdImage($ad['AD_ID']);
            $this->adimages[$ad['AD_ID']] = $image['Image'];
        }
        $this->loadModel('Sponsor');
        foreach ($this->ads as $ad) {
            $adid = $ad['AD_ID'];
            $sponsor_id = $ad['Sponsor'];
            $sponsor_name = $this->model->getSponsorbyAdId($sponsor_id);
            $this->ad_sponsor_name[$adid] = $sponsor_name['Name'];
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
