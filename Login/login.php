<?php include '../Navbar/navbar.php' ?>
<style><?php include ('../Navbar/navbar.css') ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Login</title>
    <body>
    <form action="login.php" method="post">
    <div class="container">
        <h1>Login</h1>
        <label for="uname"><b>Username</b></label>
        <input type="text" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" name="psw" required>
        <span class="psw">Forgot <a href="#">password?</a></span>

        <button type="submit">Login</button>
    </div><br/>

    <span class="signup">Don't have an account? <a href="#">Sign up</a></span>
    </form>
    </body>
</head>
</html>