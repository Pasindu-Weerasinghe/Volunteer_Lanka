<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view_sponsor_notices.css">
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
                        <td>Total Budjet</td>
                        <td>: </td>
                        <td>Rs <?php echo $this->budjet['Amount'] ?>.00</td><br>
                    </tr>
                </table>
            </div>

            <p class="para">Sponsor Packages</p><br>

            <form action="<?php echo BASE_URL; ?>Sponsor/view_sponsor_notice/<?php echo $this->pid ?>/confirm" method="post" id="form">
                <div>
                    <div class="package" id="silverPackage1">
                        <label name="package1" value="silver">
                            <strong>Silver Package<br>Up to Rs 5000</strong><br>
                        </label>
                    </div>

                    <div class="package" id="goldPackage2">
                        <label name="package2" value="gold">
                            <input type="hidden" name="goldPrice" value="<?php echo $this->goldPrice; ?>">
                            <strong>Gold Package <br>Up to Rs 7500</strong><br>
                        </label>
                    </div>

                    <div class="package" id="platinumPackage3">
                        <label name="package3" value="platinum">
                            <strong>Platinum Package<br>Up to Rs 10000</strong>
                        </label>
                    </div>
                </div>
                <tr>
                    <td>
                        <p class="para">Select Your Sponsor Package Amount
                    </td>
                    <td>:
                        <input class="input-container" type="number" id="selectAmount" name="selectAmount" placeholder="Rs 0.00" required>
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
                    <button type="submit" name="confirm" id="confirm" class="btn2">Confirm</button>
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
<script>
    const BASE_URL = "<?php echo BASE_URL ?>";

    const sendRequestBtn = document.getElementById('confirm');
    const requestForm = document.getElementById('form');

    // popup elements
    const popupBg = document.querySelector('.popup-bg');
    const popup = document.querySelector('.popup');
    const popupClose = document.querySelector('.popup-close');
    const popupMessage = document.querySelector('#message');

    sendRequestBtn.addEventListener('click', function() {
        return requestForm.reportValidity();
    });

    requestForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(requestForm);
        const url = BASE_URL + `Sponsor/view_sponsor_notice/${<?php echo $this->pid ?>}/confirm`
        fetch(url, {
                method: "post",
                body: formData
            }).then(res => res.json())
            .then(reply => {
                console.log(reply);
                popupBg.style.display = 'flex';
                popup.style.display = 'flex';
                if (reply.success) {
                    popupMessage.innerHTML = "Published successfully";
                } else {
                    popupMessage.innerHTML = "Error occured";
                }
            })
    });

</script>

</html>