<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/profile.css">
    <script src="https://kit.fontawesome.com/18409fd0c0.js" crossorigin="anonymous"></script>
    <title>User Profile</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <div class="form1">
            <div class="left-container">

                <h2><?php echo $this->user['Name']; ?></h2>


                <?php if ($this->profile['Photo'] == null) { ?>
                        <img class="image" src="<?php echo BASE_URL ?>public/images/profile.jpg" alt="">
                                                                                    
                    <?php } else { ?>
                        <img class="image" src="<?php echo BASE_URL ?>public/images/<?php echo $this->profile['Photo'] ?>" alt="">
                                                                                    
                    <?php  } ?>
                


                
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
            <h2><i class="fa-solid fa-caret-right fa-lg" style="color: #000000;"></i> Achievements</h2><br>
            <div>
                <h3 class="pack">Number of Sponsored Projects : <?php echo $this->sPackages['total']; ?></h3>
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
                <table>
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
                    <tbody>
                        <?php foreach ($this->sAdvertisements as $advertisement) : ?>
                            <tr>
                                <td><?php echo $advertisement['Description']; ?></td>
                                <td><img class="img" src="<?php echo BASE_URL ?>public/images/ad_images/<?php echo $advertisement['Image']; ?>" alt=""></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><br>
        </div><br>
        <div class="form2">
            <div>
                <h2><i class="fa-solid fa-caret-right fa-lg" style="color: #000000;"></i> My Sponserd Projects</h2>
                <br>
            </div>

            <h3 class="pack">Already Completed</h3>
            <section class="container2">
                <?php
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
                <?php } ?>
            </section><br>

            <h3 class="pack">Active Projects</h3><br>
            <section class="container2">
                <?php
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
                <?php } ?>
            </section>
        </div>
        <?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){ 
            $u_id = $this->profile['U_ID'];
            $status= $this->profile['Status'];
        include 'views/includes/only_admin.php';
    }
    
    
    ?>
    </div><br><br><br>
    <?php include 'views/includes/footer.php'; ?>
</body>

</html>