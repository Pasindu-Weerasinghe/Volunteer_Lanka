<head>
    <link rel="stylesheet" href="Navbar/navbar.css">
    <script defer src="Navbar/navbar.js"></script>
</head>
<!-- Navbar start -->
<header>
    <div id="brand"><a href=""><img id="logo" src="Navbar/images/logo_transparent.png" alt=""></a></div>
    <nav>
        <ul>
            <li><a href="/home">Home</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/contact">Contact Us</a></li>
            <li id="login"><a href="login.php">LOGIN</a></li>
            <li id="signup"><a id="signup a" href="signup.php">SIGN UP</a></li>
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
            <li id="loginmobile"><a href="/login">LOGIN</a></li>
            <li id="signupmobile"><a id="signup a" href="/signup">SIGN UP</a></li>
        </ul>
    </div>
    <!-- mobile view end-->
</header>
<!-- Navbar end -->