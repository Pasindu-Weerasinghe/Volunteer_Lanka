<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view_sponsor_notices.css">
    <title><?php echo $this->projects['Name'] ?></title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2><?php echo $this->projects['Name'] ?></h2><br>

        <div class="container">
            <div>
            <div class="slider">
                <?php if (count($this->prImage) > 1) { ?>
                    <?php foreach ($this->prImage as $index => $image) : ?>
                        <span id="slide-<?php echo $index + 1 ?>"></span>
                    <?php endforeach; ?>
                <?php } ?>

                <div class="image-container">
                    <?php foreach ($this->prImage as  $index => $image) : ?>
                        <img src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $image['Image'] ?>" class="slide" width="500" height="300" />
                    <?php endforeach; ?>
                </div>
                <?php if (count($this->prImage) > 1) { ?>
                    <div class="buttons">
                        <?php foreach ($this->prImage as $index => $image) : ?>
                            <a href="#slide-<?php echo $index + 1 ?>"></a>
                        <?php endforeach; ?>
                    </div>
                <?php } ?>
            </div>



                <table class="table1">
                    <tr>
                        <td>Date</td>
                        <td>:</td>
                        <td><?php echo $this->projects['Date'] ?></td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>:</td>
                        <td><?php echo $this->projects['Time'] ?></td>
                    </tr>
                    <tr>
                        <td>Venue</td>
                        <td>:</td>
                        <td><?php echo $this->projects['Venue'] ?></td>
                    </tr>
                    <tr>
                        <td>Organizer</td>
                        <td>:</td>
                        <td><?php echo $this->organizer['Name'] ?> </td>
                    </tr>
                    <tr>
                        <td>Number of Volunteers</td>
                        <td>:</td>
                        <td><?php echo $this->projects['No_of_volunteers'] ?></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>:</td>
                        <td><?php echo $this->projects['Description'] ?></td><br>
                    </tr>
                    <tr>
                        <td>Total Budget</td>
                        <td>: </td>
                        <td>Rs <?php echo $this->budjet['Amount'] ?>.00</td><br>
                    </tr>
                    <tr>
                        <td>Remaining Amount</td>
                        <td>: </td> 
                        <td>Rs  <?php echo $this->remainingAmount ?>.00</td><br>
                    </tr>
                </table>
            </div>

            <p class="para">Sponsor Packages</p><br>

            <form action="<?php echo BASE_URL; ?>Sponsor/view_sponsor_notice/<?php echo $this->pid ?>/confirm" method="post" id="form">
                <div>
                    <div class="package" id="silverPackage1">
                        <label name="package1" value="silver">
                            <strong>Silver Package<br>More than RS <?php echo $this->packageAmount['silver'] ?></strong><br>
                        </label>
                    </div>
                    <div class="package" id="goldPackage2">
                        <label name="package2" value="gold">
                            <strong>Gold Package <br>More than Rs <?php echo $this->packageAmount['gold'] ?></strong><br>
                        </label>
                    </div>

                    <div class="package" id="platinumPackage3">
                        <label name="package3" value="platinum">
                            <strong>Platinum Package<br>More than Rs <?php echo $this->packageAmount['platinum'] ?></strong>
                        </label>
                    </div>
                </div>
                <tr>
                    <td>
                        <p class="para">Select Your Sponsor Package Amount
                    </td>
                    <td>:
                        <?php 
                            if($this->packageAmount['silver'] >1000){
                                $min=1000;
                            }else{
                                $min=$this->packageAmount['silver']-200;;
                            } 
                            if($min<=0){
                                $min=10;
                            }           
                        ?>
                        <input class="input-container" type="number" id="selectAmount" name="selectAmount" placeholder="Rs 0.00" required min="<?php echo $min?>" max="<?php echo $this->remainingAmount ?>">
                    </td>
                    
                </tr>
                <input  type="hidden" id ="package-value" name="package-value"  >

                <div><br>
                    <div class="a12">
                        <div class="sPackage" id="silverPackage">
                            <label name="package1" value="silver">
                                <strong>Your Package is Silver </strong><br>
                                <script>
                                    document.getElementById("silverPackage").style.display = "none";
                                </script>
                            </label>
                        </div>

                        <div class="sPackage" id="goldPackage">
                            <label name="package2" value="gold">
                                <script>
                                    document.getElementById("goldPackage").style.display = "none";
                                </script>
                                <strong>Your Package is Gold</strong><br>
                            </label>
                        </div>

                        <div class="sPackage" id="platinumPackage">
                            <label name="package3" value="platinum">
                                <script>
                                    document.getElementById("platinumPackage").style.display = "none";
                                </script>
                                <strong>Your Package is Platinum</strong><br>
                            </label>
                        </div>

                        <div class="sPackage" id="otherPackage">
                            <label name="package4" value="other">
                                <script>
                                    document.getElementById("otherPackage").style.display = "none";
                                </script>
                                <strong>Your Package is Other</strong><br>
                            </label>
                        </div>
                    </div>

                </div><br><br>

                <div class="btn-area1">
                    <button type="submit" name="confirm" id="confirm" class="btn2">Confirm</button>
                </div>
            </form>

            
            <script>
                const packageValue = document.getElementById("package-value");
                function showPackage() {
                    var amount = parseInt(document.getElementById("selectAmount").value);
                    if (amount >= <?php echo $this->packageAmount['platinum']?>) {
                        packageValue.value="platinum";
                        document.getElementById("platinumPackage").style.display = "block";
                        document.getElementById("goldPackage").style.display = "none";
                        document.getElementById("silverPackage").style.display = "none";
                        document.getElementById("otherPackage").style.display = "none";
                    } else if (amount >= <?php echo $this->packageAmount['gold'] ?>) {
                        packageValue.value="gold";
                        document.getElementById("platinumPackage").style.display = "none";
                        document.getElementById("goldPackage").style.display = "block";
                        document.getElementById("silverPackage").style.display = "none";
                        document.getElementById("otherPackage").style.display = "none";
                    } else if (amount >= <?php echo $this->packageAmount['silver'] ?>) {
                        packageValue.value="silver";
                        document.getElementById("platinumPackage").style.display = "none";
                        document.getElementById("goldPackage").style.display = "none";
                        document.getElementById("silverPackage").style.display = "block";
                        document.getElementById("otherPackage").style.display = "none";
                    } else {
                        packageValue.value="other";
                        document.getElementById("platinumPackage").style.display = "none";
                        document.getElementById("goldPackage").style.display = "none";
                        document.getElementById("silverPackage").style.display = "none";
                        document.getElementById("otherPackage").style.display = "block";
                    }
                }

                // Call the function when the input field value changes
                document.getElementById("selectAmount").addEventListener("input", showPackage);
            </script>


            <div class="btn-area2">
                <button onclick="history.back()" class="btn1">Cancel</button>
            </div>
        </div>
    </div>
    <?php include 'views/includes/footer.php'; ?>

</body>


</html>