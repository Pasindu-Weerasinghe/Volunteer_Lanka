
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view_sponsor_notices.css">
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2><?php echo $this->projects['Name'] ?></h2><br>

        <div class="container">
            <div>
                <div class="slider">
                    <span id="slide-1"></span>
                    <span id="slide-2"></span>
                    <span id="slide-3"></span>
                    <div class="image-container">
                        <img src="<?php echo BASE_URL ?>public/images/pr_images/cleaning.jpg" class="slide" width="500" height="300" />
                        <img src="<?php echo BASE_URL ?>public/images/pr_images/tree.jpg" class="slide" width="500" height="300" />
                        <img src="<?php echo BASE_URL ?>public/images/pr_images/clean.jpeg" class="slide" width="500" height="300" />
                    </div>
                    <div class="buttons">
                        <a href="#slide-1"></a>
                        <a href="#slide-2"></a>
                        <a href="#slide-3"></a>
                    </div>
                </div>


                <table class="table1">
                    <tr>
                        <td>Date</td>
                        <td>: <?php echo $this->projects['Date'] ?></td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>: <?php echo $this->projects['Time'] ?></td>
                    </tr>
                    <tr>
                        <td>Venue</td>
                        <td>: <?php echo $this->projects['Venue'] ?></td>
                    </tr>
                    <tr>
                        <td>Organizer</td>
                        <td>: <?php echo $this->organizer['Name'] ?> </td>
                    </tr>
                    <tr>
                        <td>Number of Volunteers</td>
                        <td>: <?php echo $this->projects['No_of_volunteers'] ?></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>: <?php echo $this->projects['Description'] ?></td><br>
                    </tr>
                </table>
            </div>

            <p class="para">Sponsor Packages</p><br>

            <form action="<?php echo BASE_URL; ?>Sponsor/view_sponsor_notice/<?php echo $this->pid ?>/confirm" method="post">
                <div>
                    <div class="package" id="silverPackage1">
                        <label name="package1" value="silver">
                            <strong>Silver Package<br>More than Rs 5000</strong><br>
                        </label>
                    </div>

                    <div class="package" id="goldPackage2">
                        <label name="package2" value="gold">
                            <input type="hidden" name="goldPrice" value="<?php echo $this->goldPrice; ?>">
                            <strong>Gold Package <br>More than Rs 7500</strong><br>
                        </label>
                    </div>

                    <div class="package" id="platinumPackage3">
                        <label name="package3" value="platinum">
                            <strong>Platinum Package<br>More than Rs 10000</strong><br>
                        </label>
                    </div>
                </div>
                <tr>
                    <td>
                        <p class="para">Select Your Sponsor Package Amount
                    </td>
                    <td>:
                        <input class="input-container" type="number" id="selectAmount" name="selectAmount" placeholder="Rs 0.00">
                    </td>
                </tr>


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
                    <button type="submit" name="confirm" class="btn2">Confirm</button>
                </div>
            </form>

            <script>
                function showPackage() {
                    var amount = parseInt(document.getElementById("selectAmount").value);
                    if (amount >= 10000) {
                        document.getElementById("platinumPackage").style.display = "block";
                        document.getElementById("goldPackage").style.display = "none";
                        document.getElementById("silverPackage").style.display = "none";
                        document.getElementById("otherPackage").style.display = "none";
                    } else if (amount >= 7500) {
                        document.getElementById("platinumPackage").style.display = "none";
                        document.getElementById("goldPackage").style.display = "block";
                        document.getElementById("silverPackage").style.display = "none";
                        document.getElementById("otherPackage").style.display = "none";
                    } else if (amount >= 5000) {
                        document.getElementById("platinumPackage").style.display = "none";
                        document.getElementById("goldPackage").style.display = "none";
                        document.getElementById("silverPackage").style.display = "block";
                        document.getElementById("otherPackage").style.display = "none";
                    } else if (amount < 5000) {
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