<head>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/sidenav.css">
  <script defer src="<?php echo BASE_URL; ?>public/scripts/sidenav.js"></script>
</head>
<span class="open-slide">
  <a href="#" onclick="openSideMenu()">
    <svg width="30" height="30">
      <path d="M0,5 30,5" stroke="#000" stroke-width="5" />
      <path d="M0,14 30,14" stroke="#000" stroke-width="5" />
      <path d="M0,23 30,23" stroke="#000" stroke-width="5" />
    </svg>
  </a>
</span>

<div id="side-menu" class="side-nav">
  <a class="btn-close" onclick="closeSideMenu()">&times;</a>
  <a href="home_volunteer.php">Home</a>
  <a href="upcoming_volunteer.php">Upcoming Projects</a>
  <a href="completed_volunteer.php">Completed Projects</a>
  <a href="newideas_volunteer.php">Request to Organize Projects</a>
  <a href="calendar.php">Calendar</a>
  <a href="search.php">Search Organizers</a>
  <a href="profile_volunteer.php">My Profile</a>
  <a href="complain.php">Complain</a>
</div>