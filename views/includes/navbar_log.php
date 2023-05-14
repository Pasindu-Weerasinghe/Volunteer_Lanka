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
            <li id="bell-econ">
                <a href="<?php echo BASE_URL . $_SESSION['role']; ?>/notifications" id="notification-a">
                    <i class="fa-solid fa-bell fa-2xl" ></i>
                    <span id="notification-badge"></span>
                </a>
            </li>
            <li id="profile-icon">
                <div class="profile-wrapper">
                    <div class="abc">
                        <img class="profile-image" src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo ($_SESSION['photo'] ?: 'user-icon.png') ?>" alt="">

                        <div class="profile-dropdown">
                            <a href="<?php echo BASE_URL . $_SESSION['role']; ?>/profile"><i class="fas fa-user-circle"></i> Profile</a>
                            <a href="<?php echo BASE_URL; ?>index/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </li>
            <span class="username"><?php echo $_SESSION['uname']; ?></span>
        </ul>
    </nav>
</header>
<!-- Navbar end -->