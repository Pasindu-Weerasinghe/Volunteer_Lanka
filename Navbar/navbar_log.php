<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Navbar/navbar.css">
    <script defer src="Navbar/navbar.js"></script>
</head>
<body>
    <!-- Navbar start -->
    <header>
        <div id="brand"><a href=""><img id="logo" src="Navbar/images/logo_transparent.png" alt=""></a></div>
        <nav>
            <ul>
                <!-- <li id="login"><a href="login.php">LOGIN</a></li>
                <li id="signup"><a id="signup a" href="signup.php">SIGN UP</a></li> -->
                <li><?php echo "Hey! ". $_SESSION['uname']; ?></li>
                <li id="signup"><a id="signup a" href="logout.php">Logout</a></li>
                
            </ul>
        </nav>
    </header>
    <!-- Navbar end -->
    

</body>
</html>