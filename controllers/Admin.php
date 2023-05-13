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
            $sponsor_name = $this->model->getSponsorbyId($sponsor_id);
            $this->ad_sponsor_name[$adid] = $sponsor_name['Name'];
        }
        //view compliants in home pagd
        $this->loadModel('Complaints');
        $this->complaints  = $this->model->getComplaintDetails();
        foreach ($this->complaints as $complaint) {
            $this->complain_id = $complaint['C_ID'];
            $this->complain_about[$complaint['C_ID']] = $complaint['About'];
            $name = $this->model->getUserDatatoComplain($complaint['U_ID'], $complaint['Role']);
            $this->complain_userName[$complaint['C_ID']] = $name['Name'];
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
            $sponsor_name = $this->model->getSponsorbyId($sponsor_id);
            $this->ad_sponsor_name[$adid] = $sponsor_name['Name'];
        }

        $this->render('Admin/advertiesment_requests');
    }
    function view_ad_req($adid)
    {
        $this->loadModel('Advertisement');
        $this->ad = $this->model->getAdvertisementRequest($adid);
        $this->image = $this->model->getAdImage($adid)['Image'];
        $this->loadModel('Sponsor');
        $this->sponsor_name = $this->model->getSponsorbyId($this->ad['Sponsor'])['Name'];


        $this->render('Admin/view_ad_req');
    }
    function accept_ad_req($adid)
    {
        $this->loadModel('Advertisement');
        $this->ad = $this->model->accept_ad_req($adid);
        header('Location: ' . BASE_URL . 'admin');
    }
    function setAdReason($adid)
    {
        $reason = $_POST['reason'];
        $this->loadModel('Admin');
        $this->model->setAdReason($adid, $reason);
        header('Location: ' . BASE_URL . 'Admin/advertiesment_requests');
    }
    function complaints()
    {
        $this->loadModel('Complaints');
        $this->complaints  = $this->model->getComplaintDetails();
        foreach ($this->complaints as $complaint) {
            $this->complain_id = $complaint['C_ID'];
            $this->complain_about[$complaint['C_ID']] = $complaint['About'];
            $this->complain[$complaint['C_ID']] = $complaint['Complain'];
            $name = $this->model->getUserDatatoComplain($complaint['U_ID'], $complaint['Role']);
            $this->complain_userName[$complaint['C_ID']] = $name['Name'];
        }
        $this->render('Admin/complaints');
    }
    function view_complaints($cid)
    {
        $this->loadModel('Complaints');
        $this->complaint = $this->model->getComplaint($cid);
        $uid = $this->complaint['U_ID'];
        $role = $this->model->getUserRolebyId($uid);
        $this->name = $this->model->getUserDatatoComplain($uid, $role['Role']);
        $this->render('Admin/view_complaints');
    }
    function setComplainResponse($cid)
    {
        $response = $_POST['response'];
        $this->loadModel('Admin');
        echo $response;
        echo $cid;
        $this->model->setComplainResponse($cid, $response);
        header('Location: ' . BASE_URL . 'Admin/complaints');
    }
    function create_acc_auth()
    {
        if (isset($_POST['create'])) {
            $role = $_POST['role'];
            $email = $_POST['email'];
            $psw = $_POST['psw'];
            $confrim_psw = $_POST['confirm-psw'];
            $name = $_POST['name'];

            if ($psw == $confrim_psw) {

                // if password and confirm password are matching
                $this->loadModel('User');
                if (!$this->model->checkEmailExist($email)) {
                    // if email does not exist
                    $hash_psw = password_hash($psw, PASSWORD_BCRYPT);
                    if ($this->model->setUser($email, $hash_psw, $role)) {

                        $uid = $this->model->getUserId($email);
                        $this->loadModel('Admin');
                        $this->model->setAdmin($uid, $name);
                    }

                    header('Location: ' . BASE_URL . 'Admin/create_new_admin_acc');
                } else {
                    // if email exists
                    $this->error = 'email exists';
                    $this->render('Admin/create_new_admin_acc');
                    // echo $this->error;
                }
            } else {
                // if password and confirm password are not matching
                $this->error = 'password does not match';
                $this->render('Admin/create_new_admin_acc');
            }
        }
    }
    function create_new_admin_acc()
    {
        $this->error = null;
        session_start();
        if ($_SESSION['uid'] == 1) {
            $this->render('Admin/create_new_admin_acc');
        }
    }
    function view_payments()
    {
        $this->loadModel('Project');
        $this->paymentDetails = $this->model->getAllProjectfeeDetails();
        $this->render('Admin/view_payments');
    }
    function searchPayment()
    {
        $searchTerm = $_POST['searchTerm'];
        $this->loadModel('Project');
        $paymentDetails = $this->model->searchPayement($searchTerm);
        $output = "";
        if (count($paymentDetails)) {
            foreach ($paymentDetails as $paymentDetail) {
                $output .= '<tr>
               <td>' . $paymentDetail['Name'] . '</td>
               <td>' . $paymentDetail['Amount'] . '</td>
               <td>' . $paymentDetail['Date'] . '</td>
               <td>' . $paymentDetail['PaymentType'] . '</td>
                </tr>';
            }
        }
        echo $output;
    }
    function delete_user_acc()
    {
        session_start();
        $uid = $_SESSION['uid'];
        $this->loadModel('User');
        $this->userDetails = $this->model->getAllUserDetails($uid);
        $this->render('Admin/delete_user_acc');
    }
    function searchUser()
    {
        session_start();
        $uid = $_SESSION['uid'];
        $searchTerm = $_POST['searchTerm'];
        $this->loadModel('User');
        $userDetails = $this->model->searchUser($uid, $searchTerm);
        $output = "";
        if (count($userDetails) > 0) {
            foreach ($userDetails as $userDetail) {
                $url = BASE_URL . 'Admin/view' . ucfirst($userDetail['Role']) . 'Profile/' . $userDetail['U_ID'];
                $output .= '<tr onclick="window.location.href=\'' . $url . '\'">
               <td>' . $userDetail['Name'] . '</td>
               <td>' . ucfirst($userDetail['Role']) . '</td>
               <td>' . ucfirst($userDetail['Status']) . '</td>
                </tr>';
            }
        }

        echo $output;
    }
    function deleteUser($uid){
        $this->loadModel('Admin');
        $this->model->deleteUser($uid);
        header('Location: ' . BASE_URL . 'Admin/delete_user_acc');
    }
    function restrictUser($uid){
        $this->loadModel('Admin');
        $this->model->restrictUser($uid);
        header('Location: ' . BASE_URL . 'Admin/delete_user_acc');
    }
    function activeUser($uid){
        $this->loadModel('Admin');
        $this->model->activeUser($uid);
        header('Location: ' . BASE_URL . 'Admin/delete_user_acc');
    }
}
