<?php
include 'conn.php';
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}

$uid = $_SESSION['uid'];
require 'Navbar/navbar_log.php';

$sql = "SELECT * FROM user WHERE U_ID='$uid'";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $Role = $row['Role'];
    $Email = $row['Email'];
    $password = $row['Password'];
}

$sql2 = "SELECT * FROM sponsor WHERE U_ID=' $uid '";
$result1 = mysqli_query($conn, $sql2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/profile.css">
    <title>User Profile</title>
</head>
<script>
    function myFunction() {
        var y = document.getElementById("myInput");
        if (y.type == "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
</script>

<body>
    <?php
    while ($row1 = $result1->fetch_assoc()) {
    ?>
        <div class="main" id="main">
            <strong>
                    <h2>User Account Details</h2>
                </strong><br><br>
            <div class="row">
                <div class="column">
                    <img class="image" src="./images/profile.jpg" alt="a cat staring at you" height="190" width="190" /><br><br>
                    <h1 class="head1"><label class="sub2"> <?php echo $row1['Name']; ?></label></h1><br><br><br>
                    <button class="btn"><a href="home.php" class="same">Back</a></button>
                </div>
                <div class="column">
                    <strong>
                        <table>
                            <tr>
                                <td>User ID</td>
                                <td>:</td>
                                <td><?php echo $row1['U_ID']; ?></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td><?php echo $row1['Name']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?php echo $Email ?></td>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <td>:</td>
                                <td><?php echo $row1['Contact']; ?></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>:</td>
                                <td><?php echo $Role  ?></td>
                            </tr>
                        </table>
                        <button class="btnpw"> <a href="change_password.php" class="same">Change Password</a></button><br><br>
                    </strong>
                    <button class="btn"> <a href="login.php" class="same">Logout</a></button>
                </div>

            </div>

        </div>

    <?php
    }
    ?>

</body>

</html>