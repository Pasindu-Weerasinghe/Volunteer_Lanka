<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/form.css">
    <title>Join Form</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div id="main" class="main">
        <h2>Fill this form and join the project</h2><br />
        <form action="<?php echo BASE_URL ?>volunteer/join_project/<?php echo $this->pid ?>" method="post" id="form2">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <label id="require"><strong>*</strong></label><br>
                <input type="text" name="uname" value=<?php echo ($_SESSION['uname']) ?> readonly>

                <label for="contact"><b>Contact Number</b></label>
                <label id="require"><strong>*</strong></label><br>
                <input type="text" name="contact" required>

                <br><br><label for="about"><b>Meal Preference</b></label>
                <label id="require"><strong>*</strong></label><br><br>
                <input type="radio" name="radio-meal" id="veg" value="veg" required> Vegetarian &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" name="radio-meal" id="non-veg" value="nonveg"> Non Vegetarian<br><br><br>

                <label for="des"><b>Have you participated in volunteering projects before?</b></label>
                <label id="require"><strong>*</strong></label><br><br>
                <input type="radio" name="radio-prior" id="yes" value="yes" required> Yes &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" name="radio-prior" id="no" value="no"> No<br><br><br>

                <div class="btn-area">
                    <button class="btn" onclick="history.back()">Back</button>
                    <button class="btn" id="right" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>