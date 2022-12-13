<head>
    <link rel="stylesheet" href="Navbar/navbar_log.css">
    <script defer src="Navbar/navbar.js"></script>
</head>
<!-- Navbar start -->
<header>
    <div id="navbar-left">
        <?php include './sidenav/sidenav_' . $_SESSION['role'] . '.php' ?>
        <div id="brand"><img id="logo" src="Navbar/images/logo_transparent.png" alt=""></div>
    </div>
    <nav>
        <ul>
            <li><?php echo $_SESSION['uname']; ?></li>
            <li id="logout"><a id="logout a" href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
<!-- Navbar end -->