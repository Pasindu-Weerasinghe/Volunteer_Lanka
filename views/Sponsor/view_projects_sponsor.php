<?php
$pid = $this->project['P_ID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view.css">
    <title><?php echo $this->project['Name'] ?></title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h2><?php echo $this->project['Name'] ?></h2><br /><br />
        <div class="container">
            <div class="slider">
                <?php if (count($this->images) > 1) { ?>
                    <?php foreach ($this->images as $index => $image) : ?>
                        <span id="slide-<?php echo $index + 1 ?>"></span>
                    <?php endforeach; ?>
                <?php } ?>
                
                <div class="image-container">
                    <?php foreach ($this->images as  $index => $image) : ?>
                        <img src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $image['Image'] ?>" class="slide" width="500" height="300" />
                    <?php endforeach; ?>
                </div>
                <?php if (count($this->images) > 1) { ?>
                    <div class="buttons">
                        <?php foreach ($this->images as $index => $image) : ?>
                            <a href="#slide-<?php echo $index + 1 ?>"></a>
                        <?php endforeach; ?>
                    </div>
                <?php } ?>
            </div>


            <div class="details-container">
                <div class="row">
                    <label for="date">Date</label>
                    <p id="date"><?php echo $this->project['Date'] ?></p>
                </div>

                <div class="row">
                    <label for="time">Time</label>
                    <p id="time"><?php echo $this->project['Time'] ?></p>
                </div>



                <div class="row">
                    <label for="venue">Venue</label>
                    <p id="venue"><?php echo $this->project['Venue'] ?></p>
                </div>

                <div class="row">
                    <label for="volunteers">Volunteers</label>
                    <p id="volunteers"><?php echo $this->project['No_of_volunteers'] ?></p>
                </div>

                <div class="row">
                    <label for="description">Description</label>
                    <p id="description"><?php echo $this->project['Description'] ?></p>
                </div>
            </div>

            <div class="btn-area">
                <button onclick="history.back()" class="btn">Back</button>
                <a href=" <?php echo BASE_URL ?> sponsor/publish_advertisement/<?php echo $this->project['P_ID'] ?>"> <button class="btn" id="publish-btn"> Publish Advertiesment</button>
            </div>
        </div>
    </div>
    <input type="hidden" name="ad-published" id="ad-published" value="<?php echo json_encode($this->ad_published) ?>">
</body>

<script>
    const adPublished = JSON.parse(document.getElementById('ad-published').value);
    console.log(adPublished);
    const publishBtn = document.getElementById('publish-btn');
    if (adPublished) {
        publishBtn.disabled = true;
        publishBtn.style.backgroundColor = 'grey';
        publishBtn.title = "You cannot publish. Because you already published for this project.";
    }

    const descriptionElement = document.getElementById('description');
    const descriptionHeight = descriptionElement.offsetHeight;
    const rowElement = descriptionElement.parentElement;
    rowElement.style.height = `${descriptionHeight + 10}px`;
    descriptionElement.style.height = '100%';

    const venueElement = document.getElementById('venue');
    const venueHeight = venueElement.offsetHeight;
    const venueRowElement = venueElement.parentElement;
    venueRowElement.style.height = `${venueHeight + 10}px`;
    venueElement.style.height = '100%';
</script>

</html>