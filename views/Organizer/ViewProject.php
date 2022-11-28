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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view.css">
    <title>Project Name</title>
</head>

<body>
    <!-- navigationb bar -->
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main">
        <h2>Project Name</h2><br /><br />
        <div class="container">
            <div class="container-image">
                <image src="<?php echo BASE_URL ?>public/images/card-img1.jpg">
            </div>
            <table>
                <tr>
                    <td>Date</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Venue</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Number of Volunteers</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
        </div>

        <button class="btn1"><a href="">Cancel Project</a></button>
        <button class="btn2"><a href="">Postpone Project</a></button>
    </div>

</body>

</html>