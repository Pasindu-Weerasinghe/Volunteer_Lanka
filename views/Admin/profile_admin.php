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
            <div class="left-container">

                <h2><?php echo $this->profile['Name']; ?></h2>

                <?php if ($this->profile['Photo'] == null) { ?>
                        <img class="image" src="<?php echo BASE_URL ?>public/images/profile.jpg" alt="">
                                                                                    
                    <?php } else { ?>
                        <img class="image" src="<?php echo BASE_URL ?>public/images/<?php echo $this->profile['Photo'] ?>" alt="">
                                                                                    
                    <?php  } ?>

                <div class="btn-area">
                   
                    <button class="btn"> <a href="<?php echo BASE_URL; ?>Sponsor/ChangeProfilePsw"><i class="fa-solid fa-key"></i> Change Password</a></button>
                </div>
            </div>



            <table class="right-container">
                <tr>
                    <td>User ID</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->profile['U_ID']; ?></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->profile['Role']; ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->profile['Name']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->profile['Email'] ?></td>
                </tr>
            </table>

        </div><br>
    </div>
</body>

</html>