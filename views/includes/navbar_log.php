<?php
if (session_status() == PHP_SESSION_NONE) {
    // if session is not started, start the session
    session_start();
}
if (!isset($_SESSION['uid'])) {
    // if user is not logged in, redirect to login page
    header('Location: ' . BASE_URL . 'index/login');
}
$role = $_SESSION['role'];
?>

<head>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/navbar_log.css">
    <script defer src="<?php echo BASE_URL; ?>public/scripts/navbar.js"></script>
</head>

<!-- Navbar start -->
<header>
    <div id="navbar-left">
        <?php include 'views/includes/sidenav_' . $role . '.php' ?>

        <div id="brand">
            <a href="<?php echo BASE_URL . $role; ?>">
                <img id="logo" src="<?php echo BASE_URL; ?>public/images/logo_transparent.png" alt="">
            </a>
        </div>
    </div>

    <nav>
        <ul>
            <li><a><?php echo $_SESSION['uname']; ?></a></li>
            <li id="logout"><a href="<?php echo BASE_URL; ?>index/logout">Logout</a></li>
        </ul>
    </nav>
</header>
<!-- Navbar end -->