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
            case 'sponsor':
                $this->render('Calendar');
                break;
            case 'volunteer':
                $this->render('Calendar');
                break;
            default:
                break;
        }
    }

    function search_user()
    {
        $this->render('Search_user');
    }

    function complain()
    {
        if ($this->role != 'admin') {
            $this->render('Complain');
        }
    }

    function setComplain()
    {
        session_start();
        $about = $_POST['about'];
        $des = $_POST['des'];
        $uid = $_SESSION['uid'];

        $this->loadModel('User');
        if ($this->model->setComplain($about, $des, $uid)) {
            // header('Location: ' .BASE_URL. 'volunteer/complain');
            echo "<script>alert('Complaint sent to admin');location.href='http://localhost/Volunteer_Lanka/" . $this->role . "/complain';</script>";
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

    function ChangeProfilePsw()
    {
        if (isset($_POST['submit'])) {
            session_start();
            $uid = $_SESSION['uid'];
            $this->loadModel('User');
            $cu_pw = $this->model->getCurrentPsw($uid)['Password'];
            $password = $_POST['current'];
            $new = $_POST['new'];
            $confirm = $_POST['confirm'];
            $verify = password_verify($password, $cu_pw);

            if ($verify) {
                if ($new == $confirm) {
                    $new1 = password_hash($new, PASSWORD_BCRYPT);
                    $this->model->changeUserPsw($uid, $new1);
                    $this->error = "Password Updated Successfully";
                } else {
                    $this->error = "password did not match";
                }
            } else {
                $this->error = "OLD PW is not match";
            }
        }
        $this->render('Sponsor/changePasswordProfile');
    }
    
    //chat
    function chat()
    {
        session_start();
        $role = $_SESSION['role'];
        $uid = $_SESSION['uid'];
        $this->loadModel('Chat');
        $this->user = $this->model->getUserDatatoChat($uid, $role);
        $this->render("includes/user");
    }
    function searchUser()
    {
        session_start();
        $uid = $_SESSION['uid'];
        $searchTerm = $_POST['searchTerm'];
        $this->loadModel('Chat');
        $usernames = $this->model->searchUserInChat($uid, $searchTerm);
        $output = "";
        if (count($usernames) > 0) {
            foreach ($usernames as $username) {
                $lastmessages = $this->model->getLastmsg($uid,$username['U_ID']);
                if(is_countable($lastmessages) && count($lastmessages) > 0){
                    $result = $lastmessages['msg'];
                }else{
                    $result = "No message available";
                }
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                if (isset($lastmessages['outgoing_msg_id'])) {
                    ($uid == $lastmessages['outgoing_msg_id']) ? $you = "You: " : $you = "";
                } else {
                    $you = "";
                }
                $output .= ' <a href="' . BASE_URL . $_SESSION['role'] . '/viewchat/' . $username['U_ID'] . '/' . $username['Role'] . '" >
                        <div class="content"> 
                            <img src="http://localhost/Volunteer_Lanka//public/images/profile.jpg" alt="">
                            <div class="details">
                            <span>' . $username['Name'] . '</span>
                            <p>' . $you . $msg . '</p>
                        </div>
                        </div>
                        
                    </a> ';
            }
        }
        echo $output;
    }
    function setAlluserstochat()
    {
        session_start();
        $uid = $_SESSION['uid'];
        $this->loadModel('Chat');
        $usernames = $this->model->getAlluserstochat($uid);
        $output = "";
        if (count($usernames) == 1) {
            $output .= "No users are available to chat";
        } else if (count($usernames) > 0) {
            foreach ($usernames as $username) {
                $lastmessages = $this->model->getLastmsg($uid,$username['U_ID']);
                if(is_countable($lastmessages) && count($lastmessages) > 0){
                    $result = $lastmessages['msg'];
                }else{
                    $result = "No message available";
                }
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                if (isset($lastmessages['outgoing_msg_id'])) {
                    ($uid == $lastmessages['outgoing_msg_id']) ? $you = "You: " : $you = "";
                } else {
                    $you = "";
                }
                $output .= ' <a href="' . BASE_URL . $_SESSION['role'] . '/viewchat/' . $username['U_ID'] . '/' . $username['Role'] . '" >
                        <div class="content"> 
                            <img src="http://localhost/Volunteer_Lanka//public/images/profile.jpg" alt="">
                            <div class="details">
                            <span>' . $username['Name'] . '</span>
                            <p>' . $you . $msg . '</p>
                        </div>
                        </div>
                        
                    </a> ';
            }
        }
        echo $output;
    }
    function viewchat($user_id, $user_role)
    {

        $this->user_id = $user_id;
        $this->user_role = $user_role;
        $this->loadModel('Chat');
        $this->user = $this->model->getUserName($user_id, $user_role);
        $this->render("includes/chat");
    }
    function insertChat()
    {
        $outgoing_id = $_POST['outgoing_id'];
        $incoming_id = $_POST['incoming_id'];
        $message = $_POST['message'];
        $this->loadModel('Chat');
        if (!empty($message)) {
            $this->setmessge = $this->model->sendMessage($outgoing_id, $incoming_id, $message) or die();
        }
    }
    function getChat(){
        $outgoing_id = $_POST['outgoing_id'];
        $incoming_id = $_POST['incoming_id'];
        $output = "";
        $this->loadModel('Chat');
        $getmessages = $this->model->getMessage($outgoing_id,$incoming_id);
        if(count($getmessages)){
            foreach($getmessages as $getmessage){
                if($getmessage['outgoing_msg_id'] == $outgoing_id){
                    $output .=' <div class="chat outgoing">
                                <div class="details">
                                    <p>'. $getmessage['msg'] .'</p>
                                 </div>
                            </div>';
                }else{
                    $output .='<div class="chat incoming">
                            <img src="http://localhost/Volunteer_Lanka//public/images/profile.jpg" alt="">
                            <div class="details">
                                <p>'. $getmessage['msg'] .'</p>
                            </div>
                        </div>';
                }
            }
            echo $output;
        }


    }
}
