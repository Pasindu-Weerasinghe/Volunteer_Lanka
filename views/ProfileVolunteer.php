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
                <img class="image" src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $this->profile['Photo'] ?>" /><br><br>
                <label class="sub2"> <?php echo $this->user['Name']; ?></label><br><br>
                <div class="badge"><i class="fas fa-medal <?php echo $this->color ?>-color fa-4x"></i></div><br>
                <label class="sub3"><?php echo $this->badge ?></label>

            </div>
            <div class="column2"><br />
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
                                                echo $interest['Interest'];
                                            } ?><br>
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
    </div>

</body>

</html>