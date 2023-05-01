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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/profile.css" text="text/css">
    <title>Edit Profile </title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php' ?>
    <div class="main" id="main">
        <div class="form1">
            <div class="row1">
                <div>
                    <table>
                        <tr>
                            <td><?php echo $this->user['Name']; ?></td>
                        </tr>
                    </table>
                    <img class="image" src="<?php echo BASE_URL ?>public/images/<?php echo $this->profile['Photo'] ?>" alt=""><br><br>
                    <form class="column1" action="<?php echo BASE_URL; ?>Sponsor/changeProfilePic" method="post" enctype="multipart/form-data">
                        <input type="file" name="profilepic"><br>
                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>

            <form class="column2">

                <label for="uname"><b>E-Mail</b></label><br>
                <input type="text" name="uname" value="<?php echo $this->profile['Email'] ?>" readonly><br>

                <label for="uname"><b>Name</b></label><br>
                <input type="text" name="uname" value="<?php echo $this->user['Name']; ?>"" > <br>

                        <label for=" about"><b>Contact Number</b></label><br>
                <input type="text" name="cNumber" value="<?php echo $this->user['Contact']; ?>"><br>

                <label for="des"><b>Address</b></label><br>
                <input type="text" name="cNumber" value="<?php echo $this->user['Address']; ?>"><br>

                <button class="prbtn"> <a href="">Update Profile</a></button>

            </form>

        </div>

    </div>

</body>

</html>