<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <title>Change Password</title>
</head>

<body>

    <form action="<?php echo BASE_URL; ?>index/forgot_password/change-password" method="post">
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