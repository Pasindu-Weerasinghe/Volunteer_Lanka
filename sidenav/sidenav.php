<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="sidenav/sidenav.css">
  <script defer src="sidenav/sidenav.js"></script>
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
    <a href="home_volunteer.php">Home</a>
    <a href="upcoming_volunteer.php">Upcoming Projects</a>
    <a href="completed_volunteer.php">Completed Projects</a>
    <a href="newideas_volunteer.php">Request to Organize Projects</a>
    <a href="calendar.php">Calendar</a>
    <a href="search.php">Search Organizers</a>
    <a href="profile.php">My Profile</a>
    <a href="complain.php">Complain</a>
  </div>
</body>
</html>
