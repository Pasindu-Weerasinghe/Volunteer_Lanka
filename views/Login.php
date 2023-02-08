<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/styles/login.css">
    <title>Login</title>
</head>

<body>
    <?php include 'views/includes/navbar.php' ?>

    <form action="<?php echo BASE_URL; ?>index/login_auth" method="post">
        <div class="container">
            <h1>Login</h1>
<br>
            <?php
            if ($this->error == 'incorrect email') {
                echo '<p id="error">Incorrect Username</p>';
            }
            if ($this->error == 'incorrect password') {
                echo '<p id="error">Incorrect Password</p>';
            }
            if ($this->error == 'restricted') {
                echo '<p id="error">Your Account is Restricted!</p>';
            }
            ?>
    <br>
            <label for="uname"><b>Email</b></label>
            <input type="email" name="uname" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" name="psw" placeholder="Password" required>
            <span class="psw"><a href="<?php echo BASE_URL; ?>index/forgot_password">Forgot password?</a></span>

            <button type="submit" name="login" id="login-btn">Login</button>
        </div>

        <p class="signup">Don't have an account? <a href="#">Sign up</a></p>
    </form>
</body>

</html>