<?php 
include 'conn.php';
session_start();
if (isset($_REQUEST["login"])){
    $uname = $_POST["uname"];
    $psw = $_POST["psw"];

    $sql = "SELECT * FROM user WHERE Email ='$uname'";
    $result = mysqli_query($conn, $sql);

    if ($result -> num_rows == 1) {
        $row = $result->fetch_assoc();
            $uid = $row['U_ID'];
            $hash_psw = $row['Password'];
            $email = $row['Email'];
            $role = $row['Role'];
            $status = $row['Status'];

        if (password_verify($psw, $hash_psw)) {
            if ($status != 'restricted') {
                if ($role == 'volunteer') {
                    $_SESSION['uid'] = $uid;
                    $_SESSION['uname'] = $uname;
                    header('Location: home_volunteer.php'); 
                }
                // else {
                //     $_SESSION['uid'] = $uid;
                //     header('Location: #.php'); 
                //     exit;
                // }
            }
            else {
                echo "<script> alert ('Your account is restricted!'); window.location.href = 'login.php';</script>";
            }
        }
        else {
            echo "<script> alert ('Incorrect Password!'); window.location.href = 'login.php';</script>";
        }
    }
    else {
        echo "<script> alert ('Incorrect username!'); window.location.href = 'login.php';</script>";
    }
}
?>