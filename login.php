<?php include 'Navbar/navbar.php' ?>
<?php include 'sidenav/sidenav.php' ?>
<?php include 'conn.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles/login.css">
  <title>Login</title>


<body>
  <div class="back">
    <form action="login_auth.php" method="post">
      <div class="container">
        <h1>Login</h1><br>
        <hr>
        <label for="email"><br>Email</label><br>
        <input type="email" name="email" required>

        <label for="psw"><br>Password</label><br>
        <input type="password" name="psw" required>

        <span class="psw"> <a href="#">Forgot password?</a></span>

        <button name="login" type="submit">Login</button>
    
      </div><br/>

      <span class="signup">Don't have an account? <a href="signup.php">Sign up</a></span>
    </form>
  </div>

</body>
</head>

</html>