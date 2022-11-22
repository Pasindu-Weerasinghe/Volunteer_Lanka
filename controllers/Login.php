<?php
class Login extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->error = null;
    }

    function index()
    {
        $this->render('Login');
    }

    function login_auth()
    {
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];
        $this->loadModel('Login');
        $user = $this->model->getUserData($uname);

        if ($user) {
            // if there is a user with the same email
            if (password_verify($psw, $user['Password'])) {
                // if password is correct
                if ($user['Status'] != 'restricted') {
                    //if user is not restricted
                    session_start();
                    $_SESSION['uid'] = $user['U_ID'];
                    $_SESSION['uname'] = $user[$uname];
                    switch ($user['Role']) {
                        case 'admin':
                            header('Location: ' . BASE_URL . 'test');
                            break;
                        case 'organizer':
                            header('Location: ' . BASE_URL . 'test');
                            break;
                        case 'volunteer':
                            header('Location: ' . BASE_URL . 'test');
                            break;
                        case 'sponsor':
                            header('Location: ' . BASE_URL . 'test');
                            break;
                    }
                } else {
                    // if user is restricted
                    $this->error = 'restricted';
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
}
