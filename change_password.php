<?php
require 'conn.php';
session_start();
$error = NULL;
$uid = $_SESSION['uid'];

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
include 'Navbar/navbar_log.php';
include './footer/footer.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/password.css">
    <title>Change Password</title>
</head>

<body>
    <div class="main" id="main">
        <form class="main1" action="change_password.php" method="POST">
            <!-- <br><br> <br><br> -->
            <h2>Changed Password</h2><br><br>
            <lable>Current Password</lable><br>
            <input type="text" name="current"><br>
            <lable>New Password</lable><br>
            <input type="text" name="new"><br>
            <lable>Comfirm Password</lable><br>
            <input type="text" name="confirm"><br><br>
            <button type="submit" name="submit">Save Password</button>
            <button type="submit"> <a href="profile_sponsor.php">Back</a> </button>

        

        <?php
        $sql = "SELECT * FROM user WHERE U_ID='" . $uid . "'";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc())
            $cu_pw = $row['Password'];
        if (isset($_POST['submit'])) {
            $password = $_POST['current'];
            $new = $_POST['new'];
            $confirm = $_POST['confirm'];
            $verify = password_verify($password, $cu_pw);

            if ($password == $verify) {
                if ($new == $confirm) {
                    $new1 = password_hash($new, PASSWORD_BCRYPT);
                    $sql = "UPDATE user SET Password='" . $new1 . "' WHERE U_ID='" . $uid . "'";
                    $result = mysqli_query($conn, $sql);
                    $error = "Password Updated Successfully";
                } else {
                    $error = "password did not match";
                }
            } else {
                $error = "OLD PW is not match";
            }
        }
        ?>

        <label class="error"><?php echo $error ?></label>

        </form>
    <!-- </div> -->
</body>

</html>