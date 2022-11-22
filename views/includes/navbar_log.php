<?php $role = $_SESSION['role']; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/navbar_log.css">
    <script defer src="<?php echo BASE_URL; ?>public/scripts/navbar.js"></script>
</head>

<body>
    <!-- Navbar start -->
    <header>
        <?php include 'views/includes/sidenav_' . $role . '.php' ?>

        <div id="brand">
            <a href="<?php echo BASE_URL . $role; ?>">
                <img id="logo" src="<?php echo BASE_URL; ?>public/images/logo_transparent.png" alt="">
            </a>
        </div>

        <nav>
            <ul>
                <li><?php echo $_SESSION['uname']; ?></li>
                <li id="logout"><a href="<?php echo BASE_URL; ?>index/logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar end -->


</body>

</html>