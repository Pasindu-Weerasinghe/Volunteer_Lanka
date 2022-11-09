<?php
    unset($_SESSION['uid']);
    session_destroy();
    header("Location: login.php");
    $conn->close();
    exit();
?>