<?php
include 'conn.php';
session_start();

if (isset($_REQUEST["login"])) {
    $uname = $_POST["uname"];
    $psw = $_REQUEST["psw"];

    //$role_id = 0;

    $sql = "SELECT * FROM user WHERE Email ='$uname'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $uid = $row['U_ID'];
        $hash_psw = $row['Password'];
        $role = $row['Role'];
        $status = $row['Status'];

        if (password_verify($psw, $hash_psw)) {
            if ($status != 'restricted') {
                if ($role == 'sponsor') {
                    $_SESSION['uid'] = $uid;
                    $_SESSION['uname'] = $uname;
                    header('Location: home_sponsor.php');
                    //exit; 
                }
            } else {
                echo "<script> alert ('Your account is restricted!'); window.location.href = 'login.php';</script>";
            }
        }
        else {
            echo "<script> alert ('Incorrect username or password!'); window.location.href = 'login.php';</script>";
        }
    } 
    
}
