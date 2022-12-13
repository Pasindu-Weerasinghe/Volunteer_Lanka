<?php
require 'libs/PHPMailer.php';
if (isset($_POST['send-otp'])) {
    $otp = sprintf("%06d", mt_rand(0, 999999));
    session_start();
    $_SESSION['otp'] = password_hash($otp, PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $_SESSION['email'] = $email;

    if (sendmail($email, 'OTP', $otp)) {
        /*** if mail sent successfully ***/
        header('Location: forgot_password_otp.php');
    } else {
        /*** if mail not sent***/
        echo 'Mail not sent';
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

    <form action="forgot_password.php" method="post">
        <div class="container">
            <h1>Enter email</h1>
            <br>
            <label for="uname"><b>Email</b></label>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" name="send-otp">Confirm</button>
        </div>
    </form>
</body>

</html>