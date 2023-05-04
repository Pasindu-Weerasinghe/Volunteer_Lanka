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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/profile_volunteer.css">
    <title>User Profile</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2>Volunteer Profile</h2><br><br>
        <div class="top-container">
            <div class="column1">
                <img class="image" src="<?php echo BASE_URL ?>public/images/icon.jpg" /><br><br>
                <label class="sub2"> <?php echo $this->user['Name']; ?></label><br><br>
                <label class="sub3">Projects Volunteered : 8</label>
            </div>
            <div class="column2"><br />
                <button class="btnpw"> <a href="<?php echo BASE_URL; ?>Volunteer/ChangeProfilePsw">Change Password</a></button>
                <button class="btnpw"> <a href="<?php echo BASE_URL; ?>Volunteer/ChangeProfilePsw">Edit</a></button><br><br>
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
                        <td class="top-td">Interest Areas</td>
                        <td class="top-td">:</td>
                        <td class="top-td"><?php foreach ($this->interests as $interest) {
                                                echo $interest['Interest'];
                                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="top-td">Joined Organizations</td>
                        <td class="top-td">:</td>
                        <td class="top-td"><?php foreach ($this->orgs as $org) {
                                                echo $org['Organization'];
                                            } ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div> <br><br><br>


        <br><br>
        <div class="container">
            <?php foreach ($this->projects as $project) {
                $pid = $project['P_ID'] ?>
                <div class="title"><?php echo $project['Name'] ?> by Rotaract Club UOC</div>
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
                    <table><br><br>
                        <hr>
                        <div class="title-feedback"><?php echo $this->feedbackCount[$pid] ?> Feedbacks</div>
                        <hr>
                        <?php foreach ($this->feedbacks[$pid] as $feedback) { ?>
                            <div class="feedback">
                                <img class="user" src="<?php echo BASE_URL ?>public/images/icon.jpg" />
                                <label>Username</label>
                                <label><?php echo $feedback['Description']?></label>
                                <label><?php echo $feedback['Rating']?></label>
                            </div>
                        <?php } ?>
                    <?php } ?><br><br>
        </div>

</body>

</html>