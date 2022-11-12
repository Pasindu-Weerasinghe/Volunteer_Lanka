<?php 
include 'conn.php';

if (isset($_REQUEST["request"])){

    $uid = $_SESSION['uid'];
    $location = $_POST['location'];
    $description = $_POST['des'];


    $query = "INSERT INTO pr_ideas (Description, Location, U_ID) values ('$description', '$location', '$uid')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script> alert ('Request Sent!');</script>";
        header ("Location: newideas_volunteer.php");
    }
}
?>