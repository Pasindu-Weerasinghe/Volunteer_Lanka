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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/form.css" text="text/css">
    <title>Edit Profile </title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php' ?>
    <div class="main" id="main">
    
                <form action="<?php echo BASE_URL; ?>Volunteer/change_profile" method="post" id="form2">
                <div class="heading">
                    <?php echo $this->user['Name']; ?>
                    <img class="image" src="<?php echo BASE_URL ?>public/images/<?php echo $this->profile['Photo'] ?>">
                </div>
                    <input type="file" name="profilepic"><br><br>
                    <input type="submit" value="Save" class="btn">
                </form>
            
        <form action="<?php echo BASE_URL ?>volunteer/update_profile" method="post" enctype="multipart/form-data" id="form2">
            <div class="container">
                <input type="hidden" name="uid" value="<?php echo $_SESSION['uid'] ?>">

                <label for="uname"><b>E-Mail</b></label><br>
                <input type="text" name="email" value="<?php echo $this->profile['Email'] ?>" readonly><br>

                <label for="name"><b>Name</b></label>
                <label id="require"><strong>*</strong></label>
                <input type="text" name="uname" value="<?php echo $this->user['Name'] ?>" required>

                <label for="contact"><b>Contact Number</b></label>
                <label id="require"><strong>*</strong></label>
                <input type="text" name="cNumber" minlength="10" maxlength="10" value="<?php echo $this->user['Contact']; ?>" required>

                <label for="address"><b>Address</b></label>
                <label id="require"><strong>*</strong></label><br>
                <textarea rows="2" name="address" style="resize: none;" required class="des"><?php echo $this->user['Address']; ?></textarea>

                <label><b>Select your interested areas for volunteering</b></label><br /><br />
                <div class="checkbox_container ">
                    <input type="checkbox" name="area[]" value="Beach">
                    <label>Beach cleaning</label><br />
                    <input type="checkbox" name="area[]" value="Donation">
                    <label>Providing facilities to rural areas</label><br />
                    <input type="checkbox" name="area[]" value="Environment">
                    <label>Tree planting</label> <br />
                    <input type="checkbox" name="area[]" value="Orphan">
                    <label>Helping child/adult orphanages</label><br />
                    <input type="checkbox" name="area[]" value="Animal">
                    <label>Animal rescuing/rehabilitation</label><br /><br />
                </div>


                <label><b>Select organizations you have already joined</b></label><br /><br />
                <div class="checkbox_container">
                    <input type="checkbox" name="org[]" value="Rotaract Club">
                    <label for="org1">Rotaract Club</label><br />
                    <input type="checkbox" name="org[]" value="IEEE Society">
                    <label for="org2">IEEE society</label><br />
                    <input type="checkbox" name="org[]" value="AIESEC">
                    <label for="org3">AIESEC</label> <br />
                    <input type="checkbox" name="org[]" value="Leo Club">
                    <label for="org4">Leo Club</label><br />
                    <input type="checkbox" name="org[]" value="Lions Club">
                    <label for="org5">Lions Club</label><br /><br />
                </div>

                <div class="clearfix">
                    <button class="btn" onclick="history.back()"><b>Back</b></button>
                    <button name="update" class="btn" id="update"><b>Save</b></button>
                </div>
            </div>
        </form>

    </div>

    </div>

</body>

</html>