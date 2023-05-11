<?php
$pid = $this->project['P_ID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view.css">
    <title><?php echo $this->project['Name'] ?></title>
    <script type="text/javascript">
        function button2() {
            var isJoined = <?php echo $this->isJoined ?>;
            if (isJoined) {
                document.getElementById("right").innerHTML = "Leave Project";
            } else {
                document.getElementById("right").innerHTML = "Join Project";
            }
        }
        window.onload = button2;
    </script>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2><?php echo $this->project['Name'] ?></h2><br /><br />
        <div class="container">
            <div class="container-image">
                <?php foreach ($this->images as $image) { ?>
                    <img src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $image['Image']; ?>">
                <?php } ?>
            </div>
            <div class="wrapper">
                <div class="left-div">
                    <label for="">Date</label><br>
                    <label for="">Time</label><br>
                    <label for="">Venue</label><br>
                    <label for="">Number of Volunteers</label><br>
                    <label for="">Description</label><br>
                </div>

                <div class="right-div">
                    <label id="data"><?php echo $this->project['Date'] ?></label><br>
                    <label id="data"><?php echo $this->project['Time'] ?></label><br>
                    <label id="data"><?php echo $this->project['Venue'] ?></label><br>
                    <label id="data"><?php echo $this->project['No_of_volunteers'] ?></label><br>
                    <label id="data"><?php echo $this->project['Description'] ?></label><br>
                </div>
            </div>
            <div class="btn-area">
                <button class="btn" onclick="history.back()">Back</button>
                <a onclick="return confirm('Are you sure you want to leave this Project?')" href="<?php echo BASE_URL ?>volunteer/join_leave_project/<?php echo $this->project['P_ID'] ?>/<?php echo $this->isJoined ?>/<?php echo $this->project['No_of_volunteers'] ?>/<?php echo $this->project['Date'] ?>"><button class="btn" id="right"></button></a>
            </div>

        </div>
    </div>
</body>

</html>