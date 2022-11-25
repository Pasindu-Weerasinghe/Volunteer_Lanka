<?php
include 'conn.php';


if (isset($_POST["signup"])) {

    session_start();
    $role = $_SESSION['role'];
    $email = $_SESSION['email'];
    $psw = $_SESSION['psw'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $type = $_POST['type'];


    $query1 = "INSERT INTO user (Email, Password, Role, Status, Restricted) values ('$email', '$psw', '$role','active', '0')";
    $result1 = mysqli_query($conn, $query1);

    $query2 = "SELECT U_ID FROM user WHERE Email = '$email'";
    $result2 = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result2);
    $uid = $row['U_ID'];

    $query3 = "INSERT INTO sponsor (U_ID, Name, Address, Contact, Type ) values ('$uid','$name','$address', '$contact', '$type')";
    $result3 = mysqli_query($conn, $query3);
}


session_destroy();
$conn->close();
header("Location:login.php");
