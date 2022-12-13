<?php include 'conn.php';

if (isset($_REQUEST['create'])) {

    $role = $_REQUEST["role"];
    $email = $_REQUEST["email"];
    $psw = password_hash($_REQUEST["psw"], PASSWORD_BCRYPT);

    $sql = "INSERT INTO user (Email, Password, Role, Status, Restricted) values ('$email', '$psw', '$role','active', '0')";
    $result = mysqli_query($conn, $sql);
}
