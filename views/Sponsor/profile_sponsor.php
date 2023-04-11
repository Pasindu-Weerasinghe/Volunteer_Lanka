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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/profile.css">
    <title>User Profile</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2>Sponsor Profile</h2><br><br>
        <div class="row1">
            <div class="column1">
                <form action="<?php echo BASE_URL; ?>Sponsor/changeProfilePic" method="post" enctype="multipart/form-data">
                    <?php if (!empty($this->user['Photo'])) : ?>
                        <img id="card-img" src="<?php echo BASE_URL . $this->user['Photo']; ?>" /><br><br>
                    <?php endif; ?>
                    <input type="file" name="profilepic"><br><br>
                    <input type="submit" value="Save" class="btn">
                </form>


                <table>
                    <tr>
                        <td><?php echo $this->user['Name']; ?></td>
                    </tr>
                </table>
                <button class="btnpw"> <a href="<?php echo BASE_URL; ?>Sponsor/ChangeProfilePsw">Change Password</a></button><br><br>
            </div>

            <div class="column2">
                <table>
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
                        <td><?php echo $this->user['Name']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $this->profile['Email'] ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td><?php echo $this->user['Address']; ?></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td>:</td>
                        <td><?php echo $this->user['Contact']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php include 'views/includes/footer.php'; ?>
</body>

</html>