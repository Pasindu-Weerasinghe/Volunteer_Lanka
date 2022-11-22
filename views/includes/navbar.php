<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/navbar.css">
    <script defer src="<?php echo BASE_URL; ?>public/scripts/navbar.js"></script>
</head>

<body>
    <!-- Navbar start -->
    <header>
        <div id="brand">
            <a href="<?php echo BASE_URL; ?>">
                <img id="logo" src="<?php echo BASE_URL; ?>public/images/logo_transparent.png" alt="">
            </a>
        </div>

        <nav>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="/">Contact Us</a></li>
                <li id="login"><a href="<?php echo BASE_URL; ?>index/login">LOGIN</a></li>
                <li id="signup"><a id="signup a" href="<?php echo BASE_URL; ?>index/signup">SIGN UP</a></li>
            </ul>
        </nav>

        <!-- mobile view -->
        <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
            <ul class="mobile-menu">
                <li><a href="/home">Home</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <li id="loginmobile"><a href="<?php echo BASE_URL; ?>index/login">LOGIN</a></li>
                <li id="signupmobile"><a id="signup a" href="<?php echo BASE_URL; ?>index/login">SIGN UP</a></li>
            </ul>
        </div>
        <!-- mobile view end-->
    </header>
    <!-- Navbar end -->
</body>

</html>