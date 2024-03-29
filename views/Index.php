<?php
if (session_status() == PHP_SESSION_NONE) {
  // if session is not started, start the session
  session_start();
}
if (isset($_SESSION['uid'])) {
  header('Location: ' . BASE_URL . $_SESSION['role']);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'views/includes/head-includes.php'; ?>
  <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/index.css">
  <title>Volunteer Lanka</title>
</head>

<body>
  <?php include 'views/includes/navbar.php'; ?>

  <div class="back-image" style="background-image: url(<?php echo BASE_URL; ?>public/images/index/bg-img-login.png);">

  </div>
  <div class="container">
    <div class="item item-1">
      <img id="logo2" src="<?php echo BASE_URL ?>public/images/logo_transparent.png">
      <label id="slang">Doing Good <br /> <br /> Does You Good</label>
    </div>
    <div class="item item-2">
      <!-- Slideshow container -->
      <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
          <img class="img" src="<?php echo BASE_URL ?>public/images/index/turtle.jpg">
        </div>

        <div class="mySlides fade">
          <img class="img" src="<?php echo BASE_URL ?>public/images/index/tree planting.jpg">
        </div>

        <div class="mySlides fade">
          <img class="img" src="<?php echo BASE_URL ?>public/images/index/rural schools.jpg">
        </div>
      </div>
      <br>
    </div>
    <div class="item item-3">
      <form action="<?php echo BASE_URL ?>volunteer/indexSearch" method="post">
        <input type="text" name="key">
        <button id="search" name="search">Search</button>
        <p>Search projects related to your interests</p>

      </form>
    </div>
  </div><br><br><br>

  <?php if($this->projects != NULL) { ?>
    <section class="card-container">
            <?php foreach ($this->projects as $project) {
                $pid = $project['P_ID'] ?>
                <div class="card">
                    <div class="card-image"><img id="card-img" src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid][0]['Image'] ?>"></div>
                    <h2><?php echo ($project["Name"]); ?></h2>
                    <p><?php echo ($project["Date"]); ?></p>
                    <a class="btn" href="<?php echo BASE_URL ?>index/login">View</a>
                </div>
            <?php } ?>
        </section>
  <?php }; ?>

  <!-- <marquee direction="right"> -->
  <h3>#1 Platform for volunteering communities. Come join hands with us</h3>
  <!-- </marquee> -->

  <table>
    <tr>
      <th><img class="brands" src="<?php echo BASE_URL ?>public/images/index/rotaract.png" alt=""></th>
      <th><img class="brands" src="<?php echo BASE_URL ?>public/images/index/leo.png" alt=""></th>
      <th><img class="brands" src="<?php echo BASE_URL ?>public/images/index/aiesec.jpg" alt=""></th>
      <th><img class="brands" src="<?php echo BASE_URL ?>public/images/index/lions.png" alt=""></th>
    </tr>
  </table>
  <div class="container2">
    <div class="text" id="who">Who are We?</div>
    <div class="text" id="des">We are a group of individuals passionate about volunteering and strive to gather volunteers with the use of technology. <b>Volunteer Lanka</b> is the fruitful effort of our team.
      <br><br>Individuals from all over the country can find and engage in volunteering in projects according to their interests.
    </div>
  </div><br><br><br>

  <div class="container2">
    <div class="text" id="contact">Contact Us</div>
    <div class="text" id="con-details">Emails : </div>
    <div class="text" id="email"><a href="">nethimanya2000@gmail.com</a>
      <br><a href="">binularasanjith@gmail.com</a>
      <br><a href="">hasindukarunathilaka@gmail.com</a>
      <br><a href="">pasinduweerasinghe@gmail.com</a>
    </div>

    <div class="text" id="numbers">Contact Numbers : </div>
    <div class="text" id="email">
      +94 711503122
      <br>+94 778765345
      <br>+94 782321456
      <br>+94 719006785
    </div>
  </div>

  <br><br><br>

</body>
<?php include 'views/includes/footer.php'; ?>

<script src="<?php echo BASE_URL ?>public/scripts/index.js"></script>

</html>