<?php include 'conn.php'; ?>
<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
}
require 'Navbar/navbar_log.php';
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

    <form action="n_acc.php" method="POST">
        <div class="main" id="main">
            <h2>Create New Admin Accounts</h2>
            <div id="com-box">
                <div id="box-item">
                    <!-- <div class="box-item-cus">
                        <label for="">Name :</label>
                        <input type="text"><br>
                    </div> -->

                    <div class="box-item-cus">
                        <label for="">Email :</label>
                        <input type="text" name="email"><br>
                    </div>

                    <div class="box-item-cus">
                        <label for="">Password :</label>
                        <input type="password" name="psw"><br>
                    </div>

                    <div class="box-item-cus">
                        <label for="">Confirm Password :</label>
                        <input type="password" name="confirm-psw"><br>
                    </div>

                    <div class="box-item-cus">
                        <label for="">Role :</label>
                        <select name="role">
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div id="btn-area">
                    <button class="btn" onclick="history.back()">Cancel</button>
                    <button class="btn" name="create" type="submit">Create</button>
                </div>
            </div>
            <br>
        </div>

        <br>
    </form>
</body>

</html>