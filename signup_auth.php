<?php include 'conn.php'; ?>

<?php 


if (isset($_REQUEST["signup"])){

    $role = $_SESSION['role'];
    $email = $_SESSION['email'];
    $psw = $_SESSION['psw'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $query1 = "INSERT INTO user (Email, Password, Role, Status, Restricted) values ('$email', '$psw', '$role','active', '0')";
    $result1 = mysqli_query($conn, $query1);

    $query2 = "SELECT U_ID FROM user WHERE Email = '$email'";
    $result2 = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result2);
    $uid = $row['U_ID'];

    $query3 = "INSERT INTO volunteer (U_ID,Name, Address, Contact) values ('$uid','$name', '$address', '$contact')";
    $result3 = mysqli_query($conn, $query3);

    $interest = $_POST['area'];  
    foreach($interest as $area)  
    {  
        $query4 = "INSERT INTO vol_interest (U_ID, Interest) values ('$uid', '$area')";
        $result4 = mysqli_query($conn, $query4);
    } 

    $organ = $_POST['org'];  
    foreach($organ as $organise)  
    {  
        $query5 = "INSERT INTO vol_organization (U_ID, Organization) values ('$uid', '$organise')";
        $result5 = mysqli_query($conn, $query5);
    }
}   


session_destroy();
$conn->close();

?>