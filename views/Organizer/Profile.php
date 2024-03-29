<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'views/includes/head-includes-log.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/profile.css" text="text/css">
    <title>User Profile</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <div class="form1">
            <div class="left-container">
                <h2><?php echo $this->organizer['Name']; ?></h2>
                <img class="image" src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $this->organizer['Photo'] ?>" alt="">
                <div class="btn-area">
                    <button class="btn"> <a href="<?php echo BASE_URL; ?>Organizer/ChangeProfilePic"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</a></button>
                    <button class="btn"> <a href="<?php echo BASE_URL; ?>Organizer/ChangeProfilePsw"><i class="fa-solid fa-key"></i> Change Password</a></button>
                </div>
            </div>



            <table class="right-container">
                <tr>
                    <td>User ID</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->organizer['U_ID']; ?></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td id="data">Organizer</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->organizer['Name']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->organizer['Email'] ?></td>
                </tr>
                <tr>
                    <td>No. of Members</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->organizer['No_of_members']; ?></td>
                </tr>
                <tr>
                    <td>Branch</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->organizer['Branch']; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->organizer['Address']; ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->organizer['Contact']; ?></td>
                </tr>
            </table>

        </div>
    </div>
</body>

</html>