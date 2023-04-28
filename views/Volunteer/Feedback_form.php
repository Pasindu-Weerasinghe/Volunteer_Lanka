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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/feedback.css">
    <script src="<?php echo BASE_URL; ?>public/scripts/rating.js" defer></script>
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
                <input type="text" name="des" id="des"><br>

                <label for="rating"><b>Leave your rating</b></label><br><br>
                    <div class="stars">
                        <i class="fa fa-star unchecked submit_star" id="submit_star_1" data-rating="1"></i>
                        <i class="fa fa-star unchecked submit_star" id="submit_star_2" data-rating="2"></i>
                        <i class="fa fa-star unchecked submit_star" id="submit_star_3" data-rating="3"></i>
                        <i class="fa fa-star unchecked submit_star" id="submit_star_4" data-rating="4"></i>
                        <i class="fa fa-star unchecked submit_star" id="submit_star_5" data-rating="5"></i>
                        <label id="rate"></label>
                        <input type="hidden" name="rating" id="rating">
                    </div><br><br>

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