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
    <!-- <img src="<?php echo BASE_URL; ?>public/images/bg-img1.jpg" class="bg-img"> -->
    <form action="<?php echo BASE_URL; ?>index/login_auth" method="post">
        <div class="container">
            <h1>Login</h1>

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

            <label for="uname"><b>Username</b></label>
            <input type="email" name="uname" placeholder="Email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" name="psw" placeholder="Password" required>
            <span class="psw"><a href="#">Forgot password?</a></span>

            <button type="submit" name="login">Login</button>
        </div><br />

        <span class="signup">Don't have an account? <a href="#">Sign up</a></span>
    </form>
</body>

</html>