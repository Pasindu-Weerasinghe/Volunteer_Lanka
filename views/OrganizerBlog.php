<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/blog.css">
    <title>My Blog</title>
</head>

<body>
<!-- navigation bar -->
<?php include 'views/includes/navbar_log.php'; ?>

<div class="main" id="main">
    <!-- organization start -->
    <div class="organization">
        <div id="left">
            <img src="<?php echo BASE_URL; ?>public/images/org_image.jpg" alt="">
            <h3><?php echo $this->organizer['Name']; ?></h3>
        </div>
        <div id="right">
            <!-- <p>A proud member of the Colombo Uptown Rotary family, the Rotaract Club of University of Colombo, Faculty of Arts was charted on the 26th of March 2010. The Club slogan, "United We Stand in Diversity", represents our hope for the club as well as our country. During the period since its charter, the club has been recognised at the District Rotaract Assembly for its numerous projects along with the Rotary and Rotaract district citations and recognition as one of the best reporting clubs.</p> -->
            <p><b>No of members:</b> <?php echo $this->organizer['No_of_members']; ?></p>
            <p><b>Branch:</b> <?php echo $this->organizer['Branch']; ?></p>
            <p><b>Contact:</b> <?php echo $this->organizer['Contact']; ?></p>
            <p><b>No of upcoming projects:</b> <?php echo $this->no_of_upcoming_projects; ?></p>
            <p><b>No of projects organized:</b> <?php echo $this->no_of_projects_organized; ?></p>
        </div>
    </div>
    <!-- organization end -->
    <br>
    <!-- Blog part starts here -->
    <?php foreach ($this->projects as $project) {
        $pid = $project['P_ID'] ?>
        <div class="post-container">

            <div class="title">
                <?php echo $project['Name'] ?>
                <label>Average Rating : <?php echo $this->avg_rating[$pid] ?> <i
                        class="fa fa-star checked star"></i></label>
            </div>
            <div class="container-image">
                <?php foreach ($this->prImage[$pid] as $image) { ?>
                    <img src="<?php echo BASE_URL ?>public/images/post_images/<?php echo $image['Image'] ?>">
                <?php } ?>
            </div>
            <table class="post-table">
                <tr>
                    <td>Description:</td>
                    <td><?php echo $this->description[$pid][0]['Description'] ?></td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><?php echo $project['Date'] ?></td>
                </tr>
                <tr>
                    <td>Venue:</td>
                    <td><?php echo $project['Venue'] ?></td>
                </tr>
                <tr>
                    <td>Number of Volunteers:</td>
                    <td><?php echo $project['No_of_volunteers'] ?></td>
                </tr>
            </table>
            <br><br>
            <hr>
            <div class="title-feedback">
                <?php echo $this->feedbackCount[$pid] ?> Feedbacks
                <button id="view-all">View all feedbacks</button>
            </div>
            <hr>
            <?php foreach ($this->feedbacks[$pid] as $feedback) {
                $uid = $feedback['U_ID'] ?>
                <div class="feedback">
                    <?php if ($this->profilePics[$uid]['Photo'] == null) { ?>
                        <img class="user" src="<?php echo BASE_URL ?>public/images/icon.jpg"/>
                    <?php } else { ?>
                        <img class="user"
                             src="<?php echo BASE_URL ?>public/images/<?php echo $this->profilePics[$uid]['Photo'] ?>"/>
                    <?php } ?>
                    <div class="item-name"><?php echo $this->names[$uid]['Name'] ?></div>
                    <div class="item"><?php echo $feedback['Description'] ?></div>
                    <div class="item"><?php echo $feedback['Rating'] ?>
                        <?php for ($i = 0; $i < 5; $i++) {
                            if ($i < $feedback['Rating']) { ?>
                                <i class="fa fa-star checked star"></i>
                            <?php } else { ?>
                                <i class="fa fa-star unchecked star"></i>
                            <?php }
                        } ?>
                    </div>
                </div>
            <?php } ?>
        </div><br/><br/>
    <?php } ?>
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        $u_id = $this->profile['U_ID'];
        $status = $this->profile['Status'];
        include 'views/includes/only_admin.php';
    } ?>
</div>

</body>

</html>