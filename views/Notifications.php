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

    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/notifications.css">
    <title>Notifications</title>
</head>

<body>
<?php include 'views/includes/navbar_log.php'; ?>

<div id="main" class="main">

    <div class="container">
        <button id="delete-all-notifications">Clear all</button>
        <h1>Notifications</h1>
        <div class="wrapper">
            <section class="notification">
                <p>This is a notification content</p>
                <div class="btn-area">
                    <button onclick="" class="delete"><i class="fa-solid fa-trash"></i></button>
                </div>
            </section>

            <section class="notification">
                <p>This is a notification content Accept collab request</p>
                <div class="btn-area">
                    <button onclick="" class="accept">Accept</button>
                    <button onclick="" class="reject">Reject</button>
                </div>
            </section>

            <section class="notification">
                <p>This is a notification content volunteer view project idea reply</p>
                <div class="btn-area">
                    <button onclick="" class="view">View</button>
                    <button onclick="" class="delete"><i class="fa-solid fa-trash"></i></button>
                </div>
            </section>
        </div>
    </div>


</div>

<!--hidden inputs to pass data to js-->
<input type="hidden" name="uid" value="<?php echo $_SESSION['uid'] ?>">
<input type="hidden" name="role" value="<?php echo $_SESSION['role'] ?>">
</body>
<script type="module" src="<?php echo BASE_URL ?>public/scripts/notifications.js"></script>
</html>