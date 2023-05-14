<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/profile.css">
    <script src="https://kit.fontawesome.com/18409fd0c0.js" crossorigin="anonymous"></script>
    <title>User Profile</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <div class="form1">
            <!-- <h2><i class="fa-solid fa-caret-right fa-lg" style="color: #000000;"></i> Achivemenbjjjjjhjnts</h2><br>
            <h2><i class="fa-solid fa-caret-right fa-lg" style="color: #000000;"></i> Profile Details</h2><br> -->

            <div class="row1">
                <div class="col">
                    <table>
                        <tr>
                            <td><?php echo $this->profile['Name']; ?></td>
                        </tr>
                    </table>
                    <?php if ($this->profile['Photo'] == null) { ?>
                        <img class="image" src="<?php echo BASE_URL ?>public/images/profile.jpg" alt="">
                                                                                    
                    <?php } else { ?>
                        <img class="image" src="<?php echo BASE_URL ?>public/images/<?php echo $this->profile['Photo'] ?>" alt="">
                                                                                    
                    <?php  } ?>

                    <br><br>
                    <div class="btn">
                        <!-- <button class="prbtn1"> <a href="<?php //echo BASE_URL; ?>admin/ChangeProfilePic">Edit Profile</a></button> -->
                        <button class="prbtn1" id="cp"> <a href="<?php echo BASE_URL; ?>admin/ChangeProfilePsw">Change Password</a></button>
                    </div>
                </div>
            </div>


            <table class="T1">
                <tr>
                    <td>User ID</td>
                    <td>:</td>
                    <td><?php echo $this->profile['U_ID']; ?></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td><?php echo $this->profile['Role']; ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><?php echo $this->profile['Name']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $this->profile['Email'] ?></td>
                </tr>
            </table>

        </div><br>
    </div>
</body>

</html>