<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL . 'index/login');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view.css">
    <title>Form for Volunteers</title>
</head>

<body>
    <!-- navigation bar -->
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
        <h2>Create a Form for Volunteers</h2><br />

        <div class="container">
            <p>The form you create here will be displayed to volunteers when joining
                select necessary fields you would like to have in your form.</p>
            <table>
                <tr>
                    <td><input type="checkbox" name="v-name"></td>
                    <td>Volunteer Name</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="email"></td>
                    <td>E-mail address</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="contact-no"></td>
                    <td>Contact number</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="meal-pref"></td>
                    <td>Meal preference</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="prior-participations"></td>
                    <td>Prior partcipation in volunteer projects</td>
                </tr>
            </table>
        </div>

        <button class="btn1">Back</button>
        <button class="btn2">Create</button>

    </div>

</body>

</html>