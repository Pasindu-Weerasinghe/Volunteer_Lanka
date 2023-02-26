<link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/calender.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
<script src="<?php echo BASE_URL; ?>public/scripts/calender.js" defer></script>

<div class="main-container border v-center flex-gap responsive-container">
    <div class="main border">
        <h1 class="text-center">Calender</h1>
        <div class="flex h-justify">

            <div class="wrapper">
                <header class="flex v-center h-justify">
                    <p class="current-date"></p>
                    <div class="icons">
                        <span id="prev" class="material-symbols-rounded text-center">chevron_left</span>
                        <span id="next" class="material-symbols-rounded text-center">chevron_right</span>
                    </div>
                </header>
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
                </div>
            </div>

            <div class="card">
                <div class="cards_heading flex h-justify" >
                    <div class="week_days">Tuesday</div>
                    <div class="date">January 4 2023</div>
                </div>
                <div class="cards_heading cards_content flex h-justify v-center">
                    <div class="rank">CS 2003 Assignment 1</div>
                    <div class="student_name">08:30</div>
                </div>

                <div class="cards_heading cards_content1 flex h-justify v-center">
                    <div class="rank">CS 2001 Labsheet 4</div>
                    <div class="student_name">09:30</div>
                </div>
                <div class="cards_heading cards_content flex h-justify v-center">
                    <div class="rank">CS 2002 Tutorial</div>
                    <div class="student_name">10:30</div>
                </div>

                <div class="cards_heading cards_content1 flex h-justify v-center">
                    <div class="rank">CS 2004 Online Quiz</div>
                    <div class="student_name">11:30</div>
                </div>
            </div>
        </div>
    </div>
</div>

