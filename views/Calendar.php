<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/calendar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="<?php echo BASE_URL; ?>public/scripts/calendar.js" defer></script>
    <title>Calendar</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
    <h1 class="text-center">Calendar</h1><br /><br />
        <div class="container">
            <div class="calendar">
                <div class="icons">
                    <span id="prev" class="material-symbols-rounded text-center">chevron_left</span>
                    <p class="current-date" id="current-date"></p>
                    <span id="next" class="material-symbols-rounded text-center">chevron_right</span>
                </div>
                <ul id="days-of-week" class="day-of-week">
                    <li>Sun</li>
                    <li>Mon</li>
                    <li>Tue</li>
                    <li>Wed</li>
                    <li>Thu</li>
                    <li>Fri</li>
                    <li>Sat</li>
                </ul>
                    <ul class="days" id="days"></ul>
            </div>

            <div class="card">
                <div class="cards_heading">
                    <div class="date" id="date"></div>
                    <div class="date" id="test"></div>
                    <div class="title">Events</div>
                </div>
                
                <div class="cards_content"></div>
            </div>
        </div>
    </div>
    <input type="hidden" name="role" value="<?php echo $_SESSION['role']?>">
</body>

</html>