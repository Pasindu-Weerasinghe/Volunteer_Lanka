<?php 
require 'conn.php';
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
require 'Navbar/navbar_log.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/search.css">
    <link rel="stylesheet" href="cards/cards.css">
    <title>Search</title>
</head>
<body>
<div id="main" class="main">
        <div class="search-container">
                <br/><input type="text" name="search">
                <button name="search"><b>Search<b></button>
        </div><br/><br/><br/>
        <table>
            <tr>
                <th>Organizer</th>
                <th>Branch</th>
                <th>Contact Number</th>
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






