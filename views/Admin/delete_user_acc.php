<?php

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
    <title>Delete User Account</title>
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/delete_user_acc.css">
    <script src="<?php echo BASE_URL; ?>public/scripts/user_in_admin.js" defer></script>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <div class="search-container">
            <input type="text" name="search">
            <button name="search"><b>Search<b></button>
        </div><br><br>
        <div id="tb_area">
            <table>
                <thead>
                    <tr>
                        <th>User Account</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="users-list">
                    <?php foreach ($this->userDetails as $userDetail) { ?>
                        <tr onclick="window.location.href='<?php echo BASE_URL . 'Admin/view'.ucfirst($userDetail['Role']).'Profile/' . $userDetail['U_ID']; ?>'">
                            <td><?php echo $userDetail['Name'] ?></td>
                            <td><?php echo ucfirst($userDetail['Role']) ?></td>
                            <td><?php echo ucfirst($userDetail['Status']) ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>