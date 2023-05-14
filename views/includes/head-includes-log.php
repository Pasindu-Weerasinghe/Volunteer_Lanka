<?php
if (session_status() == PHP_SESSION_NONE) {
    // if session is not started, start the session
    session_start();
}
if (!isset($_SESSION['uid'])) {
    // if user is not logged in, redirect to login page
    header('Location: ' . BASE_URL . 'index/login');
}
$role = $_SESSION['role'];
?>

<!--navbar links--->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/navbar_log.css">
<script defer src="<?php echo BASE_URL; ?>public/scripts/navbarlog.js"></script>
<!--------------------------------------------------------------------------->

<!--footer links--->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/footer.css">
<!--------------------------------------------------------------------------->

<!--sidenav links--->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/sidenav.css">
<script defer src="<?php echo BASE_URL; ?>public/scripts/sidenav.js"></script>
<!--------------------------------------------------------------------------->

<!--notifications--->
<script defer >
    const BASE_URL = "<?php echo BASE_URL; ?>";
    const role = "<?php echo $_SESSION['role'] ?>";

    function getNotificationCount() {
        fetch(`${BASE_URL}${role}/notifications/count`)
            .then(response => response.json())
            .then(data => {
                if (data > 0) {
                    document.getElementById('notification-badge').style.display = 'flex';
                    document.getElementById('notification-badge').innerHTML = data;
                } else {
                    document.getElementById('notification-badge').style.display = 'none';
                }
            })
    }

    getNotificationCount();
    // setInterval(getNotificationCount, 1000);
</script>

<!-- font awesome library -->
<!--<script src="https://kit.fontawesome.com/689bb17261.js" crossorigin="anonymous"></script>-->
<script src="<?php echo BASE_URL ?>libs/http_kit.fontawesome.com_689bb17261.js" crossorigin="anonymous"></script>