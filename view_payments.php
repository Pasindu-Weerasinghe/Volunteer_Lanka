
<?php 
include 'conn.php';
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
    <title>View Payments</title>
    <link rel="stylesheet" href="styles/delete_user_acc.css">
</head>
<body>
    <div class="main" id="main">
    <div class="search-container">
            <input type="text" name="search">
            <button name="search"><b>Search<b></button>
        </div><br><br>
        <div id="tb_area">
            <table>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Payment Type</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Rotaract Club UOC</td>
                        <td>LKR 800</td>
                        <td>2022/11/07</td>
                        <td>Monthly Subscription</td>
                    </tr>
                    <tr>
                        <td>Rotaract Club UOM</td>
                        <td>LKR 80</td>
                        <td>2022/11/15</td>
                        <td>Extra Project</td>
                    </tr>
                    <tr>
                        <td>Leo Club Gampaha</td>
                        <td>LKR 800</td>
                        <td>2022/11/07</td>
                        <td>Monthly Subscription</td>
                    </tr>
                    <tr>
                    <td>Lions Club Kandy</td>
                        <td>LKR 80</td>
                        <td>2022/11/15</td>
                        <td>Extra Project</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>