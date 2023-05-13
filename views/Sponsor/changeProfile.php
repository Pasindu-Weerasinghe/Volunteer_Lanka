<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'views/includes/head-includes-log.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/profile.css" text="text/css">
    <title>Edit Profile </title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php' ?>
    <div class="main" id="main">
        <div class="form1">
            <div class="left-container">
                <h2 id="lc"><?php echo $this->user['Name']; ?></h2>
                <img class="image" src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $this->profile['Photo'] ?>" alt=""><br><br>
                <form class="column1" action="<?php echo BASE_URL; ?>Sponsor/changeProfilePic" method="post" enctype="multipart/form-data">
                    
                    <h3><i class="fa-solid fa-pen-to-square fa-lg"></i> Add Image</h3>
                    <div class="btn-area">
                        <input type="file" name="profilepic" class="btn" style="font-size: small">
                        <input type="submit" value="Save" class="btn">
                    </div>

                </form>
            </div>

            <form action="<?php echo BASE_URL . $_SESSION['role']; ?>/updateProfile" id="lc2" method="post" enctype="multipart/form-data" class="right-container">

                <input type="hidden" name="uid" value="<?php echo $_SESSION['uid'] ?>">

                <label for="uname"><b>E-Mail</b></label><br>
                <input type="text" name="email" value="<?php echo $this->profile['Email'] ?>" readonly><br>

                <label for="uname"><b>Name</b></label><br>
                <input type="text" name="uname" value="<?php echo $this->user['Name']; ?>"" > <br>

                        <label for=" about"><b>Contact Number</b></label><br>
                <input type="text" name="cNumber" value="<?php echo $this->user['Contact']; ?>"><br>

                <label for="des"><b>Address</b></label><br>
                <input type="text" name="address" value="<?php echo $this->user['Address']; ?>"><br>

                <div class="btn-area">
                    <button class="btn" id="upbtn" name="update"> Update Profile</a></button>
                </div>
            </form>

        </div>

    </div>

</body>

</html>