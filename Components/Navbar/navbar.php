<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Components\Navbar\navbar.css">
    <title>Navbar</title>
    <script defer src="Components\Navbar\navbar.js"></script>
</head>
<body>
    <header>
        <div id="brand"><a href=""><img id="logo" src="Components\Navbar\images\logo_transparent.png" alt=""></a></div>
        <nav>
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <li id="login"><a href="/login">Login</a></li>
                <li id="signup"><a id="signupa" href="/signup">Sign Up</a></li>
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
                    <li id="loginmobile"><a href="/login">Login</a></li>
                    <li id="signupmobile"><a id="signupa" href="/signup">Sign Up</a></li>
                </ul>
            </div>
        <!-- mobile view end-->
    </header>
</body>
</html>