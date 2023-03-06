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
<script>
    function myFunction() {
        var y = document.getElementById("myInput");
        if (y.type == "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
</script>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2>Sponsor Profile</h2><br><br>
        <div class="row">
                <div class="column1">
                    <img class="image" src="<?php echo BASE_URL ?>public/images/logoOrg.jpeg" /><br><br>
                    <table>
                        <tr>
                            <td><?php echo $this->user['Name']; ?></td>
                        </tr>
                    </table>
                </div>

                <div class="column2"><br/>
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
                            <td>Contact Number</td>
                            <td>:</td>
                            <td><?php echo $this->user['Name']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $this->profile['Email'] ?></td>
                        </tr>
                        <tr>
                            <td>Contact Number</td>
                            <td>:</td>
                            <td><?php echo $this->user['Address']; ?></td>
                        </tr>
                        <tr>
                            <td>Contact Number</td>
                            <td>:</td>
                            <td><?php echo $this->user['Contact']; ?></td>
                        </tr>

                        <button class="btnpw"> <a href="<?php echo BASE_URL; ?>Sponsor/ChangeProfilePsw">Change Password</a></button><br><br>

                    </table>

                </div>
        </div>
    </div>
    <?php include 'views/includes/footer.php'; ?>
</body>

</html>