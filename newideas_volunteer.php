<?php 
include 'conn.php';
session_start();
if (isset($_SESSION['uid'])) {
    include 'Navbar/navbar_log.php';
}
else {
    header("Location: login.php");
}
include 'sidenav/sidenav.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/request.css">
    <title>New Ideas</title>
</head>
<body>
<div id="main">
    <div class="container-body">
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
</div>
</body>
</html>
