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
    <title>Delete User Account</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/delete_user_acc.css">
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <div class="search-container">
            <input type="text" name="search">
            <button name="search"><b>Search<b></button>
        </div><br><br>
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
                        <td>Nethmie Imanya</td>
                        <td>Volunteer</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Rotaract Club UOP</td>
                        <td>Organizer</td>
                        <td>Restricted</td>
                    </tr>
                    <tr>
                        <td>IFS R&D International</td>
                        <td>Sponsor</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Pasindu Weerasinghe</td>
                        <td>Admin</td>
                        <td>Active</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>