<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/calendar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="<?php echo BASE_URL; ?>public/scripts/calender.js" defer></script>
    <title>Calendar</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>

<div class="main" id="main">
<div class="container">
        <h1 class="text-center">Calendar</h1><br/>
                    <div class="icons">
                        <span id="prev" class="material-symbols-rounded text-center">chevron_left</span>
                        <p class="current-date"></p>
                        <span id="next" class="material-symbols-rounded text-center">chevron_right</span>
                    </div>
                <div class="calendar">
                    <ul id="days-of-week" class="day-of-week">
                        <li>Sun</li>
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                    </ul>
                    <ul class="days"></ul>
                </div>
</div>
</div>



    <!-- <div id="main" class="main">
        <div class="container">
            <div class="calendar-month">
                <section class="calendar-month-header">
                <div class="icons">
                        <span id="prev" class="material-symbols-rounded text-center">chevron_left</span>
                        <span id="next" class="material-symbols-rounded text-center">chevron_right</span>
                    </div>
                </section>

                <div class="calendar">
                    <ul class="weeks flex flex-wrap text-center">
                        <li>Sun</li>
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                    </ul>
                    <ul class="days flex flex-wrap text-center text-bold">
                    </ul>
                </div> -->

                <!-- <ol id="days-of-week" class="day-of-week">
                    <li>Mon</li>
                    <li>Tue</li>
                    <li>Wed</li>
                    <li>Thu</li>
                    <li>Fri</li>
                    <li>Sat</li>
                    <li>Sun</li>
                </ol>

                <ol id="calendar-days" class="days-grid">
                    <li class="calendar-day" style="background-color: #CFD7E3;">
                        <span></span>
                    </li>
                    <li class="calendar-day" style="background-color: #CFD7E3;">
                        <span></span>
                    </li>
                    <li class="calendar-day" style="background-color: #CFD7E3;">
                        <span></span>
                    </li>
                    
                </ol> -->
            <!-- </div>
        </div>

    </div> -->
</body>

</html>