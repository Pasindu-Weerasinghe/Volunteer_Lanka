<?php 
include 'conn.php';

if (isset($_REQUEST["signup"])){

    $role = $_SESSION['role'];
    $email = $_SESSION['email'];
    $psw = $_SESSION['psw'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $query1 = "INSERT INTO user (Name, Email, Password, Role, Status, Restricted) values ('$name', '$email', '$psw', '$role','active', '0')";
    $result1 = mysqli_query($conn, $query1);

    $query2 = "SELECT U_ID FROM user WHERE Email = '$email'";
    $result2 = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result2);
    $uid = $row['U_ID'];

    $query3 = "INSERT INTO volunteer (U_ID, Address, Contact) values ('$uid', '$address', '$contact')";
    $result3 = mysqli_query($conn, $query3);

}   


session_destroy();
$conn->close();

?>