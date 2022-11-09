<?php 
include 'conn.php';
if (isset($_SESSION['uid'])) {
    include 'Navbar/navbar_log.php';
}
else {
    include 'Navbar/navbar.php';
}
include 'sidenav/sidenav.php' ?>

