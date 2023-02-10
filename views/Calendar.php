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
    <title>Calendar</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>

    <div id="main" class="main">
        <div class="container">
            <div class="calendar-month">
                <section class="calendar-month-header">
                    <div id="selected-month" class="calendar-month-header-selected-month">
                        February 2023
                    </div>
                </section>

                <ol id="days-of-week" class="day-of-week">
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
                    <li class="calendar-day">
                        <span>1</span>
                    </li>
                    <li class="calendar-day">
                        <span>2</span><br>
                    </li>
                    <li class="calendar-day">
                        <span>3</span>
                    </li>
                    <li class="calendar-day">
                        <span>4</span>
                    </li>

                    <li class="calendar-day">
                        <span>5</span>
                    </li>
                    <li class="calendar-day">
                        <span>6</span>
                    </li>
                    <li class="calendar-day">
                        <span>7</span>
                    </li>
                    <li class="calendar-day">
                        <span>8</span>
                    </li>
                    <li class="calendar-day">
                        <span>9</span>
                    </li>
                    <li class="calendar-day">
                        <span>10</span>
                    </li>
                    <li class="calendar-day">
                        <span>11</span>
                    </li>
                    <li class="calendar-day">
                        <span>12</span><br><br>
                        <a href="#">
                            <center><b style="color: red;">Tree planting</b></center>
                        </a>
                    </li>
                    <li class="calendar-day">
                        <span>13</span>
                    </li>
                    <li class="calendar-day">
                        <span>14</span>
                    </li>
                    <li class="calendar-day">
                        <span>15</span>
                    </li>
                    <li class="calendar-day">
                        <span>16</span>
                    </li>
                    <li class="calendar-day">
                        <span>17</span>
                    </li>
                    <li class="calendar-day">
                        <span>18</span>
                    </li>
                    <li class="calendar-day">
                        <span>19</span>
                    </li>
                    <li class="calendar-day">
                        <span>20</span>
                    </li>
                    <li class="calendar-day">
                        <span>21</span>
                    </li>
                    <li class="calendar-day">
                        <span>22</span>
                    </li>
                    <li class="calendar-day">
                        <span>23</span>
                    </li>
                    <li class="calendar-day">
                        <span>24</span>
                    </li>
                    <li class="calendar-day">
                        <span>25</span>
                    </li>
                    <li class="calendar-day">
                        <span>26</span></span><br><br>
                        <a href="#">
                            <center><b style="color: red;">Beach cleaning</b></center>
                        </a>
                    </li>
                    <li class="calendar-day">
                        <span>27</span>
                    </li>
                    <li class="calendar-day">
                        <span>28</span>
                    </li>
                </ol>
            </div>
        </div>

    </div>
</body>

</html>