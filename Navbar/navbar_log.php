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
        <?php include './sidenav/sidenav.php' ?>
        <div id="brand" class="H_item1"><img id="logo" src="Navbar/images/logo_transparent.png" alt=""></div>
        <div class="H_item2">
            <nav>
                <ul>
                    <li><?php echo $_SESSION['uname']; ?></li>
                    <li id="logout"><a id="logout a" href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>

    </header>
    <!-- Navbar end -->


</body>

</html>