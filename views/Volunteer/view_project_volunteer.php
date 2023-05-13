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
                document.getElementById("right").onclick= function() {return confirm('Are you sure you want to leave this Project?');};
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
            
            <div class="details-container-vol">
                    <div class="row">
                        <label for="date">Date</label>
                        <p id="date"><?php echo $this->project['Date'] ?></p>
                    </div>

                    <div class="row">
                        <label for="time">Time</label>
                        <p id="time"><?php echo $this->project['Time'] ?></p>
                    </div>

                    <div class="row">
                        <label for="time">Organizer</label>
                        <p id="organizer"><?php echo $this->organizer['Name'] ?></p>
                    </div>

                    <div class="row">
                        <label for="venue">Venue</label>
                        <p id="venue"><?php echo $this->project['Venue'] ?></p>
                    </div>

                    <div class="row">
                        <label for="volunteers">Volunteers</label>
                        <p id="volunteers"><?php echo $this->project['No_of_volunteers'] ?></p>
                    </div>

                    <div class="row">
                        <label for="description">Description</label>
                        <p id="description"><?php echo $this->project['Description'] ?></p>
                    </div>
                </div>

            <div class="btn-area">
                <button class="btn" onclick="history.back()">Back</button>
                <a href="<?php echo BASE_URL ?>volunteer/join_leave_project/<?php echo $this->project['P_ID'] ?>/<?php echo $this->isJoined ?>/<?php echo $this->project['No_of_volunteers'] ?>/<?php echo $this->project['Date'] ?>"><button class="btn" id="right"></button></a>
            </div>
        </div>
    </div>
</body>

<script>
    const descriptionElement = document.getElementById('description');
    const descriptionHeight = descriptionElement.offsetHeight;
    const rowElement = descriptionElement.parentElement;
    rowElement.style.height = `${descriptionHeight + 10}px`;
    descriptionElement.style.height = '100%';

    const venueElement = document.getElementById('venue');
    const venueHeight = venueElement.offsetHeight;
    const venueRowElement = venueElement.parentElement;
    venueRowElement.style.height = `${venueHeight + 10}px`;
    venueElement.style.height = '100%';
</script>

</html>