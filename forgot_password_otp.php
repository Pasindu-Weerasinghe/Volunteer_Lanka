<?php
if (isset($_POST['confirm-otp'])) {
    session_start();
    if (password_verify($_POST['otp'], $_SESSION['otp'])) {
        /*** if otp is correct ***/
        unset($_SESSION['otp']);
        header('Location: change_forgotten_password.php');
    } else {
        echo 'OTP does not match';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="forgot_password_otp.php" method="post">
        <div class="container">
            <h1>Enter OTP</h1>
            <br>
            <label for="uname"><b>OTP</b></label>
            <input type="text" name="otp" placeholder="One Time Password" required>
            <button type="submit" name="confirm-otp">Confirm</button>
        </div>
    </form>
</body>

</html>