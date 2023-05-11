<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes.php'; ?>
    <title>Login</title>
</head>

<body>
    <form action="<?php echo BASE_URL; ?>index/forgot_password/confirm-otp" method="post">
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