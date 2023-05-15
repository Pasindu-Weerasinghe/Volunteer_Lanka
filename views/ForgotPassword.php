<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/form.css">
    <title>Forgot Password</title>
</head>

<body class="navbarless">
    <div class="wrapper">
        <h1 class="title">Enter email</h1>
        <form action="<?php echo BASE_URL; ?>index/forgot_password/send-otp" method="post" class="form">
            <div class="row">
                <label for="uname"><b>Email</b></label>
                <input type="email" name="email" placeholder="Email" required class="input">
            </div>
            <div class="btn-area">
                <button type="submit" name="send-otp" class="btn">Confirm</button>
            </div>
        </form>
    </div>
</body>

</html>