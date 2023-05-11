<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/sidenav.css">
  <script src="https://kit.fontawesome.com/18409fd0c0.js" crossorigin="anonymous"></script>
  <script defer src="<?php echo BASE_URL ?>public/scripts/sidenav.js"></script>
</head>
<body>
    <span class="open-slide">
      <a href="#" onclick="openSideMenu()">
        <svg width="30" height="30">
            <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
            <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
            <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
        </svg>
      </a>
    </span>

  <div id="side-menu" class="side-nav">
    <a href="#" class="btn-close" onclick="closeSideMenu()">&times;</a>
    <a  href="<?php echo BASE_URL; ?>sponsor"><i class="fa-solid fa-house fa-lg" id="icon"></i>  Home</a>
    <a href="<?php echo BASE_URL; ?>sponsor/sponsored_projects"><i class="fa-solid fa-hands-holding-circle fa-lg" id="icon" ></i> My Sponsored Projects</a>
    <a href="<?php echo BASE_URL; ?>sponsor/calendar"><i class="fa-solid fa-calendar-days fa-lg" id="icon"></i>  Calendar</a>
    <a href="<?php echo BASE_URL; ?>sponsor/profile"><i class="fa-solid fa-user fa-lg" id="icon"></i>  My Profile</a>
    <a href="<?php echo BASE_URL; ?>sponsor/complain"><i class="fa fa-comments fa-lg" id></i>Complain</a>

  </div>
</body>
</html>
