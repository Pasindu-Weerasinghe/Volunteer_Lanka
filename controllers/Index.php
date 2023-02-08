<?php

class Index extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->error = null;
    }

    function index()
    {
        $this->render('Index');
    }

    function login()
    {
        $this->render('Login');
    }

    function login_auth()
    {
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        // load user model and get user information of relevant user
        $this->loadModel('User');
        $user = $this->model->getUserData($uname);

        if ($user) {
            // if there is a user with the same email
            if (password_verify($psw, $user['Password'])) {
                // if password is correct
                if ($user['Status'] != 'restricted') {
                    //if user is not restricted
                    session_start();
                    $_SESSION['uid'] = $user['U_ID'];
                    $_SESSION['uname'] = $uname;
                    $_SESSION['role'] = $user['Role'];

                    // send the user to the relevant home page of the role
                    header('Location: ' . BASE_URL . $user['Role']);
                } else {
                    // if user is restricted
                    $this->error = 'restricted';
                    $this->render('Login');
                }
            } else {
                // if password is incorrect
                $this->error = 'incorrect password';
                $this->render('Login');
            }
        } else {
            // if there is no user with the same email
            $this->error = 'incorrect email';
            $this->render('Login');
        }
    }

    function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . 'index');
    }

    function signup($role = null)
    {
        if ($role) {
            $this->render('Signup' . ucfirst($role));
        } else {
            $this->render('Signup');
        }
    }

    function signup_auth()
    {
        if (isset($_POST['next'])) {
            $role = $_POST['role'];
            $email = $_POST['email'];
            $psw = $_POST['psw'];
            $confrim_psw = $_POST['confirm-psw'];

            if ($psw == $confrim_psw) {
                // if password and confirm password are matching
                $this->loadModel('User');
                $this->model->checkEmailExist($email);
                if (!$this->model->checkEmailExist($email)) {
                    // if email does not exist
                    session_start();
                    $_SESSION['role'] = $role;
                    $_SESSION['email'] = $email;
                    $_SESSION['hash-psw'] = password_hash($psw, PASSWORD_BCRYPT);
                    header('Location: ' . BASE_URL . 'index/signup/' . $role);
                } else {
                    // if email exists
                    $this->error = 'email exists';
                    $this->render('Signup');
                }
            } else {
                // if password and confirm password are not matching
                $this->error = 'password does not match';
                $this->render('Signup');
            }
        }
    }

    function signup_finish($role)
    {
        if (isset($_POST['submit'])) {
            // if signup form submitted
            session_start();
            $email = $_SESSION['email'];
            $hash_psw = $_SESSION['hash-psw'];

            // input user data to user table
            $this->loadModel('User');
            if ($this->model->setUser($email, $hash_psw, $role)) {
                // if user data insert successfull
                $uid = $this->model->getUserId($email);

                switch ($role) {
                    case 'organizer':
                        $name = $_POST['name'];
                        $no_of_members = $_POST['no-of-members'];
                        $branch = $_POST['branch'];
                        $address = $_POST['address'];
                        $contact = $_POST['contact'];
                        $this->loadModel('Organizer');
                        if ($this->model->setOrganizer($uid, $name, $no_of_members, $branch, $address, $contact)) {
                            // if organizer data insert successfull
                            session_destroy();
                            header('Location: ' . BASE_URL . 'index/login');
                        } else {
                            // if organizer data insert failed
                        }
                        break;

                    case 'volunteer':
                        break;

                    case 'sponsor':
                        $name = $_POST['name'];
                        $contact = $_POST['contact'];
                        $address = $_POST['address'];
                        $type = $_POST['type'];
                        $this->loadModel('Sponsor');
                        if ($this->model->setSponsor($uid, $name, $address, $contact, $type)) {
                            // if organizer data insert successfull
                            session_destroy();
                            header('Location: ' . BASE_URL . 'index/login');
                        } else {
                            // if organizer data insert failed
                        }

                        break;
                }
            } else {
                // if user data insert failed
            }
        }
        else{
            echo 'mdksmksmdksm';
        }
    }

    function forgot_password($param = null)
    {
        switch ($param) {
            case null:
                $this->render('ForgotPassword');
                break;

            case 'send-otp':
                if (isset($_POST['send-otp'])) {
                    $otp = sprintf("%06d", mt_rand(0, 999999));
                    session_start();
                    $_SESSION['otp'] = password_hash($otp, PASSWORD_BCRYPT);
                    $email = $_POST['email'];
                    $_SESSION['email'] = $email;

                    if (sendmail($email, 'OTP', $otp)) {
                        /*** if mail sent successfully ***/
                        header('Location: ' . BASE_URL . 'index/forgot_password/otp-view');
                    } else {
                        /*** if mail not sent***/
                        echo 'Mail not sent';
                    }
                }
                break;

            case 'otp-view':
                $this->render('OTPConfirm');
                break;

            case 'confirm-otp':
                if (isset($_POST['confirm-otp'])) {
                    session_start();
                    if (password_verify($_POST['otp'], $_SESSION['otp'])) {
                        /*** if otp is correct ***/
                        unset($_SESSION['otp']);
                        $this->render('ChangePassword');
                    } else {
                        echo 'OTP does not match';
                    }
                }
                break;

            case 'change-password':
                if (isset($_POST['change-password'])) {
                    if ($_POST['psw'] === $_POST['confirm-psw']) {
                        // if password is confirmed
                        $this->loadModel('User');
                        session_start();
                        if ($this->model->changePassword($_SESSION['email'], password_hash($_POST['psw'], PASSWORD_BCRYPT))) {
                            // if password changed successfully
                            echo $_SESSION['email'];
                            session_destroy();
                            header('Location: ' . BASE_URL . 'index/login');
                        } else {
                            // if password change failed
                            echo 'Error';
                        }
                    } else {
                        // password does not match
                        echo 'Password mismatch';
                    }
                }
                break;
        }
    }

    
}
