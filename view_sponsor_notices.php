<?php include 'Navbar/navbar.php' ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/view_sponsor_notices.css">
</head>

<body>
    <br>
    <h2>Sponsor Notices</h2><br>
    <div>
        <div class="slider">
            <span id="slide-1"></span>
            <span id="slide-2"></span>
            <span id="slide-3"></span>
            <div class="image-container">
                <img src="cards/img1.jpg" class="slide" width="500" height="300" />
                <img src="cards/img2.jpg" class="slide" width="500" height="300" />
                <img src="cards/img3.jpg" class="slide" width="500" height="300" />
            </div>
            <div class="buttons">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
            </div>
        </div>


        <table class="table1">
            <tr>
                <td>Date</td>
                <td>: 11/10/2022</td>
            </tr>
            <tr>
                <td>Time</td>
                <td>: 10.00 AM</td>
            </tr>
            <tr>
                <td>Venue</td>
                <td>: Galle</td>
            </tr>
            <tr>
                <td>Organizer</td>
                <td>: Rotaract Club UOM</td>
            </tr>
            <tr>
                <td>Number of Volunteers</td>
                <td>: 5</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>:________________________________________________</td><br>
            </tr>
        </table>
    </div>

    <p>Select sponsor package bellow</p><br><br>

    <div class="silver">
        <input type="radio" name="individual">
        <strong>Silver</strong><br>
        <strong>Price: 2000.00</strong> 
    </div>

    <div class="silver">
        <input type="radio" name="individual">
        <strong>Gold</strong><br>
        <strong>Price: 1000.00</strong> 
    </div>

    <div class="silver">
        <input type="radio" name="individual">
        <strong>Platinum</strong><br>
        <strong>Price: 500.00</strong> 
    </div>

    <div>
        <br><br>
        <button class="btn1"><a href="#">Cancel</a></button>
        <button class="btn2"><a href="#">Confirm</a></button>
    </div>

    </html>