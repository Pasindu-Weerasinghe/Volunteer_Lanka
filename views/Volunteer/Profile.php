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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/profile_volunteer.css">
    <title>User Profile</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2>Volunteer Profile</h2><br><br>
        <div class="container">
            <div class="column1">
                <img class="image" src="<?php echo BASE_URL ?>public/images/icon.jpg" /><br><br>
                <label class="sub2"> <?php echo $this->user['Name']; ?></label><br><br>
                <label class="sub3">Projects Volunteered : 8</label>
            </div>
            <div class="column2"><br />
                <button class="btnpw"> <a href="<?php echo BASE_URL; ?>Volunteer/ChangeProfilePsw">Change Password</a></button><br><br>
                <table>
                    <tr>
                        <td>User ID</td>
                        <td>:</td>
                        <td><?php echo $this->profile['U_ID']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $this->profile['Email'] ?></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td>:</td>
                        <td><?php echo $this->user['Contact']; ?></td>
                    </tr>
                    <tr>
                        <td>Interest Areas</td>
                        <td>:</td>
                        <td>Beach Cleaning, Tree Planting</td>
                    </tr>
                    <tr>
                        <td>Joined Organizations</td>
                        <td>:</td>
                        <td>Rotaract Club UOC</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>