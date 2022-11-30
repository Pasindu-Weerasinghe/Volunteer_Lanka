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
        <h1 class="head1"><label class="sub2"> <?php echo $row1['Name']; ?></label></h1>
        <div class="sub">
            <div class="row">
                <div class="column1">
                    <img class="image" src="./profile.jpg" alt="a cat staring at you" height="190" width="190" /><br><br>

                </div>
                <div class="column">
                    <label><strong>User Account Details</strong></label><br><br>
                    <label class="textarea">User ID:<?php echo $row1['U_ID']; ?></label><br><br>
                    <label class="textarea">Name:<?php echo $row1['Name']; ?> </label><br><br>
                    <label class="textarea">Contact No:<?php echo $row1['Contact']; ?> </label><br><br>
                    <label class="textarea">Email:<?php echo $Email ?></label><br><br>
                    <label class="textarea">Role:<?php echo $Role ?></label><br><br>
                    <label class="textarea">Password:<input type="password" value="<?php echo $password ?>" id="myInput" readonly="readonly" style="width:25%">&nbsp;<input type="checkbox" onclick="myFunction()"></label>
                    <div class="but1">
                        <button type="submit"><a href="change_password.php" class="same">Change Password</a></button><br><br>
                    </div>
                </div>
            </div>
        <?php
    }
        ?>
        <button type="submit"><a href="home.php" class="same">Back</a></button>
        <button type="submit" class="logout"><a href="login.php" class="same">Logout</a></button>
        </div>
        </div>
        
</body>

</html>