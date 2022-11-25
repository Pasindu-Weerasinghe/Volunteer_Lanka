<?php 
include 'conn.php';
$error=null;

if (isset($_REQUEST["signup"])){

    $role = $_SESSION['role'];
    $email = $_SESSION['email'];
    $psw = $_SESSION['psw'];

    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $confirm = $_POST['confirm-psw'];

    if($confirm==$psw)
    {
        $query1 = "INSERT INTO user (Name, Email, Password, Role, Status, Restricted) values ('$name', '$email', '$psw', '$role','active', '0')";
    $result1 = mysqli_query($conn, $query1);

    $query2 = "SELECT U_ID FROM user WHERE Email = '$email'";
    $result2 = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result2);
    $uid = $row['U_ID'];

    $query1 = "INSERT INTO sponsor (U_ID,Name,Address, Contact, Type) values ('$uid','$name','$address', '$contact', '$role')";
    $result1 = mysqli_query($conn, $query1);
    }
    else
    {
        $error="Password is not matched!";

    }

    


}   


session_destroy();
$conn->close();
header("Location:login.php")
?>