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
            echo "<script>alert('Complaint sent to admin');location.href='http://localhost/Volunteer_Lanka/".$this->role."/complain';</script>";
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

    function chat(){
       session_start();
        $role=$_SESSION['role'];
        $uid = $_SESSION['uid'];
        $this->loadModel('Chat');
        $this->user = $this->model->getUserDatatoChat($uid,$role);
        $this->render("includes/user");
    }

    function setAlluserstochat(){
        session_start();
        $uid = $_SESSION['uid'];
        $this->loadModel('Chat');
        $usernames = $this->model->getAlluserstochat($uid);
        $output = "";
        if(count($usernames) == 1){
            $output .= "No users are available to chat";
        }else if(count($usernames) > 0){
            foreach($usernames as $username){
                $this->lastmessages= $this->model->getLastmsg($uid);
                $output .= ' <a href="'.BASE_URL. $_SESSION['role'] .'/viewchat/'.$username['U_ID'].'/'.$username['Role'].'" >
                        <div class="content"> 
                            <img src="http://localhost/Volunteer_Lanka//public/images/profile.jpg" alt="">
                            <div class="details">
                            <span>' . $username['Name'] .'</span>
                            <p></p>
                        </div>
                        </div>
                        <div class="status-dot"><i class="fa-solid fa-circle"></i></div>
                    </a> ';
            }
                
            
            
        }
        echo $output;
    }
    function viewchat($user_id,$user_role){
        
        $this->user_id = $user_id;
        $this->user_role = $user_role;
        $this->loadModel('Chat');
        $this->user = $this->model-> getUserName($user_id,$user_role);
        $this->render("includes/chat");
    }
    
}
