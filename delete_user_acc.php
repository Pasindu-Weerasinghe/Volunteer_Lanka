
<?php include 'conn.php'; ?>
<?php
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
    <title>Delete User Account</title>
    <link rel="stylesheet" href="styles/delete_user_acc.css">
</head>
<body>
    <div class="main">
        <div id="tb_area">
            <table>
                <thead>
                    <tr>
                        <th>User Account</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pasindu</td>
                        <td>Admin</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Hasindu</td>
                        <td>Sponsor</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Nethmie</td>
                        <td>Volunteer</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Binula</td>
                        <td>Organizer</td>
                        <td>Active</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <br>
        <button id="back-btn">Back</button>
        <br><br>
</body>
</html>