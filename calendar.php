<?php 
require 'conn.php';
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
require 'Navbar/navbar_log.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/calendar.css">
    <link rel="stylesheet" href="cards/cards.css">
    <title>Complain</title>
</head>
<body>
<div id="main" class="main">
    <div class="calendar-month">
    <section class="calendar-month-header">
    <div id="selected-month" class="calendar-month-header-selected-month">
      February 2020
    </div>

    <!-- <div class="calendar-month-header-selectors">
      <span id="previous-month-selector"><</span>
      <span id="present-month-selector">Today</span>
      <span id="next-month-selector">></span>
    </div> -->
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
    <li class="calendar-day">
      <span>1</span>
    </li>
    <li class="calendar-day">
      <span>2</span>
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
      <span>12</span>
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
      <span>26</span>
    </li>
    <li class="calendar-day">
      <span>27</span>
    </li>
    <li class="calendar-day">
      <span>28</span>
    </li>
    <li class="calendar-day">
      <span>29</span>
    </li>
  </ol>
</div>
</div>
</body>
</html>