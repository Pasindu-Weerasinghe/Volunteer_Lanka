<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Navbar/navbar_log.css">
    <script defer src="Navbar/navbar.js"></script>
</head>
<body>
    <!-- Navbar start -->
    <header>
        <?php include './sidenav/sidenav.php'?>
        <div id="brand"><img id="logo" src="Navbar/images/logo_transparent.png" alt=""></div>
        <nav>
            <ul>
                <li><?php echo $_SESSION['uname']; ?></li>
                <li id="logout"><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar end -->
    

</body>
</html>