<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location:' . BASE_URL);
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view_sponsor_notices.css">
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2>Beach Cleaning</h2><br>

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

            <p class="para">Select sponsor package below</p><br><br>

            <form action="<?php echo BASE_URL; ?>Sponsor/view_sponsor_notice" method="post">
                <div class="silver">
                    <input type="radio" name="package" value="silver">
                    <strong>Silver</strong><br>
                    <strong>Amount: <?php echo $this->silverPrice; ?></strong>
                </div>

                <div class="silver">
                    <input type="radio" name="package" value="gold">
                    <strong>Gold</strong><br>
                    <strong>Amount: <?php echo $this->goldPrice; ?></strong>
                </div>

                <div class="silver">
                    <input type="radio" name="package" value="platinum">
                    <strong>Platinum</strong><br>
                    <strong>Amount : <?php echo $this->platinumPrice; ?></strong>
                </div><br><br>

                <div class="btn-area">
                    <button onclick="history.back()" class="btn1">Cancel</button>
                    <button class="btn2">Confirm</a></button>
                </div>
            </form>

        </div>
    </div>
    <?php include 'views/includes/footer.php'; ?>

</body>

</html>