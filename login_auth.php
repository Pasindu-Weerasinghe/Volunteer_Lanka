<?php
require('inc/conn.php');
session_start();
if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];

    $query = "SELECT * FROM user WHERE Email='$uname' AND Password='$psw' LIMIT 1";
    $result = mysqli_query($conn, $query);


    if ($result) {
        // if query successful
        if (mysqli_num_rows($result) == 1) {
            // valid user found
            $user = $result->fetch_assoc();

            $uid = $user['U_ID'];
            $email = $user['Email'];
            $role = $user['Role'];
            $status = $user['Status'];

            if ($status != 'restricted') {
                // if user is not restricted
                $_SESSION['uid'] = $uid;
                $_SESSION['uname'] = $uname;
                header('Location: home_organizer.php');
            } else {
                // if user is restricted
                echo "<script> alert ('User is restricted!'); window.location.href = 'login.php';</script>";
            }
        } else {
            echo "<script> alert ('Incorrect username or password!'); window.location.href = 'login.php';</script>";
        }
    } else {
        // if query failed
        echo "<script> alert ('Database query failed!'); window.location.href = 'login.php';</script>";
    }
}
