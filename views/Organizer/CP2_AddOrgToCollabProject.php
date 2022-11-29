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
    <title>Collaborate Project</title>
</head>

<body>

    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
        <h2>Add Organizers to Collaborate Project</h2><br /><br />
        <div class="container">
            <table>
                <tr>
                    <td>Project Name</td>
                    <td>:</td>
                    <td><input type="text" name="project-name" required></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>:</td>
                    <td><input type="date" name="date" required></td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td>:</td>
                    <td><input type="time" name="time" required></td>
                </tr>
                <tr>
                    <td>Venue</td>
                    <td>:</td>
                    <td><input type="text" name="venue" required></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td><input type="text" name="description" required></td>
                </tr>
                <tr>
                    <td>Number of Volunteers</td>
                    <td>:</td>
                    <td><input type="number" name="no-of-members" min="1" required></td>
                </tr>
                <tr>
                    <td>Select partnership</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Select sponsorship</td>
                    <td>:</td>
                    <td></td>
                </tr>

            </table>
        </div>

        <button class="btn1" onclick="history.back()">Cancel</button>
        <button class="btn2"><a href="<?php echo BASE_URL; ?>organizer/create_project/publish_sponsor_notice">Next</a></button>
    </div>

</body>

</html>