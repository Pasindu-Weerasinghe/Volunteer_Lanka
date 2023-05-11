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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
                <li>
                    <div class="profile-wrapper">
                        <div class="abc">
                            <span class="username"><?php echo $_SESSION['uname']; ?></span><br>
                            <img class="profile-image" src="<?php echo BASE_URL ?>public/images/<?php echo $this->profile['Photo'] ?>" alt="">
                            <div class="profile-dropdown">
                                <a href="<?php echo BASE_URL.$_SESSION['role']; ?>/profile"><i class="fas fa-user-circle"></i> Profile</a>
                                <a href="<?php echo BASE_URL; ?>index/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <script defer src="<?php echo BASE_URL; ?>public/scripts/navbarlog.js"></script>
    <nav>
        <ul>
            <li><a><?php echo $_SESSION['uname']; ?></a></li>
            <li id="logout"><a href="<?php echo BASE_URL; ?>index/logout">Logout</a></li>
        </ul>
    </nav>
</header>
<!-- Navbar end -->
