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
    <link rel="stylesheet" href="styles/request.css">
    <!-- <link rel="stylesheet" href="cards/cards.css"> -->
    <title>New Ideas</title>
</head>
<body>
<div id="main" class="main">
        <h2>Requests sent by you to organize projects</h2>
        <button class="new"><a href="request_projects.php"><b>New Request</b></a></button>
        <br/><br/><br/><br/>
        <table>
            <tr>
                <th>Location</th>
                <th>Description</th>
                <th>Images</th>
            </tr>
            <tr>
                <td>Alfreds Futterkiste</td>
                <td>Maria Anders</td>
                <td>Germany</td>
            </tr>
            <tr>
                <td>Berglunds snabbköp</td>
                <td>Christina Berglund</td>
                <td>Sweden</td>
            </tr>
        </table>
</div>
</body>
</html>
