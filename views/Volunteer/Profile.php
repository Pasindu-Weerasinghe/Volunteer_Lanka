<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/profile_volunteer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>User Profile</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2>Volunteer Profile</h2><br><br>
        <div class="top-container">
            <div class="column1">
                <img class="image" src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo ($this->profile['Photo'] ?: 'user-icon.png') ?>" /><br><br>
                <label class="sub2"> <?php echo $this->user['Name']; ?></label><br><br>
                <div class="badge"><i class="fas fa-medal <?php echo $this->color ?>-color fa-4x"></i></div><br>
                <label class="sub3"><?php echo $this->badge ?></label>

            </div>
            <div class="column2"><br />
                <button class="btnpw"> <a href="<?php echo BASE_URL; ?>Volunteer/ChangeProfilePsw">Change Password</a></button>
                <button class="btnpw"> <a href="<?php echo BASE_URL; ?>Volunteer/change_profile">Edit</a></button><br><br>
                <table>
                    <tr>
                        <td class="top-td">User ID</td>
                        <td class="top-td">:</td>
                        <td class="top-td"><?php echo $this->profile['U_ID']; ?></td>
                    </tr>
                    <tr>
                        <td class="top-td">Email</td>
                        <td class="top-td">:</td>
                        <td class="top-td"><?php echo $this->profile['Email'] ?></td>
                    </tr>
                    <tr>
                        <td class="top-td">Contact Number</td>
                        <td class="top-td">:</td>
                        <td class="top-td"><?php echo $this->user['Contact']; ?></td>
                    </tr>
                    <tr>
                        <td class="top-td">Address</td>
                        <td class="top-td">:</td>
                        <td class="top-td"><?php echo $this->user['Address']; ?></td>
                    </tr>
                    <tr>
                        <td class="top-td">Interest Areas</td>
                        <td class="top-td">:</td>
                        <td class="top-td"><?php foreach ($this->interests as $interest) {
                                                if ($interest['Interest'] == 'Beach') {
                                                    $text = 'Beach Cleaning ';
                                                } else if ($interest['Interest'] == 'Donation') {
                                                    $text = 'Providing facilities to rural areas ';
                                                } else if ($interest['Interest'] == 'Environement') {
                                                    $text = 'Tree Planting ';
                                                } else if ($interest['Interest'] == 'Orphan') {
                                                    $text = 'Helping child/adult orphanages ';
                                                } else if ($interest['Interest'] == 'Animal') {
                                                    $text = 'Animal rescuing/rehabilitation ';
                                                }
                                                echo $text ?> <br><?php
                                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="top-td">Joined Organizations</td>
                        <td class="top-td">:</td>
                        <td class="top-td"><?php foreach ($this->orgs as $org) {
                                                echo $org['Organization'];
                                            } ?><br>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="horizontal">
            <div class="cont1">
                <label class="head">Details of Projects Volunteered</label><br><br>
                <label>Total projects volunteered : <?php echo $this->projectCount ?></label><br>
                <!-- <div class="projects">


                    <label>Name</label>
                    <label>Location</label><br>
                    <div class="name">
                        <?php foreach ($this->projects as $project) { ?>
                            <?php echo ($project['Name']) ?>
                            <?php echo ($project['Venue']) ?><br>
                        <?php } ?>
                    </div>


                </div> -->

            </div>

            <div class="cont1">
                <div class="head">
                    <label>Badges Earned</label>
                    <i class="fas fa-medal gold-color fa-2x"></i><br><br>
                </div>

                <label class="details">Badges earned by volunteering in projects : <?php echo $this->projectCount ?></label><br><br>
                <label class="details">Badges earned by sending new project ideas : <?php echo $this->ideaBadgeCount ?></label><br><br>
                <label class="details">Total badges : <?php echo $this->totalCount ?></label><br><br>
                <div class="more"><?php echo $this->more ?> more badges to earn <?php echo $this->next ?> medal</div><br>
            </div>

        </div>
        <br><br>

        <!-- Blog part starts here -->
        <!-- <?php foreach ($this->projects as $project) {
                    $pid = $project['P_ID'] ?>
            <div class="post-container">

                <div class="title">
                    <?php echo $project['Name'] ?>
                    <label>Average Rating : <?php echo $this->avg_rating[$pid] ?> <i class="fa fa-star checked star"></i></label>
                </div>
                <div class="container-image">
                    <?php foreach ($this->prImage[$pid] as $image) { ?>
                        <img src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $image['Image'] ?>">
                    <?php } ?>
                </div>
                <table class="post-table">
                    <tr>
                        <td>Description: </td>
                        <td><?php echo $this->description[$pid][0]['Description'] ?></td>
                    </tr>
                    <tr>
                        <td>Date: </td>
                        <td><?php echo $project['Date'] ?></td>
                    </tr>
                    <tr>
                        <td>Venue: </td>
                        <td><?php echo $project['Venue'] ?></td>
                    </tr>
                    <tr>
                        <td>Number of Volunteers: </td>
                        <td><?php echo $project['No_of_volunteers'] ?></td>
                    </tr>
                </table><br><br>
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
                            <img class="user" src="<?php echo BASE_URL ?>public/images/icon.jpg" />
                        <?php } else { ?>
                            <img class="user" src="<?php echo BASE_URL ?>public/images/<?php echo $this->profilePics[$uid]['Photo'] ?>" />
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
            </div><br /><br />
        <?php } ?> -->
    </div>

</body>

</html>