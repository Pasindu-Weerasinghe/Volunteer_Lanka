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
    <title>Create New Admin Accounts</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/create_new_admin_acc.css">
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <form action="<?php echo BASE_URL ?>admin/create_new_admin_acc/create" method="POST">
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