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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/form.css">
    <title>Feedback Form</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div id="main" class="main">
        <h2>We appreciate your thoughts on our project</h2><br />
        <form action="<?php echo BASE_URL ?>volunteer/add_feedback/<?php echo $this->pid ?>" method="post" id="form2">
            <div class="container">
                <label for="uname"><b>Username</b></label><br>
                <input type="text" name="uname" value=<?php echo ($_SESSION['uname']) ?> readonly>

                <label for="contact"><b>Description</b></label><br>
                <input type="text" name="des"><br><br>

                <!-- <label for="photo"><b>Add Photos</b></label>
                <input type="file" name="file[]" multiple="multiple"><br><br><br><br> -->

                <div class="btn-area">
                    <button class="btn" onclick="history.back()">Back</button>
                    <button class="btn" id="right" type="submit">Submit</button>
                </div>

            </div>
        </form>
    </div>
</body>

</html>