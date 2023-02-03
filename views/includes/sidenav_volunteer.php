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
  <a href="<?php echo BASE_URL; ?>volunteer">Home</a>
  <a href="<?php echo BASE_URL; ?>volunteer/upcoming_projects">Upcoming Projects</a>
  <a href="<?php echo BASE_URL; ?>volunteer/completed_projects">Completed Projects</a>
  <a href="<?php echo BASE_URL; ?>volunteer/new_ideas">Request to Organize Projects</a>
  <a href="<?php echo BASE_URL; ?>volunteer/calendar">Calendar</a>
  <a href="<?php echo BASE_URL; ?>volunteer/search_organizer">Search Organizers</a>
  <a href="<?php echo BASE_URL; ?>volunteer/profile">My Profile</a>
  <a href="<?php echo BASE_URL; ?>volunteer/complain">Complain</a>
</div>