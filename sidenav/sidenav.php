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
        <path d="M0,5 30,5" stroke="#000" stroke-width="5" />
        <path d="M0,14 30,14" stroke="#000" stroke-width="5" />
        <path d="M0,23 30,23" stroke="#000" stroke-width="5" />
      </svg>
    </a>
  </span>

  <div id="side-menu" class="side-nav">
    <a href="#" class="btn-close" onclick="closeSideMenu()">&times;</a>
    <a href="home_organizer.php">Home</a>
    <a href="create_project_organizer.php">Create New Projects</a>
    <a href="upcoming_projects_organizer.php">Upcoming Projects</a>
    <a href="completed_projects_organizer.php">Completed Projects</a>
    <a href="newideas_volunteer.php">Requests from Volunteers</a>
    <a href="aaa.php">Payments</a>
    <a href="calendar.php">Calendar</a>
    <a href="aaa.php">My Blog</a>
    <a href="search.php">Search Users</a>
    <a href="complain.php">Complain</a>
  </div>
</body>

</html>