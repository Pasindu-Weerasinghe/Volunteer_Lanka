<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'views/includes/head-includes-log.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/profile.css" text="text/css">
    <script src="https://kit.fontawesome.com/18409fd0c0.js" crossorigin="anonymous"></script>
    <title>User Profile</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <div class="form1">
            <div class="left-container">

                <h2><?php echo $this->user['Name']; ?></h2>
                
                <img class="image" src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $this->profile['Photo'] ?>" alt="">


                <div class="btn-area">
                    <button class="btn"> <a href="<?php echo BASE_URL; ?>Sponsor/ChangeProfilePic"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</a></button>
                    <button class="btn"> <a href="<?php echo BASE_URL; ?>Sponsor/ChangeProfilePsw"><i class="fa-solid fa-key"></i> Change Password</a></button>
                </div>
            </div>



            <table class="right-container">
                <tr>
                    <td>User ID</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->profile['U_ID']; ?></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->profile['Role']; ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->user['Name']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->profile['Email'] ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->user['Address']; ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td>:</td>
                    <td id="data"><?php echo $this->user['Contact']; ?></td>
                </tr>
            </table>

        </div><br>


        <div class="form2">
            <h2><i class="fa-solid fa-caret-right fa-lg" style="color: #000000;"></i> Achivements</h2><br>
            <div>
                <h3 class="pack"><i class="fa-solid fa-circle fa-2xs"></i> Number of Sponsored Projects : <?php echo $this->sPackages['total']; ?></h3>
                <br>
            </div><br>
            <div class="pack">

                <table class="T2">
                    <tbody>
                        <tr>
                            <th></th>
                            <th>
                                Project
                            </th>
                            <th></th>
                            <th>
                                Total Amount
                            </th>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-circle fa-lg" style="color: #c0c0c0;"></i> Silver</td>
                            <td><?php echo $this->sPackages['silver']; ?></td>
                            <td></td>
                            <td>Rs <?php echo $this->sAmount['silver']; ?>.00</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-circle fa-lg" style="color: #ffd700;"></i> Gold</td>
                            <td><?php echo $this->sPackages['gold']; ?></td>
                            <td></td>
                            <td>Rs <?php echo $this->sAmount['gold']; ?>.00</td>
                        </tr>
                        <tr>
                            <td> <i class="fa-solid fa-circle fa-lg" style="color: #e5e4e2;"></i> Platinum</td>
                            <td><?php echo $this->sPackages['platinum']; ?></td>
                            <td></td>
                            <td>Rs <?php echo $this->sAmount['platinum']; ?>.00</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-circle fa-lg" style="color: #5aff20;"></i> Other</td>
                            <td><?php echo $this->sPackages['other']; ?></td>
                            <td></td>
                            <td>Rs <?php echo $this->sAmount['other']; ?>.00</td>
                        </tr>
                    </tbody>
                </table>
            </div><br>
        </div><br>

        <div class="form2">
            <div>
                <h2><i class="fa-solid fa-caret-right fa-lg" style="color: #000000;"></i> My Advertisements</h2>
                <br>
            </div>

            <div class="pack">
                <table class="T3">

                    <?php if ($this->sAdvertisements) : ?>
                        <thead>
                            <tr>
                                <th>
                                    <h3>Description</h3>
                                </th>
                                <th>
                                    <h3>Image</h3>
                                </th>
                            </tr>
                        </thead>
                        <?php foreach ($this->sAdvertisements as $advertisement) : ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $advertisement['Description']; ?></td>
                                    <td><img class="img" src="<?php echo BASE_URL ?>public/images/sp_images/<?php echo $advertisement['Image']; ?>" alt=""></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="2">There are no uploaded advertisements.</td>
                            </tr>
                        <?php endif; ?>
                            </tbody>


                </table>
            </div><br>
        </div><br>
        <div class="form2" id="projects">
            <div>
                <h2><i class="fa-solid fa-caret-right fa-lg" style="color: #000000;"></i> My Sponsored Projects</h2>
                <br>
            </div>

            <h3 class="pack"><i class="fa-solid fa-circle fa-2xs"></i> Active Projects</h3><br>
            <section class="container2">
                <?php
                if (empty($this->aSponsored_projects)) {
                    echo "<p><h2>There are no active sponsored projects yet.</h2></p>";
                } else {
                    foreach ($this->aSponsored_projects as $spProject) {
                        $pid = $spProject['P_ID'];
                ?>
                        <div class="card">
                            <div class="card-image">
                                <img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image'] ?>">
                            </div>

                            <h2><?php echo ($spProject["Name"]); ?></h2>
                            <p>Date: <?php echo ($spProject["Date"]); ?></p>
                            <p><?php echo ucfirst($spProject['Package']) ?>: <?php echo ($spProject['Amount']); ?></p>
                        </div>
                <?php
                    }
                }
                ?>
            </section><br>


            <h3 class="pack"><i class="fa-solid fa-circle fa-2xs"></i> Already Completed</h3>

            <section class="container2">
                <?php
                if (empty($this->cSponsored_projects)) {
                    echo "<p><h2>There are no complete sponsored projects yet.</h2></p>";
                } else {
                    foreach ($this->cSponsored_projects as $spProject) {
                        $pid = $spProject['P_ID'];
                ?>
                        <div class="card">
                            <div class="card-image">
                                <img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image'] ?>">
                            </div>

                            <h2><?php echo ($spProject["Name"]); ?></h2>
                            <p>Date: <?php echo ($spProject["Date"]); ?></p>
                            <p><?php echo ucfirst($spProject['Package']) ?>: <?php echo ($spProject['Amount']); ?></p>
                        </div>
                <?php
                    }
                }
                ?>
            </section><br>
        </div>
</body>

</html>