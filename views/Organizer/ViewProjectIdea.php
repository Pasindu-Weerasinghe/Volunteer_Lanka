<!DOCTYPE html>
<html lang="en">

<?php
function currencyFormat($number)
{
    return number_format($number, 2, '.', ' ');
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'views/includes/head-includes.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view_pr_idea.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/slideshow.css">
    <title> Project Idea</title>
</head>

<body>
<!-- navigation bar -->
<?php include 'views/includes/navbar_log.php'; ?>

<div class="main" id="main">
    <div class="wrapper">
        <div class="upper-container">

            <div class="slideshow-container">
                <div class="slideshow">
                    <?php foreach ($this->pr_idea_images as $image) { ?>
                        <div class="slide fade">
                            <img src="<?php echo BASE_URL ?>public/images/pi_images/<?php echo $image; ?>" alt="">
                        </div>
                    <?php } ?>
                </div>
                <a class="prevBtn" onclick="moveSlide(-1)">&#10094;</a>
                <a class="nextBtn" onclick="moveSlide(1)">&#10095;</a>
                <br>
                <div class="dots">
                    <?php for ($i = 0; $i < count($this->pr_idea_images); $i++) { ?>
                        <span class="dot" onclick="setSlide(<?php echo $i ?>)"></span>
                    <?php } ?>
                </div>
            </div>
            <section>
                <a href="<?php echo BASE_URL . $_SESSION['role'] . '/view_profile/' . $this->volunteer['U_ID'] ?>""
                class="volunteer">
                <img src="<?php echo BASE_URL ?>public/images/<?php echo $this->volunteer['Photo'] ?: 'icon.jpg' ?>"
                     alt="Profile picture">
                <h3><?php echo $this->volunteer['Name'] ?></h3>
                </a>
                <div class="location">
                    <label>Location</label>
                    <p><?php echo $this->pr_idea['Location']; ?></p>
                </div>
                <div class="description">
                    <h2>Description</h2>
                    <p><?php echo $this->pr_idea['Description']; ?></p>
                </div>
            </section>
        </div>

        <form method="post"
              action="<?php echo BASE_URL ?>organizer/reply_to_pr_idea/<?php echo $this->pr_idea['PI_ID'] ?>/<?php echo $this->volunteer['U_ID'] ?>"
              class="lower-container">
            <h2 id="reply-header">Reply to Volunteer</h2>
            <textarea name="reply" id="reply" rows="4" placeholder="Write your reply here..." required></textarea>
            <?php if (!isset($this->pr_idea['reply'])) { ?>
                <button type="submit" name="reply-submit">Send reply</button>
            <?php } ?>
        </form>
    </div>

</div>

<input type="hidden" name="imagesArray" value='<?php echo json_encode($this->pr_idea_images); ?>'>
</body>
<script>
    const replyHeader = document.getElementById("reply-header");
    const reply = document.getElementById("reply");
    if (<?php echo json_encode(isset($this->pr_idea['reply'])); ?>) {
        reply.readOnly = true;
        reply.value = "<?php echo $this->pr_idea['reply']; ?>";
        replyHeader.innerHTML = "Your reply";
    }

</script>
<script type="module" src="<?php echo BASE_URL ?>public/scripts/slideshow.js"></script>
</html>