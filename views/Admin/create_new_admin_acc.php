<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Admin Accounts</title>
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/create_new_admin_acc.css">
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <form id="newacc" action="<?php echo BASE_URL ?>admin/create_acc_auth" method="POST">
        <div class="main" id="main">

            <div class="container">

                <!-- <hr> -->
                <?php
                if ($this->error == 'email exists') {
                    echo '<p id="error">Email exists!</p>';
                }
                if ($this->error == 'password does not match') {
                    echo '<p id="error">Password does not match!</p>';
                }
                ?>
                <label for="role"><b>Role</b></label>
                <div class="select">
                    <select id="role" name="role" required>
                        <option value="admin">Admin</option>
                        <!-- <option value="volunteer">Volunteer</option> -->
                    </select>
                </div>
                <label for="name"><b>Name</b></label>
                <input id="name" type="text" name="name" required>
                <label for="email"><b>Email</b></label>
                <input id="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input id="psw" type="password" name="psw" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>

                <label for="confirm-psw"><b>Confirm Password</b></label>
                <input id="confirm-psw" type="password" name="confirm-psw" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->

                <div class="clearfix">
                    <button onclick="history.back()" class="cancel">Cancel</button>
                    <button type="submit" class="next" name="create">Create</button>
                </div>

            </div>
            <br>
        </div>

        <br>
    </form>
</body>

</html>