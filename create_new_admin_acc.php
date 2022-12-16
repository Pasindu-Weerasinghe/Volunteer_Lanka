<?php include 'conn.php'; ?>
<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
require 'Navbar/navbar_log.php';
$alert = null;

if (isset($_REQUEST['create'])) {

    $role = $_REQUEST["role"];
    $email = $_REQUEST["email"];
    $psw = password_hash($_REQUEST["psw"], PASSWORD_BCRYPT);

    $sql = "INSERT INTO user (Email, Password, Role, Status, Restricted) values ('$email', '$psw', '$role','active', '0')";
    $result = mysqli_query($conn, $sql);

    if($result){
        $alert="Account created successfully";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Admin Accounts</title>
    <link rel="stylesheet" href="styles/create_new_admin_acc.css">

</head>

<body>

    <form action="create_new_admin_acc.php" method="POST">
        <div class="main" id="main">
            <h2>Create New Admin Accounts</h2>
            <div id="com-box">
                <div id="box-item">
                <?php
                if ($alert) {
                    echo '<label id="error"> ' . $alert . '</label><br/><br/>';
                } ?>
                    <!-- <div class="box-item-cus">
                        <label for="">Name :</label>
                        <input type="text"><br>
                    </div> -->

                    <div class="box-item-cus">
                        <label for="">Email :</label>
                        <input type="text" name="email" required><br>
                    </div>

                    <div class="box-item-cus">
                        <label for="">Password :</label>
                        <input type="password" name="psw" required><br>
                    </div>

                    <div class="box-item-cus">
                        <label for="">Confirm Password :</label>
                        <input type="password" name="confirm-psw" required><br>
                    </div>

                    <div class="box-item-cus">
                        <label for="">Role :</label>
                        <select name="role" required>
                            <option value="admin">Admin</option>
                            <option value="volunteer">Volunteer</option>
                        </select>
                    </div>
                </div>
                <div id="btn-area">
                    <a class="btn" href="home_admin.php">Cancel</a>
                    <button class="btn" name="create" type="submit">Create</button>
                </div>
            </div>
            <br>
        </div>

        <br>
    </form>
</body>

</html>