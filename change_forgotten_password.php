<?php
require 'conn.php';
if (isset($_POST['change-password'])) {
    if ($_POST['psw'] === $_POST['confirm-psw']) {
        // if password is confirmed
        session_start();
        $email = $_SESSION['email'];
        $password = password_hash($_POST['psw'], PASSWORD_BCRYPT);
        $query = "UPDATE user SET Password = '$password' WHERE Email = '$email'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            // if password changed successfully
            session_destroy();
            header('Location: login.php');
        } else {
            // if password change failed
            echo 'Error';
        }
    } else {
        // password does not match
        echo 'Password mismatch';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>

<body>

    <form action="change_forgotten_password.php" method="post">
        <div class="container">
            <h1>Change Password</h1>
            <br>
            <label for=""><b>New Password</b></label>
            <input type="password" name="psw" placeholder="Password" required>
            <label for=""><b>Confirm Password</b></label>
            <input type="password" name="confirm-psw" placeholder="Password" required>
            <button type="submit" name="change-password">Confirm</button>
        </div>
    </form>
</body>

</html>