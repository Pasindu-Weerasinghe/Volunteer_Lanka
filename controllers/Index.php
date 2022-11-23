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
                    switch ($user['Role']) {
                        case 'admin':
                            header('Location: ' . BASE_URL . 'admin');
                            break;
                        case 'organizer':
                            header('Location: ' . BASE_URL . 'organizer');
                            break;
                        case 'volunteer':
                            header('Location: ' . BASE_URL . 'volunteer');
                            break;
                        case 'sponsor':
                            header('Location: ' . BASE_URL . 'sponsor');
                            break;
                    }
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
                        break;
                }
            } else {
                // if user data insert failed
            }
        }
    }
}
