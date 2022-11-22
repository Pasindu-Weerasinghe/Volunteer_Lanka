<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/sidenav.css">
    <script defer src="<?php echo BASE_URL; ?>public/scripts/sidenav.js"></script>
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
        <a href="set">Home</a>
        <a href="set">Create New Projects</a>
        <a href="set">Upcoming Projects</a>
        <a href="set">Completed Projects</a>
        <a href="set">Requests from Volunteers</a>
        <a href="set">Payments</a>
        <a href="set">Calendar</a>
        <a href="set">My Blog</a>
        <a href="set">Search Users</a>
        <a href="set">Complain</a>
    </div>
</body>

</html>